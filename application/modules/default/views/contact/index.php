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
            <div class="col-lg-3"><p><?php echo $page['post_title']?></p></div>
            <div class="col-lg-5 p-l-c">
                <div class="l">
                    <div class="col-lg-1 line star"></div>
                    <div class="col-lg-10 line l-c"></div>
                    <div class="col-lg-1 line node"></div>
                </div>
            </div>
            <div class="col-lg-4 bc">
                <ul>
                    <li><a href="#">Trang chủ - </a></li>
<!--                    <li><a href="#">--><?php //echo $page['post_title']?><!-- - </a></li>-->
                    <li class='last'><span><?php echo $page['post_title']?></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="row contact-label">
                Liên hệ Công ty TNHH NHẬT TRƯỜNG VINH
            </div>
            <div class="row contact-info">
                <div class="col-lg-4 contact-info-address">
                    <div class="contact-info-label">
                        <p>Địa chỉ</p>
                    </div>
                    <div class="contact-info-content">
                        <p>
                            <strong>Trụ sở chính: </strong><br/>
                            Lô 1, Đường 1A, KCN Tân Tạo , Khu Phố 2, Phường Tân Tạo A , Q. Bình Tân, TP. HCM
                        </p>

                        <p>
                            <strong>VP Đại diện:</strong> <br/>
                            1606 Khu B, Tòa nhà Indochina Park Tower, 4 Nguyễn Ðình Chiểu, P. ÐaKao, Quận 1, TP. HCM
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 contact-info-phone">
                    <div class="contact-info-label">
                        <p>Điện thoại</p>
                    </div>
                    <div class="contact-info-content">
                        <p>
                            Điện thoại: <strong>(+848) 3754 7000</strong><br/>
                            Fax: <strong>(+848) 3754 7903</strong><br/>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 contact-info-mail">
                    <div class="contact-info-label">
                        <p>Mail</p>
                    </div>
                    <div class="contact-info-content">
                        <p><a href="#">info@ntv.com.vn</a></p>
                    </div>
                </div>
            </div>

            <div class="row contact-form">
                <div class="col-lg-6">
                    <div class="contact-form-label">
                        Form liên hệ
                    </div>
                    <p>Quý khách có những thắc mắc cần chúng tôi hỗ trợ qua email, xin quý khách vui lòng điền thông tin
                        vào form để được hỗ trợ tốt nhất</p>

                    <div class="form-contact">
                        <form id="submitform" method="post">
                            <input name="name" class="c-name" class='name' placeholder='Họ và tên(*)'/>
                            <input name="email" class='c-email' class='email' placeholder='Email(*)'/>
                            <input name="title" class="c-title" class='title' placeholder='Tiêu đề(*)'/>
                            <textarea>

                            </textarea>

                            <input name="code" class='c-captcha small' placeholder='Mã xác nhận(*)'/>

                            <div class="cap-area"><img src="<?php echo DEFAULT_IMAGE_PATH; ?>/captcha.png"></div>

                            <input name="send" type="submit" class="submit small" value='Gui form'/>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6"></div>
            </div>
        </div>

    </div>
</div>

<script>
    jQuery(document).ready(function () {
        jQuery('#submitform').validate({
            rules: {
                name: {
                    required: true
                },

                email: {
                    required: true,
                    email: true
                },

                title: {
                    required: true
                },

                code: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: 'Yêu cầu nhập chỗ này'
                },

                email: {
                    required: 'Yêu cầu nhập chỗ này',
                    email: 'Yêu cầu nhập đúng email'

                },

                title: {
                    required: 'Yêu cầu nhập chỗ này'
                },

                code: {
                    required: 'Yêu cầu nhập chỗ này'
                }




            }

        });

    })
</script>