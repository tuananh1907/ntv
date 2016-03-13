<div id="page-wrapper">
    <form action='' method='post'>
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?php echo ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                     <?php echo $this->lang->line('txt_group');?> :: <?php echo $this->lang->line('txt_add');?>
                </h1>
            </div>
            <div class="block-right">
                <button type="submit" name="add" id="cmdAdd" class="button "><?php echo $this->lang->line('txt_save');?></button>
                <button type="submit" data-href='<?php echo url_add_params($params, '/index.php/admin/group')?>' name="cancel"  id="cmdCancel" class="button "><?php echo $this->lang->line('txt_cancel');?></button>
            </div>
        </div>
        <div id="main-content">
           <div id="content-outer">
                <div class="content-wrapper">
                    <div class="content full">

                        <!--widget keywords-->
                        <div class="widget block-left cellwidth49">
                            <div class="whead">
                                <div class="block-left control">Statistic by keywords</div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bykeywords" class="haspadding" data-link="/admin/statistic/bykeywords">
                                There are no service
                            </div>
                        </div>
                        <!--//widget keywords-->

                        <!--widget country-->
                        <div class="widget block-right cellwidth49">
                            <div class="whead">
                                <div class="block-left control">Statistic by country</div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bycountry" class="haspadding" data-link="/admin/statistic/bycountry">There are no service</div>
                        </div>
                        <!--//widget country-->

                        <div class="clearfix"></div>
                        <div class="widget block-left cellwidth49">
                            <div class="whead">
                                <div class="block-left control">Statistic by pageviews</div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bypageviews" class="haspadding" data-link="/admin/statistic/bypageviews">There are no service</div>
                        </div>

                        <div class="widget block-right cellwidth49">
                            <div class="whead">
                                <div class="block-left control">Statistic by referral</div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="byreferral" class="haspadding" data-link="/admin/statistic/byreferral">There are no service</div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="widget">
                            <div class="whead">
                                <div class="block-left control">Statistic by browser</div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bybrowser" class="haspadding" style="text-align: center;" data-link="/admin/statistic/bybrowser">There are no service</div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="widget">
                            <div class="whead">
                                <div class="block-left control">Statistic by OS</div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="byos" class="haspadding" style="text-align: center;" data-link="/admin/statistic/byos">There are no service</div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="widget">
                            <div class="whead">
                                <div class="block-left control">Statistic by all</div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="byall" class="haspadding" data-link="/admin/statistic/byall">There are no service</div>
                        </div>

                        
                    </div>
                </div>
            </div> 
        </div>
        <div class="clearfix">
        </div>
    </div>
    <div class="clearfix"></div>
    </form>
</div>