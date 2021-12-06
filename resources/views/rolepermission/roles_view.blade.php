
<div class="row"> 

<div class="col-md-5">
    <form action="" method="GET" role="search">
       <!--  @csrf -->
        <div class="input-group">
            <input type="text" class="form-control" name="q" value="{{ app('request')->input('q') }}"
                placeholder="Enter module"> <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
            
        </div>
        
    </form>
</div>

<div class="col-md-7">
    <a href="{{ url('rolepermission/add_role') }}" class="btn btn-sm btn-flat btn-primary pull-right add_roles">Add Role</a>
</div>

<div class="col-lg-12 mt20">

<?php //echo $this->pagination->create_links(); ?>
  <table class="table table-responsive table-bordered">
    <thead>
      <tr>
        <th width="3%">#</th>
       
        <th width="40%">ROLE NAME</th>
        <th width="57%">ACTIONS</th>
      </tr>
    </thead>

    <tbody>
        
       
      <?php
     
      //$i = $i = ($modules->perPage() * ($modules->currentPage() - 1)) + 1;
      if (!empty($roles)) {
        foreach ($roles as $list) {
      ?>
          <tr>
            <td><?php echo $list->id; //echo $i?></td>
            <td><?= $list->name ?></td>
           
            <td>
              <a href="{{ url('rolepermission/set_privileges/' . $list->id) }}" class="btn btn-sm btn-info btn-flat set_privileges"><i class="fa-universal-access mr5" title="Manage Privileges"> Manage Privileges</i></a>
              <a href="javascript:void(0)" data-url="{{ url('rolepermission/edit_role/' . $list->id) }}" class="btn btn-primary btn-sm btn-flat edit_role"><i class="fa fa-edit" title="Edit"></i></a>
              <a href="javascript:void(0)" data-url="{{ url('rolepermission/delete_role/'.$list->id) }}" class="btn btn-danger btn-sm btn-flat delete_role " title="Delete"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
      <?php 
        //$i++;
        }
      } else{?>
          <tr><td colspan="6">No Result Found..</td></tr>
      <?php } ?>
        
    </tbody>
  </table>
 
  {{ $roles->links() }} 


</div>

</div>

