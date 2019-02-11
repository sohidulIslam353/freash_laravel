@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
       <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12 bg-info">
                <h4 class="pull-left page-title text-white">POS (Point of Sale) </h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#" class="text-white">Echovel</a></li>
                    <li class="text-white">{{ date('d/m/y') }}</li>
                </ol>
            </div>
        </div><br>
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="portfolioFilter">
            	@foreach($categories as $row)
                <a href="#" data-filter="*" class="current">{{ $row->cat_name }}</a>
               @endforeach
            </div>
        </div>
       </div>
        <br>
        <div class="row">
        	<div class="col-lg-4">
        		<div class="panel">
        			<h4 class="text-info">Customer
        				<a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>
        			</h4>
        			<select class="form-control">
        				<option disabled="" selected="">select customer</option>
        				@foreach($customer as $row)
        				<option>{{ $row->name }}</option>
        				@endforeach
        			</select>
        	</div>
        	   <div class="price_card text-center">     
                    <ul class="price-features" style="border:1px solid grey;">
                       <table class="table">
                       	<thead class="bg-info">
                       		<tr>
                       			<th class="text-white">Name</th>
                       			<th class="text-white">Qty</th>
                       			<th class="text-white">single price</th>
                       			<th class="text-white">Sub Total</th>
                       			<th class="text-white">Action</th>
                       		</tr>
                       	</thead>
                       	<tbody>
                       		<tr>
                       			<th>Rospa Tyer</th>
                       			<th><input type="text" name="" value="2" style="width:30px;" ></th>
                       			<th>2200</th>
                       			<th>4400</th>
                       			<th><i class="fas fa-trash-alt"></i></th>
                       		</tr>
                       	</tbody>
                       </table>
                        
                    </ul>
                    <div class="pricing-footer bg-primary">
                    	<p style="font-size: 19px;"> Quantity: 2</p>
                    	<p style="font-size: 19px;"> vat:0.0</p>
                    	<hr>
                       <p><h2 class="text-white">Total:</h2> <h1 class="text-white">4400.00</h1></p>

                    </div>
                 <button class="btn btn-success"> Create Invoice</button>
                </div>
        	</div>


        	<div class="col-lg-8">
        		   <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Product Code</th>
                      </tr>
                  </thead>
                  <tbody>
                  	@foreach($product as $row)
                      <tr>
                      	 <td>
                      	 	<a href="#" style="font-size: 20px;"><i class="fas fa-plus-square"></i></a>
                      		<img src="{{ URL::to($row->product_image) }}" width="60px" height="60px">
                      	 </td>
                         <td>{{ $row->product_name }}</td>
                         <td>{{ $row->cat_name }}</td>
                         <td>{{ $row->product_code }}</td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
        	</div>
        </div>
        </div> <!-- container -->             
    </div> <!-- content -->
</div>


<!--customer add modal-->
<form>

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title text-white">Add a New Customer</h4> 
            </div> 
            <div class="modal-body">             
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Name</label> 
                            <input type="text" class="form-control" id="field-4" name="name" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Email</label> 
                            <input type="email" class="form-control" id="field-5" name="email" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Phone</label> 
                            <input type="text" class="form-control" id="field-6" name="phone" required=""> 
                        </div> 
                    </div> 
                </div> 
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Address</label> 
                            <input type="text" class="form-control" id="field-4" name="address" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Shopname</label> 
                            <input type="text" class="form-control" id="field-5" name="shopname" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">City</label> 
                            <input type="text" class="form-control" id="field-6" name="city" required=""> 
                        </div> 
                    </div> 
                </div> 
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Account Number</label> 
                            <input type="text" class="form-control" id="field-4" name="account_number" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Account Holder</label> 
                            <input type="text" class="form-control" id="field-5" name="account_holder" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Bank Name</label> 
                            <input type="text" class="form-control" id="field-6" name="bank_name" required=""> 
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Bank Branch</label> 
                            <input type="text" class="form-control" id="field-4" name="bank_branch" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                           <img id="image" src="#" />
                            <label for="exampleInputPassword11">Photo</label>
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Photo</label> 
                            <input type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                        </div> 
                    </div> 
                </div>  
              
            </div> 
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button> 
            </div> 
        </div> 
    </div>
</div><!-- /.modal -->
</form>

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
