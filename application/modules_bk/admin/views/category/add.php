<div id="page-wrapper">
    <form id='frm-post' action='' method='post'>
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                     <?php echo $this->lang->line('txt_category');?> :: <?php echo $this->lang->line('txt_add');?>
                </h1>
            </div>
            <div class="block-right">
                <button type="submit" name="add" id="cmdAdd" class="button "><?php echo $this->lang->line('txt_save');?></button>
                <button type="submit" data-href='<?php echo url_add_params($params, '/index.php/admin/category')?>' name="cancel"  id="cmdCancel" class="button "><?php echo $this->lang->line('txt_cancel');?></button>
            </div>
        </div>
        <div id="main-content">

            <!--notice-->
            <?php
            $notice = $this->session->flashdata('notice');
            if( isset( $notice ) && $notice ) {
                notice( $notice ); 
            }
            ?>
            <!--//notice-->
            
            <div id="content-outer">
                <div class="content-wrapper">
                    <div class="content">
                        <div id="tabs" class="tabs">
                            <ul class='tabs-heading'>
                                <?php foreach($languages as $l) { ?>
                                <li>
                                    <a href="#tabs-<?php echo $l; ?>"><img src="<?php echo FLAGS_PATH ?>/<?php echo $l . '.png'; ?>" /></a>
                                </li>
                                <?php } ?>
                            </ul><!--//TABS-HEADING-->
                            <?php foreach($languages as $l) { 
                                //$l = $l;
                            ?>
                            <div id="tabs-<?php echo $l?>">
                                <div class="form">
                                    <div class="block-left">
                                        
                                        <div class='form-field'>
                                            <label class="desc"> <?php echo $this->lang->line('txt_title');?></label>
                                            <input data-for='<?php echo sprintf("#category_%s_alias", $l); ?>' name="category[<?php echo $l?>][title]" type="text" value="" class="field text full"/>
                                        </div>
                                        
                                        <div class="form-field">
                                            <label class="desc">Alias</label>
                                            <small><?php echo $this->lang->line('get_alias_notice');?></small>
                                            <input id='<?php echo sprintf("category_%s_alias", $l); ?>' placeholder='<?php echo $this->lang->line('txt_click_here_get_alias');?>' name="category[<?php echo $l?>][alias]" type="text" value="" class="field text full">
                                        </div>
                                        
                                        <div class="form-field <?php echo (!in_array('content', $module_option)) ? 'none':''; ?>">
                                            <label class="desc"> <?php echo $this->lang->line('txt_content');?></label>
                                            <textarea id='<?php echo sprintf("category_%s_content", $l); ?>' data-editor='<?php echo sprintf("category_%s_content", $l); ?>' name="category[<?php echo $l?>][content]" class="textarea small full"></textarea>  
                                        </div>
                                        
                                        <!--SEO-->
                                        <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all <?php echo (!in_array('seo', $module_option)) ? 'none':''; ?>">
                                            <div class="portlet-header ui-widget-header">
                                                <span class="ui-icon ui-icon-circle-arrow-s"></span>SEO
                                            </div>
                                            <div class="portlet-content">
                                                <div class="form-field">
                                                    <label class="desc">SEO <?php echo $this->lang->line('txt_title');?></label>
                                                    <input name="category[<?php echo $l?>][seo_title]" type="text" value="" class="field text full">
                                                </div>
                                                
                                                <div class="form-field">
                                                    <label class="desc">SEO <?php echo $this->lang->line('txt_description');?></label>
                                                    <textarea name="category[<?php echo $l?>][seo_description]" class="textarea small full"></textarea>  
                                                </div>
                                                
                                                <div class="form-field">
                                                    <label class="desc">SEO <?php echo $this->lang->line('txt_keyword');?></label>
                                                    <textarea name="category[<?php echo $l?>][seo_keywords]" class="textarea small full"></textarea>  
                                                </div>
                                            </div>
                                        </div><!--//SEO-->
                                        
                                    </div><!--//Block left-->
                                    
                                    <div class="block-right">
                                        <div class='form-field <?php echo (!in_array('category', $module_option)) ? 'none':''; ?>'>
                                            <label class="desc"> <?php echo $this->lang->line('txt_category_parent');?></label>
                                            <?php 
                                                my_select(
                                                    $list[$l], 
                                                    $option = array('title' => 'category_title', 'value' => 'category_id', 'parent' => 'catparent_id', 'level' => 'category_level'),
                                                    $attributes = array('name' => "category[" . $l . "][parent_id]", 'id' => 'lstCate', 'class' => 'listbox lstCate', 'size' => 4),
                                                    $selected = array(), 
                                                    $no_choice = array('title' => $this->lang->line('txt_all'), 'value' => 0)
                                                );
                                            ?>
                                        </div>
                                    </div><!--//Block right-->
                                    <div class="clearfix"></div>
                                </div><!--//form-->
                                
                                <div class="form-control">
                                    <button type="submit" name="add" id="cmdAdd" class="button "><?php echo $this->lang->line('txt_add');?></button>
                                    <button type="submit" name="cancel"  id="cmdCancel" class="button "><?php echo $this->lang->line('txt_cancel');?></button>
                                </div>
                        
                            </div><!--//TABS-CONTENT-->
                            <?php } ?>
                        </div><!--//TABS-->
                        
                    </div>
                </div>
            </div>
            
            <div class="block-left sidebar">
                
                <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
                    <div class="portlet-header ui-widget-header">
                        <span class="ui-icon ui-icon-circle-arrow-s"></span>  <?php echo $this->lang->line('txt_configuration');?>
                    </div>
                    <div class="portlet-content">
                        <ul>
                            <li>
                                <label class="desc">
                                    <?php echo $this->lang->line('txt_status');?>
                                </label>
                                <div>
                                    <?php 
                                        my_select(
                                            array(array('title' => $this->lang->line('txt_show'), 'value' => 1), array('title' => $this->lang->line('txt_hide'), 'value' => 0)), 
                                            $option = array('title' => 'title', 'value' => 'value'),
                                            $attributes = array('name' => 'status', 'id' => 'lstStatus', 'class' => 'listbox lstStatus')
                                        );
                                    ?>
                                </div>
                            </li>
                            <li>
                                <label class="desc">
                                    <?php echo $this->lang->line('txt_orders');?>
                                </label>
                                <input name="order" type="text" value="1" class="field text small">
                            </li>
                        </ul>
                    </div>
                </div>

            </div><!--//SIDEBAR-->
            
            <div class="clearfix"></div>
            
        </div>
        <div class="clearfix">
        </div>
    </div>
    <div class="clearfix"></div>
    </form>
</div>
<!--VALIDATE-->
<input type="hidden" id="langmap" value='<?php echo json_encode($languages)?>'/>
<script type="text/javascript">
    $(document).ready(function(){
        var rules = {};
        var messages = {};
        var lang = JSON.parse( $('#langmap').val() );
        for(var i = 0; i<lang.length; i++){
            rules['category['+lang[i]+'][title]'] = {required: true};
            rules['category['+lang[i]+'][alias]'] = {
                required: true 
            };
        }
        for(var i = 0; i<lang.length; i++){
            messages['category['+lang[i]+'][title]'] = {required: VALIDATE_TITLE};
            messages['category['+lang[i]+'][alias]'] = {
                required: VALIDATE_ALIAS
            };
        }
        //validate
        $('#frm-post').validate({
            rules: rules,
            messages: messages
        });
    });
</script>
