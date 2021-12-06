$(document).ready(function () {

    $('#user_login_form').validate({
        /* rules:{
            "username":"required",
            "password":"required"
        },
        messages:{
            "username":"Please enter username",
            "password":"Please enter password"

        } */
        /* submitHandler:function(form){
            //var btn = $('#user_login_form').loading('set');
            $.ajax({
                type: "POST",
                url: $('#user_login_form').attr('action'),
                data: new FormData($('#user_login_form')[0]),
                contentType: false,
				cache: false,
				processData: false,
                dataType: "json",
                success: function (r) {
                    if(r.status=='success'){
                        $('#login_error').html('<span style="color:green">'+r.msg+'</span>');
                        window.location.href=r.url;
                    }else{
                        $('#login_error').html('<span style="color:red">'+r.msg+'</span>'); 
                    }
                }
            }).always(function () {
                // btn.loading('reset'); 
            });
            return false;
        } */
    });



    $(document).on('click', '.user_register', function () {
        
        $('.load-overlay').show();
        $('#modal-placeholder').html('');
        var actionUrl = $(this).attr('data-url');
        //alert(actionUrl);
        $('#modal-placeholder').load(actionUrl, function () {
            $('.load-overlay').hide();
            $("#myModalHorizontal").modal();
            //$('.update-worker-error').remove();
    
             $("#user_registration_form").validate({
                submitHandler: function (form) {
                    //alert($("#user_registration_form").attr('data-url'));
                    //var btn = $('#user_registration_btn .btn_submit').loading('set');
                    $.ajax({
                        url: $("#user_registration_form").attr('data-url'),
                        dataType: "json",
                        type: "post",
                        data: new FormData($('#user_registration_form')[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (d) {
                            //alert(d);return false;
                            if (d.status == 'success') {
                                window.location.reload();
                            } else {
                                var err = '';
                                $.each(d.message, function (key, value) {
                                    $.each(value, function (k, v) {
                                        err += v + '<br/>';
                                    });
                                });
                                //$('#update-worker-form .btn_submit').before('<label class="error update-worker-error">' + err + '</label>');
                            }
                        }
                    }).always(function () {
                        //btn.loading('reset');
                    });
                }
            }); 
        });
    });

});


$(document).on('click', '.test_modal', function() {
    $("#myModal").modal('show');
})