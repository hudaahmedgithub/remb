@extends('front.master')
@section('title','Cart Page')
@section('content')
    <script>
        $(document).ready(function(){
            <?php for($i=1;$i<20;$i++){?>
$('#upCart<?php echo $i;?>').on('change keyup', function(){
                var newqty = $('#upCart<?php echo $i;?>').val();
                var rowId = $('#rowId<?php echo $i;?>').val();
                var proId = $('#proId<?php echo $i;?>').val();
                if(newqty <=0){ alert('enter only valid qty') }
                else {
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/cart/update');?>/'+proId,
                        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                        success: function (response) {
                            console.log(response);
                            $('#updateDiv').html(response);
                        }    
					})
                }
            });
            <?php } ?>
        });
    </script>
    <?php if ($cartItems->isEmpty()) { ?>
    <br>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <div align="center">  <img src="{{asset('dist/images/empty.jpg')}}"/></div>
        </div>
    </section> <!--/#cart_items-->
    <?php } else { ?>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}"></a></li>
                    <li class="active"> <div class="col-md-12 card"style="border:10px solid #f70">
                <div class="card-header"style="background:#f70;color:#fff">
				Shopping Cart
				<br>
				
				</div>
						</div>
</li>
                </ol>
            </div>
            <div id="updateDiv">

                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead class="badge_info" style="background:#0bf"> 
                        <tr class="cart_menu badge_info" style="color:#fff">
                            <td class="image">Image</td>
                            <td class="description">Product</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        @if(session('error'))

                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        </thead>
                        <?php $count =1;?>
                        @foreach($cartItems as $cartItem)
                            <tbody>
                            <tr>
               <td class="cart_product">
                <p><img src="{{url('uploads/bu_images',$cartItem->options->img)}}" class="img-responsive" width="250"></p>
                      </td>
                                <td class="cart_description">
                                <!--<a href="{{url('/product_detail')}}/{{$cartItem->id}}">heang</a>
                                            <br>-->
                                    <!--</div>-->
                                    <h4><a href="{{url('/product_detail')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                                    <p>Product ID: {{$cartItem->id}}</p>
                                    <p>Only {{$cartItem->options->stock}} left</p>
                                </td>
                                <td class="cart_price">
                                    <p>${{$cartItem->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <form action="{{url('cart/update',$cartItem->rowId)}}" method="post" role="form">

                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="proId" value="{{$cartItem->id}}"/>
                                        <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                               autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                                        <input type="submit" class="btn btn-primary"style="background:#0bf" value="Update" styel="margin:5px">
                                    </form>

                                    <!--</div>-->
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                                </td>
                                <td class="cart_delete">
                                    <button class="btn btn-danger" style="background:#f70;color:#fff">
                                        <a class="cart_quantity_delete" style="color:#fff" href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times">Remove From Cart</i></a>
                                    </button>
                                </td>
                            </tr>
                            <?php $count++;?>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
            
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>${{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>${{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>${{Cart::total()}}</span></li>
                        </ul>
                       
                        <a class="btn btn-default check_out" href="{{url('/')}}/checkout" style="background:#f70;color:#fff">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
    <?php } ?>
@endsection