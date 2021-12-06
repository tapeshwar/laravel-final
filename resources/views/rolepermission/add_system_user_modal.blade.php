
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
                <form id="add_system_user_form" action="{{url('rolepermission/store_system_user')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="row">
                        @csrf
                    
                        <div class="col-sm-12">
                            <label class="control-label">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" required data-msg-required="Module name is required">  
                        </div>


                        <div class="col-sm-12">
                            <label class="control-label">User Name:</label>
                            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="User name" required data-msg-required="User name is required">
                        </div>

                        <div class="col-sm-12">
                            <label class="control-label">Email:</label>
                            <input type="text" name="user_email" class="form-control" placeholder="User Email" required data-msg-required="User Email is required">
                        </div>

                        <div class="col-sm-12">
                            <label class="control-label">Mobile:</label>
                            <input type="text" name="user_mobile" class="form-control" placeholder="User Mobile" required data-msg-required="User mobile is required">
                        </div>


                        <div class="col-sm-12">
                            <label class="control-label">Roles:</label>
                            <select class="form-control" name="user_role">
                                <option>Select</option>
                                <?php foreach($roles as $val){ ?>
                                    <option value="<?=$val->id?>"><?=$val->name?></option>
                                <?php } ?>
                            </select>
                        </div>

                    <div class="col-md-12 mt20">
                               
                        <button type="submit" class="btn btn-primary btn-md btn-flat store_system_user_btn">Submit</button>
                        
                    </div>
         
                </div>
                </form>

            </div>
        </div>
    </div>
</div>