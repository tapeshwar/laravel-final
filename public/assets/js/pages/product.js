$(document).ready(function () {

    $('#create_product_form').validate({

        submitHandler:function(form){
            //var btn = $('#user_login_form').loading('set');
            $.ajax({
                type: "POST",
                url: $('#create_product_form').attr('data-url'),
                data: new FormData($('#create_product_form')[0]),
                contentType: false,
				cache: false,
				processData: false,
                dataType: "json",
                success: function (r) {
                    //alert(r.status);
                    if(r.status=='success'){
                        window.location.reload();
                    }
                    //return false;
                }
            }).always(function () {
                //btn.loading('reset');
            });
            return false;

        }
        
    });



    $(document).on('click', '.create_product_category', function () {
        
        $('.load-overlay').show();
        $('#modal-placeholder').html('');
        var actionUrl = $(this).attr('data-url');
        //alert(actionUrl);
        $('#modal-placeholder').load(actionUrl, function () {
            $('.load-overlay').hide();
            $("#myModalHorizontal").modal();
            //$('.update-worker-error').remove();
    
             $("#product_category_form").validate({
                submitHandler: function (form) {
                    //alert($("#user_registration_form").attr('data-url'));
                    //var btn = $('#user_registration_btn .btn_submit').loading('set');
                    $.ajax({
                        url: $("#product_category_form").attr('action'),
                        dataType: "json",
                        type: "post",
                        data: new FormData($('#product_category_form')[0]),
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
                                
                            }
                        }
                    }).always(function () {
                        //btn.loading('reset');
                    });
                }
            }); 
        });
    });


    $('.delete_product_category').confirmAction({
        title: {
        text: 'Confirmation'
        },
        message: {
        text: 'Are you sure want to delete?'
        },     
        actions: {
        confirm: {
            //text: 'Okey',
            callback: function(confirm, cancel) {    
                $.get($('.delete_product_category').attr('data-url'), '',
                    function (data, textStatus, jqXHR) {
                        //alert(data);
                        document.location.reload();
                    },    
                ); 
            }
        }
        }
    });

    
    $('#jstree').jstree({
            autoOpen: true,
            plugins: ["state"],
            checked : true
        });
   
    $('#jstree').on("changed.jstree", function (e, data) {
        //document.location.reload()
        $('#product_cat').attr('value',data.selected);
        //document.location.reload();
        //console.log(data.selected);
        //alert(data.selected);
    });
    
    /* $('button').on('click', function () {
        $('#jstree').jstree(true).select_node('child_node_1');
        $('#jstree').jstree('select_node', 'child_node_1');
        $.jstree.reference('#jstree').select_node('child_node_1');
    }); */

    $(document).on('click','.jtreeExpandAll', function(){
        $("#jstree").jstree("open_all");
        open = true;
    })

    $(document).on('click','.jtreeCollapseAll', function(){
        $("#jstree").jstree("close_all");
        open = false;
    })
    
     $(document).on('click','.jsTreeNode', function(){
        document.location.href=$(this).attr('href');
    })
    
    
});