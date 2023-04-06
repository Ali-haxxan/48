<!DOCTYPE html>
<html lang="en">
  @include('admins/head')
<div class="wrapper">
    <?php 
    $i = 1;
    ?>
  

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
            <h1>Manage Features</h1>
            
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
                <div class="card col-12">
                    <div class="card-header col-12">
                      <h3 class="card-title">All Features</h3>
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
                    <div class="row">
                        <div class="mt-3 px-4 col-md-12">
                            <form action="{{route('admin.create.feature',$category_id)}}" method="post" enctype="multipart/form">
                                @csrf
                                <div class="row">
                                    <label for="category"></label>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <input class="form-control " type="text" name="feature" placeholder="Feature Name">
                                        <span class="text-danger">@error('feature')@enderror</span>
      
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                      <input class="form-control " type="text" name="description" placeholder="Description">
                                      <span class="text-danger">@error('description')@enderror</span>
    
                                  </div>
                                    <div class="form-group col-sm-12 col-md-12 " align="right">
                                        <input type="submit" class=" btn btn-primary" value="Add Feature" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        
      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body col-12">
                      <table  class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sr.</th>
                          <th>Feature Name</th>
                          <th>Feature Description</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($features as $feature)
                          <tr>
                            <td>{{$i++}} </td>
                            <td>
                                <form action="{{route('admin.update.feature',$feature->id)}}" method="post">
                                @csrf
                                <input type="text" class="form-control" name="feature" value="{{$feature->feature}}">
                            </td>
                            <td>
                              <input type="text" class="form-control" name="description" value="{{$feature->description}}">
                            </td>
                            <td>
                              <input type="submit" class="btn btn-primary" value="update">
                            </form>
                              <a class="btn btn-danger"  href="{{route('admin.delete.feature',$feature->id)}}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
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

