@extends('layouts.app')

@section('page-title')
Главная страница
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')

<div class="jumbotron col my-5">
    <img class="row w-50 img-fluid mx-auto my-5" src="{{asset('images/products/1.png')}}">
    <p class="logotext row text-center mx-auto my-5">Онлайн-магазин товаров</p>
</div>

@include('inc.footer')

@endsection
