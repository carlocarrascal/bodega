
<div class="row">
  <div class="col-lg-12">
    <h4 class="page-header">Relationships / Account</h4>
  </div>
</div>
<div class="row">
  <div class="col-lg-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-briefcase fa-fw"></i> 
            <div class="pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" onclick="add_person()">
                          Add Packages 
                    </button>
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" onclick="add_person()">
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
          <p>Name: <?php echo $name; ?></p>
          <p>Address: <?php echo $address; ?></p>
          <p>Contact Number: <?php echo $contact_number; ?></p>
          <p>Email: <?php echo $email; ?></p>
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
                         
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Sku</th>
                          <th>Buy Price</th>
                          <th>Retail Price</th>
                          <th>On Hand</th>
                          <th>Available</th>
                      </tr>
                  </tfoot>
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
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Product Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                  <input type="hidden" name="pid" value="<?php echo $id; ?>">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Sku</label>
                            <div class="col-md-9">
                                <input name="sku" placeholder="sku" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Buy Price</label>
                            <div class="col-md-9">
                                <input name="buy_price" placeholder="Buy Price" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Retail Price</label>
                            <div class="col-md-9">
                                <input name="retail_price" placeholder="Retail Price" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">On Hand</label>
                            <div class="col-md-9">
                                <input name="stock_on_hand" placeholder="Stock on Hand" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
