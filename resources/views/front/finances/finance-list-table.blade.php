@if(!$finances->isEmpty())<div class="row d-flex justify-content-center d-flex align-items-center">
    <div class="col-12 col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 content top-buffer">
        <table class="table table-striped">
            <tbody> @foreach($cartItems as $cartItem)<tr>
                    <td> <a href="{{ route('front.get.product', [$cartItem->finance->slug]) }}" class="hover-border">
                            @if(isset($cartItem->cover)) <img src="{{asset("storage/$cartItem->cover")}}"
                                alt="{{ $cartItem->name }}" class="img-fluid img-thumbnail" width="250"> @else <img
                                src="https://placehold.it/120x120" alt="" class="img-fluid img-thumbnail"> @endif </a>
                    </td>
                    <td>
                        <h3 class="product-cart-text">{{ $cartItem->name }}</h3>
                        @if($cartItem->options->has('combination')) @foreach($cartItem->options->combination as $option)
                        <small class="label label-primary">{{$option['value']}}</small> @endforeach @endif<div
                            class="product-description"> {!! $cartItem->finance->description !!}</div>
                    </td> <input type="hidden" name="_method" value="put"> <input type="hidden" name="quantity"
                        value="1" class="form-control" />
                    <td class="cartproductprice">{{config('cart.currency_symbol')}}
                        {{ number_format($cartItem->price) }}</td>
                </tr> @endforeach</tbody>
        </table>
        <hr>
        <div class="row d-flex justify-content-end">
            <div class="col-md-6 ">
                <table class="table">
                    <tr>
                        <th scope="col bg-cartwarning">Subtotal</th>
                        <th scope="col bg-cartwarning">{{config('cart.currency_symbol')}}
                            {{ number_format($subtotal, 0, '.', ',') }}</th>
                    </tr>
                    <tr>
                        <th scope="col bg-cartwarning">Total</th>
                        <th scope="col bg-cartwarning">{{config('cart.currency_symbol')}}
                            {{ number_format($total, 0, '.', ',') }}</th>
                    </tr>
                </table>
            </div>
        </div> @endif
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){let courierRadioBtn=$('input[name="rate"]');courierRadioBtn.click(function(){let totalElement=$('span#grandTotal');let total=totalElement.data('total');let grandTotal=parseFloat(total);totalElement.html(grandTotal.toFixed(2));});});
</script>