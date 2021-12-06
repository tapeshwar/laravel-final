
<div class="row"> 

<div class="col-md-5">
    <form action="" method="GET" role="search">
       <!--  @csrf -->
        <div class="input-group">
            <input type="text" class="form-control" name="q" value="{{ app('request')->input('q') }}"
                placeholder="Search"> <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
            
        </div>
        
    </form>
</div>

<div class="col-md-7">
    <a href="javascript:void(0)" data-url="{{ url('rolepermission/add_system_user') }}" class="btn btn-sm btn-flat btn-primary pull-right add_system_user">Add New User</a>
</div>

<div class="col-lg-12 mt20">


  <table class="table table-responsive table-bordered">
    <thead>
      <tr>
        <th width="3%">#</th>
        <th width="15%">NAME</th>
        <th width="18%">USERNAME/EMAIL</th>
        <th width="5%">MOBILE</th>
        <th width="12%">ROLE</th>
        <th width="4%">STATUS</th>
        <th width="42%">PRIVILEGES</th>
      </tr>
    </thead>

    <tbody>
        
       
      <?php
     
      $i = $i = ($system_users->perPage() * ($system_users->currentPage() - 1)) + 1;
      if (!empty($system_users)) {
        foreach ($system_users as $list) {
      ?>
          <tr>
            <td><?php echo $i?></td>
            <td><?php echo $list->name?></td>
            <td><?= $list->username ?><br><?= $list->email ?></td>
            <td><?= $list->mobile ?></td>
            <td><?= $list->role ?></td>
            <td><input type="checkbox" name="user_status" <?php if($list->active==1){ ?> checked <?php } ?> value="<?=$list->active?>"></td>
            <td>
              <a href="{{ url('rolepermission/set_privileges/' . $list->id) }}" class="btn btn-sm btn-info btn-flat set_privileges"><i class="fa-universal-access mr5" title="Manage Privileges"> Manage Privileges</i></a>
              <a href="{{ url('rolepermission/set_privileges/' . $list->id) }}" class="btn btn-sm btn-info btn-flat set_privileges"><i class="fa-universal-access mr5" title="Manage Privileges"> Reset Privileges</i></a>
              <a href="{{ url('rolepermission/set_privileges/' . $list->id) }}" class="btn btn-sm btn-info btn-flat set_privileges"><i class="fa-universal-access mr5" title="Manage Privileges"> Reset Password</i></a>
              
              <a href="javascript:void(0)" data-url="{{ url('rolepermission/delete_role/'.$list->id) }}" class="btn btn-danger btn-sm btn-flat delete_role " title="Delete"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
      <?php 
        $i++;
        }
      } else{?>
          <tr><td colspan="6">No Result Found..</td></tr>
      <?php } ?>
        
    </tbody>
  </table>
 
  {{ $system_users->links() }} 


</div>

</div>

