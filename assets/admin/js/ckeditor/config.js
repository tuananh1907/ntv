/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	//CK FINDER
	config.filebrowserBrowseUrl = '/assets/admin/js/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '/assets/admin/js/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '/assets/admin/js/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '/assets/admin/js/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '/assets/admin/js/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '/assets/admin/js/kcfinder/upload.php?opener=ckeditor&type=flash';

	
/* 
   config.filebrowserBrowseUrl = '/assets/admin/js/ckfinder/ckfinder.html';
   config.filebrowserImageBrowseUrl = '/assets/admin/js/ckfinder/ckfinder.html?type=Images';
   config.filebrowserFlashBrowseUrl = '/assets/admin/js/ckfinder/ckfinder.html?type=Flash';
   config.filebrowserUploadUrl = '/assets/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
   config.filebrowserImageUploadUrl = '/assets/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
   config.filebrowserFlashUploadUrl = '/assets/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
*/

	config.entities = false;
	config.entities_latin = false;
};
