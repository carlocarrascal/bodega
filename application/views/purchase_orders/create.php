
<div class="row">
	<div class="col-lg-12">
		<h4 class="page-header">Purchase Order</h4>
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
                       	<i class="fa fa-floppy-o"></i>
                        Save
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
<div class="container content-invoice">
<form action="/invoice_new/invoice.php" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
<div class="load-animate animated fadeInUp">
<input type="hidden" value="582" name="data[Invoice][id]">
<input type="hidden" value="57044bda4aed7" name="data[Invoice][uuid]">
<div class="row">
	<h1 id="message_h1" class="hide">&nbsp;</h1>
	





<div id="error_message_container" class="message_error message_div1" style="margin-bottom: 10px; display: none;">
<p class="text-center" id="error_message"> Sample Error Message  </p>
</div>

<div id="success_message_container" class="message_success message_div1" style="margin-bottom: 10px; display: none;">
<p class="text-center" id="success_message"> Sample Success Message </p>
</div>

<script>
PRODUCT_DELETE_SUCCESS = 'Product deleted successfully.';
PRODUCT_DELETE_FAIL = 'Product deletion failed, Try again.';
CLIENT_DELETE_SUCCESS = 'Client deleted successfully.';
CLIENT_DELETE_FAIL = 'Client deletion failed, Try again.';

PRODUCT_ADD_SUCCESS = 'Product added successfully.';
PRODUCT_ADD_FAIL = 'Product add failed.';

function message(status, message){
if( status != '' && message != '' ){
if( status == 'success' ){
$('#success_message').html(message);
$('#success_message_container').show();
}else if( status == 'fail' ){
$('#error_message').html(message);
$('#error_message_container').show();
}

$('.message_div1').delay(5000).slideUp(function(){
$('#message_h1').hide()
});
}
}
</script>


	
</div>
	<input id="currency" type="hidden" value="€">
<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<h3>To,</h3>
			<div class="form-group">
			<input name="data[Invoice][clientCompanyName]" value="" type="text" class="form-control ui-autocomplete-input" id="clientCompanyName" placeholder="Company Name" autocomplete="off">
			<span class="text-center text-success help-block"></span>
			<div class="form-group">
			<textarea name="data[Invoice][clientAddress]" class="form-control txt" rows="3" id="clientAddress" placeholder="Your Address"></textarea>
			</div>
			<input type="hidden" value="14" name="data[Invoice][client_id]" id="client_id">
			</div>
		</div>


		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">

		</div>


		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
			
		</div>
		
	</div>
	<div class="row">
		<span class="text-center text-success help-block well"></span>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"></th>
					<th width="15%">Sku</th>
					<th width="28%">Description</th>
					<th width="10%">On Hand</th>
					<th width="10%">Available</th>
					<th width="10%">Price</th>
					<th width="10%">Quantity</th>
					<th width="15%">Total</th>
				</tr>
			</thead>
			<tbody>
																							<tr id="tr_1">
							<td> <input class="case" type="checkbox"> </td>
							<td class="prod_c">
								<input value="" type="text" data-type="productCode" name="data[InvoiceDetail][0][product_id]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off">
								<span class="add_icon hide" id="add_icon_1"> <i class="fa fa-plus-circle"></i></span>
							</td>
							<td><input value="" type="text" data-type="productName" name="data[InvoiceDetail][0][productName]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
							<td><input value="" type="number" name="data[InvoiceDetail][0][onhand]" id="onhand_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
							<td><input value="" type="number" name="data[InvoiceDetail][0][available]" id="avail_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
							<td><input value="" type="number" name="data[InvoiceDetail][0][price]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
							<td>
								<input value="" type="number" name="data[InvoiceDetail][0][quantity]" id="quantity_1" class="form-control changesNo quanyityChange" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
								<input value="" type="hidden" id="stock_1" autocomplete="off">
								<input value="" type="hidden" id="stockMaintainer_1" name="data[InvoiceDetail][0][stockMaintainer]" autocomplete="off">
								<input value="" type="hidden" id="previousQuantity_1" autocomplete="off">
								<input value="" type="hidden" id="invoiceDetailId_1" autocomplete="off">
							</td>
							<td><input value="" type="number" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
						</tr>
			</tbody>
		</table>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<button class="btn btn-danger delete" type="button">- Delete</button>
			<button class="btn btn-success addmore" type="button">+ Add More</button>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<h3>Notes: </h3>
			<div class="form-group">
			<textarea class="form-control txt" rows="5" name="data[Invoice][notes]" id="notes" placeholder="Your Notes"></textarea>
		</div>

		<div class="form-group text-center">
  			<button data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" class="btn btn-success submit_btn invoice-save-btm"> <i class="fa fa-floppy-o"></i>  Save Invoice </button>
  		</div>
		</div>

		
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<span class="form-horizontal">
			<div class="form-group">
				<label for="subTotal" class="col-sm-4 control-label">Subtotal: &nbsp;</label>
				<div class="col-sm-8">
					
					<input value="" type="number" class="form-control" name="data[Invoice][invoice_subtotal]" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
				</div>
			</div>
			<div class="form-group">
				<label for="tax" class="col-sm-4 control-label">Tax: &nbsp;</label>
				<div class="col-sm-8">

					<input value="" type="number" class="form-control" name="data[Invoice][tax]" id="tax" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
					
				</div>
			</div>
			<div class="form-group">
				<label for="taxAmount" class="col-sm-4 control-label">Tax Amount: &nbsp;</label>
				<div class="col-sm-8">
					
					<input value="" type="number" class="form-control" id="taxAmount" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">

				</div>
			</div>
			<div class="form-group">
				<label for="totalAftertax" class="col-sm-4 control-label">Total: &nbsp;</label>
				<div class="col-sm-8">
					
					<input value="" type="number" class="form-control" name="data[Invoice][invoice_total]" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
				</div>
			</div>
			<div class="form-group">
				<label for="amountPaid" class="col-sm-4 control-label">Amount Paid: &nbsp;</label>
				<div class="col-sm-8">
					
					<input value="" type="number" class="form-control" name="data[Invoice][amount_paid]" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
				</div>
			</div>
			<div class="form-group">
				<label for="amountDue" class="col-sm-4 control-label">Amount Due: &nbsp;</label>
				<div class="col-sm-8">
					
					<input value="" type="number" class="form-control amountDue" name="data[Invoice][amount_due]" id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
				</div>
			</div>
		</span>
	</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 bottom-ads">

		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

		</div>
	</div>

</div>
</form>
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

