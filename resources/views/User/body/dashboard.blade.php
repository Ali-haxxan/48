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
                <div class="result col-lg-8 col-md-12 col-sm-12">
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

                </div>
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{$WaitingCount}}</h3>
        
                        <p>Waiting Item's</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-pause-circle"></i>
                      </div>
                      <a href="{{route('user.waiting.products')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{$pCount}}</h3>
        
                        <p>Wining Item's</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-trophy"></i>
                      </div>
                      <a href="{{route('user.winner')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>{{$BidedCount}}</h3>
        
                        <p>Bided Product's</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-gavel"></i>
                      </div>
                      <a href="{{route('user.bided.products')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div> --}}
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

@include('User/script')
</body>
</html>

