<!-- main start -->
    <div id="main" class="clearfix">
        <!-- content start -->
        <div id="content" class="con">
            <h3><?php echo $page['post_title']?></h3>
            <div class="section">
                <?php echo $page['post_content']?>
                
                <div class="ctMap">
                    <?php echo $page['post_description']?>
                </div>
            </div>
            <h4><?php echo $this->lang->line('txt_note');?></h4>
            <div class="section">
                <p class="red pl10"><?php echo $this->lang->line('txt_required');?> </p>
                <form action='' id="submitform" method="post">
                    <dl class="dl_form">
                        <dt>
                            <label for="txtFullname"><?php echo $this->lang->line('txt_name');?></label>
                        </dt>
                        <dd>
                            <input type="text" class="sizeTxt" size="150" value="" id="txtFullname" name="txtFullname" />
                            <span class="must">*</span> </dd>
                        <dt>
                            <label for="txtEmail">Email</label>
                        </dt>
                        <dd>
                            <input type="text" class="sizeTxt" size="150" value="" id="txtEmail" name="txtEmail" />
                            <span class="must">*</span> </dd>
                        <dt>
                            <label for="txtTel"><?php echo $this->lang->line('txt_tel');?></label>
                        </dt>
                        <dd>
                            <input type="text" class="sizeTxt" size="150" value="" id="txtTel" name="txtTel" />
                        </dd>
                        <dt>
                            <label for="txtCompany"><?php echo $this->lang->line('txt_company');?></label>
                        </dt>
                        <dd>
                            <input type="text" class="sizeTxt" size="150" value="" id="txtCompany" name="txtCompany" />
                        </dd>
                        <dt>
                            <label for="txtContent"><?php echo $this->lang->line('txt_content');?></label>
                        </dt>
                        <dd>
                            <textarea rows="3" cols="35" id="txtContent" name="txtContent"></textarea>
                            <span class="must">*</span></dd>
                            <dt>&nbsp;</dt>
                            <dd class="center">
                                <input type="submit" value=<?php echo $this->lang->line('txt_send');?> class="btnSubmit" name="send" />
                            </dd>
                    </dl>
                    <p class="buttonC">
                        
                    </p>
                </form>
            </div>
        </div>
        <!-- content end -->

        <script>
    $(document).ready(function(){
        $('#submitform').validate({
            rules: {
                txtFullname: {
                    required: true
                },                
                txtEmail: {
                    required: true,
                    email: true
                },
                txtContent: {
                    required: true
                }
               
            },
            messages: {
                txtFullname: {
                    required: VALIDATE_REQUIRED
                },                
                txtEmail: {
                    required: VALIDATE_REQUIRED,
                    email: VALIDATE_EMAIL
                },
               txtContent: {
                    required: VALIDATE_REQUIRED
                } 
            }
            /*,
            submitHandler: function(form) {
                // some other code
                // maybe disabling submit button
                // then:
                //.append('<div class=\'loading\'></div>')
                $('*[type=submit]').hide();
                $(form).submit();
            }*/
        });
    });
</script>
        