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
            <h1>View Product</h1>
            
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

                 
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                      <!-- small box -->
                     
                      <div class=" d-flex justify-content-center my-4">
                        <div class="row d-flex justify-content-center">
                          <div class="card col-9 col-sm-9 col-md-10 col-lg-10" id="imagePreview" style="border-radius: 20px;
                          border: 6px solid #e4e3e3;
                          box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                          height:250px;
                          width: 100%;
                          background-size: cover;
                          background-repeat: no-repeat;
                          background-position: center;
                          background-image: url({{$product->feature_image == false ? asset('Product/image/product.png') : asset($product->feature_image)}});
                          "></div>
                          <div class="card col-9 col-sm-9 col-md-10 col-lg-10 my-3" id="imagePreview" style="border-radius: 20px;
                          border: 6px solid #e4e3e3;
                          box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                          height:250px;
                          width: 100%;
                          background-size: cover;
                          background-repeat: no-repeat;
                          background-position: center;
                          ">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner" role="listbox">
                                @foreach ($Pimages as $index => $image)
                                      <div class="carousel-item {{ $index == 0  ? 'active' : ''}}" >
                                        <img  src="{{asset($image->image)}}" alt="{{asset($image->image)}}"
                                        style="
                                        /* flex: 1; */
                                        /* height: 100%;
                                        width: 100%; */
                                        height:235px;
                                        width: 100%;
                                        background-position: center;
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                         " >
                                      </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div> 
                      </div>
                      
                      <div class=" d-flex justify-content-center my-4 ">
                        @if ($product->status == 0)
                        <a class="mx-2 btn btn-success"  href="{{route('admin.check.product',$product->id)}}"><i class="fas fa-check"></i></a>
                        <a class="mx-2 btn btn-info"  href="{{route('admin.reject.product',$product->id)}}"><i class="fas fa-times"></i></a>
                        <a class="mx-2 btn btn-danger"  href="{{route('admin.view.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                        @endif
                        @if ($product->status == 1)
                        <a class="mx-2 btn btn-info"  href="{{route('admin.reject.product',$product->id)}}"><i class="fas fa-times"></i></a>
                        <a class="mx-2 btn btn-danger"  href="{{route('admin.view.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                        @endif
                        @if ($product->status == 2)
                        <a class="mx-2 btn btn-success"  href="{{route('admin.check.product',$product->id)}}"><i class="fas fa-check"></i></a>
                        <a class="mx-2 btn btn-danger"  href="{{route('admin.view.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                        @endif
                        @if ($product->status === 3)
                        {{-- <a class="mx-2 btn btn-info"    href="{{route('admin.view.product',$product->id) }}"><i class="fas fa-eye"></i></a> --}}
                        <a class="mx-2 btn btn-info"  href="{{route('admin.reject.product',$product->id)}}"><i class="fas fa-times"></i></a>
                        <a class="mx-2 btn btn-danger"  href="{{route('admin.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                        @endif
                        @if ($product->status === null)
                        {{-- <a class="mx-2 btn btn-info"    href="{{route('admin.view.product',$product->id) }}"><i class="fas fa-eye"></i></a> --}}
                        <a class="mx-2 btn btn-danger"  href="{{route('admin.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                        @endif
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
                                <label for="product_name">Item Name:</label>
                                <input type="text" class="form-control custm-input product_name" name="product_name" value="{{$product->product_name}}"/>
                                <span class="text-danger"> @error('product_name'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="year">Year:</label>
                                <input type="number" class="form-control custm-input year" name="year" value="{{$product->year}}"/>
                                
                                <span class="text-danger"> @error('year'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Select Category:</label>
                                
                                <select class="form-control select_category"  name="select_category" > 
                                  <option >Select Category</option>
                                  @foreach ($categories as $category)
                                    <option
                                     {{$product->category_id == $category->id ? 'selected="selected"': ''}} 
                                     value="{{$category->id}}">{{$category->category}}</option>
                                  @endforeach	
                                  
                                </select>
                                

                                <span class="text-danger"> @error('select_category'){{$message}}@enderror</span>
                              </div>
                            </div>

                            @if (!empty($product->sub_category))
                              <div class="ShowSubCategory col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                  <label for="select_category">Select Sub-Category:</label>
                                  <select id="SubCategory" class="form-control SubCategory"  name="SubCategory" > 
                                    <option value="">Select Sub-Category</option>
                                    @foreach ($SubCategory as $SubCategory)
                                    <option {{ $product->sub_category == $SubCategory->id ? 'selected="selected"' : '' }}  value="{{$SubCategory->id}}" class="subcat sub{{$SubCategory->category_id}}">{{$SubCategory->Sub_Category}}</option>
                                    @endforeach	
                                  </select>
                                  <span class="text-danger"> @error('SubCategory'){{$message}}@enderror</span>
                                </div>
                              </div>
                            @endif
                            @if (!empty($product->catalogue))
                            <div class="show_catalog col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Catalogue Nr:</label>
                                <select class="catalogue_nr form-control select_cataloge"  name="catalogue_nr" > 
                                  <option value="">Select Cataloge Nr</option>
                                  @foreach ( $catalogenr as $catalogenrs)
                                    <option {{ $product->catalogue == "$catalogenrs->id" ? 'selected="selected"' : '' }}  value="{{$catalogenrs->id}}">{{$catalogenrs->cataloge_nrs}} </option>
                                  @endforeach	
                                </select>
                                <span class="text-danger"> @error('catalogue_nr'){{$message}}@enderror</span>
                              </div>
                            </div>
                            @endif

                            @if (!empty($product->catlogue_no))
                              <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                  <label for="catalogue_number">Catalogue Number:</label>
                                  <input class="form-control custm-input state" name="catalogue_number" value="{{$product->catlogue_no}}" />
                                  <span class="text-danger"> @error('catalogue_number'){{$message}}@enderror</span>
                                </div>
                              </div>
                            @endif

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="country">Country:</label>
                                <select class="form-control custm-input" id="ref_country_id" name="country"  >
                                  <option value="">Select Country</option>
                                  @foreach ($countries as $country)
          
                                  <option {{ "$country->id" == "$product->country" ? 'selected="selected"' : '' }} value="{{$country->name}}">{{$country->name}}</option>
                                  @endforeach
                                </select>
                                <span class="text-danger"> @error('country'){{$message}}@enderror</span>
                              </div>
                            </div>

                            {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="state">State:</label>
                                <input class="form-control custm-input state" name="state" value="{{$product->state}}" />
                                <span class="text-danger"> @error('state'){{$message}}@enderror</span>
                              </div>
                            </div> --}}

                            {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="city">City:</label>
                                <input class="form-control custm-input city" name="city" placeholder="City"value="{{$product->city}}"/>
                                <span class="text-danger"> @error('city'){{$message}}@enderror</span>
                              </div>
                            </div> --}}
                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="start_price">Start Price:</label>
                                <input type="number" class="start_price form-control custm-input" name="start_price" value="{{$product->start_price}}"/>
                                <span class="text-danger"> @error('start_price'){{$message}}@enderror</span> 
                              </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="start_at">Start Date:</label>
                                <input type="date" class="form-control custm-input numberOnly start_at" name="start_at" value="{{$product->start_at}}"/>
                                <span class="text-danger"> @error('start_at'){{$message}}@enderror</span>
                              </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea class="form-control custm-input description" name="description" rows="4" cols="50" placeholder="description"> {{$product->description}}</textarea>
                                <span class="text-danger"> @error('description'){{$message}}@enderror</span>
                              </div>
                            </div>
                      </div> 
                      <table id="example1" class="mt-3 table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sr.</th>
                          <th>Name</th>
                          <th>Select</th>
                          <th>Description</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                          @foreach ($features as $item)
                            
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->feature}}</td>
                            
                            <td><input type="checkbox"  
                              @foreach ($productFeature as $feature)
                              {{$feature->feature_id== $item->id ?'checked="checked"': '' }} 
                              @endforeach
                              name="features[]" value="{{$item->id}}"></td>
                            
                            <td>{{$item->description}}</td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    
                    </div>
                    
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
  @include('admins/footer')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
@include('admins/script')
</body>
</html>

