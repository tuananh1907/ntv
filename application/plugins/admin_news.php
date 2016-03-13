<?php
$pluggable = new Pluggable;
//ADD
$pluggable->register_action('admin_html_post_add_sidebar_news', 'admin_html_post_add_sidebar_news_func');
$pluggable->register_action('admin_callback_after_post_added_news', 'admin_callback_after_post_added_news_func');

$pluggable->register_action('admin_html_post_edit_sidebar_news', 'admin_html_post_edit_sidebar_news_func');
$pluggable->register_action('admin_callback_after_post_updated_news', 'admin_callback_after_post_updated_news_func');

function admin_html_post_add_sidebar_news_func() {
	$CI =& get_instance();
	$CI->lang->load('plugins', ADMIN_LANGUAGE);
	?>
	<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
        <div class="portlet-header ui-widget-header">
            <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $CI->lang->line('txt_custom')?>
        </div>
        <div class="portlet-content">
            <ul>   
                <li>
                    <label class="desc">
                        <?php echo $CI->lang->line('txt_datetime')?>
                    </label>
                    <input data-datepicker name="datetime" type="text" value="1" class="field text full">
                </li>
            </ul>
        </div>
    </div>
	<?php
}

function admin_callback_after_post_added_news_func($module, $lang, $post_id, $langmap_id) {
    $CI =& get_instance();
    $CI->load->Model('meta_admin_model');
    
    $datetime = $CI->input->post('datetime');

    $data = array(
       array(
          'meta_module' => $module ,
          'fid' => $post_id ,
          'meta_key' => '_datetime',
          'meta_value' => $datetime,
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

function admin_html_post_edit_sidebar_news_func($module = '', $lang = '', $post_id = 0) {
  $CI =& get_instance();
  $CI->lang->load('plugins', ADMIN_LANGUAGE);
  $CI->load->Model('meta_admin_model');
  $meta = $CI->meta_admin_model->get_by_fid($post_id);
  $datetime = get_meta_value_by_meta_key($meta, '_datetime');
  ?>
  <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
        <div class="portlet-header ui-widget-header">
            <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $CI->lang->line('txt_custom')?>
        </div>
        <div class="portlet-content">
            <ul>
                <li>
                    <label class="desc">
                        <?php echo $CI->lang->line('txt_datetime')?>
                    </label>
                    <input data-datepicker value='<?php echo $datetime['meta_value']?>' name="datetime" type="text" class="field text full">
                </li>
            </ul>
        </div>
    </div>
  <?php
}

function admin_callback_after_post_updated_news_func($module, $lang, $post_id, $langmap_id) {
  $CI =& get_instance();
  $CI->load->Model('meta_admin_model');
  $datetime = $CI->input->post('datetime');

  $meta = $CI->meta_admin_model->get_by_fid($post_id);
  if( empty($meta)  ) {
    $data = array(
       array(
          'meta_module' => $module ,
          'fid' => $post_id ,
          'meta_key' => '_datetime',
          'meta_value' => $datetime,
          'langmap_id' => $langmap_id
       )
    );
    $CI->meta_admin_model->insert_batch($data);
  }else {

    $data = array(
       'meta_value' => $datetime
    );
    $CI->meta_admin_model->update($data, array('fid'=>$post_id, 'meta_key'=> '_datetime'));
  }
  
}