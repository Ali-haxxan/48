<!DOCTYPE html>
<html lang="en">
  @include('Seller/head')
<div class="wrapper">
  

  

   <!-- Navbar -->
   @include('Seller/navbar')
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   @include('Seller/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>User Info</h1>
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
                <h3 class="card-title">User Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-12 ">
                  <!-- row -->

                  <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="select_category">Gender :  </label>  <span>{{$UserInfo->gender}}</span> 
                            
                          </div>
                        </div>
{{--                         
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Wallet Shipment :  </label>  <span>{{$UserInfo->wallet_shipment}} </span> 
                          </div>
                        </div> --}}

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue">First Name :  </label><span>{{$UserInfo->first_name}}</span>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue_number">Last Name :  </label><span>{{$UserInfo->last_name}}</span> 
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="select_category">username :  </label><span>{{$UserInfo->username}}</span> 
                            
                          </div>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          {{-- <p><a href="mailto:someone@example.com">Send email</a></p> --}}
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Email :  </label><a href="mailto:{{$UserInfo->email}}"><span>{{$UserInfo->email}}</span> </a>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue">Phone :  </label><a href="tel:{{$UserInfo->phone}}"><span>{{$UserInfo->phone}}</span> </a>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue_number">Address :  </label><span>{{$UserInfo->address}}</span>
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="select_category">City :  </label><span>{{$UserInfo->city}}</span> 
                            
                          </div>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">State :  </label><span>{{$UserInfo->state}}</span> 
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Postal Code:  </label><span>{{$UserInfo->postal_code}}</span> 
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Country :  </label><span>{{$UserInfo->country}}</span> 
                          </div>
                        </div>
                  </div>
                  
                
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
  @include('Seller/footer')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
@include('Seller/script')

</body>
</html>

