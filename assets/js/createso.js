

//adds extra table rows
var i=$('table tr').length;
$(".addmore").on('click',function(){
	addNewRow();
});

$(document).on('keypress', ".addNewRow", function(e){
	var keyCode = e.which ? e.which : e.keyCode;
	if(keyCode == 9 ) addNewRow();
});

var readonly = $('#readonly').val();

var addNewRow = function(id){
	html = '<tr id="tr_'+i+'">';
	html += '<td><input class="case" id="caseNo_'+i+'" type="checkbox"/></td>';
	html += '<td class="prod_c"><input type="text" data-type="productCode" name="data[InvoiceDetail]['+i+'][product_id]" id="itemNo_'+i+'" class="form-control autocomplete_txt" autocomplete="off">';
	html +='<span class="add_icon hide" id="add_icon_'+i+'"> <i class="fa fa-plus-circle"></i></span>';
	html +='</td>';

	html += '<td><input type="text" data-type="productName" name="data[InvoiceDetail]['+i+'][productName]"  id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input '+readonly+' type="text" name="data[InvoiceDetail]['+i+'][onhand]" id="onhand_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input '+readonly+' type="text" name="data[InvoiceDetail]['+i+'][avail]" id="avail_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input '+readonly+' type="text" name="data[InvoiceDetail]['+i+'][price]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';

	html += '<td><input type="text" name="data[InvoiceDetail]['+i+'][quantity]" id="quantity_'+i+'" class="form-control changesNo quanyityChange" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">';
	html += '<input type="hidden" id="stock_'+i+'"/>';
	html += '<input type="hidden" id="stockMaintainer_'+i+'" name="data[InvoiceDetail]['+i+'][stockMaintainer]" />';
	html += '<input type="hidden" id="previousQuantity_'+i+'"/>';
	html += '<input type="hidden" id="invoiceDetailId_'+i+'"/>';
	html += '</td>';
	html += '<td><input type="text" id="total_'+i+'" class="form-control totalLinePrice addNewRow" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '</tr>';

	if( typeof id !== "undefined"){
		$('#tr_'+id).after(html);
	}else{
		$('table').append(html);
	}




	console.log(id);

	$('#caseNo_'+i).focus();

	i++;
}

//to check all checkboxes
$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false);
	calculateTotal();
});


$(document).on('blur','.autocomplete_txt',function(){
	//$('.add_icon').addClass('hide');
});

$(document).on('click','.add_icon',function(){
	var add_icon_id = $(this).attr('id');
	var add_icon_arr = add_icon_id.split("_");
	var icon_id = add_icon_arr[add_icon_arr.length-1];
	addNewRow(icon_id);
});


//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
	type = $(this).data('type');


	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	element_id = id[id.length-1];

	if(type =='productCode' ){
		autoTypeNo=0;
		$('#add_icon_'+element_id).removeClass('hide');
	}
	if(type =='productName' )autoTypeNo=1;

	$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : '../variants/ajax_all',
				dataType: "json",
				method: 'post',
				data: {
				   sku: request.term,
				   type: type
				},
				success: function( data ) {
					//alert(data);
					if(!data.length && readonly != 'readonly'){

						$('#product_code_modal').val( $('#itemNo_'+element_id).val() );
						$('#product_name_modal').val( $('#itemName_'+element_id).val());

						$('#current_element_id').val(element_id);

						$('#add_product_form').find('.form-group').removeClass('animated fadeIn').addClass('animated fadeIn');
						$('#addNewProduct').modal('show');

						/*var result = [
			              {
			            	  label: 'No record found',
			            	  value: ''
			              }
			            ];
			            response(result);*/
					}else{
						 response( $.map( data, function( item ) {
						 	var code = item.split("|");
							return {
								label: code[autoTypeNo],
								value: code[autoTypeNo],
								data : item
							}
						}));
					}
				}
			});
		},
		autoFocus: true,
		minLength: 0,
		select: function( event, ui ) {
			if( typeof ui.item.data !== "undefined" ){
				var names = ui.item.data.split("|");

				$('#itemNo_'+element_id).val(names[0]);
				$('#itemName_'+element_id).val(names[1]);
				$('#onhand_'+element_id).val(names[4]);
				$('#avail_'+element_id).val(names[2]);
				$('#quantity_'+element_id).val(1);
				$('#stockMaintainer_'+element_id).val(1);
				$('#price_'+element_id).val(names[3]);
				$('#stock_'+element_id).val(names[2]);
				$('#total_'+element_id).val( parseFloat(1*names[3]).toFixed(2) );

			}else{
				return false;
			}
			calculateTotal();
		}
	});
});





// blur
//price change
$(document).on('keyup','.changesNo',function(){
	id_arr = $(this).attr('id');
	id = id_arr.split("_");

	if($(this).hasClass("quanyityChange")){
		quanity = parseInt( $(this).val() );
		stock = parseInt( $('#stock_'+id[1]).val() );

		if(!isNaN(quanity) && !isNaN(stock)){



			invoiceDetailId = $.trim( $('#invoiceDetailId_'+id[1]).val() );
			if(invoiceDetailId == ''){

				if(quanity > stock){
					$(this).val( stock )
					alert('Available Quanity is '+ stock + " So not allowed more than that.");
					quanity = stock;
				}


				$('#stockMaintainer_'+id[1]).val( quanity );
				$('#previousQuantity_'+id[1]).val( 0 );
			}else{
				previousQuantity = parseInt( $('#previousQuantity_'+id[1]).val() );
				console.log(stock + previousQuantity);
				if(  quanity > ( stock + previousQuantity) ){
					$(this).val( previousQuantity + stock )
					alert('Available Quanity is '+ stock + " So not allowed more than that.");
					quanity = stock;
				}
				$('#stockMaintainer_'+id[1]).val( quanity - previousQuantity );
			}

		}



	}


	quantity = $('#quantity_'+id[1]).val();
	price = $('#price_'+id[1]).val();
	if( quantity!='' && price !='' ) $('#total_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );
	calculateTotal();
});

$(document).on('change keyup blur','#tax',function(){
	calculateTotal();
});

//total price calculation
function calculateTotal(){
	subTotal = 0 ; total = 0;
	$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#subTotal').val( subTotal.toFixed(2) );
	tax = $('#tax').val();
	if(tax != '' && typeof(tax) != "undefined" ){
		taxAmount = subTotal * ( parseFloat(tax) /100 );
		$('#taxAmount').val(taxAmount.toFixed(2));
		total = subTotal + taxAmount;
	}else{
		$('#taxAmount').val(0);
		total = subTotal;
	}
	$('#totalAftertax').val( total.toFixed(2) );
	calculateAmountDue();
}

$(document).on('change keyup blur','#amountPaid',function(){
	calculateAmountDue();
});

//due amount calculation
function calculateAmountDue(){
	amountPaid = $('#amountPaid').val();
	total = $('#totalAftertax').val();
	if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
		amountDue = parseFloat(total) - parseFloat( amountPaid );
		$('.amountDue').val( amountDue.toFixed(2) );
	}else{
		total = parseFloat(total).toFixed(2);
		$('.amountDue').val( total );
	}
}


//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8,46); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    if(keyCode == 9 )return true;
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}

//datepicker
$(function () {
    $('#invoiceDate').datepicker({});
});

$('#invoice-form').submit(function() {
	/*$( ".txt" ).each( function( index, element ){
		newText = $(this).val();
		$(this).val( newText.replace(/\r?\n/g, '<br />') );
	});*/
});


$('.submit_btn').on('click', function(){
	$(this).button('loading');
});

$(document).ready(function(){
	$('.currency').html( $('#currency').val() );
	});

$('#clientCompanyName').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : '../relationships/ajax_all',
			dataType: "json",
			method: 'post',
			data: {
				name_startsWith: request.term,
				type: 'customerName'
			},
			success: function( data ) {

				if(!data.length){
					var result = [
		              {
		            	  label: 'No Client found',
		            	  value: ''
		              }
		            ];
		            response(result);
				}else{
					response( $.map( data, function( item ) {
						var code = item.split("|");
							return {
								label: code[0],
								value: code[0],
								data : item
							}
						}));
					}
				}



			});
	},
	autoFocus: true,
	minLength: 1,
	select: function( event, ui ) {
		if( typeof ui.item.data !== "undefined" ){
			var names = ui.item.data.split("|");
			$(this).val(names[0]);
			$("#clientAddress").html(names[1]);
			$('#client_id').val( names[0] );
		}else{
			return false;
		}

	}
});
function getClientAddress(id){

	 $.ajax({
		 url: "ajax.php",
		 method: 'post',
		 data:{id:id, type:'clientAddress'},
		 success: function(result){
	        $("#clientAddress").html(result);
	    }
	 });
}


$(document).ready(function(){

	/*$("#add_product_form").validate({
		submitHandler : function(form) {
			$('#add_new_product_btn').attr('disabled','disabled');
			$('#add_new_product_btn').button('loading');
			save_new_product();
			return false;
		},
		rules : {
			product_code_modal : {
				required : true
			},
			product_name_modal : {
				required : true
			},
			product_description_modal : {
				required : true
			},
			quantity_modal : {
				required : true,
				 digits: true
			},
			buy_price_modal : {
				required : true,
				number: true
			},
			mrp_modal : {
				required : true,
				number: true
			}
		},
		messages : {
			product_code_modal : {
				required : "Please enter product code"
			},
			product_name_modal : {
				required : "Please enter product name"
			},
			product_description_modal : {
				required : "Please enter product description"
			},
			quantity_modal : {
				required : "Please enter product quantity",
				digits: "Product quantity must be whole number"
			},
			buy_price_modal : {
				required : "Please enter product buy price",
				number: "Product buy price must be number"
			},
			mrp_modal : {
				required : "Please enter product mrp price",
				number: "Product mrp price must be number"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div.form-group').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div.form-group').removeClass('has-error').addClass('has-success');
			 $(element).closest('div.form-group').find('.help-block').html('');
		}
	});*/


});


$(document).on('click', '#add_new_product_btn', function(){

	if(!$('#add_product_form').valid()){
		return false;
	}else{
		save_new_product();
	}
});

var save_new_product = function(){

	$('#add_new_product_btn').button('loading');

	data = {
			productCode : $('#product_code_modal').val(),
			productName : $('#product_name_modal').val(),
			productDescription : $('#product_description_modal').val(),
			quantityInStock : $('#quantity_modal').val(),
			buyPrice : $('#buy_price_modal').val(),
			mrp : $('#mrp_modal').val()
	}


	$.ajax({
		 url: "ajax.php",
		 dataType: "json",
		 method: 'post',
		 data: {
			data : data,
			type: 'saveNewProduct'
		 },
		 success: function(result){
	        if( (typeof result.success !== "undefined") && result.success ){

	        	$("html, body").animate({ scrollTop: 0 }, "slow");
	        	$('#add_new_product_btn').button('reset');

	        	$('#addNewProduct').modal('hide');
	        	element_id = $('#current_element_id').val();
				$('#itemNo_'+element_id).val($('#product_code_modal').val());
				$('#itemName_'+element_id).val( $('#product_name_modal').val() );
				$('#quantity_'+element_id).val(1);
				$('#stockMaintainer_'+element_id).val(1);
				$('#price_'+element_id).val($('#buy_price_modal').val());
				$('#stock_'+element_id).val($('#quantity_modal').val());
				$('#total_'+element_id).val( 1* ($('#buy_price_modal').val() ) );
				calculateTotal();

				$('#add_product_form')[0].reset();
				$('#add_product_form').find("div.form-group").removeClass('has-success');
				$('#message_h1').show();
	        	message('success', PRODUCT_ADD_SUCCESS);
	        }else{
	        	message('fail', PRODUCT_ADD_FAIL);
	        }
	    }
	 });


}


$(document).ready(function(){
	/*$("#emailForm").validate({
		submitHandler : function(form) {
			$('#email_btn').attr('disabled','disabled');
			$('#email_btn').button('loading');

			return false;
		},
		rules : {
			invoiceEmail : {
				required : true,
				email: true
			}
		},
		messages : {
			invoiceEmail : {
				required : "Please enter email"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});*/
});


$(document).on('click','.printEmail', function(){
	uuid = $(this).data('uuid');
	$('#email_btn').button('reset');
	$('#emailModal').modal('show');
	$('#invoiceUuid').val( uuid );
});


$(document).on('click', '#email_btn',function(){

	if($('#emailForm').valid()){
		$(this).button('loading');
		email = $('#invoiceEmail').val();
		uuid  = $('#invoiceUuid').val();
		$.ajax({
			url : 'ajax.php',
			dataType: "json",
			method: 'post',
			data: {
				 email: email,
				 uuid : uuid,
				 type: 'sendEmail'
			},
			success: function( data ) {
				 $('#email_btn').button('reset');
				 $('#emailModal').modal('hide');
				 $('#successEmail').modal('show');

			}
		});
	}

});

//test