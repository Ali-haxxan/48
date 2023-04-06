<!DOCTYPE html>
<html lang="en">
@php
    $i = 1;
@endphp
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
                            <h1>Add Product</h1>

                        </div>

                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
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

                            <div class="card">

                                <!-- /.card-header -->
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <!-- small box -->
                                            <div class=" ">
                                                <div class=" d-flex justify-content-center my-4">
                                                    <div class="card col-9 col-sm-9 col-md-10 col-lg-10" id="imagePreview" style="border-radius: 20px;
                          border: 6px solid #e4e3e3;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        height:250px;
    width: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url({{asset('Product/image/product.png')}});
        ">

                                                    </div>
                                                    <label class="btn" for="product_image" style="
                          position: absolute;
                          right: 30px;
                          z-index: 1;
                          top: 15px;
                          display: inline-block;
                width: 34px;
                height: 34px;
                margin-bottom: 0;
                border-radius: 100%;
                background: #e1dddd;
                border: 1px solid transparent;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12); 
                
                          "><i class="fas fa-pencil-alt"></i></label>
  <form action="{{route('seller.test.product')}}" method="post" enctype="multipart/form-data" >
    @csrf

  
                                                    <input type="file" name="product_image" class="form-control form-control" id="product_image" accept=".png, .jpg, .jpeg" hidden>

                                                </div>


                                                {{-- <div class="content">/ --}}

                                                {{-- <form action="" method="post" enctype="multipart/form-data" >
                            @csrf
                            <input type="file" name="image" multiple>
                            <div class="mt-4 d-flex justify-content-center"> --}}

                                                {{-- <label class="btn btn-primary col-12 col-sm-6 col-md-12" for="seller_update_image">@lang('Update Picture')</label> --}}
                                                {{-- <input type="submit"class="btn btn-primary col-12 col-sm-6 col-md-12 form-control form-control" value="Update Picture" >
                            </div>
                          </form> --}}

                                                {{-- </div> --}}
                                            </div>
                                            <div class="row">

                                                <h6 class="mt-2"><b>Note: </b> Only 'jpg' , 'png' , 'jpeg' images less than 1000px x 1000px and 1 MB are allowed.</h6>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                                            <!-- row -->
                                            <ul id="saveform_errlist"></ul>
                                            <div class="col-12 col-md-6" id="success_message"></div>
                                            <div class="row">

                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="product_name">Product Name:</label>
                                                        <input type="text" class="form-control custm-input product_name" name="product_name" />
                                                        <span class="text-danger"> @error('product_name'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="year">Year:</label>
                                                        <input type="number" class="form-control custm-input year" name="year" />

                                                        <span class="text-danger"> @error('year'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="select_category">Select Category:</label>

                                                        <select class="form-control select_category" name="select_category">
                                                            <option>Select Category</option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->category}}</option>
                                                            @endforeach

                                                        </select>


                                                        <span class="text-danger"> @error('select_category'){{$message}}@enderror</span>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="city">City:</label>
                                                        <input class="form-control custm-input city" name="city" placeholder="City" />
                                                        <span class="text-danger"> @error('city'){{$message}}@enderror</span>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="state">State:</label>
                                                        <input class="form-control custm-input state" name="state" />
                                                        <span class="text-danger"> @error('state'){{$message}}@enderror</span>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="last_name">Country:</label>
                                                        <input type="text" class="form-control custm-input country" name="country" />
                                                        <span class="text-danger"> @error('country'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="start_at">Start At:</label>
                                                        <input type="date" class="form-control custm-input numberOnly start_at" name="start_at" />
                                                        <span class="text-danger"> @error('start_at'){{$message}}@enderror</span>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="start_price">Start Price:</label>
                                                        <input type="number" class="start_price form-control custm-input" name="start_price" />
                                                        <span class="text-danger"> @error('start_price'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <table id="example1" class="mt-3 table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>Name</th>
                                                    <th>Select Features</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                              @foreach ($features as $feature)
                                              @if ()
                                              <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$feature->feature}}</td>
                                                    <td> 
                                                      <input type="checkbox" class="feature" id="" name="features[]" value="{{$feature->id}}">
                                                    </td>
                                                    <td>{{$feature->description}}</td>
                                              </tr> 
                                              @endif
                                              
                                              @endforeach


                                            </tbody>
                                        </table>
                                        <div class="col-md-12" align="center">
                                            <input type="submit" class="submit_form justify-content-center btn   btn-primary col-12 col-sm-12 col-md-6 col-lg-6" value="Add Product" />
                                        </div>
                                      </form>
                                        <!-- ./col -->
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
    <script>
      $(document).on('change','.select_category',function (e) {
        e.preventDefault();
    
        var category = $('.select_category').val();
        // alert(category);
        // console.log(category);
        
    
      });

      $(document).ready(function() {
		
			var userTypeValue = $("input[name='user_type']:checked").val();
			if(userTypeValue==2) {
				$('#wallet_shipments').show();
				}else {
				$('#wallet_shipments').hide();
			}
			
		})
		
	

  
    </script>
    <script id="rendered-js">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#product_image").change(function() {
            readURL(this);
        });
        //# sourceURL=pen.js
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @include('Seller/script')
</body>

</html>