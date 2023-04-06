<!DOCTYPE html>
<html lang="en">
  <?php echo $__env->make('admins/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper">
  
  <?php 
  $i = 1;
  ?>

   <!-- Navbar -->
   <?php echo $__env->make('admins/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   <?php echo $__env->make('admins/aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>Banned Users</h1>
            
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
                <h3 class="card-title">Banned Users</h3>
              </div>
              <div class="justify-content-center">
                <?php if(Session::get('success')): ?>
                <div class=" alert alert-success col-9 col-sm-9 col-md-9 mx-3 mt-3" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                  <?php echo e(Session::get('success')); ?>

                </div>
                <?php endif; ?>
                <?php if(Session::get('fail')): ?>
                  <div class=" alert alert-danger col-9 col-sm-9 col-md-9 mx-3 mt-3" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                    <?php echo e(Session::get('fail')); ?>

                  </div> 
                <?php endif; ?>
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
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($i++); ?> </td>
                      <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
                      <td><?php echo e($user->username); ?></td>
                      <td><?php echo e($user->email); ?></td>
                      <td><?php echo e($user->phone); ?></td>
                      <td>
                        <?php if($user->status == 1 ): ?>
                        <a class="btn btn-success" href="<?php echo e(route('admin.change.user.status',$user->id)); ?>">Active</a>
                        <?php else: ?>
                        <a class="btn btn-danger" href="<?php echo e(route('admin.change.user.status',$user->id)); ?>">Banned</a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a class="btn btn-info"    href="<?php echo e(route('admin.view.user',$user->id)); ?>"><i class="fas fa-eye"></i> | <i class="fas fa-user-edit"></i></a>
                        <a class="btn btn-danger"  href="<?php echo e(route('admin.delete.user',$user->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
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
  <?php echo $__env->make('admins/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php echo $__env->make('admins/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php /**PATH /Users/admin/Downloads/Compressed/48_h/resources/views/admins/body/users/banned-users.blade.php ENDPATH**/ ?>