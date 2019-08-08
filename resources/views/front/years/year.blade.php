@extends('layouts.front.app') @extends('layouts.front.sidebar') @section('og')
<meta property="og:type" content="category" />
<meta property="og:title" content="{{ $year->year }}" />
<meta property="og:description" content="{{ $year->description }}" /> @if(!is_null($year->cover))
<meta property="og:image" content="{{ asset("storage/$year->cover") }}" /> @endif @endsection @section('content1')
<hr>
<div class="row d-flex justify-content-center">
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "> @include('front.finances.finance-list',
        ['finances' => $finances])</div>
</div> @endsection