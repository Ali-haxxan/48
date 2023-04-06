<!DOCTYPE html>
<html lang="en">
  @include('User/head')
<div class="wrapper">
  <?php
    $i = 1;
    ?>

   <!-- Navbar -->
   @include('User/navbar')
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   @include('User/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>Dispatched Items</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card ">
              <div class="card-header ">
                <h3 class="card-title">Dispatched Items</h3>
              </div>
              <div class="justify-content-center">
                @if (Session::get('success'))
                <div class=" alert alert-success col-9 col-sm-9 col-md-9 mx-3 mt-3" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                  {{ Session::get('success') }}
                </div>
                @endif
                @if (Session::get('fail'))
                  <div class=" alert alert-danger col-9 col-sm-9 col-md-9 mx-3 mt-3" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                    {{ Session::get('fail') }}
                  </div> 
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body col-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr.</th>
                      <th>Item Name</th>
                      <th>Item Image</th>
                      <th>Item No.</th>
                      <th>Seller Id</th>
                      <th>Seller mail</th>
                      <th>Item Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ProductDispatched as $product)
                    <tr>
                      <td class="text-center" >{{$i++}} </td>
                      <td class="text-center" >{{$product->product_name}}</td>
                      <td><img  src="{{asset($product->low_qual_img)}}" alt="img" ></td>
                      <td class="text-center" >{{$product->product_unique_id}}</td>
                      <td class="text-center" >{{$product->username}}</td>
                      <td class="text-center" >{{$product->email}}</td>
                      <td>{{$product->status}}</td>
                      <td>
                          <a href="{{route('user.complete.dispatch.order',$product->id) }}">
                            <button class="my-1 btn btn-info"  {{$product->buyer_completed == 1 ? 'disabled' : '' }} {{$product->is_completed == 0 ? 'disabled' : ''}} >{{$product->buyer_completed == 1 ? 'Item Received' : 'Mark as Received'}}</button>
                          </a>
                      </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('User/footer')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    <!-- Add  Modal -->
<div class="modal fade" id="BidModal" tabindex="0" role="dialog" aria-labelledby="BidModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog " role="document">
	  	<div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="BidModalCenterTitle">Please Select Seller Rating</h5>
			
			</div>
			<div class="modal-body">
					<ul id="saveform_errlist"></ul>
					<ul id="success_message"></ul>

					<div class="form-group mb-3">
            <input type="number" class="product_id form-control" hidden/>
						
            <div class="form-group" id="rating-ability-wrapper">
              <label class="control-label" for="rating">
              <span class="field-label-info"></span>
              <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
              </label>
              <h2 class="bold rating-header" style="">
              <span class="selected-rating">0</span><small> / 5</small>
              </h2>
              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                  <i class="fa fa-star" aria-hidden="true"></i>
              </button>
              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                  <i class="fa fa-star" aria-hidden="true"></i>
              </button>
              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                  <i class="fa fa-star" aria-hidden="true"></i>
              </button>
              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                  <i class="fa fa-star" aria-hidden="true"></i>
              </button>
              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                  <i class="fa fa-star" aria-hidden="true"></i>
              </button>
          </div>
					</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary close_bid" data-dismiss="modal">Close</button>
			  <button type="submit" class="savebtn btn btn-primary">Rate</button>
			</div>
		</div>
	</div>
</div>
	   <!--End - Add  Modal -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  	jQuery(document).ready(function($){
	    
      $(".btnrating").on('click',(function(e) {
      
      var previous_value = $("#selected_rating").val();
      
      var selected_value = $(this).attr("data-attr");
      $("#selected_rating").val(selected_value);
      
      $(".selected-rating").empty();
      $(".selected-rating").html(selected_value);
      
      for (i = 1; i <= selected_value; ++i) {
      $("#rating-star-"+i).toggleClass('btn-warning');
      $("#rating-star-"+i).toggleClass('btn-default');
      }
      
      for (ix = 1; ix <= previous_value; ++ix) {
      $("#rating-star-"+ix).toggleClass('btn-warning');
      $("#rating-star-"+ix).toggleClass('btn-default');
      }
      
      }));
      
        
    });
</script>
<script >
  $(document).ready(function () {
    //called when key is pressed in textbox
    $(document).on('click','.ratingbtn', function () {
      // .appendTo("body")
      // console.log('clicked');
      var productId = $(this).val();
      $('.product_id').attr('value',productId)
  
    });
    $(document).on('click','.savebtn',function (e) {
      e.preventDefault();
      var rating = $('#selected_rating').val()
      alert('are you sure to rate '+rating+' star!');
    
      var data = {
                  'product_id': $('.product_id').val(),
                  'rating': rating,
                  }
        
        console.log(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
                $.ajax({
                  type: 'POST',
                  url: '/user/rating-seller',
                  data: data,
                  dataType: 'json',
                  success: function (response) {
            console.log(response);
            
                    if(response.status == 400){
            $('#success_message').html("");
              $('#success_message').removeClass('alert alert-success');
                      $('#saveform_errlist').html("");
                      $('#saveform_errlist').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                      $('#saveform_errlist').append('<li>' + err_value + '</li>');    
                      });
                      
                  }
          else if(response.status == 201){
            $('#success_message').html("");
              $('#success_message').removeClass('alert alert-success');
            $('#saveform_errlist').html("");
                      $('#saveform_errlist').addClass('alert alert-danger');
                      $('#saveform_errlist').append('<li>' + response.errors + '</li>');    
                      
          }
                  else{
            $('#saveform_errlist').html("");
                    $('#saveform_errlist').removeClass('alert alert-danger');
                    $('#BidModal').find('input').val('');
                    $('#saveform_errlist').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                  //   $('#BidModal').modal('hide');
                    $('#BidModal').find('input').val('');
                  }
                  }
                });
    });
  
    //  End Create Model Part ans store to database
  
  
    // Start Add Model Close Button
    
    $(document).on('click','.close_bid', function () {
            $('#saveform_errlist').html("");
            $('#saveform_errlist').removeClass('alert alert-danger');
            $('#success_message').html("");
            $('#success_message').removeClass('alert alert-success');
            $('#BidModal').find('input').val('');
            location.reload(true);
      });
  });
  </script>
  
@include('User/script')
</body>
</html>

