
<div class="row">
    <div class="col-lg-12">
        <h4 class="page-header">Inventory</h4>
    </div>
</div>
 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Products</button>
                </div>
                 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" method="post" action="<?php echo base_url();?>inventory/create">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">New Product</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input class="form-control" name="name" id="name">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Description </label>
                                        <input class="form-control" name="description"  id="description">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Sku</label>
                                        <input class="form-control" name="sku"  id="sku">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Buy Price</label>
                                        <input class="form-control" name="buyprice"  id="buyprice">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Retail Price</label>
                                        <input class="form-control" name="retailprice"  id="retailprice">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Wholesale price</label>
                                        <input class="form-control" name="wholesaleprice"  id="wholesaleprice">
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Product Type</th>
                                <th>Brand</th>
                                <th>Available</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $product){?>
                            <tr class="odd gradeX">
                                <td><a href="<?php //echo current_url().'/accounts/'.$account->id;?>"><?php echo $product->name;?></td>
                                <td><?php echo $product->desc;?></td>
                                <td><?php //echo $this->relationship_model->getaccounttype($account->contact_type);?></td>
                                <td class="center"><?php //echo $account->contact_number;?></td>
                                <td class="center"><?php //echo $account->contact_person;?></td>
                            </tr>
                            <?php }?> 
                            
                           
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
