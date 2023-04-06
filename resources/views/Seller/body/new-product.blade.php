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
        <div class="row ">
          <div class="col-10">
            <h1>Add Item</h1>
            
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

                @if (Session::get('success'))
                <div class="alert alert-success col-12 col-sm-12 col-md-9 my-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                  {{ Session::get('success') }}
                </div>
              
                @endif
                @if (Session::get('fail'))
                  <div class="alert alert-danger col-12 col-sm-12 col-md-9 my-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                    {{ Session::get('fail') }}
                  </div> 
                
                @endif
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                      <div class="d-flex justify-content-center row">
                        <h3>Item Feature Image</h3>
                      </div>
                      <div class=" d-flex justify-content-center">
                        <div class="card col-9 col-sm-9 col-md-10 col-lg-10" id="featureImagePreview" style="border-radius: 20px;
                        border: 6px solid #e4e3e3;
                        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                        height:225px;
                        width: 100%;
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center;
                        background-image: url({{asset('Product/image/product.png')}});
                        "></div>
                        <form method="POST" id="upload-form-2" action="{{route('seller.new.product')}}" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="product_feature_image" class="form-control form-control" id="product_feature_image" accept=".png, .jpg, .jpeg" hidden>
                      </div>
                    <div class="row">
                      <span class="text-danger"> @error('product_feature_image'){{$message}}@enderror</span>
                      <h6 ><b >Note: </b>  Only 'jpg' , 'png' , 'jpeg' image size in 1 MB is allowed.</h6>
                    </div>
                    <div class="d-flex justify-content-center row">
                      <label class="btn btn-primary" for="product_feature_image">Add product feature pictures</label>
                    </div>
                    <div class="d-flex justify-content-center row">
                      <h3>Item Images</h3>

                    </div>
                    <div class=" d-flex justify-content-center ">
                      <div class="card col-9 col-sm-9 col-md-10 col-lg-10" id="imagePreview" style="border-radius: 20px;
                      border: 6px solid #e4e3e3;
                      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                      height:225px;
                      width: 100%;
                      background-size: cover;
                      background-repeat: no-repeat;
                      background-position: center;
                      background-image: url({{asset('Product/image/product.png')}});
                      "></div>
                        
                        <input type="file" name="product_image[]" class="form-control form-control" id="product_image" accept=".png, .jpg, .jpeg" multiple hidden>
                      
                    </div>
                    <div class="d-flex justify-content-center row">
                      <label class="btn btn-primary" for="product_image">Add pictures</label>
                    </div>
                    <div class="row">
                      <span class="text-danger"> @error('product_image'){{$message}}@enderror</span>
                      <h6 ><b >Note: </b> 2-5 Only 'jpg' , 'png' , 'jpeg' images size in 1 MB is allowed.</h6>
                    </div>
                  </div>
                    <!-- ./col -->
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                      <!-- row -->
                      <ul id="saveform_errlist"></ul>
                      <div class="col-12 col-md-6" id="success_message"></div>
                      <div class="row">
                        
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="product_name">Item Name:</label>
                                <input  class="form-control custm-input product_name" name="product_name" value="{{old('product_name')}}"/>
                                <span class="text-danger"> @error('product_name'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="year">Year:</label>
                                <input type="number" class="form-control custm-input year" name="year" value="{{old('year')}}"/>
                                
                                <span class="text-danger"> @error('year'){{$message}}@enderror</span>
                              </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Select Category:</label>
                                <select class="category form-control select_category"  name="select_category" > 
                                  <option value="">Select Category</option>
                                  @foreach ($categories as $category)
                                    <option {{ old('select_category') == "$category->id,$category->catalogue" ? 'selected="selected"' : '' }}  value="{{$category->id}},{{$category->catalogue}}">{{$category->category}} </option>
                                  @endforeach	
                                </select>
                                <span class="text-danger"> @error('select_category'){{$message}}@enderror</span>
                              </div>
                            </div>
                            
                            <div class="ShowSubCategory col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Select Sub-Category:</label>
                                <select id="SubCategory" class="form-control SubCategory"  name="SubCategory" > 
                                  <option value="">Select Sub-Category</option>
                                  @foreach ($SubCategories as $SubCategory)
                                    <option {{ old('SubCategory') == "$SubCategory->Sub_Category" ? 'selected="selected"' : '' }}  value="{{$SubCategory->Sub_Category}}" class="subcat sub{{$SubCategory->category_id}}">{{$SubCategory->Sub_Category}}</option>
                                  @endforeach	
                                </select>
                                <span class="text-danger"> @error('SubCategory'){{$message}}@enderror</span>
                              </div>
                            </div>

                            <div class="show_catalog col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Catalogue Nr:</label>
                                <select class="catalogue_nr form-control select_cataloge"  name="catalogue_nr" > 
                                  <option value="">Select Cataloge Nr</option>
                                  @foreach ( $catalogenr as $catalogenrs)
                                    <option {{ old('catalogue_nr') == "$catalogenrs->id" ? 'selected="selected"' : '' }}  value="{{$catalogenrs->id}}">{{$catalogenrs->cataloge_nrs}} </option>
                                  @endforeach	
                                </select>
                                <span class="text-danger"> @error('catalogue_nr'){{$message}}@enderror</span>
                              </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="catalogue_number">Catalogue Number:</label>
                                <input type="number" class="form-control custm-input state" name="catalogue_number"  value="{{old('catalogue_number')}}"/>
                                <span class="text-danger"> @error('catalogue_number'){{$message}}@enderror</span>
                              </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="last_name">Country:</label>
                                <select class="form-control custm-input" id="ref_country_id" name="country"  >
                                  <option value="">Select Country</option>
                                  @foreach ($countries as $country)
                                  <option {{ old('country') == "$country->id" ? 'selected="selected"' : '' }} value="{{$country->id}}">{{$country->name}}</option>
                                  @endforeach
                                </select>
                                <span class="text-danger"> @error('country'){{$message}}@enderror</span>
                              </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="start_price">Start At(price):</label>
                                <input  class="start_price form-control custm-input" name="start_price"  value="{{old('start_price')}}"/>
                                <span class="text-danger"> @error('start_price'){{$message}}@enderror</span> 
                              </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="start_price">Start Date:</label>
                                <input type="date"  class="start_date form-control " name="start_date"  value="{{old('start_date')}}"/>
                                <span class="text-danger"> @error('start_date'){{$message}}@enderror</span> 
                              </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea class="form-control custm-input description" name="description" rows="4" cols="50" placeholder="description">{{old('description')}}</textarea>
                                <span class="text-danger"> @error('description'){{$message}}@enderror</span>
                              </div>
                            </div>	
                            <span class="text-danger"> @error('features'){{$message}}@enderror</span>
                            <table id="example1" class="  table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Select Features </th>
                                <th>Description</th>
                              </tr>
                              </thead>
                              
                              <tbody class="features_body">
                                
                                @foreach ($features as $item)
                                  
                                <tr class="feature_tr {{$item->category_id}}">
                                  <td>{{$i++}}</td>
                                  <td>{{$item->feature}}</td>
                                  <td><input type="checkbox" {{ old('features') == "$item->id" ? 'selected="selected"' : '' }} name="features[]" class="feature_val" value="{{$item->id}}"></td>
                                  <td>{{$item->description}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>

                            <div class="col-md-12" align="center">
                              <input  type="submit" class="submit_form justify-content-center btn   btn-primary col-12 col-sm-12 col-md-6 col-lg-6"  value="Add Product" />
                            </div>
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
  @include('Seller/footer')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
{{-- <script>
  
    $(document).on('change', '.category',function (e) {
      e.preventDefault();
      let cat_val = $('.category').val();
      var digits = cat_val.split(',');
      var dat_log_val = digits[0];
      // alert('are you sure you want to bid $ '+dat_log_val+' !')
    // console.log(dat_log_val)
  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                $.ajax({
                  type: 'GET',
                  url: '/seller/get-features/'+dat_log_val,
                  dataType: 'json',
                  success: function (response) {
                console.log(response.subcategory);
                console.log(response.features);
            //  $subcategory = ?> response.subcategory
            //  $features = ?> response.features
                  }
                });
    });
 
</script>	 --}}
<script>
  $(document).on('change', '.category', function() {
  let cat_val = $('.category').val();
  var digits = cat_val.split(',');
  dat_log_val = digits[1];
  var category_val = digits[0];
  $('.feature_val').prop( "checked", false );
  $('.feature_tr').hide();
  $('.'+category_val).show();
  $('.subcat').hide();
  $('.sub'+category_val).show();
  // let subcat_opt_val = $('.sub'+category_val).show();
  let subcat_opt_val = $('.sub'+category_val).val();
  if (subcat_opt_val != undefined || subcat_opt_val != null) {
    $('.ShowSubCategory').show();
    // $('.sub'+subcat_opt_val).show();

  } else {
    $('.ShowSubCategory').hide();
  }
  console.log(subcat_opt_val);
  if (dat_log_val == 1) {
   $('.show_catalog').show();
   

  } else {
   $('.show_catalog').hide();
  }
  
  });

  $(document).ready(function () {
    let cat_val = $('.category').val();
  var digits = cat_val.split(',');
  dat_log_val = digits[1];
  var category_val = digits[0];

  if (dat_log_val == 1) {
    $('.show_catalog').show();
   
  } else {
   $('.show_catalog').hide();
  }
  
  let sub_cat_val = $('.SubCategory').val();
  // console.log(sub_cat_val)
  if(sub_cat_val == false){

    $('.ShowSubCategory').hide();

  }
    $('.feature_tr').hide();
  });
  
</script>

<script id="rendered-js" >
function readURL(input) {
if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
    $('#imagePreview').hide();
    $('#imagePreview').fadeIn(650);
  }
  reader.readAsDataURL(input.files[0]);
}
}
$("#product_image").change(function () {
readURL(this);
});

function SreadURL(input) {
if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
    $('#featureImagePreview').css('background-image', 'url(' + e.target.result + ')');
    $('#featureImagePreview').hide();
    $('#featureImagePreview').fadeIn(650);
  }
  reader.readAsDataURL(input.files[0]);
}
} 
$("#product_feature_image").change(function () {
SreadURL(this);
});
//# sourceURL=pen.js
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
@include('Seller/script')
</body>
</html>

