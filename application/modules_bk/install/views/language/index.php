<div id="page-wrapper">
    <form action='/index.php/install/language' method='post'>
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                    Language
                </h1>
            </div>
        </div>
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
                 <div class="block-right control">
                    <a href="/index.php/install/language/add" id="cmdAdd" class="button buttonAdd">Thêm</a>
                    <input type="submit" name="delete" value="Xóa" id="cmdDel" class="button buttonDel" />
                    <input type="submit" name="update" value="Sửa" id="cmdEdit" class="button buttonEdit" />
                    <!-- <input type="submit" name="cmdPublish" value="Hiện" id="cmdPublish" class="button buttonUnPublish" />
                    <input type="submit" name="cmdUnPublish" value="Ẩn" id="cmdUnPublish" class="button buttonPublish" /> -->
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
                                Mặc định
                            </th>
                            <th>
                                Hình ảnh
                            </th>
                        </tr>
                        <?php
                        foreach ($list as $key => $l) {
                            
                        ?>
                        <tr class="">
                            <td class="cellwidth1">
                                    <input id="chkSelect" type="checkbox" name="ids[]" value='<?php echo $l['language_id']?>' />
                            </td>
                            <td class="cellwidth2">
                                <a href='/install/language/delete?id=<?php echo $l['language_id']?>' type="button" class="tooltip btgrid delete d-block" title="Xóa"></a>
                                <a href='/install/language/edit?id=<?php echo $l['language_id']?>' type="button" class="tooltip btgrid edit d-block" title="Sửa"></a>
                            </td>
                            <td class="cellwidth1">
                                <input type="button" name="ImgRowStatus"  class="tooltip btgrid publish" title="Đăng" id="ImgRowStatus" />
                            </td>
                            <td>
                                <a href="#" id="aPost" class="cbox cboxElement">
                                    <img src="<?= FLAGS_PATH ?>/<?php echo $l['language_id'] . '.png'; ?>" id="imgPost" class="imgPost" />
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="fg-toolbar tableFooter">
                    <div class="dataTables_info" id="dynamic_info">
                        Showing 1 to 10 of 57 entries
                    </div>
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
        <div class="clearfix"></div>
    </div>
    </form>
    <div class="clearfix"></div>
</div>