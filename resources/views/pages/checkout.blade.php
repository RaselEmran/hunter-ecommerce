@extends('welcome')
@section('maincontent')


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->



			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
	
					<div class="col-sm-10 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="{{url('save-shiping')}}" method="post">
                             {{csrf_field()}}
									<input type="text" name="shiping_first_name" placeholder="First Name *" required="">
									<input type="text" name="shiping_last_name" placeholder="Last Name *" required="">
									<input type="email" name="shiping_email" placeholder="Email *" required="">
									<input type="text" name="shiping_address" placeholder="Address*" required="">
									<input type="text" name="shiping_mobile" placeholder="Mobile Number *" required="">
									<input type="text" name="shiping_city" placeholder="City" required="">
									<input type="submit" name="submit" value="Okk" class="btn btn-warning">
								</form>
							</div>
							
							</div>
						</div>
					</div>					
				</div>
			</div>


	</section> <!--/#cart_items-->



@endsection
