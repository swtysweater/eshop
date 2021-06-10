@extends('layouts.app')

@section('page-title')
Каталог
@endsection

@section('content')

@if(Route::currentRouteName() == 'catalog')
<h1 class="my-4">Категории</h1>
<div class="text-center">
@foreach($categories as $category)
<div class="card category d-inline-block" style="width: 18rem;">
    <a href="{{route('category', ['id' => $category['id']])}}">
        <img class="card-img-top" src="{{asset($category['img'])}}">
        <p>{{$category['name']}}</p>
    </a>
</div>
@endforeach
</div>
@endif
@if(Route::currentRouteName() == 'category')
@foreach($data as $el)
<div class="card " id="product" style="width: 18rem; display: inline-block; margin: 1rem;">
    <img class="card-img-top" src="{{asset('images/products/'.$el['image'])}}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$el['name']}}</h5>
        <p class="card-text text-muted">{{$el['factoryName']}}, {{$el['country']}}</p>
        <div class="d-flex flex-col justify-content-center btn-group-vertical">
            <a id="add-item" class="btn btn-sm btn-outline-success">
                <i class="fas fa-shopping-basket"></i>
                <span>{{$el['price']}} ₽</span>
                <input id="add-item-url" hidden type="text" value="{{route('add-item', $el['id'])}}">
            </a>
            <a href="{{asset(route('item', ['id'=>$el['id']]))}}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
        </div>
    </div>
</div>
@endforeach
@endif
@include('inc.footer')

@endsection
