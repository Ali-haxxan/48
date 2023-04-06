<!DOCTYPE html>
<html lang="en">
  @include('admins/head')
<div class="wrapper">
  
  

   <!-- Navbar -->
   @include('admins/navbar')
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   @include('admins/aside')

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
              
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{$widget['total_users']}}</h3>
        
                        <p>Total Users</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-users"></i>
                      </div>
                      <a href="{{url('admin/all-users')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{$widget['active_users']}}</h3>
        
                        <p>Active Users</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-user-check"></i>
                      </div>
                      <a href="{{url('admin/active-users')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>{{$widget['banned_users']}}</h3>
        
                        <p>Banned Users</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-times"></i>
                      </div>
                      <a href="{{url('admin/banned-users')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{$widget['total_seller']}}</h3>
        
                        <p>Total Seller</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-users"></i>
                      </div>
                      <a href="{{url('admin/all-seller')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{$widget['active_seller']}}</h3>
        
                        <p>Active Sellers</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-user-check"></i>
                      </div>
                      <a href="{{url('admin/active-seller')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>{{$widget['banned_seller']}}</h3>
        
                        <p>Banned Sellers</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-times"></i>
                      </div>
                      <a href="{{url('admin/banned-seller')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  
                  <!-- ./col -->
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
                      <a href="{{url('admin/all-products')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
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
                      <a href="{{url('admin/live-products')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>{{$widget['reject_count']}}</h3>
        
                        <p>Rejected Items</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-times"></i>
                      </div>
                      <a href="{{url('admin/rejected-products')}}" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
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
  @include('admins/footer')
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admins/script')
</body>
</html>

