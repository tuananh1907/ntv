<div class="slide">
    <?php

    if (!empty($page['post_featured_image'])) {
        ?>
        <img class='img-responsive' src="<?php echo $page['post_featured_image'];?>">
    <?php } ?>
</div>

<div class="clearfix"></div>

<div class="content">
    <div class="container">
        <div class="ntv-pagination">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><p><?php echo $page['post_title']?></p></div>
            <div class="col-lg-5 col-md-5 visible-md visible-lg p-l-c">
                <div class="l">
                    <div class="col-lg-1 col-md-1 col-sm-1 line star"></div>
                    <div class="col-lg-10 col-md-10 col-sm-10 line l-c"></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 line node"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 hidden-xs bc">
                <ul>
                    <li><a href="#"><?php echo $this->lang->line('homepage');?> - </a></li>
<!--                    <li><a href="#">--><?php //echo $page['post_title']?><!-- - </a></li>-->
                    <li class='last'><span><?php echo $page['post_title']?></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row tab">

            <div class="col-lg-4 tab-label-header">
                <div class="tab-label tab-label-left">
                    <a href="<?php short_url('library')?>"><?php echo $this->lang->line('photo_lib');?></a>
                    <div class="background">
                        <div class="icon photo"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 tab-label-header">
                <div class="tab-label tab-label-center ">
                    <a href="<?php short_url('video')?>"><?php echo $this->lang->line('video_lib');?></a>
                    <div class="background">
                        <div class="icon video"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 tab-label-header">
                <div class="tab-label tab-label-right active">
                    <a href="#"><?php echo $this->lang->line('catalogue_product');?></a>
                    <div class="background">
                        <div class="icon pdf"></div>
                    </div>
                </div>
            </div>

        </div>



        <div class="tab-panel tab-panel-1">
            <div class="row contact-label">
                <?php echo $this->lang->line('catalogue_product');?>
            </div>

            <div class="col-lg-12 panel-content">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 catalogue st">
                    <p>Catalogue</p>
                    <div><?php echo $this->lang->line('iron_steel');?></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 catalogue gs">
                    <p>Catalogue</p>
                    <div><?php echo $this->lang->line('ceramics');?></div>
                </div>
            </div>


        </div>
    </div>
</div>