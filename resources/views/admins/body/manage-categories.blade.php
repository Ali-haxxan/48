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
            <h1>Manage Categories</h1>
            
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
                      <h3 class="card-title">All Categories</h3>
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
                        <div class="mt-3 mx-3 col-md-12">
                            <form action="{{route('admin.create.categories')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                    <div class="form-group col-sm-12 col-md-4">
                                      <label for="category">Category:</label>
                                      <input class="form-control " type="text" value="{{old('Category Name')}}" name="category" placeholder="Category Name">
                                      <span class="text-danger"> @error('category'){{$message}}@enderror</span> 
                                    </div>
                                    <div class="form-group">
                                      <label for="category_image">Category image:</label>
                            <input type="file" name="category_image" value="{{old('category_image')}}" class="form-control form-control" id="category_image" accept=".png, .jpg, .jpeg" >

                                      <span class="text-danger"> @error('category_image'){{$message}}@enderror</span> 
                                    </div>
                                    <div class="form-group">
                                      <label for="catalogue">Catalogue accept?</label>
                                      <input type="checkbox" class="form-control" name="catalogue" value="1">
                                      <span class="text-danger">@error('catalogue')@enderror</span>
                                      <span class="text-danger"> @error('catalogue'){{$message}}@enderror</span> 
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3" align="right">
                                      <p></p>
                                        <input type="submit" class=" btn btn-primary" value="Add Category" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        
      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body col-12">
                      <table  class="table table-bordered table-striped">
                        <span class="text-danger"> @error('img'){{$message}}@enderror</span> 
                        <thead>
                        <tr>
                          <th>Sr.</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th style="text-align: center">Cateloge Nr</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                          <tr>
                            <td>{{$i++}} </td>
                            <td>
                                <form action="{{route('admin.update.category',$category->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" class="form-control" name="category" value="{{$category->category}}">
                            </td>
                            <td class="">
                              <img src="{{ asset($category->img) }}" class="p-1" width="100px" height="100px" alt="category_img">
                              <input type="file" name="image" accept=".png, .jpg, .jpeg" >
                            </td>
                            <td>
                              <input type="checkbox" class="form-control" name="catalogue" {{ $category->catalogue == 1 ? 'checked="checked"' : '' }} value="1">
                            </td>
                            <td>
                              <input type="submit" class="btn btn-primary" value="update">
                            </form>
                              <a class="btn btn-danger"  href="{{route('admin.delete.category',$category->id)}}"><i class="fas fa-trash-alt"></i></a>
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

