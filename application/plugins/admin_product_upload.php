<?php
$pluggable = new Pluggable;
//ADD
$pluggable->register_action('admin_html_post_add_sidebar_product', 'admin_html_post_add_sidebar_product_func');
$pluggable->register_action('admin_callback_after_post_added_product', 'admin_callback_after_post_sidebar_added_product_func');

$pluggable->register_action('admin_html_post_edit_sidebar_product', 'admin_html_post_edit_sidebar_product_func');
$pluggable->register_action('admin_callback_after_post_updated_product', 'admin_callback_after_post_sidebar_updated_product_func');


$pluggable->register_action('admin_html_post_add_sidebar_product2', 'admin_html_post_add_sidebar_product_func');
$pluggable->register_action('admin_callback_after_post_added_product2', 'admin_callback_after_post_sidebar_added_product_func');

$pluggable->register_action('admin_html_post_edit_sidebar_product2', 'admin_html_post_edit_sidebar_product_func');
$pluggable->register_action('admin_callback_after_post_updated_product2', 'admin_callback_after_post_sidebar_updated_product_func');

function admin_html_post_add_sidebar_product_func() {
    $CI =& get_instance();
    $CI->lang->load('plugins', ADMIN_LANGUAGE);
    ?>
    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
        <div class="portlet-header ui-widget-header">
            <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $CI->lang->line('txt_upload_file')?>
        </div>
        <div class="portlet-content">
            <ul>
                <li>
                    <a href="#" class="upload-file" data-store="#document"><?php echo $CI->lang->line('txt_document')?></a>
                    <input name="document" type="text" id="document" class="field text full">
                </li>
            </ul>
        </div>
    </div>
<?php
}

function admin_callback_after_post_sidebar_added_product_func($module, $lang, $post_id, $langmap_id) {
    $CI =& get_instance();
    $CI->load->Model('meta_admin_model');

    $document = $CI->input->post('document');

    $data = array(
        array(
            'meta_module' => $module ,
            'fid' => $post_id ,
            'meta_key' => '_document',
            'meta_value' => $document,
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

function admin_html_post_edit_sidebar_product_func($module = '', $lang = '', $post_id = 0) {
    $CI =& get_instance();
    $CI->lang->load('plugins', ADMIN_LANGUAGE);
    $CI->load->Model('meta_admin_model');
    $meta = $CI->meta_admin_model->get_by_fid($post_id);
    $document = get_meta_value_by_meta_key($meta, '_document');
    ?>
    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
        <div class="portlet-header ui-widget-header">
            <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $CI->lang->line('txt_upload_file')?>
        </div>
        <div class="portlet-content">
            <ul>
                <li>
                    <a href="#" class="upload-file" data-store="#document"><?php echo $CI->lang->line('txt_document')?></a>
                    <input name="document" type="text" id="document" value="<?php echo $document['meta_value']?>" class="field text full">
                </li>
            </ul>
        </div>
    </div>
<?php
}

function admin_callback_after_post_sidebar_updated_product_func($module, $lang, $post_id, $langmap_id) {
    $CI =& get_instance();
    $CI->load->Model('meta_admin_model');
    $document = $CI->input->post('document');

    $meta = $CI->meta_admin_model->get_by_fid($post_id);
    if( empty($meta)  ) {
        $data = array(
            array(
                'meta_module' => $module ,
                'fid' => $post_id ,
                'meta_key' => '_document',
                'meta_value' => $document,
                'langmap_id' => $langmap_id
            )
        );
        $CI->meta_admin_model->insert_batch($data);
    }else {

        $data = array(
            'meta_value' => $document
        );
        $CI->meta_admin_model->update($data, array('fid'=>$post_id, 'meta_key'=> '_document'));
    }

}