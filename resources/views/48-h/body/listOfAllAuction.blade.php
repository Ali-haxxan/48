@include('48-h/head')
@include('48-h/header')

<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="inner-banner-heading">Auction</div>
				<ul class="breadcum">
					<li><a href="index.html">Home</a></li>
					<li><a href="javascript:void(0);">All Auction</a></li>
									</ul>
			</div>
		</div>
	</div>
</div>
<!-- message area-->

<!-- content section -->
<div class="container">
	<div class="row searchFilter">
		<div class="col-12 col-sm-12">
			<form action="http://48-h.com/home/searchAuctionByCountryAndCategory" enctype="multipart/form-data" method="post" />
				<input type="hidden" name="csrftestname" value="6f96ecada0f77497aa76a9a5374f4a6e">
				<div class="form-row">
					<div class="form-group col-md-4">
												<label for="inputState">Select Country</label>
						<select id="country" name="country" class="form-control"  />
							<option value="">Select</option>
							@foreach ($countries as $country)

							<option {{ old('country') == "$country->name" ? 'selected="selected"' : '' }} value="{{$country->name}}">{{$country->name}}</option>
							@endforeach								
						</select>
					</div>
					
					<div class="form-group col-md-4">
											<label for="inputState">Select Category</label>
						<select id="category" name="category" class="form-control">
							<option value="">Select Category</option>
							@foreach ($categories as $category)
							<option {{ old('category') == "$category->category" ? 'selected="selected"' : '' }} value="{{$category->id}}">{{$category->category}}</option>
							@endforeach													
						</select>
					</div>
					
					<div class="form-group col-md-4">
						<button id="searchBtn" type="submit" class="btn btn-secondary btn-search" style="margin-top: 33px" onclick=""return formValidation();><span class="glyphicon glyphicon-search" >&nbsp;</span> <span class="label-icon" >Search</span></button>
						<button id="searchBtn" type="reset" class="btn btn-secondary btn-search" style="margin-top: 33px"><span class="glyphicon glyphicon-search" >&nbsp;</span> <span class="label-icon" >Reset</span></button>
					</div>
				</div>
			</div>
		</form>
	</div>
	
</div>
</div>
<div class="content-sec mb-3">
	<div class="container">
		<div class="row">
			
			<div class="col-12 col-sm-9 col-md-9 pt-0 pl-md-0 ">
				<div class="left-content-sec">
					<div id="style-1">
						<div class="left-body-sec">
																<div class="left-sec-row">
										<div class="img-rel-cont">
											<div class="left-body-heading">No data found.</div>
										</div>
									</div>
													</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-3 col-md-3 pr-md-0 ">
				<!-- tata sky add -->
<!--										<div class="advertise">-->
<!--							<img src="assets/site/main/advertise/1569845067_secondad.png" alt="Solution of Outstanding results" />-->
<!--						</div>-->
										<!-- tata sky add -->
			</div>
		</div>
	</div>
</div>	

@include('48-h/footer')