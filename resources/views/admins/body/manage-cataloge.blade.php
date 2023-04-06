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
            <h1>Manage Cataloge Nr</h1>

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
                    <h3 class="card-title">All Cataloges</h3>
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
                      <form action="{{route('admin.create.cataloge.nr')}}" method="post" enctype="multipart/form">
                        @csrf
                        <div class="row">

                          <div class="form-group col-sm-12 col-md-12">
                            
                            <label for="category">Cataloge Nr:</label>
                            

                            </div class="row">
                              <div class="form-group col-sm-12 col-md-6">
                                <input class="form-control" type="text" name="cataloge_nr" placeholder="Cataloge Nr Name">
                                <span class="text-danger">@error('category')@enderror</span>
                              </div>
                              <div class="form-group col-sm-12 col-md-6" >
                                <input type="submit" class=" btn btn-primary" value="Add Cataloge" />
                              </div>

                            <div> 
                           
                          </div>
                          
                        </div>
                      </form>
                    </div>


                  </div>
                  <!-- /.card-header -->
                  <div class="card-body col-12">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Sr.</th>
                          <th>Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($catalogenr as $catalogenrs)
                        <tr>
                          <td>{{$i++}} </td>
                          <td>
                            <form action="{{route('admin.update.cataloge.nr',$catalogenrs->id)}}" method="post">
                              @csrf
                              <input type="text" class="form-control" name="cataloge_nr" value="{{$catalogenrs->cataloge_nrs}}">
                          </td>
                          <td>
                            <input type="submit" class="btn btn-primary" value="update">
                            </form>
                            <a class="btn btn-danger" href="{{route('admin.delete.cataloge.nr',$catalogenrs->id)}}">
                              <i class="fas fa-trash-alt"></i>
                            </a>
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