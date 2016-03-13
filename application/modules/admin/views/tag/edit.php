<div id="page-wrapper">
    <form id='frm-post' action='' method='post'>
        <div id="main-wrapper">
            <div id="main-header">
                <div class="block-left">
                    <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                    <h1 class='title'>
                        <?php echo $this->lang->line('txt_post');?> :: <?php echo $this->lang->line('txt_edit');?>
                    </h1>
                </div>
                <div class="block-right">
                    <button type="submit" name="update" id="cmdAdd" class="button "><?php echo $this->lang->line('txt_add');?></button>
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
                                                    <input name="tag[<?php echo $l?>][id]" type="hidden" value="<?php echo $tags[$l]['tag_id'];?>">
                                                    <input name="tag[<?php echo $l?>][langmap_id]" type="hidden" value="<?php echo $tags[$l]['langmap_id'];?>">
                                                </div>

                                                <div class='form-field'>
                                                    <label class="desc"><?php echo $this->lang->line('txt_title');?></label>
                                                    <input name="tag[<?php echo $l?>][title]" type="text" value="<?php echo $tags[$l]['title']; ?>" class="field text full">
                                                </div>







                                            </div><!--//Block left-->

                                            <div class="block-right">

                                            </div><!--//Block right-->
                                            <div class="clearfix"></div>
                                        </div><!--//form-->

                                        <div class="form-control">
                                            <button type="submit" name="update" id="cmdAdd" class="button "><?php echo $this->lang->line('txt_add');?></button>
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
                                            $attributes = array('name' => 'status', 'id' => 'lstStatus', 'class' => 'listbox lstStatus'),
                                            $selected = array($tags[DEFAULT_LANGUAGE]['status'])
                                        );
                                        ?>
                                    </div>
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
