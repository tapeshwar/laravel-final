
<div class="modal fade" id="myModalHorizontal" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            {{ $heading }} 
            </div>
            <div class="modal-body">
                <form id="add_module_form" action="{{url('rolepermission/store_modules')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="row">
                        @csrf
                    
                        <div class="col-sm-12">
                            <label class="control-label">Module Name:</label>
                            <input type="text" value="" name="module_name" class="form-control" placeholder="Module name" required data-msg-required="Module name is required">
                           
                        </div>
                        <div class="col-sm-12">
                            <label class="control-label">Section:</label>
                            <select class="form-control" name="section_name" id="getControllerName" data-url="{{url('rolepermission/get_controller')}}" onchange="getController(this.value)">
                                <option>Select</option>
                                <?php foreach($sections as $val){ ?>
                                    <option value="<?=$val?>"><?=$val?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-12">
                            <label class="control-label">Controller Name:</label>
                            <input type="text" id="contoller_name" name="controller_name" class="form-control" placeholder="Controller name" required data-msg-required="Controller name is required" readonly>
                        </div>

                        <div class="col-sm-12">
                            <label class="control-label">Method Name:</label>
                            <input type="text" value="" name="method_name" class="form-control" placeholder="Method name" required data-msg-required="Method name is required">
                        </div>


                    <div class="col-md-12 mt20">
                               
                        <button type="submit" class="btn btn-primary btn-md btn-flat store_module_btn">Submit</button>
                        
                    </div>
         
                </div>
                </form>

            </div>
        </div>
    </div>
</div>