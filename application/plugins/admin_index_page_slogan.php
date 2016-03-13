<?php
$pluggable = new Pluggable;
//ADD
$pluggable->register_action('admin_html_page_add_before_seo', 'admin_html_page_add_before_seo_slogan_func');
$pluggable->register_action('admin_callback_page_after_added', 'admin_callback_page_after_added_slogan_func');

$pluggable->register_action('admin_html_page_edit_before_seo', 'admin_html_page_edit_before_seo_slogan_func');
$pluggable->register_action('admin_callback_page_after_updated', 'admin_callback_page_after_updated_slogan_func');

function admin_html_page_add_before_seo_slogan_func($module, $language) {
  $CI =& get_instance();
  $CI->lang->load('plugins', ADMIN_LANGUAGE);
  ?>
  <!--slogan-->
  <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
      <div class="portlet-header ui-widget-header">
          <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $CI->lang->line('txt_slogan')?>
      </div>
      <div class="portlet-content">
          <label class="desc"><?php echo $CI->lang->line('txt_title')?></label>
          <textarea name="slogans_title[<?php echo $language?>]" class="textarea small full"></textarea>
          <label class="desc"><?php echo $CI->lang->line('txt_list')?></label>
          <a onclick="addField2('<?php echo $language?>')" class='button add-field'><?php echo $CI->lang->line('txt_add_more')?></a>
          <ul class='slogan-list' id='slogan-list-<?php echo $language?>'>
              <li><textarea name="slogans[<?php echo $language?>][]" class="textarea small full"></textarea></li>
          </ul>
      </div>
  </div><!--//slogan-->
  <style>
    .add-field{
      float: right;
      margin: 10px!important;
      color: #fff!important
    }
  </style>
  <?php
}

function admin_callback_page_after_added_slogan_func($module, $lang, $post_id, $langmap_id) {
  $CI =& get_instance();
  $CI->load->Model('meta_admin_model');
  $slogans_title = $CI->input->post('slogans_title');
  $slogans = $CI->input->post('slogans');
  
  $data = array(
    array(
        'meta_module' => 'page' ,
        'fid' => $post_id ,
        'meta_key' => '_slogan_title',
        'meta_value' => ($slogans_title[$lang]),
        'langmap_id' => $langmap_id
     ),
     array(
        'meta_module' => 'page' ,
        'fid' => $post_id ,
        'meta_key' => '_slogan',
        'meta_value' => json_encode($slogans[$lang]),
        'langmap_id' => $langmap_id
     )
  );

  $CI->meta_admin_model->insert_batch($data);
}

function admin_html_page_edit_before_seo_slogan_func($module, $language, $post_id) {
  $CI =& get_instance();
  $CI->lang->load('plugins', ADMIN_LANGUAGE);
  $CI->load->Model('meta_admin_model');
  $meta = $CI->meta_admin_model->get_by_fid($post_id);
  $slogan_title = (array)get_meta_value_by_meta_key($meta, '_slogan_title');
  $slogan = get_meta_value_by_meta_key($meta, '_slogan');
  $slogans = json_decode($slogan['meta_value'], true);
  $slogans = empty($slogans) ? array(): $slogans;
  $slogan_title = ( count($slogan_title) > 0 ) ? $slogan_title['meta_value'] : '';
  
  ?>
  <!--slogan-->
  <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
      <div class="portlet-header ui-widget-header">
          <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $CI->lang->line('txt_slogan')?>
      </div>
      <div class="portlet-content">
          <label class="desc"><?php echo $CI->lang->line('txt_title')?></label>
          <textarea name="slogans_title[<?php echo $language?>]" class="textarea small full"><?php echo $slogan_title;?></textarea>
          <label class="desc"><?php echo $CI->lang->line('txt_list')?></label>
          <a onclick="addField2('<?php echo $language?>')" class='button add-field'><?php echo $CI->lang->line('txt_add_more')?></a>
          <ul class='slogan-list' id='slogan-list-<?php echo $language?>'>
              <?php
              foreach($slogans as $f) {
                if( !empty($f) ) {
              ?>
              <li><textarea name="slogans[<?php echo $language?>][]" class="textarea small full"><?php echo $f?></textarea></li>
              <?php 
                }
              }?>
          </ul>
      </div>
  </div><!--//slogan-->
  <style>
    .add-field{
      float: right;
      margin: 10px!important;
      color: #fff!important
    }
  </style>
  <?php
}

function admin_callback_page_after_updated_slogan_func($module, $lang, $post_id, $langmap_id) {
  $CI =& get_instance();
  $CI->load->Model('meta_admin_model');
  $slogans_title = $CI->input->post('slogans_title');
  $slogans = $CI->input->post('slogans');
  
  $meta = $CI->meta_admin_model->get_by_fid($post_id, array('_slogan_title', '_slogan'));
  
  if( empty($meta)  ) {
    $data = array(
       array(
          'meta_module' => $module ,
          'fid' => $post_id ,
          'meta_key' => '_slogan_title',
          'meta_value' => ($slogans_title[$lang]),
          'langmap_id' => $langmap_id
       ),
       array(
          'meta_module' => $module ,
          'fid' => $post_id ,
          'meta_key' => '_slogan',
          'meta_value' => json_encode($slogans[$lang]),
          'langmap_id' => $langmap_id
       )
    );
    $CI->meta_admin_model->insert_batch($data);
  }else {
    $data = array(
       'meta_value' => ($slogans_title[$lang])
    );
    $CI->meta_admin_model->update($data, array('fid'=>$post_id, 'meta_key'=> '_slogan_title'));
    
    $data = array(
        'meta_value' => json_encode($slogans[$lang])
    );
    $CI->meta_admin_model->update($data, array('fid'=>$post_id, 'meta_key'=> '_slogan'));
  }
  
}