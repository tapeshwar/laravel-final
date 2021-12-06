<div class="row" style="margin-left:0"> 

            <div class="col-lg-6">
              
                  <div id="accordion">
                  
                   <?php 
					  if($menu2!=''){
					  foreach($menu2 as $k=>$v){
					?>
                    <div class="card">
                    <div class="card-header" id="heading-<?=$v['id']?>">
                        <h5 class="mb-0">
                          <a class="collapsed" role="button" data-toggle="collapse" href="#<?=$v['name']?><?=$v['id']?>" aria-expanded="false" aria-controls="<?=$v['name']?><?=$v['id']?>">
                            <?=$v['name']?>
                          </a>
                        </h5>
                      </div>
                      <div id="<?=$v['name']?><?=$v['id']?>" class="collapse" data-parent="#accordion" aria-labelledby="heading-<?=$v['id']?>">
                        <div class="card-body">
                          
                          <?php if(is_array($v['set_sub_menu'])){?>
              <ol id="sortable1_<?=$v['id']?>" class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded" style="margin:10px; padding-left:0">
              <input type="hidden" value="sortable1_<?=$v['id']?>" class="shortinput" data-id="<?=$v['id']?>" >
	 		<?php 
			  foreach($v['set_sub_menu'] as $k1=>$v1){?>
		
	        <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_<?=$v1['id']?>">
            <div class="menuDiv">
            <span title="Click to show/hide menu" class="disclose ui-icon ui-icon-minusthick">
            <span></span>
            </span>
            <span title="Update menu" data-id="<?=$v1['id']?>" class="expandEditor ui-icon ui-icon-pencil">
            <span></span>
            </span>
            <span>
            <span class="itemTitle ui-icon-triangle-1-n ui-icon-triangle-1-s"><?=$v1['name']?></span>
            <span title="Click to delete menu" data-id="<?=$v1['id']?>" data-url="{{url('website/delete_menu/'.$v1['id'])}}" class="delete_menu deleteMenu ui-icon ui-icon-closethick">
            <span></span>
            </span>
            </span>
		    <div id="menuEdit<?=$v1['id']?>" class="menuEdit" style="display: none">
		    <form method="post" id="edit_menu_name_form<?=$v1['id']?>" action="{{url('website/edit_menu/'.$v1['id'])}}" enctype="multipart/form-data" style="margin-bottom:0px">
			<span class="Span2"><strong>Title:</strong></span>
			<span class="Span10">
				<input type="text" name="title" placeholder="Menu Title" id="title_<?=$v1['id']?>" value="<?=$v1['title']?>" required>
			</span>
			<br clear="all">
			<span class="Span2"><strong>Name:</strong></span>
			<span class="Span10">
				<input type="text" name="name" placeholder="Menu Name" id="menu_<?=$v1['id']?>" value="<?=$v1['name']?>" required>
			</span>
			<br clear="all">
			<span class="Span2"><strong>Page Link:</strong></span>
			<span class="Span8">
				<input type="text" name="custom_link" id="custom_link1_<?=$v1['id']?>" value="<?=$v1['custom_link']?>" class="span7 custom_link" placeholder="Page Link"/>
				<a href="javascript:opendialog1(<?=$v1['id']?>)">
					<i class="fa fa-search" title="Select" style="font-size: 20px"></i>
				</a>
			</span>
			
			<br clear="all">
			<span class="Span2"><strong>Enable:</strong></span>
			<span class="Span10">
				<input type="radio" name="is_enable" id="is_enable_<?=$v1['id']?>" value="Y"<?php if($v1['enable']=='Y'){?> checked <?php } ?>>Yes
				<input type="radio" name="is_enable" id="is_enable_<?=$v1['id']?>" value="N"<?php if($v1['enable']=='N'){?> checked <?php } ?>>No
			</span>
			<br clear="all">
            <span style="margin-top:10px">
		    <input type="submit" data-mid="<?=$v1['id']?>" class="btn btn-primary btn-xs btn-flat btn-mini edit_menu_name_btn" value="Update">
            <span style="color:green;" id="mresult_<?=$v1['id']?>"></span>
            </span>
		    </form>  
	        </div>
	        </div>
	   
	   	    <?php if(is_array($v1['sub_menu'])){ ?>
		   	<ol>
		   	<?php foreach($v1['sub_menu'] as $k2=>$v2){?>
			<li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_<?=$v2['id']?>">
			   <div class="menuDiv">
			   <span title="Click to show/hide menu" class="disclose ui-icon ui-icon-minusthick">
			   <span></span>
			   </span>
			   <span title="Update menu" data-id="<?=$v2['id']?>" class="expandEditor ui-icon ui-icon-pencil ui-icon-triangle-1-n ui-icon-triangle-1-s">
			   <span></span>
			   </span>
			   <span>
			   <span data-id="<?=$v2['id']?>" class="itemTitle ui-icon-triangle-1-n ui-icon-triangle-1-s"><?=$v2['name']?></span>
			   <span title="Click to delete menu" data-id="<?=$v2['id']?>" data-url="{{url('website/delete_menu/'.$v2['id'])}}" class="delete_menu deleteMenu ui-icon ui-icon-closethick">
			   <span></span>
			   </span>
			   </span>
			   <div id="menuEdit<?=$v2['id']?>" class="menuEdit" style="display: none">
               <form method="post" id="edit_menu_name_form<?=$v2['id']?>" action="{{url('website/edit_menu/'.$v2['id'])}}" enctype="multipart/form-data" style="margin-bottom:0px">
					<span class="Span2"><strong>Title:</strong></span>
					<span class="Span10">
						<input type="text" name="title" placeholder="Menu Title" id="title_<?=$v2['id']?>" value="<?=$v2['title']?>">
					</span>
					<br clear="all">
					<span class="Span2"><strong>Name:</strong></span>
					<span class="Span10">
						<input type="text" name="name" placeholder="Menu Name" id="menu_<?=$v2['id']?>" value="<?=$v2['name']?>">
					</span>
					<br clear="all">
					<span class="Span2"><strong>Page Link:</strong></span>
					<span class="Span8">
						<input type="text" name="custom_link" id="custom_link1_<?=$v2['id']?>" value="<?=$v2['custom_link']?>" class="span7 custom_link" placeholder="Page Link" />
						<a href="javascript:opendialog1(<?=$v2['id']?>)">
							<i class="fa fa-search" title="Select" style="font-size: 20px"></i>
						</a>
					</span>
					
					<br clear="all">
					<span class="Span2"><strong>Enable:</strong></span>
					<span class="Span10">
						<input type="radio" name="is_enable" id="is_enable_<?=$v2['id']?>" value="Y"<?php if($v2['enable']=="Y"){?> checked <?php } ?>>Yes
						<input type="radio" name="is_enable" id="is_enable_<?=$v2['id']?>" value="N"<?php if($v2['enable']=="N"){?> checked <?php } ?>>No
					</span>
					<br clear="all">
                    <span style="margin-top:10px">
                    <input type="submit" data-mid="<?=$v2['id']?>" class="btn btn-primary btn-xs btn-flat btn-mini edit_menu_name_btn" value="Update">
                    <span style="color:green;" id="mresult_<?=$v2['id']?>"></span>
                    </span>

				</form>  
			   </div>
			   </div>
			    <?php if(is_array($v2['sub_menu'])){ ?>
			   		<ol>
			   		<?php foreach($v2['sub_menu'] as $k3=>$v3){?>
				   	<li class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_<?=$v3['id']?>">
				   	   <div class="menuDiv">
					   <span title="Click to show/hide menu" class="disclose ui-icon ui-icon-minusthick">
					   <span></span>
					   </span>
					   <span title="Update menu" data-id="<?=$v3['id']?>" class="expandEditor ui-icon ui-icon-pencil">
					   <span></span>
					   </span>
					   <span>
					   <span data-id="<?=$v3['id']?>" class="itemTitle"><?=$v3['name']?></span>
					   <span title="Click to delete menu" data-id="<?=$v3['id']?>" data-url="{{url('website/delete_menu/'.$v3['id'])}}" class="delete_menu deleteMenu ui-icon ui-icon-closethick">
					   <span></span>
					   </span>
					   </span>
					   <div id="menuEdit<?=$v3['id']?>" class="menuEdit" style="display: none">
					   <form method="post" id="edit_menu_name_form<?=$v3['id']?>" action="{{url('website/edit_menu/'.$v3['id'])}}" enctype="multipart/form-data" style="margin-bottom:0px">
						<span class="Span2"><strong>Title:</strong></span>
						<span class="Span10">
							<input type="text" name="title" placeholder="Menu Title" id="title_<?=$v3['id']?>" value="<?=$v3['title']?>">
						</span>
						<br clear="all">
						<span class="Span2"><strong>Name:</strong></span>
						<span class="Span10">
							<input type="text" name="name" placeholder="Menu Name" id="menu_<?=$v3['id']?>" value="<?=$v3['name']?>">
						</span>
						<br clear="all">
						<span class="Span2"><strong>Page Link:</strong></span>
						<span class="Span8">
							<input type="text" name="custom_link" id="custom_link1_<?=$v3['id']?>" value="<?=$v3['custom_link']?>" class="span7 custom_link" placeholder="Page Link" />
					       <a href="javascript:opendialog1(<?=$v3['id']?>)">
						     <i class="fa fa-search" title="Select" style="font-size: 20px"></i>
							</a>
						</span>
						
						<br clear="all">
						<span class="Span2"><strong>Enable:</strong></span>
						<span class="Span10">
							<input type="radio" name="is_enable" id="is_enable_<?=$v3['id']?>" value="Y"<?php if($v3['enable']=='Y'){?> checked <?php } ?>>Yes
							<input type="radio" name="is_enable" id="is_enable_<?=$v3['id']?>" value="N"<?php if($v3['enable']=='N'){?> checked <?php } ?>>No
						</span>
						<br clear="all">
						<span style="margin-top:10px">
                        <input type="submit" data-mid="<?=$v3['id']?>" class="btn btn-primary btn-xs btn-flat btn-mini edit_menu_name_btn" value="Update">
                        <span style="color:green;" id="mresult_<?=$v3['id']?>"></span>
                        </span>
						</form>  
					   </div>
				   	   </div>
				   	 	<?php if(is_array($v3['sub_menu'])){ ?>
						   <ol>
						   <?php foreach($v3['sub_menu'] as $k4=>$v4){?>
						   <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_<?=$v4['id']?>">
							   <div class="menuDiv">
							   <span title="Click to show/hide menu" class="disclose ui-icon ui-icon-minusthick">
							   <span></span>
							   </span>
							   <span title="Update menu" data-id="<?=$v4['id']?>" class="expandEditor ui-icon ui-icon-pencil">
							   <span></span>
							   </span>

							   <span>
							   <span data-id="<?=$v4['id']?>" class="itemTitle"><?=$v4['name']?></span>
							   <span title="Click to delete menu" data-id="<?=$v4['id']?>" data-url="{{url('website/delete_menu/'.$v4['id'])}}" class="delete_menu deleteMenu ui-icon ui-icon-closethick">
							   <span></span>
							   </span>
							   </span>
							   <div id="menuEdit<?=$v4['id']?>" class="menuEdit" style="display: none">
                               <form method="post" id="edit_menu_name_form<?=$v4['id']?>" action="{{url('website/edit_menu/'.$v4['id'])}}" enctype="multipart/form-data" style="margin-bottom:0px">
								<span class="Span2"><strong>Title:</strong></span>
								<span class="Span10">
								<input type="text" name="title" placeholder="Menu Title" id="title_<?=$v4['id']?>" value="<?=$v4['title']?>">
								</span>
								<br clear="all">
								<span class="Span2"><strong>Name:</strong></span>
								<span class="Span10">
									<input type="text" name="name" placeholder="Menu Name" id="menu_<?=$v4['id']?>" value="<?=$v4['name']?>">
								</span>
								<br clear="all">
								<span class="Span2"><strong>Page Link:</strong></span>
								<span class="Span8">
									<input type="text" name="custom_link" id="custom_link1_<?=$v4['id']?>" value="<?=$v4['custom_link']?>" class="span7 custom_link" placeholder="Page Link" />
								<a href="javascript:opendialog4(<?=$v4['id']?>)">
									<i class="fa fa-search" title="Select" style="font-size: 20px"></i>
								</a>
								</span>
								
								<br clear="all">
								<span class="Span2"><strong>Enable:</strong></span>
								<span class="Span10">
									<input type="radio" name="is_enable" id="is_enable_<?=$v4['id']?>" value="Y"<?php if($v4['enable']=='Y'){?> checked <?php } ?>>Yes
									<input type="radio" name="is_enable" id="is_enable_<?=$v4['id']?>" value="N"<?php if($v4['enable']=='N'){?> checked <?php } ?>>No
								</span>
								<br clear="all">
								<span style="margin-top:10px">
                                <input type="submit" data-mid="<?=$v4['id']?>" class="btn btn-primary btn-xs btn-flat btn-mini edit_menu_name_btn" value="Update">
                                <span style="color:green;" id="mresult_<?=$v4['id']?>"></span>
                                </span>
								</form> 
							    </div>
								</div>
								<?php if(is_array($v4['sub_menu'])){ ?>
									<ol>
									<?php foreach($v4['sub_menu'] as $k5=>$v5){?>
									<li style="display: list-item;" class="mjs-nestedSortable-leaf" id="menuItem_<?=$v5['id']?>">
									   <div class="menuDiv">
									   <span title="Click to show/hide menu" class="disclose ui-icon ui-icon-minusthick">
									   <span></span>
									   </span>
									   <span title="Update menu" data-id="<?=$v5['id']?>" class="expandEditor ui-icon ui-icon-pencil">
									   <span></span>
									   </span>
									   <span>
									   <span data-id="<?=$v5['id']?>" class="itemTitle"><?=$v5['name']?></span>
									   <span title="Click to delete menu" data-id="<?=$v5['id']?>" data-url="{{ url('website/delete_menu/'.$v5['id']) }}" class="delete_menu deleteMenu ui-icon ui-icon-closethick">
									   <span></span>
									   </span>
									   </span>
										<div id="menuEdit<?=$v5['id']?>" class="menuEdit" style="display: none">
										<form method="post" id="edit_menu_name_form<?=$v5['id']?>" action="{{ url('website/edit_menu/'.$v5['id']) }}" enctype="multipart/form-data" style="margin-bottom:0px">
											<span class="Span2"><strong>Title:</strong></span>
											<span class="Span10">
												<input type="text" name="title" placeholder="Menu Title" id="title_<?=$v5['id']?>" value="<?=$v5['title']?>">
											</span>
											<br clear="all">
											<span class="Span2"><strong>Name:</strong></span>
											<span class="Span10">
												<input type="text" name="name" placeholder="Menu Name" id="menu_<?=$v5['id']?>" value="<?=$v5['name']?>">
											</span>
											<br clear="all">
											<span class="Span2"><strong>Page Link:</strong></span>
											<span class="Span8">
												<input type="text" name="custom_link" id="custom_link1_<?=$v5['id']?>" value="<?=$v5['custom_link']?>" class="span7 custom_link" placeholder="Page Link" />
												<a href="javascript:opendialog1(<?=$v5['id']?>)">
													<i class="fa fa-search" title="Select" style="font-size: 20px"></i>
												</a>
											</span>
											<span class="Span2" style="cursor:pointer"><i class="fa fa-search"></i></span>
											<br clear="all">
											<span class="Span2"><strong>Enable:</strong></span>
											<span class="Span10">
												<input type="radio" name="is_enable" id="is_enable_<?=$v5['id']?>" value="Y"<?php if($v5['enable']=='Y'){?> checked <?php } ?>>Yes
												<input type="radio" name="is_enable" id="is_enable_<?=$v5['id']?>" value="N"<?php if($v5['enable']=='N'){?> checked <?php } ?>>No
											</span>
											<br clear="all">
											<span style="margin-top:10px">
                                            <input type="submit" data-mid="<?=$v5['id']?>" class="btn btn-primary btn-xs btn-flat btn-mini edit_menu_name_btn" value="Update">
                                            <span style="color:green;" id="mresult_<?=$v5['id']?>"></span>
                                            </span>
										</form>
										</div>
										</div>
									</li>
									<?php } ?>
									</ol>
  								 <?php } ?>
   								</li>
   								<?php } ?>
	   							</ol>
	   							<?php } ?>
	   							
		   					</li>
		   					<?php } ?>
			   				</ol>
			   				<?php } ?>
			   				
			   			</li>
			   			<?php } ?>
			   			</ol>
			   			<?php } ?>
			   			
		   			</li>
		   		<?php } ?>
		   		<br/>
              <div id="result_<?=$v['id']?>"></div>
              <button type="button" name="toArray" id="toArray1_<?=$v['id']?>" data-url="{{ url('website/update_menu_order/'.$v['id']) }}" class="btn btn-sm btn-flat btn-success" title="Update menu order">Update Order</button>	
              <button type="button" name="delete_menu_set" id="delete_menu_set" class="btn btn-sm btn-flat btn-danger delete_menu_set" data-url="{{ url('website/delete_menu_set/'.$v['id']) }}" title="Delete menu set"><i class="fa fa-trash"></i></button>	
                
                <script>
                            
                
            </script>
                
                
                
                
	   			</ol>
             
             	<?php } else{ ?>
                 <div style="padding:5px">
				  <p>!! No menus. Add menu on this menu set</p>

                  <button type="button" name="delete_menu_set" id="delete_menu_set" class="btn btn-sm btn-flat btn-danger" onClick="delete_set(<?=$v['id']?>)" title="Delete menu set"><i class="fa fa-trash"></i></button>	
                 </div>
             	<?php } ?>
                          
                        </div>
                      </div>
                    
                    </div>
                    
                    <?php } }else{?>
                    	<div class="card">
                    	<div class="card-header" id="heading-2">
                        <h5 class="mb-0">
                          <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                            You have't a menu set. Create and add menus to them.
                          </a>
                        </h5>
                      </div>
                      <div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="heading-2">
                        <div class="card-body" style="padding:15px">
                          You have no menus! First create a menu set and than add menus to them.
                        </div>
                      </div>
                    
                    </div>
                    
                    <?php } ?>
    
                  </div>
                  
              </div>
              
              
            <div class="col-md-6">
              
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Create Menu Set</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">Add Menu</a></li>
            
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
             <form id="create_menu_set_form" action="{{ url('website/create_menu_set') }}" method="post">
               <div class="row">
                <div class="form-group col-md-8">
                <input class="form-control" id="menu_set_name" name="menu_set_name" type="text" required placeholder="Menu set name" data-msg-required="Menu set name is required">
                </div>
                
                <div class="form-group col-md-12">
                <button class="btn btn-primary btn-flat btn-sm create_menu_set_btn" type="submit" name="create_menu_set">Create Menu Set </button>
                </div>
               </div>
                </form>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
             
              <form id="add_menu_form" action="{{ url('website/add_menu') }}" method="post">
              <div class="row">
              <div class="form-group col-md-8">
                        
                <select class="form-control" name="menu_set_id" id="menu_set_id" required data-msg-required="Please select menu set" >
                <option value="">Select Menu Set</option>
                <?php if(!empty($menu_set_list)){
                    foreach($menu_set_list as $mset){ ?>
                    <option value="<?=$mset['id']?>"><?=$mset['name']?></option>
                <?php } } ?>
                </select>
                </div>
                
                <div class="form-group col-md-8">      
                    <input class="form-control" id="menu_title" name="menu_title" type="text" placeholder="Menu Title" data-msg-required="Please enter title" required >
                </div>
                <div class="form-group col-md-8">
                    <input class="form-control" id="menu_heading" name="menu_heading" type="text" required placeholder="Menu Heading" data-msg-required="Please enter heading" required>
                </div>
                
                
                <div class="form-group col-md-8"> 
                        
                    <input type="text" name="custom_link" id="custom_link1" class="form-control custom_link" placeholder="Page Link" />
                    <a href="javascript:opendialog()">
                    <i class="fa fa-search" title="Select" style="font-size: 25px"></i>
                    </a>
                </div>
                
                <div class="form-group col-md-12">
                    <button class="btn btn-primary btn-flat btn-sm add_menu_btn" type="submit" name="add_menu">Add Menu </button>
                </div>
              </div>
                </form>
              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>
              
              
              	 
              </div>
    		



</div>

