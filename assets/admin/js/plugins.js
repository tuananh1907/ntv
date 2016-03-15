function addField(lang) {
  var html = '<li>' + '<textarea name=\'features[' + lang  + '][]\' class=\'textarea small full\'></textarea>' + '</li>';
  $('#feature-list-'+ lang).append(html);
}


//GALLERY
function openFile(store) {
    window.KCFinder = {
        callBackMultiple: function(files) {
            window.KCFinder = null;
            $(store).val(files[0]);
        }
    };
    window.open('/assets/admin/js/kcfinder/browse.php?type=files&dir=files/public',
        'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
            'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}

function addField2(lang) {
  var html = '<li>' + '<textarea name=\'slogans[' + lang  + '][]\' class=\'textarea small full\'></textarea>' + '</li>';
  $('#slogan-list-'+ lang).append(html);
}
$(document).ready(function() {
    $('.slogan-list').sortable();
    $('.feature-list').sortable();
    $('.upload-file').click(function(e) {
        e.preventDefault();
        var store = $(this).attr('data-store');
        openFile(store);
    });
});

