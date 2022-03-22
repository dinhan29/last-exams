@extends('admin.template')

@section('title', 'Profile')

@section('css')
<!-- bootstrap-wysiwyg -->
<link href="/admin/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
<!-- Select2 -->
<link href="/admin/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- Switchery -->
<link href="/admin/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- starrr -->
<link href="/admin/vendors/starrr/dist/starrr.css" rel="stylesheet">
@endsection

@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Profile</h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5  form-group pull-right top_search">
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_content">
						<br />
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
							@csrf
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="name" name="name" required="required" class="form-control " value="{{$admin['name'];}}">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Email <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="email" name="email" value="{{$admin['email'];}}" required="required" class="form-control">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> New Password
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="password" id="password" name="password" class="form-control">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
								<div class="col-md-6 col-sm-6 ">
									<div id="gender" class="btn-group" data-toggle="buttons">
										<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
											<input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
										</label>
										<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
											<input type="radio" name="gender" value="female" class="join-btn"> Female
										</label>
									</div>
								</div>
							</div>
							<!-- <div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
									<script>
										function timeFunctionLong(input) {
											setTimeout(function() {
												input.type = 'text';
											}, 60000);
										}
									</script>
								</div>
							</div> -->
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</form>
						@if(session()->has('message'))
							<div class="alert alert-success">
								{{ session()->get('message') }}
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<!-- bootstrap-wysiwyg -->
<script src="/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="/admin/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="/admin/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="/admin/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="/admin/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="/admin/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="/admin/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="/admin/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="/admin/build/js/custom.min.js"></script>
@endsection