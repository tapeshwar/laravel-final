$(document).ready(function () {


    $(document).on('click', '.add_modules', function () {
        
        $('.load-overlay').show();
        $('#modal-placeholder').html('');
        var actionUrl = $(this).attr('data-url');
        //alert(actionUrl);
        $('#modal-placeholder').load(actionUrl, function () {
            $('.load-overlay').hide();
            $("#myModalHorizontal").modal();
            //$('.update-worker-error').remove();

            $("#add_module_form").validate({
                submitHandler: function (form) {
                    //alert($("#user_registration_form").attr('data-url'));
                    //var btn = $('#user_registration_btn .btn_submit').loading('set');
                    $.ajax({
                        url: $("#add_module_form").attr('action'),
                        //dataType: "json",
                        type: "post",
                        data: new FormData($('#add_module_form')[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (res) {
                            //alert(res);return false;
                            if (res == 'success') {
                                window.location.reload();
                            }
                            if (res == 'duplicate') {
                                alert('Duplicate Method Name');
                                return false;
                            }
                        }
                    }).always(function () {
                        //btn.loading('reset');
                    });
                }
            }); 
    
             
        });
    });



    

    $(document).on('click', '.edit_module', function () {
        
        $('.load-overlay').show();
        $('#modal-placeholder').html('');
        var actionUrl = $(this).attr('data-url');
        //alert(actionUrl);
        $('#modal-placeholder').load(actionUrl, function () {
            $('.load-overlay').hide();
            $("#myModalHorizontal").modal();
            //$('.update-worker-error').remove();

            $("#edit_module_form").validate({
                submitHandler: function (form) {
                    //alert($("#user_registration_form").attr('data-url'));
                    //var btn = $('#user_registration_btn .btn_submit').loading('set');
                    $.ajax({
                        url: $("#edit_module_form").attr('action'),
                        //dataType: "json",
                        type: "post",
                        data: new FormData($('#edit_module_form')[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (res) {
                            if (res == 'success') {
                                window.location.reload();
                            }
                        }
                    }).always(function () {
                        //btn.loading('reset');
                    });
                }
            }); 
    
             
        });
    });


    $('.delete_module').on('click', function () {
        var th = $(this);
        if(confirm('Are you sure want to delete module?')){
            $.get(th.attr('data-url'), '',
                function (data, textStatus, jqXHR) {
                    //alert(data);
                    document.location.reload();
                },    
            );
        }
    
    });


    
    $(document).on('click', '.add_system_user', function () {
        
        $('.load-overlay').show();
        $('#modal-placeholder').html('');
        var actionUrl = $(this).attr('data-url');
        //alert(actionUrl);
        $('#modal-placeholder').load(actionUrl, function () {
            $('.load-overlay').hide();
            $("#myModalHorizontal").modal();
            //$('.update-worker-error').remove();

            $("#add_system_user_form").validate({
                submitHandler: function (form) {
                    //alert($("#user_registration_form").attr('data-url'));
                    //var btn = $('#user_registration_btn .btn_submit').loading('set');
                    $.ajax({
                        url: $("#add_system_user_form").attr('action'),
                        //dataType: "json",
                        type: "post",
                        data: new FormData($('#add_system_user_form')[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (res) {
                            //alert(res);return false;
                            if (res == 'success') {
                                window.location.reload();
                            }
                            if (res == 'duplicate') {
                                alert('Duplicate Method Name');
                                return false;
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

function getController(actionName){
   
    if(actionName!=''){
        $.ajax({
            url: $("#getControllerName").attr('data-url'),
            type: "post",
            data: {"actionName":actionName},
            success: function (res) {
                $('#contoller_name').val(res);
            }
        })
    }

}