<div id="page-wrapper">
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                     <?php echo $this->lang->line('txt_group');?>
                </h1>
            </div>
            <div class="block-right">
                <input name="keyword" href='<?php echo url_add_params($params, '/index.php/admin/group'); ?>' value='<?php echo $params['keyword'];?>' type="text" id="txtSearch" class="txtSearch textbox" placeholder='<?php echo $this->lang->line('txt_keyword');?>'>
                <input type="submit" data-search='#txtSearch' name="search" value="<?php echo $this->lang->line('txt_search');?>" id="cmdSearch" class="cmdSearch button">
            </div>
        </div>
        <form class='table-form' action='<?php echo url_add_params($params, '/index.php/admin/group/update'); ?>' method='post'><!--Content form-->
            <div id="main-content">
            
            <!--notice-->
            <?php
            $notice = $this->session->flashdata('notice');
            if( isset( $notice ) && $notice ) {
                notice( $notice ); 
            }
            ?>
            <!--//notice-->
                
            <div class="widget">
                <div class="whead">
                    <div class="block-left control">
                        <?php
                            my_select_range(
                                array('name' => 'range', 'id' => 'ddlshowitem' , 'class' => 'combobox', 'data-filter' => url_add_params($params, '/index.php/admin/group')),
                                $params['range']
                            );
                        ?>
                    </div>
                    <div class="block-right control block-right-control-button">
                        <?php if( check_permission('group', DELETE) ) { ?>
                        <button type="submit" data-delete-confirm data-delete-selected name="type" value='delete' id="cmdDel" class="button buttonDelete deleteSelected" ><?php echo $this->lang->line('txt_del');?></button>
                        <?php } ?>
                        <?php if( check_permission('group', ADD) ) { ?>
                        <button name='cmdAdd' data-href="<?php echo url_add_params($params, '/index.php/admin/group/add')?>" class='button buttonAdd buttonMedia'><?php echo $this->lang->line('txt_add');?></button>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <table class="aGrid" cellspacing="0" id="GridView1" style="border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <th>
                                <span class="chkHeader">
                                    <input id="chkHeader" type="checkbox" name="chkHeader" class="check_all" />
                                </span>
                            </th>
                            <th>
                                <?php echo $this->lang->line('txt_delete_edit');?>
                            </th>
                            <th>
                                <?php echo $this->lang->line('txt_groupname');?>
                            </th>
                            <th scope="col">
                                <?php echo $this->lang->line('txt_description');?>
                            </th>
                            <th class="colum_sort">
                                <?php echo $this->lang->line('txt_user');?>
                            </th>
                            <th>
                                ID
                            </th>
                        </tr>
                        <?php 
                        foreach ($list as $key => $l) {
                            $expand_params = $params;
                            $expand_params['id'] = $l['group_id'];
                        ?>
                        <tr class="">
                            <td class="cellwidth1">
                                <input id="chkSelect" type="checkbox" name="ids[]" value='<?php echo $l['group_id']?>' />
                            </td>
                            <td class="cellwidth2">
                                <?php if( check_permission('group', DELETE) ) { ?>
                                <input type="button" data-delete-confirm data-href='<?php echo url_add_params($expand_params, '/index.php/admin/group/delete')?>' class="tooltip btgrid delete" title="<?php echo $this->lang->line('confirm_delete_msg');?>"  />
                                <?php } ?>
                                
                                <?php if( check_permission('group', EDIT) ) { ?>
                                <input type="button" data-href='<?php echo url_add_params($expand_params, '/index.php/admin/group/edit')?>' class="tooltip btgrid edit" title="<?php echo $this->lang->line('txt_update');?>" />
                                <?php } ?>
                            </td>
                            <td class="cellwidth1">
                                <a href="<?php echo url_add_params($expand_params, '/index.php/admin/group/edit')?>"><?php echo $l['group_name']?></a>
                            </td>
                            <td class="textleft">
                                <?php echo $l['group_description']?>
                            </td>
                            <td class="">
                                <a href="/index.php/admin/user?pid=<?php echo $l['group_id']?>">Xem</a>
                            </td>
                            <td class="cellwidth1">
                                <span id="lblID"><?php echo $l['group_id']?></span>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
                <div class="fg-toolbar tableFooter">
                    <?php
                        my_pagination( $num_rows = $list_length, $page = $params['page'], $range = $params['range'], url_add_params($params, '/index.php/admin/group') );
                    ?>
                </div>
            </div>
        </div>
        </form><!--//Content form-->
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>