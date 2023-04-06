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
            <h1>All Users</h1>
            
          </div>
          
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card col-12">
              <div class="card-header col-12">
                <h3 class="card-title">All Users</h3>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status (Click to Change Status)</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{$i++}} </td>
                      <td>{{$user->first_name}} {{$user->last_name}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{ $user->phone}}</td>
                      <td>
                        @if ($user->status == 1 )
                        <a class="btn btn-success" href="{{route('admin.change.user.status',$user->id)}}">Active</a>
                        @else
                        <a class="btn btn-danger" href="{{route('admin.change.user.status',$user->id)}}">Banned</a>
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-info"    href="{{route('admin.view.user',$user->id)  }}"><i class="fas fa-eye"></i> | <i class="fas fa-user-edit"></i></a>
                        <a class="btn btn-danger"  href="{{route('admin.delete.user',$user->id)}}"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  
                  </tfoot>
                </table>
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
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
</body>
</html>

