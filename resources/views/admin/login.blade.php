<?php
if (false) {
	$user = new App\User();
	$user -> username = 'test';
	$user -> level = 1;
	$user -> password = Hash::make('');
	$user -> email = '@gmail.com';
	$user -> save();

}
?>

@section('title', 'Admin - Panel')
<!DOCTYPE html>
<html lang="en">
	<head>
		@include('layout.partials.head')
	</head>
	<body class="">
		<div class="container-fluid">
			<div class="row" style="padding-top: 200px;">
				<div class="col-sm"></div>
				<div class="col-sm">
					<h3>Admin Panel</h3>
				</div>
				<div class="col-sm"></div>
			</div>
			<div class="row">
				<div class="col-sm"></div>
				<div class="col-sm">
					<form method="post" action="<?php echo Request::root();?>/admin-panel/check">
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input name="password" type="password" class="form-control" id="exampleInputPassword1">
						</div>
						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Remember me</label>
						</div>
						<button type="submit" class="btn btn-primary">
							Submit
						</button>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
				</div>
				<div class="col-sm"></div>
			</div>
		</div>
		@include('layout.partials.footer-scripts')
	</body>
</html>
