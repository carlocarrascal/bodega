
<div class="row">
	<div class="col-lg-12">
		<h4 class="page-header">Relationships</h4>
	</div>
</div>
 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Company</button>
                </div>
                 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" method="post" action="<?php echo base_url();?>relationships/create">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">New Company</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input class="form-control" name="name" id="name">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Company Address</label>
                                        <input class="form-control" name="address"  id="address">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input class="form-control" name="contactperson"  id="contactperson">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input class="form-control" name="contactnumber"  id="contactnumber">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Type</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="contacttype" id="contacttype" value="1" checked="">Supplier
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="contacttype" id="contacttype" value="2">Customer
                                        </label>
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
                                <th>Company name</th>
                                <th>Type</th>
                                <th>Phone number</th>
                                <th>Contact Person</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($accounts as $account){?>
                            <tr class="odd gradeX">
                                <td><a href="<?php echo current_url().'/accounts/'.$account->id;?>"><?php echo $account->name;?></td>
                                <td><?php echo $account->address;?></td>
                                <td><?php echo $this->relationship_model->getaccounttype($account->contact_type);?></td>
                                <td class="center"><?php echo $account->contact_number;?></td>
                                <td class="center"><?php echo $account->contact_person;?></td>
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
