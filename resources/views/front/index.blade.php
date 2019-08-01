@extends('layouts.front.app')
@section('og')
<meta property="og:type" content="home" />
<meta property="og:title" content="{{ config('app.name') }}" />
<meta property="og:description" content="{{ config('app.name') }}" />
@endsection

@section('content')
-@include('layouts.front.bannerinicial')
@include('layouts.front.inicialText')
@include('layouts.front.homeIcons')
@include('layouts.front.slideInicial')
@include('layouts.front.simulador')
@endsection