<?php
$pluggable = new Pluggable;
//ADD
$pluggable->register_action('admin_html_page_add_before_seo', 'admin_html_page_add_before_seo_func');
$pluggable->register_action('admin_callback_page_after_added', 'admin_callback_page_after_added_func');

$pluggable->register_action('admin_html_page_edit_before_seo', 'admin_html_page_edit_before_seo_func');
$pluggable->register_action('admin_callback_page_after_updated', 'admin_callback_page_after_updated_func');

function admin_html_page_add_before_seo_func($module, $language) {
  $CI =& get_instance();
  $CI->lang->load('plugins', ADMIN_LANGUAGE);
  ?>
  <!--FEATURE-->
  <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
      <div class="portlet-header ui-widget-header">
          <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $CI->lang->line('txt_feature')?>
      </div>
      <div class="portlet-content">
          <label class="desc"><?php echo $CI->lang->line('txt_title')?></label>
          <textarea name="features_title[<?php echo $language?>]" class="textarea small full"></textarea>
          <label class="desc"><?php echo $CI->lang->line('txt_list')?></label>
          <a onclick="addField('<?php echo $language?>')" class='button add-field'><?php echo $CI->lang->line('txt_add_more')?></a>
          <ul class='feature-list' id='feature-list-<?php echo $language?>'>
              <li><textarea name="features[<?php echo $language?>][]" class="textarea small full"></textarea></li>
          </ul>
      </div>
  </div><!--//FEATURE-->
  <style>
    .add-field{
      float: right;
      margin: 10px!important;
      color: #fff!important
    }
  </style>
  <?php
}

function admin_callback_page_after_added_func($module, $lang, $post_id, $langmap_id) {
  $CI =& get_instance();
  $CI->load->Model('meta_admin_model');
  $features_title = $CI->input->post('features_title');
  $features = $CI->input->post('features');
  
  $data = array(
    array(
        'meta_module' => 'page' ,
        'fid' => $post_id ,
        'meta_key' => '_feature_title',
        'meta_value' => ($features_title[$lang]),
        'langmap_id' => $langmap_id
     ),
     array(
        'meta_module' => 'page' ,
        'fid' => $post_id ,
        'meta_key' => '_feature',
        'meta_value' => json_encode($features[$lang]),
        'langmap_id' => $langmap_id
     )
  );

  $CI->meta_admin_model->insert_batch($data);
}

function admin_html_page_edit_before_seo_func($module, $language, $post_id) {
  $CI =& get_instance();
  $CI->lang->load('plugins', ADMIN_LANGUAGE);
  $CI->load->Model('meta_admin_model');
  $meta = $CI->meta_admin_model->get_by_fid($post_id);
  $feature_title = (array)get_meta_value_by_meta_key($meta, '_feature_title');
  $feature = get_meta_value_by_meta_key($meta, '_feature');
  $features = json_decode($feature['meta_value'], true);
  $features = empty($features) ? array(): $features;
  $feature_title = ( count($feature_title) > 0 ) ? $feature_title['meta_value'] : '';
  
  ?>
  <!--FEATURE-->
  <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
      <div class="portlet-header ui-widget-header">
          <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $CI->lang->line('txt_feature')?>
      </div>
      <div class="portlet-content">
          <label class="desc"><?php echo $CI->lang->line('txt_title')?></label>
          <textarea name="features_title[<?php echo $language?>]" class="textarea small full"><?php echo $feature_title;?></textarea>
          <label class="desc"><?php echo $CI->lang->line('txt_list')?></label>
          <a onclick="addField('<?php echo $language?>')" class='button add-field'><?php echo $CI->lang->line('txt_add_more')?></a>
          <ul class='feature-list' id='feature-list-<?php echo $language?>'>
              <?php
              foreach($features as $f) {
                if( !empty($f) ) {
              ?>
              <li><textarea name="features[<?php echo $language?>][]" class="textarea small full"><?php echo $f?></textarea></li>
              <?php 
                }
              }?>
          </ul>
      </div>
  </div><!--//FEATURE-->
  <style>
    .add-field{
      float: right;
      margin: 10px!important;
      color: #fff!important
    }
  </style>
  <?php
}

function admin_callback_page_after_updated_func($module, $lang, $post_id, $langmap_id) {
  $CI =& get_instance();
  $CI->load->Model('meta_admin_model');
  $features_title = $CI->input->post('features_title');
  $features = $CI->input->post('features');
  
  $meta = $CI->meta_admin_model->get_by_fid($post_id);
  if( empty($meta)  ) {
    $data = array(
       array(
          'meta_module' => $module ,
          'fid' => $post_id ,
          'meta_key' => '_feature_title',
          'meta_value' => ($features_title[$lang]),
          'langmap_id' => $langmap_id
       ),
       array(
          'meta_module' => $module ,
          'fid' => $post_id ,
          'meta_key' => '_feature',
          'meta_value' => json_encode($features[$lang]),
          'langmap_id' => $langmap_id
       )
    );
    $CI->meta_admin_model->insert_batch($data);
  }else {
    $data = array(
       'meta_value' => ($features_title[$lang])
    );
    $CI->meta_admin_model->update($data, array('fid'=>$post_id, 'meta_key'=> '_feature_title'));
    
    $data = array(
        'meta_value' => json_encode($features[$lang])
    );
    $CI->meta_admin_model->update($data, array('fid'=>$post_id, 'meta_key'=> '_feature'));
  }
  
}