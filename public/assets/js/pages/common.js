$(document).ready(function () {

    function view_uploaded_img(t) {
        if ($(t).parent().children().is('div.show_images')) {
        $(t).parent().children('.show_images').html('');
        } else {
        $(t).after('<div class="show_images"></div>');
        }
        var files = t.files;
        for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var imageType = /image.*/;
        if (!file.type.match(imageType)) {
            continue;
        }
        var imgId = 'show_img_' + Math.random() + i;
        $(t).parent().children('.show_images').append('<img id="' + imgId + '" src="">');
        var img = document.getElementById(imgId);
        img.file = file;
        var reader = new FileReader();
        reader.onload = (function (aImg) {
            return function (e) {
            aImg.src = e.target.result;
            };
        })(img);
        reader.readAsDataURL(file);
        }
    }
    $(document).on('change', '.view_photo', function () {
        view_uploaded_img(this);
    });
});