
<div class="row">
	<div class="col-lg-12">
		<h4 class="page-header">Inventory / Products</h4>
	</div>
</div>
<div class="row">
  <div class="col-lg-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-briefcase fa-fw"></i> <?php echo $products->name;?>
            <div class="pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle">
                          Add Packages 
                    </button>
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle">
                        Add Variants
                    </button>
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        Actions
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Action</a>
                        </li>
                        <li><a href="#">Another action</a>
                        </li>
                        <li><a href="#">Something else here</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <p>Name: <?php echo $products->name;?></p>
          <p>Description: <?php echo $products->desc;?></p>
          <div class="dataTable_wrapper">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <th>Sku</th>
                          <th>Buy Price</th>
                          <th>Retail Price</th>
                          <th>On Hand</th>
                          <th>Available</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach($variants as $variant){?>
                      <tr class="odd gradeX">
                          <td><?php echo $variant->sku;?></td>
                          <td><?php echo $variant->buy_price;?></td>
                          <td><?php echo $variant->retail_price;?></td>
                          <td class="center"><?php //echo $account->contact_number;?></td>
                          <td class="center"><?php //echo $account->contact_person;?></td>
                      </tr>
                      <?php }?>
                      
                     
                  </tbody>
              </table>
          </div>
        </div>
        <!-- /.panel-body -->
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel panel-default">
      <div class="panel-heading">
          <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
          <div class="pull-right">
              <div class="btn-group">
                  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                      Actions
                      <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="#">Action</a>
                      </li>
                      <li><a href="#">Another action</a>
                      </li>
                      <li><a href="#">Something else here</a>
                      </li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        
          
      </div>
      <!-- /.panel-body -->
  </div>
  </div>
</div>