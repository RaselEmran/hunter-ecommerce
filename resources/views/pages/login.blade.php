@extends('welcome')
@section('maincontent')


	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
				          <?php 
$msg =Session::get('msg');
if ($msg) {
  ?>
<div class="alert alert-danger" role="alert">
<?php  echo $msg; ?>
</div>
  <?php

 Session::put('msg',null);
}
           ?>
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{url('/checklogin')}}" method="post">
						{{csrf_field()}}
							<input type="email" name="customer_email" placeholder="Enter Mail" required="" />
							<input type="password" name="password" placeholder="password" required="" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="custmoerLogin" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">

					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						           @if(count($errors)>0)
<div class="alert alert-danger">
<ul>
  @foreach($errors->all() as $error)
<li>
  {{$error}}
</li>

@endforeach
</ul>
</div>
@endif
						<form action="{{url('/customer_signup')}}" method="post">
						{{csrf_field()}}
							<input type="text" name="customer_name" placeholder="Name" required/>
							<input type="email" name="customer_email" placeholder="Email Address"/ required="">
							
							<input type="password" name="password" placeholder="Password"/>
							<input type="text" name="mobile" placeholder="mobile" required="" />
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->




@endsection