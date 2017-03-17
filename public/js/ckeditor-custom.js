function ckeditor(name) {
    var editor = CKEDITOR.replace(name ,{
        language:'vi',
        filebrowserImageBrowseUrl : baseUrl+'/vendor/unisharp/laravel-ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : baseUrl+'/vendor/unisharp/laravel-ckfinder/ckfinder.html?Type=Flash',
        filebrowserImageUploadUrl : baseUrl+'/vendor/unisharp/laravel-ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : baseUrl+'/vendor/unisharp/laravel-ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        toolbar:[
        ['Source','-','Save','NewPage','Preview','-','Templates'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'HiddenField'],
        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Link','Unlink','Anchor'],
        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
        ['Styles','Format','Font','FontSize'],
        ['TextColor','BGColor'],
        ['Maximize', 'ShowBlocks','-','About']
        ]
        });
}

function BrowseServer(name) { // Get a images Ckfinder
    CKFinder.popup( {
        chooseFiles: true,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                document.getElementById('urlimg').value = file.getUrl();
                var file2 = evt.data.files.first();
                document.getElementById('url').src = file.getUrl();
            });
            finder.on( 'file:choose:resizedImage', function( evt ) {
                document.getElementById('url').src = evt.data.resizedUrl;
            });
        }
    });
}
