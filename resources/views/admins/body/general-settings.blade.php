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
            <h1>General Settings</h1>
            
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
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center my-4">
                        <img class="col-9 col-sm-8 col-md-9  d-block " src="{{asset('logo/'.$settings->logo)}}" alt="">
                        
                      </div>
                      <form action="{{ route('admin.update.general.settings',$settings->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                      <label for="logo">Logo:</label>
                      <input type="file" class="form-control" name="logo">
                      <span class="text-danger"> @error('logo'){{$message}}@enderror</span>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group col-12">
                          <label for="title">Title:</label>
                          <input type="text" class="form-control custm-input" name="title" value="{{$settings->title}}" placeholder="Title"/>
                          <span class="text-danger"> @error('title'){{$message}}@enderror</span>
                        </div>
                      <div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label for="trademark">Trademark:</label>
                          <textarea  class="form-control custm-input" name="trademark" rows="3" cols="30"  placeholder="TradeMark" >{{$settings->trademark}}</textarea>
                          <span class="text-danger"> @error('trademark'){{$message}}@enderror</span>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label for="product_button">Items Button name:</label>
                          <input  class="form-control custm-input" name="product_button" value="{{$settings->product_button}}" placeholder="Button Name" >
                          <span class="text-danger"> @error('product_button'){{$message}}@enderror</span>
                        </div>
                      </div>
                      <div class="form-group col-12">
                        <input type="submit" class="btn btn-primary col-12" value="Update general settings" />
                      </div>

                    </div>
                  </form> 
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

