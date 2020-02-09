
var base_url = $('#base_url').val();

CKEDITOR.editorConfig = function(config) {
// ...
   config.filebrowserBrowseUrl = base_url+'js/plugins/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = base_url+'js/plugins/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = base_url+'js/plugins/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = base_url+'js/plugins/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = base_url+'js/plugins/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = base_url+'js/plugins/kcfinder/upload.php?opener=ckeditor&type=flash';
// ...
};