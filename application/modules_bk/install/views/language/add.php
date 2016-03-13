<div id="page-wrapper">
    <form action='' method='post'>
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="<?= ADMIN_IMAGE_PATH ?>/icons/icon_list.png" alt="" />
                <h1 class='title'>
                    Language :: Add
                </h1>
            </div>
            <div class="block-right">
                <input type="submit" name="add" value="Lưu" id="cmdAdd" class="button " />
                <input type="submit" name="cmdDel" value="Hủy" id="cmdDel" class="button " />
            </div>
        </div>
        <div id="main-content">
            <div id="content-outer">
                <div class="content-wrapper">
                    <div class="content d-content ui-widget-content">
                        <form class='form'>
                            <div class="block-left d-block-left">
                                <label class="desc">Chọn ngôn ngữ</label>
                                <select name='language_id' id='lang-list'></select>        
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="clearfix">
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
    </form>
    <div class="clearfix">
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $.post( "/lang.json", function( data ) {
      if(data.length) {
        var html='';
        for (var i = data.length - 1; i >= 0; i--) {
            html += '<option value=\'' + data[i]['lang'] + '\'>' + data[i]['title'] + '</option>';
        };
        $('#lang-list').html(html);
      }
    });
});
</script>