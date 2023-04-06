<!DOCTYPE html>
<html lang="en">
  @include('User/head')
<div class="wrapper">
  

  

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
            <h1>User Profile</h1>
            
          </div>
          
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">

                 
                  <div class="row">
                    {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                      <!-- small box -->
                      <div class="d-flex justify-content-center row">
                        <h3>Profile Image</h3>
                      </div>
                      <div class=" d-flex justify-content-center">
                        <div class="card col-9 col-sm-9 col-md-10 col-lg-10" id="imagePreview" style="
                        border-radius: 20px;
                        border: 6px solid #e4e3e3;
                        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                        min-height:275px;
                        max-height:100%;
                        width: 100%;
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center;
                        background-image: url({{ asset('sellers/images/person.png')}});
                        "></div>

                        <form action="{{route('seller.update')}}" enctype="multipart/form-data" method="post">
                          @csrf
                          <input type="file" name="seller_image" class="form-control form-control" id="seller_image" accept=".png, .jpg, .jpeg" hidden>
                      </div>
                      
                      <div class="d-flex justify-content-center row">
                        <label class="btn btn-primary" for="seller_image">Add Picture</label>
                      </div>
                      
                        <span class="text-danger"> @error('seller_image'){{$message}}@enderror</span>
                        <div class="content">
                          <div class="d-flex justify-content-center">
                            <label for="name">@lang('Name'): name</label>
                          </div>
                          
                          <span class="d-flex justify-content-center">@lang('username'): name</span>
                        </div>
                        
                      
                      <div class="row">

                        <h6 class="mt-2"><b >Note: </b>  Only 'jpg' , 'png' , 'jpeg' images  less than 1000px x 1000px and 1 MB are allowed.</h6>
                      </div>
                    </div> --}}
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                      <!-- small box -->

                      <div class="" >
                        <div class="d-flex justify-content-center row">
                          <h3>Profile Image</h3>
                        </div>
                        <div class=" d-flex justify-content-center my-4" >
                          <div class="image card col-9 col-sm-9 col-md-10 col-lg-10" id="imagePreview" style="
                          border-radius: 20px;
                          border: 6px solid #e4e3e3;
                          box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                          height:350px;
                          width: 250px;
                          min-width: 250px;
                          background-size: cover;
                          background-repeat: no-repeat;
                          background-position: center;
                          background-image: url({{Auth::guard('web')->user()->image == false ? asset('users/images/person.png') : asset(Auth::guard('web')->user()->image)}});
                          ">
                          </div>
                          <form action="{{route('user.update')}}" enctype="multipart/form-data" method="post">
                            @csrf
                          
                            <input type="file" name="user_image" value="{{old('product_image')}}" class="form-control form-control" id="user_image" accept=".png, .jpg, .jpeg" hidden>
                          
                        </div>
                          <span class="text-danger"> @error('user_image'){{$message}}@enderror</span>
                        <div class="d-flex justify-content-center">
                          <label class="btn btn-primary" for="user_image">Select Image</label>
                        </div>
                        <div class="content">

                         
                          <div class="d-flex justify-content-center">
                            <label for="name">@lang('Name'): {{Auth::guard('web')->user()->first_name}} {{Auth::guard('web')->user()->last_name}}</label>
                          </div>
                          
                          <span class="d-flex justify-content-center">@lang('username'): {{Auth::guard('web')->user()->username}}</span>
                        </div>
                        
                      </div>
                      <div class="row">

                        <h6 class="mt-2"><b >Note: </b>  Only 'jpg' , 'png' , 'jpeg' images  less than 1000px x 1000px and 1 MB are allowed.</h6>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-12 col-sm-12 col-md-9 col-lg-8">
                      <!-- row -->
                      
                        @if (Session::get('success'))
                        <div class="alert alert-success col-12 col-sm-12 col-md-9" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                          {{ Session::get('success') }}
                        </div>
                      
                        @endif
                        @if (Session::get('fail'))
                          <div class="alert alert-danger col-12 col-sm-12 col-md-9" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                            {{ Session::get('fail') }}
                          </div> 
                        
                        @endif
                      <div class="row">
                        
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
                              <div class="form-group custm-radio pt-1">
                                <span class="custm-radio-label">Gender :</span>
                                <input type="radio" {{ Auth::guard('web')->user()->gender == "male" ? 'checked' : '' }} value="male" id="male" name="gender" >
                                <label for="male">Male</label>
                                <input type="radio" {{ Auth::guard('web')->user()->gender == "female" ? 'checked' : '' }} value="female" id="female" name="gender" >
                                <label for="female">Female</label>
                                <span class="text-danger"> @error('gender'){{$message}}@enderror</span>
                              </div>
                            </div>
                            {{-- <div class="col-12 col-sm-12 col-md-12" id="wallet_shipments" style="display:none;">
                              <div class="form-group custm-radio pt-1">
                                <span class="custm-radio-label">Are you accepting wallet-shipments ?</span>
                                <input type="radio" value="accept" {{ old('wallet_shipment') == "walletaccept" ? 'checked' : '' }} id="walletaccept"name="wallet_shipment"   >
                                <label for="walletaccept">Accept</label>
                                <input type="radio" value="not accept" {{ old('wallet_shipment') == "not accept" ? 'checked' : '' }} id="walletnotaccept" name="wallet_shipment"   ><label for="walletnotaccept">Not Accept</label>
                              </div>
                            </div>			 --}}
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control custm-input" name="first_name" value="{{Auth::guard('web')->user()->first_name}}"/>
                                <span class="text-danger"> @error('first_name'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control custm-input" name="last_name" value="{{Auth::guard('web')->user()->last_name}}"  />
                                <span class="text-danger"> @error('last_name'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" onkeypress="return RestrictSpace();" value="{{Auth::guard('web')->user()->email}}" required class="form-control custm-input" placeholder="E-mail Address" disabled/>
                                <span class="text-danger"> @error('email'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" class="form-control custm-input numberOnly" name="phone_number" value="{{Auth::guard('web')->user()->phone}}" required  placeholder="Phone: 01234567890" />
                                <span class="text-danger"> @error('phone_number'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="form-group">
                                <label for="address">Billing Address:</label>
                                <textarea  class="form-control custm-input" name="address" rows="3" cols="30" required placeholder="Address" >{{Auth::guard('web')->user()->address}}</textarea>
                                <span class="text-danger"> @error('address'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="country">Country:</label>
                                <select class="form-control custm-input" id="ref_country_id" name="country" >
                                  <option value="">Select Country</option>
                                  @foreach ($countries as $country)
                                  <option {{ "$country->id" == Auth::guard('web')->user()->country ? 'selected="selected"' : '' }} value="{{$country->id}}">{{$country->name}}</option>
                                  @endforeach
                                </select>
                                <span class="text-danger"> @error('country'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="state">State:</label>
                                <input class="form-control custm-input" name="state" placeholder="State/ Province" value="{{Auth::guard('web')->user()->state}}"  />
                                <span class="text-danger"> @error('state'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="city">City:</label>
                                <input class="form-control custm-input" name="city" placeholder="City" value="{{Auth::guard('web')->user()->city}}" required />
                                <span class="text-danger"> @error('city'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="postal_code">Postal Code:</label>
                                <input type="number" class="form-control custm-input numberOnly" name="postal_code" value="{{Auth::guard('web')->user()->postal_code}}" required placeholder="Zipcode: 01234" />
                                <span class="text-danger"> @error('postal_code'){{$message}}@enderror</span>
                              </div>
                            </div>
                            	
                            <div class="col-md-12 " >
                              <input class="btn   btn-primary col-12 col-sm-12 col-md-12 col-lg-12" type="submit" value="Save Changes">
                            </div>
                        
                      </div> 
                    </form>
                    </div>
                    <!-- ./col -->
                  </div>
                
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script id="rendered-js" >
function readURL(input) {
if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
    $('#imagePreview').hide();
    $('#imagePreview').fadeIn(650);
  };
  reader.readAsDataURL(input.files[0]);
}
}
$("#user_image").change(function () {
readURL(this);
});
//# sourceURL=pen.js
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
@include('User/script')
</body>
</html>

