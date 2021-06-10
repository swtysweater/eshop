@extends('layouts.app')

@section('page-title')
Главная страница
@endsection

@section('content')

<hero></hero>

<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

        @foreach($data->chunk(3) as $key => $chunk)
        @if($key == 0)
            <div class="carousel-item active">
        @else
            <div class="carousel-item">
        @endif
            <div class="card-deck">
                @foreach($chunk as $el)
                <div class="card" id="product">
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
                            <a href="{{asset(route('item')) . '?id=' . $el['id']}}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
        @endforeach

  </div>

  <ol class="carousel-indicators">
  @foreach($data->chunk(3) as $key => $chunk)
    @if($key == 0)
        <li class="rounded-pill active" data-target="#multi-item-example" data-slide-to="{{$key}}" class="active"></li>
    @else
        <li class="rounded-pill" data-target="#multi-item-example" data-slide-to="{{$key}}" class="active"></li>
    @endif
  @endforeach
  </ol>

</div>

@include('inc.footer')

@endsection
