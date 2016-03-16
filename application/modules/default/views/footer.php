<!--//footer-->

<div class='footer'>

    <div class="container contact">
        <div class="col-lg-12">
            <div class="col-lg-8 col-md-7 col-sm-6 col-xs-12 email -top">
                <div class="col-lg-4 col-md-4 e-label visible-lg"><p><?php echo $this->lang->line('email_letter');?></p></div>
                <div class="col-lg-8 col-md-12  form">
                    <form action="" method="post">
                        <input name="email" type="text" placeholder='Email' />
                        <button type="submit" value="send"><?php echo $this->lang->line('send_mail');?></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6 hidden-xs download -top">
                <p>Download catalogue</p>
            </div>
        </div>
    </div>

    <div class="container footer-center">

        <div class="col-sm-6 visible-xs download -top">
            <p>Download catalogue</p>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 f-logo-l">
            <h3 class='f-logo'></h3>
            <ul class='social'>
                <li class='fb'><a href="#"></a></li>
                <li class='gg'><a href="#"></a></li>
                <li class='yt'><a href="#"></a></li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
            <p><span>Trụ sở chính:</span> Lô 1, Đường 1A, KCN Tân Tạo , Khu Phố 2, Phường Tân Tạo A , Q. Bình Tân, TP. HCM</p>
            <p>ĐT: (08) 3754 7905  -  Fax: (08) 3754 7906</p>
            <p>Email:  <a href="#">info@ntv.com.vn</a></p>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
            <p><span>VP Đại diện:</span> 1606 Khu B, Tòa nhà Indochina Park Tower, 4 Nguyễn Ðình Chiểu, P. ÐaKao, Q. 1, TP. HCM</p>
            <p>ĐT: (08) 3754 7905  -  Fax: (08) 3754 7906</p>
            <p>Email:  <a href="#">info@ntv.com.vn</a></p>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-12 iso">
            <p>SO 9001:2008</p>
            <div class='iso-logo'><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/iso.png" class='img-responsive' /></div>
        </div>
    </div>

    <div class='clearfix f-se'></div>

    <div class="container footer-bottom">
        <div class="col-lg-12">
            <div class="f-b-l pull-left">2016 Copyright by Nhat Truong Vinh</div>
            <div class="f-b-r pull-right  hidden-xs">
                <ul class="f-b-r-m">
                    <li><a href="<?php short_url('product', array())?>"><?php  echo $this->lang->line('txt_iron_steel'); ?></a></li>
                    <li><a href="<?php short_url('product2', array())?>"><?php  echo $this->lang->line('txt_ceramics'); ?></a></li>
                    <li><a href="<?php short_url('about', array())?>"><?php  echo $this->lang->line('txt_about'); ?></a></li>
                    <li><a href="<?php short_url('faq', array())?>"><?php  echo $this->lang->line('txt_faq'); ?></a></li>
                    <li><a href="<?php short_url('contact', array())?>"><?php  echo $this->lang->line('txt_contact'); ?></a></li>
                </ul>
            </div>
            <div class="top"></div>
        </div>
    </div>

</div>

</body>
</html>