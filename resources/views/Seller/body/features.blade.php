
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{$settings->title}}</title>
    
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('logo/'.$settings->logo)}}" />
  </head>
  <body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  @php
      $i =1;
  @endphp
  
   <!-- Navbar -->
   @include('Seller/navbar')
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   @include('Seller/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
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
                    
                    <!-- ./col -->
                    <form method="POST" action="{{route('seller.save.features')}}">
                        @csrf
                        @if (!empty($SubCategories))
                        <h3>Product Sub-Category</h3>
                        <select id="SubCategory" class="form-control SubCategory col-12 col-sm-12 col-md-6 my-3"  name="SubCategory" > 
                          <option value="">Select Sub-Category</option>
                          @foreach ($SubCategories as $SubCategory)
                            <option {{ old('SubCategory') == "$SubCategory->Sub_Category" ? 'selected="selected"' : '' }}  value="{{$SubCategory->Sub_Category}}">{{$SubCategory->Sub_Category}}</option>
                          @endforeach	
                        </select>
                        <span class="text-danger"> @error('SubCategory'){{$message}}@enderror</span>
                        @endif
                        
                        <h3>Select Product Features</h3>
                        <input type="hidden" name="product_id" value="{{$product_id}}" />
                    <table id="example1" class="  table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Sr.</th>
                        <th>Name</th>
                        <th>Select Features</th>
                        <th>Description</th>
                      </tr>
                      </thead>
                      
                      <tbody>
                        
                        @foreach ($features as $item)
                          
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$item->feature}}</td>
                          <td><input type="checkbox" {{ old('features') == "$item->id" ? 'selected="selected"' : '' }} name="features[]" class="feature_val" value="{{$item->id}}"></td>
                          <td>{{$item->description}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="col-md-12" align="center">
                      <input  type="submit" onclick="return validation();" class="submit_form justify-content-center btn   btn-primary col-12 col-sm-12 col-md-6 col-lg-6"  value="Submit" />
                    </form>
                    </div>
                    <!-- ./col -->
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
  @include('Seller/footer')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script>
  function validations()
{
  var elementExists = document.getElementById("SubCategory");
  if(elementExists == true)
  {
    let SubCategory_val = $('#SubCategory').val();
    if(SubCategory_val == null){
      alert("Please select product Subcategory!");
    return false;
    }
    
  }
  if($('input[type=checkbox][name=features]:checked').length == 0 && $('input[type=checkbox][name=features]:checked').length < 2)
  {
    alert("Please select product features!");
    return false;
  }
  
  return true;
}
</script>
<script>
  $(document).on('click', '.submit_form', function() {
   let feature_val = $('.feature_val').val();
   if($('input[type=checkbox][name=features]:checked').length == 0)
  {
    alert("Please select product features!");
    return false;
  } 
   return true;
});
</script>
@include('Seller/script')
</body>
</html>

