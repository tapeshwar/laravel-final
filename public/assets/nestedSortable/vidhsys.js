function ajaxrequest()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
		{
        xmlhttp = new XMLHttpRequest()
    } else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    return xmlhttp;
}


function openDialog_gallery_set(id){
	//var id='<iframe src="'+url+'" frameborder="0" width="100%" height="100%" style="height:100%" id="dreamsuite"></iframe>';
	//document.getElementById('model_inner').innerHTML=id;	
	$( "#dialog_gallery_set" )
		.data('id', id)
		.dialog({
		height: 640,
		width: 800,
		modal: true,
	});
	var eid = $("#dialog_gallery_set").data('id');
	//alert(eid);
	//document.getElementById('mid').value=id;
	var xmlhttp = new ajaxrequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res=xmlhttp.responseText;
			//alert(res);exit();
			document.getElementById('set_name').innerHTML=res;
			//$('.custom_link').val(res);
        }
    };
    xmlhttp.open("GET","ajax.php?edit_set=yes&id="+eid+"&random="+Math.random(), true);
    xmlhttp.send();
	
	//alert(my_data);
}

function escapeHtml(text) {
  var map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#039;'
  };

  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}


function getLink(id,name,section){
	//alert(section);exit();
	 var xmlhttp = new ajaxrequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res=xmlhttp.responseText;
			//alert(res);exit();
			document.getElementById('custom_link1').value=res;
			//$('.custom_link').val(res);
        }
    }
    xmlhttp.open("GET","ajax.php?tree_view=yes&id="+id+"&name="+name+"&section="+section+"&random="+Math.random(), true);
    xmlhttp.send();
 }

function getLink2(id,name,section){
	var eleid = document.getElementById('element_id2').value;
	//alert(eleid);exit();
	 var xmlhttp = new ajaxrequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res=xmlhttp.responseText;
			//alert(res);exit();
			document.getElementById('custom_link1_'+eleid).value=res;
			//$('.custom_link').val(res);
        }
    }
    xmlhttp.open("GET","ajax.php?tree_view=yes&id="+id+"&name="+name+"&section="+section+"&random="+Math.random(), true);
    xmlhttp.send();
 }



function delete_filmanager_image(id,image_name){
	
	//alert(id);exit();
	if(confirm("Are you sure want to delete.")){
	 var xmlhttp = new ajaxrequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res=xmlhttp.responseText;
			//alert(res);//exit();
			document.location.reload();
        }
    }
    xmlhttp.open("GET","ajax.php?delete_filmanager_image=yes&id="+id+"&image_name="+image_name+"&random="+Math.random(), true);
    xmlhttp.send();
 }
}


function edit_menu_name(id){
	//alert(id);exit();
	var title = document.getElementById("title_"+id).value;
	var name = document.getElementById("menu_"+id).value;
	var custom_link = document.getElementById("custom_link1_"+id).value;
	var is_enable = $("input[id=is_enable_"+id+"]:checked").val();
	var xmlhttp = new ajaxrequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res=xmlhttp.responseText;
			alert(res);
			document.location.reload();
        }
    };
    xmlhttp.open("GET","ajax.php?edit_menu_name=yes&id="+id+"&menu_title="+title+"&menu_name="+name+"&custom_link="+custom_link+"&is_enable="+is_enable+"&random="+Math.random(), true);
    xmlhttp.send();
	
}

function delete_menu(id){
	if(id!=''){
		if(confirm("Are you sure want to delete.")){
			var xmlhttp = new ajaxrequest();
    	xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res=xmlhttp.responseText;
			alert(res);
			document.location.reload();
        }
    };
    xmlhttp.open("GET","ajax.php?delete_menu=yes&id="+id+"&random="+Math.random(), true);
    xmlhttp.send();
		
		}
	}
	else{
		alert('something wrong');
	}
}

function edit_user(id){
	//alert('ok');exit();
	var name = document.getElementById("name_"+id).value;
	
	var username = document.getElementById("username_"+id).value;
	var password = document.getElementById("password_"+id).value;
	//var uenable = document.getElementById("uenable_"+id).value;
	var uenable = $("input:radio[id=uenable_"+id+"]:checked").val();
	//alert(uenable);die;
	var xmlhttp = new ajaxrequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res=xmlhttp.responseText;
			alert(res);
			document.location.reload();
        }
    };
    xmlhttp.open("GET","ajax.php?edit_user=yes&id="+id+"&name="+name+"&username="+username+"&password="+password+"&uenable="+uenable+"&random="+Math.random(), true);
    xmlhttp.send();
	
}

function open_image_browser(){
	 alert('ok');
	$("#image_browser").click(function(){
			  var id = $(this).attr('data');
			  var embed = $(this).attr('data-embed');
			  event.preventDefault();
          	  $.popupWindow('http://cms.vidhsys.com/media-files.php?opener=vidhsys&filetype=image&attrtype='+id+'&embed='+embed,{
              width: 1100,
              height: 600,
              center: 'screen'
          });	    
		});  
}
 
 $( document ).ready(function() {
 $(".link_browser").click(function(){
	 //alert('hello');exit;
			$('#popup_dialog').html('');
			$('#popup_dialog').load('http://localhost/vidhsys_admin3/media-files.php?id='+$(this).attr('data')).dialog({height:500,width:500,
				  title:'Select Link'
				  }); 		    
	});

});



$( document ).ready(function() {
    $(".image_browser").click(function(){
		var id = $(this).attr('data');
			  var embed = $(this).attr('data-embed');
			  event.preventDefault();
          	  $.popupWindow('http://localhost/vidhsys_admin3/media-files.php?opener=vidhsys_admin&filetype=image&attrtype='+id+'&embed='+embed,{
              width: 1100,
              height: 600,
              center: 'screen'
          });	  
		
	});
	
});
  
 $(".file_browser").click(function(){
		var id=$(this).attr('id');
		event.preventDefault();
          $.popupWindow('http://cms.vidhsys.com/media-files.php?opener=vidhsys&filetype=files&idnum='+id, {
              width: 1100,
              height: 600,
              center: 'screen'
          });	    
		});
 

function dlte(id,table,settable){
	 if(confirm('Are you sure want to delete?')){
	 var xmlhttp = new ajaxrequest();
     xmlhttp.onreadystatechange = function () {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res=xmlhttp.responseText;
			//alert(res);
			document.getElementById('msg').innerHTML=res;
			window.location.reload();	
        }
     }
     xmlhttp.open("GET","ajax.php?delete_id=yes&id="+id+"&table="+table+"&settable="+settable+"&random="+Math.random(), true);
     xmlhttp.send();
  }}

function delete_one(row_id,table,form_id,redirect_page){
	if(row_id!=''){
		if(confirm("Are you sure want to delete.")){
		document.getElementById("row_id").value=row_id;
		document.getElementById("table").value=table;
		document.getElementById("redirect_page").value=redirect_page;
		document.getElementById(form_id).submit();
		//return false;
		}
	}
	else{
		alert('something wrong');
	}
	
}

function delete_with_child(row_id,parent_table,child_table,form_id,redirect_page){
	if(row_id!=''){
		if(confirm("Are you sure want to delete.")){
		document.getElementById("row_id2").value=row_id;
		document.getElementById("parent_table2").value=parent_table;
		document.getElementById("child_table2").value=child_table;
		document.getElementById("redirect_page2").value=redirect_page;
		document.getElementById(form_id).submit();
		//return false;
		}
	}
	else{
		alert('something wrong');
	}
	
}

function delete_one_with_file(row_id,file_name,table,form_id,redirect_page){
	if(row_id!=''){
		if(confirm("Are you sure want to delete.")){
		document.getElementById("row_id").value=row_id;
		document.getElementById("file_name").value=file_name;
		document.getElementById("table").value=table;
		document.getElementById("redirect_page").value=redirect_page;
		document.getElementById(form_id).submit();
		//return false;
		}
	}
	else{
		alert('something wrong');
	}
	
}



function delete_one2(row_id,form_id,redirect_page){
	//alert(row_id);
	if(row_id!=''){
		if(confirm("Are you sure want to delete.")){
		document.getElementById("row_id_"+row_id).value=row_id;
		document.getElementById("redirect_page_"+row_id).value=redirect_page;
		document.getElementById(form_id).submit();
		//return false;
		}
	}
	else{
		alert('something wrong');
	}
	
}

function delete_set(set_id){
	if(set_id!=''){
	 if(confirm('Are you sure want to delete? All menus associated with this menu set are also deleted.')){
	 var xmlhttp = new ajaxrequest();
     xmlhttp.onreadystatechange = function () {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res=xmlhttp.responseText;
			alert(res);
			//document.getElementById('msg').innerHTML=res;
			window.location.reload();	
        }
     };
     xmlhttp.open("GET","ajax.php?delete_menu_set=yes&id="+set_id+"&random="+Math.random(), true);
     xmlhttp.send();
	 }
	}
}
  
