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
            <h1>  FAQ  </h1>
            
          </div>
          
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">
                      FAQ (Please Use Image Url Only)
                    </h3>
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
                    <form action="{{route('admin.update.FAQ')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$settings->id}}" />
                      <textarea id="summernote" name="summernote" placeholder="Add content here" style="height: 300px">{{$settings->faq}}
                      </textarea>
                      <div class="form-group col-12 d-flex justify-content-center">
                        <input type="submit" value="Save Changes" class="col-sm-12 col-md-6  form-group btn btn-primary">
                      </div>
                    </form>
                  </div>
                  <div class="card-footer">
                    Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
                  </div>
            </div>
          </div>
        </div>
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

