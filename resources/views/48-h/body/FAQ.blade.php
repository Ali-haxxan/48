@include('48-h/head')
@include('48-h/header')
@php
	$print = $settings->faq;
@endphp
<div class="content-sec">
	<div class="container">
		<div class="row">
			
			<div class="col-12 col-sm-9 col-md-9 pt-0 pl-md-0 ">
				<div class="register-content-sec heightfull">
					@php
                    echo $print;
                    @endphp
				</div>
			</div>
		</div>
	</div>
	<div class="mb-4"></div>
	@include('48-h/footer')
</div>