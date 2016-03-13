<!-- main start -->

    <div id="main" class="clearfix">
        <!-- content start -->
        <div id="content" class="con">
            <h3><?php echo $page['post_title']?></h3>
            <div class="section">
                <?php
                foreach($career as $c) {
                ?>
                <div class="h4Block">
                    <h4 class="bold"> <span class="ttl w38"><?php echo $this->lang->line('txt_position');?></span>: <?php echo $c['post_title']?><br />
                        <span class="ttl w38"><?php echo $this->lang->line('txt_quantity');?></span>: <?php echo $c['_quantity']?><br />
                        <span class="ttl w38"><?php echo $this->lang->line('txt_deadline');?></span>: <?php echo my_date_format($c['_deadline'])?></h4>
                    <p class="h4Btn"><a class="btnRutgon imgover" href="javascript:;"><?php echo $this->lang->line('txt_close');?></a> <a class="btnChitiet imgover" href="javascript:;">...<?php echo $this->lang->line('txt_more');?></a></p>
                </div>
                <div class="h4Content newsContent">
                    
                    <p><?php echo $c['post_content']?></p>
                    
                    <!-- /.section -->
                </div>
                <?php
                }      
                ?>
            </div>
        </div>
        <!-- content end -->
        