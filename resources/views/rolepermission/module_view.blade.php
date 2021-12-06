
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
<div class="col-md-1"><a href="{{ url('rolepermission/module')}}" class="btn btn-md btn-default">Reset</a></div>
<div class="col-md-6">
    <a href="javascript:void(0)" data-url="{{ url('rolepermission/add_modules') }}" class="btn btn-sm btn-flat btn-primary pull-right add_modules">Add Module</a>
</div>

<div class="col-lg-12 mt20">


  <table class="table table-responsive table-bordered">
    <thead>
      <tr>
        <th width="3%">#</th>
       
        <th width="10%">MODULE NAME</th>
        <th width="20%">SECTION NAME</th>
        <th width="20%">CONTROLLER NAME</th>
        <th width="20%">METHOD NAME</th>
        <th width="17%">ACTIONS</th>
      </tr>
    </thead>

    <tbody>
        <form method="post" action="{{ url('rolepermission/reload_modules') }}">
        @csrf
        <!-- <span><button type="submit" class="btn btn-sm btn-flat btn-primary pull-right">Reload Modules</button> </span> -->
      <?php
     
      $i = $i = ($modules->perPage() * ($modules->currentPage() - 1)) + 1;
      if (!empty($modules)) {
        foreach ($modules as $list) {
      ?>
          <tr>
            <td><?php echo $i; //echo $i?></td>
            <td><?= $list->module_name ?></td>
            <td><?= $list->section_name ?></td>
            <td><?= $list->controller_name ?></td>
            <td> <?= $list->method_name ?></td>
           
            <td>
              <a href="javascript:void(0)" data-url="{{ url('rolepermission/edit_module/' . $list->id) }}" class="btn btn-primary btn-sm btn-flat edit_module"><i class="fa fa-edit" title="Edit"></i></a>
              <a href="javascript:void(0)" data-url="{{ url('rolepermission/delete_module/'.$list->id) }}" class="btn btn-danger btn-sm btn-flat delete_module " title="Delete"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
      <?php 
        //$i++;
        }
      } else{?>
          <tr><td colspan="6">No Result Found..</td></tr>
      <?php } ?>
        </form>
    </tbody>
  </table>
 
   {{ $modules->links() }} 


</div>

</div>

