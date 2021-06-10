@extends('layouts.app')

@section('page-title')
{{$data['name']}} - eshop
@endsection

@section('content')
<div class="item col pd-4">

    <img class="row mx-auto py-5" style="height: 15rem; width: auto;" src="{{asset('images/products/'.$data['image'])}}">

    <h1 class="text-center m-4">{{$data['name']}}</h1>

        <div class="col">
            <div class="list-group list-group-horizontal text-center" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-info-list" data-toggle="list" href="#list-info" role="tab" aria-controls="info">Информация</a>
            <a class="list-group-item list-group-item-action" id="list-nutrition-list" data-toggle="list" href="#list-nutrition" role="tab" aria-controls="nutrition">БЖУ</a>
            </div>
        </div>

        <div class="col">
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-info" role="tabpanel" aria-labelledby="list-info-list">
                <ul class="my-4 list-group">
                    <li class="list-group-item">Производитель: {{$data['factoryName']}}</li>
                    <li class="list-group-item">Страна: {{$data['factoryName']}}</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="list-nutrition" role="tabpanel" aria-labelledby="list-nutrition-list">
                <ul class="my-4 list-group">
                    <li class="list-group-item">Белки: {{$data['protein']}}</li>
                    <li class="list-group-item">Жиры: {{$data['fats']}}</li>
                    <li class="list-group-item">Углеводы: {{$data['carbs']}}</li>
                </ul>
            </div>
            </div>
        </div>

    <a class="row m-4 text-decoration-none" href="{{route('add-item', $data['id'])}}">
        <button class="mx-auto px-5 rounded-pill btn btn-success">В корзину - {{$data['price']}}₽</button>
    </a>

</div>
@include('inc.footer')

@endsection
