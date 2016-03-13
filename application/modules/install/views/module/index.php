<?php
//$url = url_add_params($params, $url);
?>
<div id="page-wrapper">
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                    Module
                </h1>
            </div>
            <div class="block-right">
                <form action='/index.php/install/module' method='get'>
                <input name="keyword" value='<?php echo $params['keyword'];?>' type="text" id="txtSearch" class="txtSearch textbox" placeholder='keyword'>

                <?php 
                    echo my_select(
                        $list_parent, 
                        $keywords = array('title' => 'module_name', 'value' => 'module_id', 'parent'=> 'module_parent', 'level' => 'module_level'),
                        $attributes = array('name' => 'pid', 'id' => 'ddlInCate' , 'class' => 'combobox ddlFilter'),
                        $selected = array($params['pid']),
                        $no_choice = array('title' => '-- None --', 'value' => 0)
                        );
                ?>

                <?php 
                    echo my_select(
                        array( array('title' => 'Show', 'value'=> 1), array('title' => 'Hide', 'value' => 0) ), 
                        $keywords = array('title' => 'title', 'value' => 'value'),
                        $attributes = array('name' => 'show', 'id' => 'ddlstatus' , 'class' => 'combobox ddlFilter'),
                        $selected = array($params['show']),
                        $no_choice = array('title' => '-- All --', 'value' => -1) 
                        );
                ?>

                <?php 
                    echo my_select(
                        array( array('title' => 'Hot', 'value' => 1), array('title' => 'Normal', 'value' => 0) ), 
                        $keywords = array('title' => 'title', 'value' => 'value'),
                        $attributes = array('name' => 'highlight', 'id' => 'ddlIsHot' , 'class' => 'combobox ddlFilter'),
                        $selected = array($params['highlight']),
                        $no_choice = array('title' => '-- All --', 'value' => -1)
                        );
                ?>

                <input type="submit" name="search" value="Tìm kiếm" onclick="javascript:return RequiredEmptyField('.txtSearch','Chưa nhập chuỗi tìm kiếm!');"
                    id="cmdSearch" class="cmdSearch button">

                <input type="submit" id="cmdReset" class="button" value='Reset' />
                </form>
            </div>
        </div>
        <form class='table-form' method='post'><!--Content form-->
            <div id="main-content">
            <div class="widget">
                <div class="whead">
                 <div class="block-left control">
                 show
                    <select name="ddlshowitem" id="ddlshowitem" class="combobox">
                    <option value="10">10</option>
                     <option selected="selected" value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    </select>
                 entries
                </div>
                 <div class="block-right control block-right-control-button">
                    <!--<input type="submit" name='cmdAdd' data-href="/index.php/install/module/add" class='button buttonAdd'  value='Thêm' />-->
                    <button name='cmdAdd' data-href="/index.php/install/module/add" class='button buttonAdd buttonMedia'>Thêm</button>
                    <button type="submit" name="type" value='update' id="cmdUpdate" class="button buttonUpdate buttonSubmit" >Cập nhật</button>
                    <button type="submit" name="type" value='delete' id="cmdDel" class="button buttonSubmit" >Xóa</button>
                    
                    <!--<input type="submit" name="cmdPublish" value="Hiện" id="cmdPublish" class="button buttonUnPublish" />
                    <input type="submit" name="cmdUnPublish" value="Ẩn" id="cmdUnPublish" class="button buttonPublish" />-->
                 </div>
                    <div class="clearfix">
                    </div>
                </div>
                <table class="aGrid" cellspacing="0" id="GridView1" style="border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <th>
                                <span class="chkHeader">
                                    <input id="chkHeader" type="checkbox" name="chkHeader" class="check_all" /></span>
                            </th>
                            <th>
                                Xóa/Sửa
                            </th>
                            <th>
                                Menu
                            </th>
                            <th scope="col">
                                Tên bài viết
                            </th>
                            <th scope="col">
                                Danh mục
                            </th>
                            <th>
                                Hiện/Ẩn
                            </th>
                            <th class="colum_sort">
                                Thứ tự
                                <!--<input type="image" name="ImgSaveSort" id="ImgSaveSort" src="<?php echo ADMIN_IMAGE_PATH ?>/icons/save.png">-->
                            </th>
                            <th>
                                ID
                            </th>
                        </tr>
                        <?php 
                        foreach ($list as $key => $l) {
                            
                        ?>
                        <tr class="">
                            <td class="cellwidth1">
                                <input id="chkSelect" type="checkbox" name="ids[]" value='<?php echo $l['module_id']?>' />
                            </td>
                            <td class="cellwidth2">
                                <input type="button" class="tooltip btgrid delete" title="Xóa"  />
                                <input type="button" class="tooltip btgrid edit" title="Sửa" />
                            </td>
                            <td class="cellwidth1">
                                <!--<input type="button" name="ImgRowStatus"  class="tooltip btgrid publish" title="Đăng" id="ImgRowStatus" />-->
                                <?php echo my_toggle_button($l['module_menu'], $l['module_id'], '/index.php/install/module/menu', array('name'=>'ImgRowMenu'));?>
                            </td>
                            <td class="textleft">
                                <?php echo $l['module_level']?>
                                <a href="/index.php/install/module/edit?id=<?php echo $l['module_id']?>" id="lblName" class="lblname"><?php echo $l['module_name']?></a>
                            </td>
                            <td class="textleft">
                                <a id="lblCategory">Không có danh mục</a>
                            </td>
                            <td class="cellwidth7">
                                <!--<input type="button" name="ImgRowHot" id="ImgRowHot" class="tooltip btgrid unpublish" title="Nổi bật" />-->
                                <?php echo my_toggle_button($l['module_status'], $l['module_id'], '/index.php/install/module/status', array('name'=>'ImgRowHot'));?>
                            </td>
                            <td class="">
                                <!--<input name="sort[<?php echo $l['module_id'];?>]" type="text" value="<?php echo $l['module_order']?>" id="txtSort" class="textbox txtSort" />-->
                                <?php echo my_sort_input('sort', $l['module_order'], array('class' => 'txtSort'), true, $l['module_id']);?>
                            </td>
                            <td class="cellwidth1">
                                <span id="lblID"><?php echo $l['module_id']?></span>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
                <div class="fg-toolbar tableFooter">
                    <div class="dataTables_info" id="dynamic_info">
                        Showing 1 to 10 of 57 entries</div>
                    <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate">
                        <a tabindex="0" class="first paginate_button paginate_button_disabled" id="dynamic_first">First</a>
						<a tabindex="0" class="previous paginate_button paginate_button_disabled" id="dynamic_previous">Previous</a>
						<span>
						<a tabindex="0" class="paginate_active">1</a>
						<a tabindex="0" class="paginate_button">2</a>
						<a tabindex="0" class="paginate_button">3</a>
						<a tabindex="0" class="paginate_button">4</a>
						<a tabindex="0" class="paginate_button">5</a>
						</span>
						<a tabindex="0" class="next paginate_button" id="dynamic_next">Next</a>
						<a tabindex="0" class="last paginate_button" id="dynamic_last">Last</a>
                        <a id="gotopage" class="paginate_button">+</a>
					</div>
                    <div class="showgotopage">
                        <input type="text" name="txtgotopage" class="txtgotopage" />
                        <a class="paginate_button bt_gotopage" href="#" >Go</a>
                    </div>
                </div>
            </div>
        </div>
        </form><!--//Content form-->
        <div class="clearfix">
        </div>
    </div>
     <div class="clearfix"></div>
</div>