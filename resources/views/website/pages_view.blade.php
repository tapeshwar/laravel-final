
<div class="row"> 

    <div class="col-md-5">
        <form action="" method="GET" role="search">
           <!--  @csrf -->
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="{{ app('request')->input('q') }}"
                    placeholder="Enter page heading"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
                
            </div>
            
        </form>
    </div>
    <div class="col-md-1"><a href="{{ url('website/pages')}}" class="btn btn-md btn-default">Reset</a></div>

    <div class="col-md-6">
        <a href="{{ url('website/create_page') }}" class="btn btn-sm btn-flat btn-primary pull-right">New Page</a>
    </div>



    <div class="col-lg-12 mt20">
  
    <?php //echo $this->pagination->create_links(); ?>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr>
            <th width="3%">#</th>
           
            <th width="20%">PAGE NAME</th>
            <th width="20%">PAGE HEADING</th>
            <th width="20%">PAGE STATUS</th>
            <th width="17%">ACTIONS</th>
          </tr>
        </thead>

        <tbody>
          <?php
         
          $i = $i = ($pages->perPage() * ($pages->currentPage() - 1)) + 1;
          if (!empty($pages)) {
            foreach ($pages as $page) {
          ?>
              <tr>
                <td><?php echo $i?></td>
                <td><?= $page->title ?></td>
                <td>
                <?= $page->heading ?>
                </td>
                <td> <?= $page->enable ?></td>
               
                <td>
                  <a href="{{ url('website/edit_page/' . $page->id) }}" class="btn btn-primary btn-sm btn-flat create_product_category"><i class="fa fa-edit" title="Edit"></i></a>
                  <a href="javascript:void(0)" data-url="{{ url('product/delete_page/'.$page->id) }}" class="btn btn-danger btn-sm btn-flat delete_page " title="Delete"><i class="fa fa-trash"></i></a>

                </td>
              </tr>
          <?php $i++;
            }
          } else{?>
              <tr><td colspan="6">No Result Found..</td></tr>
          <?php } ?>

        </tbody>
      </table>
      {{ $pages->links() }}
      <?php //echo $this->pagination->create_links() ?>
    

    </div>

</div>

