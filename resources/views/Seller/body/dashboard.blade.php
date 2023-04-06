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
            <h1>Dashboard</h1>
            
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
              <div class="result col-4">
                      @if (Session::get('success'))
                      <div id="message" class="alert alert-success">
                          {{Session::get('success')}}
                          
                      </div>
                          
                      @endif
                      @if (Session::get('fail'))
                      <div id="message" class="alert alert-danger col-4">
                          {{Session::get('fail')}}
                      </div>
                          
                      @endif
                  </div>
                  <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{$widget['total_product']}}</h3>
          
                          <p>Total Items</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-gift"></i>
                        </div>
                        <a href="{{url('seller/all-products')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>{{$widget['live_count']}}</h3>
          
                          <p>Live Items</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-rocket"></i>
                        </div>
                        <a href="{{url('seller/live-products')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>{{$widget['expired_count']}}</h3>
          
                          <p>Expired Items</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-hourglass-end"></i>
                        </div>
                        <a href="{{url('seller/expired-products')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
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

@include('Seller/script')
</body>
</html>

