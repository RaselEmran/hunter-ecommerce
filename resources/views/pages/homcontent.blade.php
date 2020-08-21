@extends('welcome')
@section('maincontent')
                        <h2 class="title text-center">Features Items</h2>
@foreach($product as $products)



                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../{{$products->product_image}}" alt="" height="250" />
                                            <h2>BDT:{{$products->product_price}}</h2>
                                            <p>{{$products->description}}</p>
                                            <a href="../product_details/{{$products->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>BDT:{{$products->product_price}}</h2>
                                                <p>{{$products->description}}</p>
                                                <a href="../product_details/{{$products->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="../product_details/{{$products->id}}"><i class="fa fa-plus-square"></i>View Product</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                 @endforeach
                       
                        
                        
                        
                   
@endsection