<!DOCTYPE html>
<html lang="en">
  @include('admins/head')
<div class="wrapper">
  

  

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
            <h1>User Profile</h1>
            
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
                      <div class=" ">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center my-4">
                          <img class="rounded-circle  col-9 col-sm-8 col-md-9  d-block user_profile_image" src="{{$user->image == false ? asset('users/images/person.png') : asset($user->image)}}" alt="user">
                        </div>
                        
                        
                        <div class="content">
                          <div class="d-flex justify-content-center">
                            <label for="name">@lang('Name'): {{$user->first_name}} {{$user->last_name}}</label>
                          </div>
                          
                          <span class="d-flex justify-content-center">@lang('username'): {{$user->username}}</span>
                          <div class="mt-4 d-flex justify-content-center">
                            <label class="btn btn-primary col-12 col-sm-6 col-md-12" for="user_update_image">@lang('Update Picture')</label>
                            <input type="file" name="user_update_image" class="form-control form-control" id="user_update_image" hidden>
                        </div>
                        </div>
                      </div>
                      <div class="row">

                        <h6 class="mt-2"><b >Note: </b>  Only 'jpg' , 'png' , 'jpeg' images  less than 1000px x 1000px and 1 MB are allowed.</h6>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                      <!-- row -->
                      <form action="{{route('admin.update.user',$user->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @if (Session::get('success'))
                        <div class="alert alert-success col-12 col-sm-12 col-md-9" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                          {{ Session::get('success') }}
                        </div>
                      
                        @endif
                        @if (Session::get('fail'))
                          <div class="alert alert-danger col-12 col-sm-12 col-md-9" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                            {{ Session::get('fail') }}
                          </div> 
                        
                        @endif
                      <div class="row">
                        
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
                              <div class="form-group custm-radio pt-1">
                                <span class="custm-radio-label">Gender :</span>
                                <input type="radio" {{ $user->gender == "male" ? 'checked' : '' }} value="male" id="male" name="gender" >
                                <label for="male">Male</label>
                                <input type="radio" {{ $user->gender == "female" ? 'checked' : '' }} value="female" id="female" name="gender" >
                                <label for="female">Female</label>
                                <span class="text-danger"> @error('gender'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control custm-input" name="first_name" value="{{$user->first_name}}"/>
                                <span class="text-danger"> @error('first_name'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control custm-input" name="last_name" value="{{$user->last_name}}"  />
                                <span class="text-danger"> @error('last_name'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" onkeypress="return RestrictSpace();" value="{{$user->email}}" required class="form-control custm-input" placeholder="E-mail Address" disabled/>
                                <span class="text-danger"> @error('email'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" class="form-control custm-input numberOnly" name="phone_number" value="{{$user->phone}}" required  placeholder="Phone: 01234567890" />
                                <span class="text-danger"> @error('phone_number'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                              <div class="form-group">
                                <label for="address">Billing Address:</label>
                                <textarea  class="form-control custm-input" name="address" rows="3" cols="30" required placeholder="Address" >{{$user->address}}</textarea>
                                <span class="text-danger"> @error('address'){{$message}}@enderror</span>
                              </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="country">Country:</label>
                                <select class="form-control custm-input" id="ref_country_id" name="country"  >
                                  <option value="">Select Country</option>
                                  @foreach ($countries as $country)
                                  <option {{ "$country->id" == "$user->country" ? 'selected="selected"' : '' }} value="{{$country->id}}">{{$country->name}}</option>
                                  @endforeach
                                </select>
                                <span class="text-danger"> @error('country'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="state">State:</label>
                                <input class="form-control custm-input" name="state" placeholder="State/ Province" value="{{$user->state}}"  />
                                <span class="text-danger"> @error('state'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="city">City:</label>
                                <input class="form-control custm-input" name="city" placeholder="City" value="{{$user->city}}" required />
                                <span class="text-danger"> @error('city'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="postal_code">Postal Code:</label>
                                <input type="number" class="form-control custm-input numberOnly" name="postal_code" value="{{$user->postal_code}}" required placeholder="Zipcode: 01234" />
                                <span class="text-danger"> @error('postal_code'){{$message}}@enderror</span>
                              </div>
                            </div>
                            <div class="col-md-12 " >
                              <input class="btn   btn-primary col-12 col-sm-12 col-md-12 col-lg-12" type="submit" value="Save Changes">
                            </div>
                      </div> 
                    </form>
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

