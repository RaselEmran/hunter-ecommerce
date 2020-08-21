@extends('welcome')
@section('maincontent')


			<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
						@foreach($details as $d)
							<div class="view-product">
								<img src="../{{$d->product_image}}" alt="" height="250" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{'/fontend'}}/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="{{'/fontend'}}/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="{{'/fontend'}}/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{'/fontend'}}/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="{{'/fontend'}}/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="{{'/fontend'}}/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{'/fontend'}}/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="{{'/fontend'}}/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="{{'/fontend'}}/images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{'/fontend'}}/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$d->description}}</h2>
								
								<img src="{{'/fontend'}}/images/product-details/rating.png" alt="" />
								<span>
									<span>BDT:{{$d->product_price}}</span>
									<label>Quantity:40</label>
									<form action="{{url('/add_to_cart')}}" method="post">
									{{csrf_field()}}
									<input type="text" name="qty" value="1" />
									<input type="hidden" name="pid" value="{{$d->id}}">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									</form>
								</span>
						
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b>{{$d->brand_name}}</p>
								<a href=""><img src="{{'/fontend'}}/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
							@endforeach
						</div>
					</div><!--/product-details-->

		<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>





@endsection