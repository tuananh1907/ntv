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
                    <li><a href="#"><?php echo $page['post_title']?> - </a></li>
                    <li class='last'><span><?php echo $this->lang->line('iron_steel');?></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="news">

            <div class="row tab">
                <div class="col-lg-6 tab-label-header">
                    <div class="tab-label tab-label-left active">
                        <a href="#"><?php echo $this->lang->line('news_event');?></a>
                        <div class="background">
                            <div class="icon video"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 tab-label-header">
                    <div class="tab-label tab-label-right active">
                        <a href="#"><?php echo $this->lang->line('photo_video');?></a>
                        <div class="background">
                            <div class="icon video"></div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="tab-panel tab-panel-1">
                <div class="row contact-label">
                    <?php echo $posts['post_title']?>
                </div>



                <div class="col-lg-12 panel-content">

                    <div class="date"><?php echo $this->lang->line('date');?>: <?php echo date('d/m/y', $timestamp);?></div>
                    <div class="clearfix"></div>
                    <div class="content">
                        <?php echo $posts['post_content']?>
                    </div>
                    <div class="row detail-label-title">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-2 left">
                            <div class="d-l-se"></div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8"><span><?php echo $this->lang->line('related_news');?></span></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-2 right">
                            <div class="d-l-se"></div>
                        </div>
                    </div>

                    <div class="row">
                        <!--item-->
                        <?php
                        for ($i = 0; $i <=2; $i++) {
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 b-item">
                            <div class='b-img'><img class='img-responsive' src="<?php echo $new_posts[$i]['post_featured_image']?>" alt="" />
                                <div class="b-date">
                                    <span><?php echo date('d', $timestamp)?></span>
                                    <div><?php echo date('m/y', $timestamp)?></div>
                                </div>
                            </div>
                            <p class='title'><?php echo $new_posts[$i]['post_title']?></p>
                            <div class='description'><?php echo $new_posts[$i]['post_description']?></div>
                            <a class='d' href="<?php short_url('news-item', array($new_posts[$i]['alias_name']) )?>"><?php echo $this->lang->line('detail');?></a>
                        </div>
                        <?php }?>
                        <!--item-->
                    </div>
                </div>


            </div>



        </div>

    </div>
</div>