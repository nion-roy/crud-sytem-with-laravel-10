@extends('layouts.backend.app')

@push('css')
<style>
	#currentTime {
		font-size: 4em;
		text-align: center;
		font-family: sans-serif;
		font-weight: 600;
		color: #CE1141;
		width: 100%;
		height: 60vh;
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>
@endpush

@section('main_content')

<!-- Info boxes -->
<div class="row">
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-4">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-stream"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Total Course</span>
				<span class="info-box-number">{{ $corses->count() }}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->

	<!-- fix for small devices only -->
	<div class="clearfix hidden-md-up"></div>

	<div class="col-12 col-sm-6 col-md-4">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Apply Course</span>
				<span class="info-box-number">{{ $corsesenroll->count() }}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-4">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Total Members</span>
				<span class="info-box-number">{{ $user->count() }}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->


<div class="row">
	<div class="col-12">
		<h1 id="currentTime"></h1>
	</div>
</div>


@push('js')
<script>
	window.onload = function() {
  clock();  
    function clock() {
    var now = new Date();
    var TwentyFourHour = now.getHours();
    var hour = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    var mid = 'pm';
    if(sec < 10) { 
      sec = "0" + sec; 
    }
    if (min < 10) {
      min = "0" + min;
    }
    if (hour > 12) {
      hour = hour - 12;
    }   
    if (hour < 10 ) {
      hour = "0" + hour;
    }   
    if(hour==0){ 
      hour=12;
    }
    if(TwentyFourHour < 12) {
       mid = 'am';
    }
  document.getElementById('currentTime').innerHTML =     hour+':'+min+':'+sec +' '+mid ;
    setTimeout(clock, 1000);
    }
}
</script>
@endpush


@endsection