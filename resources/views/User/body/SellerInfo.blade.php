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
            <h1>Seller Info</h1>
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
                <h3 class="card-title">Seller Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-12 ">
                  <!-- row -->

                  <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="select_category">Gender :  </label>  <span>{{$SellerInfo->gender}}</span> 
                            
                          </div>
                        </div>
                        
                        {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Wallet Shipment :  </label>  <span>{{$SellerInfo->wallet_shipment}} </span> 
                          </div>
                        </div> --}}

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue">First Name :  </label><span>{{$SellerInfo->first_name}}</span>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue_number">Last Name :  </label><span>{{$SellerInfo->last_name}}</span> 
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="select_category">username :  </label><span>{{$SellerInfo->username}}</span> 
                            
                          </div>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          {{-- <p><a href="mailto:someone@example.com">Send email</a></p> --}}
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Email :  </label><a href="mailto:{{$SellerInfo->email}}"><span>{{$SellerInfo->email}}</span> </a>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue">Phone :  </label><a href="tel:{{$SellerInfo->phone}}"><span>{{$SellerInfo->phone}}</span> </a>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue_number">Address :  </label><span>{{$SellerInfo->address}}</span>
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="select_category">City :  </label><span>{{$SellerInfo->city}}</span> 
                            
                          </div>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">State :  </label><span>{{$SellerInfo->state}}</span> 
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Postal Code:  </label><span>{{$SellerInfo->postal_code}}</span> 
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Country :  </label><span>{{$SellerInfo->name}}</span> 
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
  @include('User/footer')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
@include('User/script')
</body>
</html>

