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
           {{ App\Cart::where('customar_ip', $_SERVER['REMOTE_ADDR'])->sum('product_quantity') }}
   </ul>


   @endforeach






<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>



  <br />


  <div class="container box">
   <h2 align="center">Total Cost ৳{{$total_cost}}</h2>




</form><br>
  </div>


 </body>
</html>



<!-- Page -->
<div class="page-area cart-page spad">
  <div class="container">


    <form action="{{url('add/city/insert')}}" method="post" class="checkout-form">

      @csrf()



      @if(session('status'))

          <div class="alert alert-success">

              {{session('status')}}

          </div>

      @endif


      <div class="row">
        <div class="col-lg-6">
          <h4 class="checkout-title">Billing Address</h4>
          <div class="row">






                  <div class="col-md-6">
                    <input name="f_name" type="text" required placeholder="First Name *">
                  </div>
                  <div class="col-md-6">
                    <input name="l_name"type="text" required placeholder="Last Name *">
                  </div>
                  <div class="col-md-12">
                    <input name="phn_number" type="text" required placeholder="Phone no *">

                    <input name="alt_phn_number" type="text" required placeholder="Alt Phone no *">

                    <input name="email" type="email" required placeholder="Email *">





                      <div class="form-group">

                           <select name="division" id="division" class="form-control input-lg dynamic" data-dependent="zilla">
                                <option value="">Select Country</option>
                                @foreach($country_list as $country)
                                <option value="{{ $country->division}}">{{ $country->division }}</option>
                                @endforeach
                           </select>

                      </div>

                      <div class="form-group">
                           <select name="zilla" id="zilla" class="form-control input-lg dynamic" data-dependent="upzilla">
                            <option value="">Select State</option>
                           </select>
                      </div>




                        <div class="form-group">
                          <select name="upzilla" id="upzilla" class="form-control input-lg">
                            <option value="">Select City</option>
                          </select>
                        </div>


                        {{ csrf_field() }}


              <div class="form-group">
                <select name="curier_name" id="curier_name" class="form-control input-lg">
                  @foreach ($curier_lists as $curier_list)
                    <option>{{$curier_list->courier}}</option>
                  @endforeach
                </select>
              </div>


              <div class="form-group">
                <label for="comment">Curier Address : </label>
                <textarea name="curier_adds" class="form-control" rows="5" id="comment"></textarea>
              </div>


            </div>

            <div class="checkbox-items">
									<div class="ci-item">
										<input type="checkbox" name="a" id="tandc">
										<label for="tandc">Terms and conditions</label>
									</div>
									<div class="ci-item">
										<input type="checkbox" name="b" id="newaccount">
										<label for="newaccount">Create an account</label>
										<input type="password" placeholder="password">
									</div>
									<div class="ci-item">
										<input type="checkbox" name="c" id="newsletter">
										<label for="newsletter">Subscribe to our newsletter</label>
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
                      <th><b>৳{{$total_cost}}<b></th>
                    </tr>
                  </tfoot>
                </table>
              </div>


              <div class="payment-method">
                <div class="pm-item">
                  <input type="radio" name="pm" id="one">
                  <label for="one">Payment Method</label>
                </div>

                <div class="form-group">
                  <select name="payment_method" id="payment_method" class="form-control input-lg">
                    @foreach ($payment_methods as $payment_method)
                      <option>{{$payment_method->payment_method}}</option>
                    @endforeach
                  </select>
                </div>


                  <input name="sender_number" required type="text" placeholder="Sender Number *">

                  <input name="translation_number" required type="text" placeholder="TrxID Translation No*">





              </div>



            </div>

            <button type="submit" class="site-btn btn-full">Continue to Payment</button>



          </div>
        </div>
      </div>


    </form>
  </div>
</div>
<!-- Page -->



<script>

$(document).ready(function(){

       $('.dynamic').change(function(){
        if($(this).val() != '')
  {
         var select = $(this).attr("id");
         var value = $(this).val();
         var dependent = $(this).data('dependent');
         var _token = $('input[name="_token"]').val();
         $.ajax({
                      url:"{{ route('dynamicdependent.fetch') }}",
                      method:"POST",
                      data:{select:select, value:value, _token:_token, dependent:dependent},
                      success:function(result)
                      {
                       $('#'+dependent).html(result);
                      }

                })
    }
 });

 $('#division').change(function(){
  $('#zilla').val('');
  $('#upzilla').val('');
 });

 $('#zilla').change(function(){
  $('#upzilla').val('');
 });


});
</script>
@endsection
