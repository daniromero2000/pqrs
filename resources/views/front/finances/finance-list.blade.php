@if(!empty($finances) && !collect($finances)->isEmpty())<ul
    class="row text-center list-unstyled d-flex justify-content-center"> @foreach($finances as $finance)
    <li class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
        <div class=" shadow p-3 mb-5 bg-white ">
            <div class="single-product">
                <div class="product d-flex justify-content-center d-flex align-items-center">
                    <div class="product-overlay d-flex justify-content-center d-flex align-items-center">
                        <div class="vcenter d-flex justify-content-center d-flex align-items-center">
                            <div class="centrize d-flex justify-content-center d-flex align-items-center">
                                <form action="#" class="form-inline" method="post">
                                    {{ csrf_field() }}<input type="hidden" name="product" value="{{ $finance->id }}">
                                </form> <a class="btn btn-default product-btn"
                                    href="{{ route('front.get.finance', str_slug($finance->id)) }}">Ver Indicador
                                    Financiero</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="product-text">{{ $finance->name }}</h3>
                </div>
            </div>
    </li>
    @endforeach

    @if($finances instanceof IlluminateContractsPaginationLengthAwarePaginator)<div class="row">
        <div class="col-md-12">
            <div class="pull-left">{{ $finances->links() }}</div>
        </div>
    </div> @endif</ul>
@else<p class="alert alert-warning">No hay Estados financieros Aun</p> @endif