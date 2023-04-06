<!DOCTYPE html>
<html lang="en">
  @include('User/head')
<div class="wrapper">
  
  <?php
  $i = 1;
  ?>
  

   <!-- Navbar -->
   @include('User/navbar')
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   @include('User/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>Alert Item's</h1>
            
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

                        <form method="POST" id="upload-form-2" action="{{route('user.add.new.alert')}}" enctype="multipart/form-data">
                          @csrf
                    
                    <div class="col-12 ">
                      <!-- row -->
                      <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Select Category:</label>
                                <select class="category form-control select_category"  name="select_category" > 
                                  <option value="">Select Category</option>
                                  @foreach ($categories as $category)
                                    <option {{ old('select_category') == "$category->id" ? 'selected="selected"' : '' }}  value="{{$category->id}},{{$category->catalogue}}">{{$category->category}} </option>
                                  @endforeach	
                                </select>
                                <span class="text-danger"> @error('select_category'){{$message}}@enderror</span>
                              </div>
                            </div>

                            <div class="show_catalog col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Catalogue Nr:</label>
                                <select class="form-control select_cataloge"  name="catalogue_number" > 
                                  <option value="">Select Cataloge Nr</option>
                                  @foreach ( $catalogenr as $catalogenrs)
                                    <option {{ old('select_category') == "$catalogenrs->id" ? 'selected="selected"' : '' }}  value="{{$catalogenrs->id}}">{{$catalogenrs->cataloge_nrs}} </option>
                                  @endforeach	
                                </select>
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
                                <label for="catalogue">Catalogue:</label>
                                <input type="number" class="form-control custm-input state" name="catalogue"  value="{{old('catalogue')}}"/>
                                <span class="text-danger"> @error('catalogue'){{$message}}@enderror</span>
                              </div>
                            </div>
                            
                           
	
                            <div class="col-12" align="center">
                              <input  type="submit" class="submit_form justify-content-center btn   btn-primary col-12 col-sm-12 col-md-6 col-lg-6"  value="Add Product" />
                            </div>
                      </div>
                      
                    
                    </div>
                    <div class="card-body col-12">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Sr.</th>
                            <th>Category</th>
                            <th>Country</th>
                            <th>Catalogue</th>
                            <th>Catalogue Number</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($ProductAlert as $product)
                          <tr>
                            <td>{{$i++}} </td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->cataloge_nrs}}</td>
                            <td>{{$product->catalogue_number}}</td>
                            <td>
                              <a class="btn btn-danger" href="{{route('user.delete.product.alert',$product->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tfoot>
                      </table>
                    </div>
                    
                  </form>
                
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
  <script>
    $(document).ready(function () {
      $('.show_catalog').hide();
    });
    $(document).on('change', '.category', function() {
     let cat_val = $('.category').val();
     var digits = cat_val.split(',');
    //  console.log(digits);
     dat_log_val = digits[1];
     if (dat_log_val == 1) {
      $('.show_catalog').show();
     } else {
      $('.show_catalog').hide();
     }
     
  
  // console.log(digits[1]);
});
  </script>
  <!-- /.content-wrapper -->
  @include('User/footer')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
@include('User/script')
</body>
</html>

