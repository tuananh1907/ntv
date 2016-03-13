function addField(lang) {
  var html = '<li>' + '<textarea name=\'features[' + lang  + '][]\' class=\'textarea small full\'></textarea>' + '</li>';
  $('#feature-list-'+ lang).append(html);
}
$(document).ready(function() {
  $('.feature-list').sortable();
  
});


function addField2(lang) {
  var html = '<li>' + '<textarea name=\'slogans[' + lang  + '][]\' class=\'textarea small full\'></textarea>' + '</li>';
  $('#slogan-list-'+ lang).append(html);
}
$(document).ready(function() {
  $('.slogan-list').sortable();
  
});