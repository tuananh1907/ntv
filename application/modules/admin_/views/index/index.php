<?php
/**
 * Created by PhpStorm.
 * User: Tuan Anh
 * Date: 8/12/15
 * Time: 7:22 AM
 */
//echo $this->lang->line('fullname')." : Robert Downey";
?>
<div id="page-wrapper">
    <div id="main-wrapper">
        <div id="main-content">

            <!--notice-->
            <?php
            $notice = $this->session->flashdata('notice');
            if( isset( $notice ) && $notice ) {
                notice( $notice );
            }
            ?>
            <!--//notice-->

            <div class="welcome">
                <?php echo $this->lang->line("msg_welcome"); ?>
            </div>
            
            <div class="switch_bar">
        		<!-- <ul class="ui-sortable">
                    <li>
                    <a href="#"><span class="stats_icon current_work_sl"></span><span class="label">Analytics</span></a>
                    </li>
                    <li><a href="#"><span class="stats_icon user_sl"></span><span class="label">User</span></a></li>
                                    <li><a href="#"><span class="stats_icon administrative_docs_sl"></span><span class="label">Content</span></a></li>
                    <li><a href="#"><span class="stats_icon finished_work_sl"></span><span class="label">Task List</span></a></li>
                    <li><a href="#"><span class="stats_icon config_sl"></span><span class="label">Settings</span></a></li>
                    <li><a href="#"><span class="stats_icon archives_sl"></span><span class="label">Archive</span></a></li>
                    <li><a href="#"><span class="stats_icon address_sl"></span><span class="label">Contact</span></a></li>
                    <li><a href="#"><span class="stats_icon folder_sl"></span><span class="label">Media</span></a></li>
                    <li><a href="#"><span class="stats_icon category_sl"></span><span class="label">Explorer</span></a></li>
                </ul> -->
        	</div>
          
            <div class="clearfix">
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
    <div class="clearfix">
    </div>
</div>
