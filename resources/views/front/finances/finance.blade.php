@extends('layouts.front.app')@section('og')
<meta property="og:type" content="product" />
<meta property="og:title" content="{{ $finance->name }}" />
<meta property="og:description" content="{{ strip_tags($finance->description) }}" /> @if(!is_null($finance->cover))
<meta property="og:image" content="{{ asset("storage/$finance->cover") }}" /> @endif
 @endsection
 @section('content')<div
    class="container">
    <div class="row top-buffer bottom-buffer">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a><span class="divider">/</span>
                </li>
                <li><a href="{{ route('informacionfinanciera') }}"> Indicador Financiero</a><span class="divider">/</span></li>
                @if(isset($year))<li><a
                        href="{{ route('front.year.slug', $year->slug) }}">{{ $year->year }}</a><span
                        class="divider">/</span></li> @endif<li class="breadactive">{{ $finance->name }}</li>
            </ol>
        </div>
    </div> @include('layouts.front.finance')
</div> @endsection
