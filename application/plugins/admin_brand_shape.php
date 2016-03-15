<?php
$pluggable = new Pluggable;
//ADD
$pluggable->register_action('admin_html_post_add_block_right_product', 'admin_html_post_add_block_left_product_func');
$pluggable->register_action('admin_callback_after_post_added_product', 'admin_callback_after_post_added_product_func');

//EDIT
$pluggable->register_action('admin_html_post_edit_block_right_product', 'admin_html_post_edit_block_left_product_func');
$pluggable->register_action('admin_callback_after_post_updated_product', 'admin_callback_after_post_updated_product_func');

//ADD
$pluggable->register_action('admin_html_post_add_block_right_product2', 'admin_html_post_add_block_left_product_func');
$pluggable->register_action('admin_callback_after_post_added_product2', 'admin_callback_after_post_added_product_func');

//EDIT
$pluggable->register_action('admin_html_post_edit_block_right_product2', 'admin_html_post_edit_block_left_product_func');
$pluggable->register_action('admin_callback_after_post_updated_product2', 'admin_callback_after_post_updated_product_func');

function admin_html_post_add_block_left_product_func($module, $language) {
    $CI =& get_instance();
    $CI->lang->load('plugins', ADMIN_LANGUAGE);
    ?>
    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
        <div class="portlet-header ui-widget-header">
            <span class="ui-icon ui-icon-circle-arrow-s"></span>Gallery
        </div>
        <div class="portlet-content">
            <a rel="<?php echo $language?>" class='button upload-gallery'>Thêm ảnh</a>
            <div class="clearfix"></div>
            <ul lang="<?php echo $language?>" class='gallery_list gallery_plugin_list' id='gallery_<?php echo $language?>_list'>
            </ul>
            <input type="hidden" id="gallery_<?php echo $language?>" name="gallery_<?php echo $language?>">
        </div>
    </div>
<?php
}

function admin_callback_after_post_added_product_func($module, $lang, $post_id, $langmap_id) {
    $CI =& get_instance();
    $CI->load->Model('meta_admin_model');

    $gallery = $CI->input->post("gallery_" .$lang);

    $data = array(
        array(
            'meta_module' => $module ,
            'fid' => $post_id ,
            'meta_key' => '_gallery',
            'meta_value' => addslashes($gallery),
            'langmap_id' => $langmap_id
        )
    );

    $CI->meta_admin_model->insert_batch($data);
}

if (!function_exists('get_meta_value_by_meta_key')) {
    function get_meta_value_by_meta_key($data, $meta_key) {
        for ($i=0, $len = count($data);$i<$len;$i++) {
            if($meta_key == $data[$i]['meta_key']) {
                return $data[$i];
            }
        }
    }
}

function admin_html_post_edit_block_left_product_func($module = '', $language = '', $post_id = 0) {
    $CI =& get_instance();
    $CI->lang->load('plugins', ADMIN_LANGUAGE);
    $CI->load->Model('meta_admin_model');
    $meta = $CI->meta_admin_model->get_by_fid($post_id);
    $gallery = get_meta_value_by_meta_key($meta, '_gallery');
    $g = json_decode(stripslashes($gallery['meta_value']), true);
    ?>
    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
        <div class="portlet-header ui-widget-header">
            <span class="ui-icon ui-icon-circle-arrow-s"></span>Gallery
        </div>
        <div class="portlet-content">
            <a rel="<?php echo $language?>" class='button upload-gallery'>Thêm ảnh</a>
            <div class="clearfix"></div>
            <ul lang="<?php echo $language?>" class='gallery_list gallery_plugin_list' id='gallery_<?php echo $language?>_list'>
                <?php
                if( count($g) > 0 ) {
                    foreach ($g as $v) {
                        ?>
                        <li>
                            <div class='image'><img src="<?php echo $v['img']?>"></div>
                            <div class='config'>
                                <input value='<?php echo $v['w']?>' placeholder='w' class='width'/>
                                <input value='<?php echo $v['h']?>' placeholder='h' class='height'/>
                                <input value='<?php echo $v['a']?>' placeholder='http://' class='anchor'/>
                            </div>
                            <a href="#" class='remove'>X</a>
                        </li>
                    <?php
                    }
                }
                ?>
            </ul>
            <input type="hidden" id="gallery_<?php echo $language?>" name="gallery_<?php echo $language?>" value="<?php echo htmlentities($gallery['meta_value']); ?>">
        </div>
    </div>
<?php
}

function admin_callback_after_post_updated_product_func($module, $lang, $post_id, $langmap_id) {
    $CI =& get_instance();
    $CI->load->Model('meta_admin_model');
    $gallery = $CI->input->post("gallery_" .$lang);
    $gallery = stripcslashes(html_entity_decode($gallery));
    $meta = $CI->meta_admin_model->get_by_fid($post_id);
    if( empty($meta)  ) {
        $data = array(
            array(
                'meta_module' => $module ,
                'fid' => $post_id ,
                'meta_key' => '_gallery',
                'meta_value' => addslashes($gallery),
                'langmap_id' => $langmap_id
            )
        );
        $CI->meta_admin_model->insert_batch($data);
    }else {

        $data = array(
            'meta_value' => addslashes($gallery),
        );
        $CI->meta_admin_model->update($data, array('fid'=>$post_id, 'meta_key'=> '_gallery'));
    }

}