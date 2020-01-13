@extends('layouts.frontendapp')
@section('frontend_content')

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

     <h3 class="total text-white bg-dark" style="text-align: center;"> Total Cost ৳{{$total_cost}} </h3></li>







     	<!-- Page -->
     	<div class="page-area cart-page spad">
     		<div class="container">
     			<form class="checkout-form">
     				<div class="row">
     					<div class="col-lg-6">
     						<h4 class="checkout-title">Billing Address</h4>
     						<div class="row">
     							<div class="col-md-6">
     								<input type="text" placeholder="First Name *">
     							</div>
     							<div class="col-md-6">
     								<input type="text" placeholder="Last Name *">
     							</div>
     							<div class="col-md-12">
     								<input type="text" placeholder="Phone no *">

                    <input type="text" placeholder="Alt Phone no *">

                    <input type="text" placeholder="Email *">


                    <form action="{{url('add/shipping/insert')}}" method="post" enctype="multipart/form-data">

                        @csrf()


                            @if(session('status'))

                                <div class="alert alert-success">

                                    {{session('status')}}

                                </div>

                            @endif




                      <select name="division" id = "country" class="form-control input-lg dynamic" data-dependent='country'>
                        <option name=''>-Select Division-</option>


                            <option value=""></option>



                      </select>





                      <select name="zilla" id = "zilla" class="form-control input-lg dynamic" data-dependent='zilla'>

                            <option name=''>-Select Zilla-</option>

                      </select>





                      <select name="upzilla" id = "upzilla" class="form-control input-lg">

                            <option name=''>-Select Upilla-</option>

                      </select>




                    <select>
                      <option>Curiar Name *</option>
                      <option>USA</option>
                      <option>UK</option>
                      <option>BANGLADESH</option>
                    </select>


                    <div class="form-group">
                      <label for="comment">Curier Address : </label>
                      <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>


     							</div>
     						</div>
     					</div>


     					<div class="col-lg-6">
     						<div class="order-card">
     							<div class="order-details">
     								<div class="od-warp">
     									<h4 class="checkout-title">Your order</h4>
     									<table class="order-table">
     										<thead>
     											<tr>
     												<th>Product</th>
     												<th>Total</th>
     											</tr>
     										</thead>
     										<tbody>
     											<tr>
     												<td>Cocktail Yellow dress</td>
     												<td>$59.90</td>
     											</tr>
     											<tr>
     												<td>SubTotal</td>
     												<td>$59.90</td>
     											</tr>
     											<tr class="cart-subtotal">
     												<td>Shipping</td>
     												<td>Free</td>
     											</tr>
     										</tbody>
     										<tfoot>
     											<tr class="order-total">
     												<th>Total</th>
     												<th>{{$total_cost}}</th>
     											</tr>
     										</tfoot>
     									</table>
     								</div>
     								<div class="payment-method">
     									<div class="pm-item">
     										<input type="radio" name="pm" id="one">
     										<label for="one">Paypal</label>
     									</div>
     									<div class="pm-item">
     										<input type="radio" name="pm" id="two">
     										<label for="two">Cash on delievery</label>
     									</div>
     									<div class="pm-item">
     										<input type="radio" name="pm" id="three">
     										<label for="three">Credit card</label>
     									</div>
     									<div class="pm-item">
     										<input type="radio" name="pm" id="four" checked>
     										<label for="four">Direct bank transfer</label>
     									</div>
     								</div>
     							</div>

                  <button type="submit" class="site-btn btn-full">Place Order</button>

          </form>
     						</div>
     					</div>
     				</div>
     			</form>
     		</div>
     	</div>
     	<!-- Page -->


@endsection
