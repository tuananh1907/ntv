<?php
$pluggable = new Pluggable;
//ADD
$pluggable->register_action('admin_html_post_add_block_right_product2', 'admin_html_post_add_block_right_product2_bs_func');
$pluggable->register_action('admin_callback_after_post_added_product2', 'admin_callback_after_post_added_product2_bs_func');

//EDIT
$pluggable->register_action('admin_html_post_edit_block_right_product2', 'admin_html_post_edit_block_right_product2_bs_func');
$pluggable->register_action('admin_callback_after_post_updated_product2', 'admin_callback_after_post_updated_product2_bs_func');


function admin_html_post_add_block_right_product2_bs_func($module, $language) {
    $CI =& get_instance();
    $CI->lang->load('plugins', ADMIN_LANGUAGE);
    $CI->load->model('tag_admin_model');

    $brand = $CI->tag_admin_model->get_tag('brand2', $language);
    ?>
    <div class='form-field'>
        <label class="desc">Nhãn hiệu</label>
        <select name='brand_<?php echo $language; ?>'>
            <option value='0'>Chọn nhãn hiệu</option>
            <?php 
            foreach($brand as $b){
            ?>
            <option value='<?php echo $b['tag_id']?>'><?php echo $b['title']?></option>
            <?php }?>
        </select>
    </div>
<?php
}

function admin_callback_after_post_added_product2_bs_func($module, $lang, $post_id, $langmap_id) {
    $CI =& get_instance();
    $CI->load->Model('tagmap_admin_model');

    $brand_id = $CI->input->post("brand_" .$lang);

    $data = array(
        array(
            'tag_id' => $brand_id ,
            'fid' => $post_id ,
            'tag_module' => 'brand2',
            'fid_module' => $module,
            'langmap_id' => $langmap_id
        )
    );

    $CI->tagmap_admin_model->insert_batch($data);
}

if (!function_exists('list_tag_id')) {
    function list_tag_id($data) {
        $list = array();
        for ($i=0, $len = count($data);$i<$len;$i++) {
            array_push($list, $data[$i]['tag_id']);
        }
        return $list;
    }
}

function admin_html_post_edit_block_right_product2_bs_func($module = '', $language = '', $post_id = 0) {
    $CI =& get_instance();
    $CI->lang->load('plugins', ADMIN_LANGUAGE);
    $CI->load->model('tag_admin_model');
    $CI->load->Model('tagmap_admin_model');

    $brand = $CI->tag_admin_model->get_tag('brand2', $language);

    $b_l = $CI->tagmap_admin_model->get_tagmap_by_fid($post_id, 'brand2', $module);
    $b_l = list_tag_id($b_l);
    ?>

    <div class='form-field'>
        <label class="desc">Nhãn hiệu</label>
        <select name='brand_<?php echo $language; ?>'>
            <option value='0'>Chọn nhãn hiệu</option>
            <?php 
            foreach($brand as $b){
                $c = (in_array($b['tag_id'], $b_l)) ? 'selected' : '';
            ?>
            <option <?php echo $c ?>  value='<?php echo $b['tag_id']?>'><?php echo $b['title']?></option>
            <?php }?>
        </select>
    </div>
<?php 
}

function admin_callback_after_post_updated_product2_bs_func($module, $lang, $post_id, $langmap_id) {
    $CI =& get_instance();

    $brand_id = $CI->input->post("brand_" .$lang);

    $CI->load->Model('tagmap_admin_model');
    $b_l = $CI->tagmap_admin_model->get_tagmap_by_fid($post_id, 'brand2', $module);

    
    //BRAND
    if( empty($b_l)  ) {
        $data = array(
                    array(
                        'tag_id' => $brand_id ,
                        'fid' => $post_id ,
                        'tag_module' => 'brand2',
                        'fid_module' => $module,
                        'langmap_id' => $langmap_id
                    )
            );
        $CI->tagmap_admin_model->insert_batch($data);
    }else {

        $data = array(
            'tag_id' => $brand_id,
        );
        $CI->tagmap_admin_model->update($data, array('fid'=>$post_id, 'tag_module'=> 'brand2', 'fid_module'=>$module));
    }

}