<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 d-flex justify-content-center top-buffer">
            <ul id="thumbnails" class="list-unstyled top-buffer">
                <li> <a href="#"> @if(isset($finance->cover)) <img class="img-fluid img-thumbnail"
                            src="{{ asset("storage/$product->cover") }}" alt="{{ $finance->name }}"> @else <img
                            class="img-fluid img-thumbnail" src="{{ asset("https://placehold.it/180x180") }}"
                            alt="{{ $finance->name }}"> @endif </a></li> @if(isset($images) && !$images->isEmpty())
                @foreach($images as $image)<li> <a href="#"> <img class="img-fluid img-thumbnail"
                            src="{{ asset("storage/$image->src") }}" alt="{{ $product->name }}"> </a></li> @endforeach
                @endif
            </ul>
        </div>
        <div class="col-md-7 text-center top-buffer">
            <h1 class="nombre"> {{ $finance->name }}</h1>
            <div class="row">
                <div class="col">
                    <h2 class="referencia float-right">Referencia: {!! $finance->sku !!}</h2>
                </div>
            </div>
            <figure> @if(isset($finance->cover)) <img id="main-image" class="img-fluid mx-auto d-block product-cover "
                    src="{{ asset("storage/$finance->cover") }}" width="500 data-zoom="
                    {{ asset("storage/$finance->cover") }}?w=1200"> @else <img id="main-image"
                    class="product-cover zoom" src="https://placehold.it/300x300"
                    data-zoom="{{ asset("storage/$finance->cover") }}?w=1200" alt="{{ $finance->name }}"> @endif
            </figure>
            <div class="row d-flex justify-content-center">
                <div class="price-box col-xs-6 col-sm-6 "> @if(!is_null($product->attributes->where('default',
                    1)->first())) @if(!is_null($product->attributes->where('default', 1)->first()->sale_price)) <span
                        class="oferta">Oferta {{ $oferta }} </span><br /> <span class="oferta"> Antes:
                        <del>{{ config('cart.currency_symbol') }}{{ number_format($product->price, 0, '.', ',') }}</del></span>
                    <span>Ahora: {{ config('cart.currency_symbol') }}
                        {{ number_format($product->attributes->where('default', 1)->first()->sale_price, 0, '.', ',') }}</span>
                    @else {{ number_format($product->attributes->where('default', 1)->first()->price, 0, '.', ',') }}
                    @endif @else {{ config('cart.currency_symbol') }} {{ number_format($product->price, 0, '.', ',') }}
                    @endif<div class="iva">IVA incluido</div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-center"> @include('layouts.errors-and-messages')<form
                        action="#" class="form-inline" method="post"> {{ csrf_field() }}
                        @if($product->quantity <= 0)<p class="btn btnproduct btn-warning-product"> <i
                                class="fa fa-cart-plus"> Agotado</i> @else <input type="text" class="hidden"
                                name="quantity" id="quantity" placeholder="Cantidad" value=1> <input type="hidden"
                                name="product" value="{{ $product->id }}">
                            <div class="block animatable fadeInUp"> <button id="add-to-cart-btn" type="submit"
                                    class="btn btn-primaryproduct">
                                    <p onclick="location.href ='{{ route('compraventaOnline') }}';"> Agregar al Carrito!
                                    </p>
                                </button></div> @endif</form>
                </div>
            </div>
        </div>
    </div>
    <div class="row top-buffer d-flex justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12 col-md-10 col-lg-9 col-xl-9">
            <div class="descripcion"> <span>Información del producto</span></div>
            <div class="product-description">
                <div class="description">{!! $product->description !!}</div><br>
            </div>
        </div>
        <div class="alertproductcontainer"> <img src="{{asset('/img/Alerta-02.png')}}"
                class="img-fluid productalertglobe" alt="Compraventa Online" width="340" />
            <div class="productalerttext text-center">Este producto se encuentra ubicado en la
                <strong>{{ $productSubsidiary['address'] }}</strong> de la ciudad de
                <strong>{{ $subsidiaryCity }}</strong></div>
        </div>
    </div>
</div>