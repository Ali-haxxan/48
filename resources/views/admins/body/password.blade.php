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
            <h1>Change Password</h1>
            
          </div>
          
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-12 col-md-9 col-lg-6">
            

            
              
              <!-- /.card-header -->
                
                    <div class="col-md-12">
                        <div class="card card-primary mt-5">
                            <div class="card-header">
                              <h3 class="card-title">Change Password</h3>
                            </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                            <form action="{{route('admin.update.password')}}" method="POST">
                                @csrf
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
                                  
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="old_Password">Old Password</label>
                                        <input type="hidden" value="{{Auth::guard('admin')->user()->email}}" name="email">
                                        <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}" placeholder="Password">
                                        <span class="text-danger"> @error('password'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                      <label for="new_Password">New Password</label>
                                      <input type="password" class="form-control" name="new_Password" id="new_Password" value="{{old('new_Password')}}" placeholder="New Password">
                                      <span class="text-danger"> @error('new_Password'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                      <label for="confirm_Password">Confirm Password</label>
                                      <input type="password" class="form-control" name="confirm_Password" id="confirm_Password" value="{{old('confirm_Password')}}" placeholder="Confirm Password">
                                      <span class="text-danger"> @error('confirm_Password'){{$message}}@enderror</span>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            
                                <div class="card-footer  justify-content-center text-right">
                                  <button type="submit" class="btn btn-primary"><b>change password</b></button>
                                </div>
                            </form>
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

