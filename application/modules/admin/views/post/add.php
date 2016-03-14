<div id="page-wrapper">
    <form id='frm-post' action='' method='post'>
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                    <?php echo $this->lang->line('txt_post');?> :: <?php echo $this->lang->line('txt_add');?>
                </h1>
            </div>
            <div class="block-right">
                <button type="submit" name="add" id="cmdAdd" class="button "><?php echo $this->lang->line('txt_add');?></button>
                <button type="submit" data-href='<?php echo url_add_params($params, '/index.php/admin/post')?>' name="cancel"  id="cmdCancel" class="button "><?php echo $this->lang->line('txt_cancel');?></button>
            </div>
        </div>
        <div id="main-content">
            <div id="content-outer">
                <div class="content-wrapper">
                    <div class="content">
                        <div id="tabs" class="tabs">
                            <ul class='tabs-heading'>
                                <?php foreach($languages as $l) { ?>
                                <li>
                                    <a href="#tabs-<?php echo $l?>"><img src="<?php echo FLAGS_PATH ?>/<?php echo $l . '.png'; ?>" /></a>
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
                                            <label class="desc"><?php echo $this->lang->line('txt_title');?></label>
                                            <input data-for='<?php echo sprintf("#post_%s_alias", $l); ?>' name="post[<?php echo $l?>][title]" type="text" value="" class="field text full">
                                        </div>
                                        
                                        <div class="form-field">
                                            <label class="desc">Alias</label>
                                            <small><?php echo $this->lang->line('get_alias_notice');?></small>
                                            <input id='<?php echo sprintf("post_%s_alias", $l); ?>' name="post[<?php echo $l?>][alias]" type="text" value="" class="field text full" placeholder='<?php echo $this->lang->line('txt_click_here_get_alias');?>'>
                                        </div>
                                        
                                        <div class="form-field <?php echo (!in_array('description', $module_option)) ? 'none':''; ?>">
                                            <label class="desc"><?php echo $this->lang->line('txt_description');?></label>
                                            <textarea id='<?php echo sprintf("post_%s_description", $l); ?>' data-editor='<?php echo sprintf("post_%s_description", $l); ?>' name="post[<?php echo $l?>][description]" class="textarea small full"></textarea>  
                                        </div>
                                        
                                        <div class="form-field <?php echo (!in_array('content', $module_option)) ? 'none':''; ?>">
                                            <label class="desc"><?php echo $this->lang->line('txt_content');?></label>
                                            <textarea id='<?php echo sprintf("post_%s_content", $l); ?>' data-editor='<?php echo sprintf("post_%s_content", $l); ?>' name="post[<?php echo $l?>][content]" class="textarea small full"></textarea>  
                                        </div>

                                        <?php
                                        $pluggable->hook_action('admin_html_post_add_block_left_' . $module, array($module, $l));
                                        ?>
                                        
                                        <!--SEO-->
                                        <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all <?php echo (!in_array('seo', $module_option)) ? 'none':''; ?>">
                                            <div class="portlet-header ui-widget-header">
                                                <span class="ui-icon ui-icon-circle-arrow-s"></span>SEO
                                            </div>
                                            <div class="portlet-content">
                                                <div class="form-field">
                                                    <label class="desc">SEO <?php echo $this->lang->line('txt_title');?></label>
                                                    <input name="post[<?php echo $l?>][seo_title]" type="text" value="" class="field text full">
                                                </div>
                                                
                                                <div class="form-field">
                                                    <label class="desc">SEO <?php echo $this->lang->line('txt_description');?></label>
                                                    <textarea  name="post[<?php echo $l?>][seo_description]" class="textarea small full"></textarea>  
                                                </div>
                                                
                                                <div class="form-field">
                                                    <label class="desc">SEO <?php echo $this->lang->line('txt_keyword');?></label>
                                                    <textarea  name="post[<?php echo $l?>][seo_keywords]" class="textarea small full"></textarea>  
                                                </div>
                                            </div>
                                        </div><!--//SEO-->
                                        
                                    </div><!--//Block left-->
                                    
                                    <div class="block-right">
                                        <div class='form-field <?php echo (!in_array('category', $module_option)) ? 'none':''; ?>'>
                                            <label class="desc"><?php echo $this->lang->line('txt_category');?></label>
                                            <?php 
                                                $catID = (isset($category_list[$l]['category_id'])) ? $category_list[$l]['category_id'] : 0;
                                                my_select(
                                                    $list[$l], 
                                                    $option = array('title' => 'category_title', 'value' => 'category_id', 'parent' => 'catparent_id', 'level' => 'category_level'),
                                                    $attributes = array('name' => "post[" . $l . "][category_id]", 'id' => 'lstCate', 'class' => 'listbox lstCate', 'size' => 4),
                                                    $selected = array($catID), 
                                                    $no_choice = array('title' =>  $this->lang->line('txt_no_choice'), 'value' => 0)
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
                        <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $this->lang->line('txt_configuration');?>
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
                                    <?php echo $this->lang->line('txt_highlight');?>
                                </label>
                                <div>
                                    <?php 
                                        my_select(
                                            array(array('title' =>  $this->lang->line('txt_yes'), 'value' => 1), array('title' =>  $this->lang->line('txt_no'), 'value' => 0)), 
                                            $option = array('title' => 'title', 'value' => 'value'),
                                            $attributes = array('name' => 'highlight', 'id' => 'lstHighlight', 'class' => 'listbox lstHighlight')
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
                
                <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all <?php echo (!in_array('photo', $module_option)) ? 'none':''; ?>">
                    <div class="portlet-header ui-widget-header">
                        <span class="ui-icon ui-icon-circle-arrow-s"></span><?php echo $this->lang->line('txt_featured_photo');?>
                    </div>
                    <div class="portlet-content">
                        <div class='featured_photo'></div>
                        <div>
                            <a href='#' class='upload-gallery'><?php echo $this->lang->line('txt_upload');?></a>
                            <a href='#'><?php echo $this->lang->line('txt_remove');?></a>
                            <input type="hidden" id='featured_photo' name="featured_image"/>
                        </div>
                    </div>
                </div>

                <?php 
                $pluggable->hook_action('admin_html_post_add_sidebar_' . $module, array($module, DEFAULT_LANGUAGE));  
                ?>

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
            rules['post['+lang[i]+'][title]'] = {required: true};
            rules['post['+lang[i]+'][alias]'] = {required: true};
        }
        for(var i = 0; i<lang.length; i++){
            messages['post['+lang[i]+'][title]'] = {required: VALIDATE_TITLE};
            messages['post['+lang[i]+'][alias]'] = {required: VALIDATE_ALIAS};
        }
        //validate
        $('#frm-post').validate({
            rules: rules,
            messages: messages
        });
    });
</script>