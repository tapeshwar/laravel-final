$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


$(document).ready(function(){
                            
    $('.expandEditor').attr('title','Click to show/hide item editor');
    $('.disclose').attr('title','Click to show/hide children');
    $('.deleteMenu').attr('title', 'Click to delete item.');

    $('.disclose').on('click', function() {
        $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
        $(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
    });
    
    $('.expandEditor, .itemTitle').click(function(){
        var id = $(this).attr('data-id');
        $('#menuEdit'+id).toggle();
        $(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
    });
    
});	


$(document).ready(function(){
    var shor_trigger = '';
    $(".shortinput").each(function(i){        
        var connector = (i>0)?', #':'#';
        shor_trigger += connector+''+$(this).val();
    });
    var ns = $(shor_trigger).nestedSortable({
        forcePlaceholderSize: true,
        handle: 'div',
        helper:	'clone',
        items: 'li',
        opacity: .6,
        placeholder: 'placeholder',
        revert: 250,
        tabSize: 25,
        tolerance: 'pointer',
        toleranceElement: '> div',
        maxLevels: 5,
        isTree: true,
        expandOnHover: 700,
        startCollapsed: false
    });
       
});	


$(document).ready(function(){
    $(".shortinput").each(function(i){ 
        var th = $(this).attr('data-id');
        $('#toArray1_'+th).click(function(e){		
        $('#result_'+th).html('');
        list = $('#sortable1_'+th).nestedSortable('toArray', {startDepthCount: 0});
        //var list = JSON.stringify(list);
        $.ajax({
            type: "POST",
            url : $('#toArray1_'+th).attr('data-url'),
            /*data: {'data':encodeURI(list)}*/
            data: {'data':list}
        }).done(function(data){
            $('#result_'+th).html(data);

            });
        });
    });
        

});	

$(document).ready(function(){

    $(document).on('click', '.edit_menu_name_btn', function () {
    var mid = $(this).attr('data-mid');
        $('#edit_menu_name_form'+mid).validate({
            submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: $('#edit_menu_name_form'+mid).attr('action'),
                    data: new FormData($('#edit_menu_name_form'+mid)[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    //dataType: "json",
                    success: function (r) {
                        $('#mresult_'+mid).html(r);
                        //return false;
                    }
                }).always(function () {
                    //btn.loading('reset');
                });
                return false;

            }
            
        });
    });


    $('.delete_menu').on('click', function () {
        var th = $(this);

        if(confirm('Are you sure want to delete?')){
            $.get(th.attr('data-url'), '',
                    function (data, textStatus, jqXHR) {
                        //alert(data);
                        document.location.reload();
                    },    
                );
        }

    });
    

    $(document).on('click', '.create_menu_set_btn', function () {
        $('#create_menu_set_form').validate({
            submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: $('#create_menu_set_form').attr('action'),
                    data: new FormData($('#create_menu_set_form')[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    //dataType: "json",
                    success: function (r) {
                        window.location.reload();
                    }
                }).always(function () {
                    //btn.loading('reset');
                });
                return false;

            }
            
        });
    });



    $(document).on('click', '.add_menu_btn', function () {
        //var mid = $(this).attr('data-mid');
        $('#add_menu_form').validate({
            submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: $('#add_menu_form').attr('action'),
                    data: new FormData($('#add_menu_form')[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    //dataType: "json",
                    success: function (r) {
                        window.location.reload();
                    }
                }).always(function () {
                    //btn.loading('reset');
                });
                return false;

            }
            
        });
    });

    $(document).on('click', '.create_new_page_btn', function () {
        //var mid = $(this).attr('data-mid');
        $('#create_new_page_form').validate({
            /* submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: $('#create_new_page_form').attr('action'),
                    data: new FormData($('#create_new_page_form')[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    //dataType: "json",
                    success: function (r) {
                        window.location.reload();
                    }
                }).always(function () {
                    //btn.loading('reset');
                });
                return false;

            } */
            
        });
    });


    $(document).on('click', '.update_page_btn', function () {
        //var mid = $(this).attr('data-mid');
        $('#update_page_form').validate({
            /* submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: $('#update_page_form').attr('action'),
                    data: new FormData($('#update_page_form')[0]),
                    contentType: false,
                    cache: false,
                    processData: false,
                    //dataType: "json",
                    success: function (r) {
                        window.location.reload();
                    }
                }).always(function () {
                    //btn.loading('reset');
                });
                return false;

            } */
            
        });
    });



    
});	

$(document).ready(function(){
    CKEDITOR.replace('ck_editor1',{
        "extraPlugins" : 'imagebrowser',
        "filebrowserBrowseUrl": 'dfsdasd',
    });

});	


$('.delete_menu_set').on('click', function () {
    var th = $(this);
    if(confirm('Are you sure want to delete?, All pages attached to this menu set are also deleted..')){
        $.get(th.attr('data-url'), '',
            function (data, textStatus, jqXHR) {
                //alert(data);
                document.location.reload();
            },    
        );
    }

});
