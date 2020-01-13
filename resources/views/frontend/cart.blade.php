@extends('layouts.frontendapp')
@section('frontend_content')



  	<!-- Page -->
  	<div class="page-area cart-page spad">
  		<div class="container">
  			<div class="cart-table">
  				<table>
  					<thead>
  						<tr>
  							<th class="product-th">Product</th>
  							<th>Price</th>
  							<th>Quantity</th>
  							<th class="total-th">Total</th>
  						</tr>
  					</thead>
  					<tbody>

              @forelse($card_items as $card_item)
                <tr>
                  <td class="product-col">

                    <img src="{{asset('uploads/product_photo')}}/{{ App\Product::find($card_item->product_id)->product_image}}" alt="" width="50">
                    <div class="pc-title">
                      <h4>{{App\Product::find($card_item->product_id)->product_name}}</h4>
                      <a href="{{url('delete/from/cart')}}/{{$card_item->id}}">Delete Product</a>


                      @if(App\Product::find($card_item->product_id)->product_quantity == 0)
                          <div class="alert alert-danger" role='alert'>
                              Please Delete this
                          </div>
                      @endif

                    </div>
                  </td>
                  <td class="price-col">৳ {{App\Product::find($card_item->product_id)->product_price}}</td>
                  <td class="quy-col">
                    <div class="quy-input">
                      <span>Qty</span>
									             <input type="number">
                      <span>{{$card_item->product_quantity}}</span>

                    </div>
                  </td>
                  <td class="total-col">৳ {{(App\Product::find($card_item->product_id)->product_price) * $card_item->product_quantity }}</td>
                </tr>
                @empty
                  <tr><br>

                      <td>   <h6> No Product Available </h6> </td>
                  </tr>


                @endforelse

  					</tbody>
  				</table>
  			</div>
  			<div class="row cart-buttons">
  				<div class="col-lg-5 col-md-5">
  					<a href="{{url('/')}}"> <div class="site-btn btn-continue">Continue shooping</div> </a>
  				</div>
  				<div class="col-lg-7 col-md-7 text-lg-right text-left">
  				<a href="{{'clear/cart'}}"> 	<div class="site-btn btn-clear">Clear cart</div></a>
  					<div class="site-btn btn-line btn-update">Update Cart</div>
  				</div>
  			</div>
  		</div>
  		<div class="card-warp">
  			<div class="container">
  				<div class="row">
  					<!--<div class="col-lg-4">
  						<div class="shipping-info">
  							<h4>Shipping method</h4>
  							<p>Select the one you want</p>
  							<div class="shipping-chooes">
  								<div class="sc-item">
  									<input type="radio" name="sc" id="one">
  									<label for="one">Next day delivery<span>$4.99</span></label>
  								</div>
  								<div class="sc-item">
  									<input type="radio" name="sc" id="two">
  									<label for="two">Standard delivery<span>$1.99</span></label>
  								</div>
  								<div class="sc-item">
  									<input type="radio" name="sc" id="three">
  									<label for="three">Personal Pickup<span>Free</span></label>
  								</div>
  							</div>
  							<h4>Cupon code</h4>
  							<p>Enter your cupone code</p>
  							<div class="cupon-input">
  								<input type="text">
  								<button class="site-btn">Apply</button>
  							</div>
  						</div>
  					</div>-->


  					<div class="col-lg-12">
  						<div class="cart-total-details">
  							<h4>Cart total</h4>
  							<p>Final Info</p>

              <span style="display:none"> {{$total_cost = 0}} </span>

              @foreach($card_items as $card_item)
  							<ul class="cart-total-card bg-error">

                  <li><h4>For {{App\Product::find($card_item->product_id)->product_name}} </h4></li>
  								<li>Subtotal<span>৳ {{(App\Product::find($card_item->product_id)->product_price) * $card_item->product_quantity }}</span></li>
  								<li>Packaging Charge<span>৳ {{ $package_cost = ((App\Product::find($card_item->product_id)->product_price) * $card_item->product_quantity) * 10/100}}</span></li>
	                <li>Delivery Charge<span>৳ {{ $delibary_cost = ((App\Product::find($card_item->product_id)->product_price) * $card_item->product_quantity) * 18/100}}</span></li>

  								<li class="total">Total<span>৳ {{ $total_cost = (App\Product::find($card_item->product_id)->product_price) * $card_item->product_quantity + $package_cost + $delibary_cost }}</span></li>

  							</ul>
             @endforeach


             <h7 style="display:none"> {{$total_cost = 0}} </h7>

             @foreach($card_items as $card_item)
               <ul class="" style="display:none">

                      <li class="text-danger">For {{App\Product::find($card_item->product_id)->product_name}} </li>
                      <li>Subtotal<span>৳ {{(App\Product::find($card_item->product_id)->product_price) * $card_item->product_quantity }}</span></li>
                      <li>Packaging Charge<span>৳ {{ $package_cost = ((App\Product::find($card_item->product_id)->product_price) * $card_item->product_quantity) * 10/100}}</span></li>
                      <li>Delivery Charge<span>৳ {{ $delibary_cost = ((App\Product::find($card_item->product_id)->product_price) * $card_item->product_quantity) * 18/100}}</span></li>
                      <li class="total">Total<span>৳ {{ $total_cost = $total_cost + (App\Product::find($card_item->product_id)->product_price) * $card_item->product_quantity + $package_cost + $delibary_cost }}</span></li>

              </ul>


              @endforeach

                <li>  <h3 class="total text-white bg-dark" style="text-align: right;"> Total Cost ৳{{$total_cost}} </h3></li>

  							<a href="{{url('/dynamic_dependent')}}" class="site-btn btn-full" >Proceed to Shipping</a>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<!-- Page end -->

@endsection
