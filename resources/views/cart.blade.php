@extends('layouts.app')

@section('page-title')
Корзина - {{$total ?? '0'}} ₽
@endsection

@section('content')

<h1>Корзина</h1>

<ul class="list-group my-5">
@if(!empty($cartitems))
@php
$count = 1;
@endphp
  @foreach($cartitems as $elkey => $el)
  <li class="list-group-item d-flex align-items-center">
    <span>
    @php
      echo $count++;
    @endphp
    </span>
    <div class="flex-grow-1">
      <span>{{$el['item']['name']}}</span>
      <span id="cart-item-price" class="badge badge-success badge-pill mx-2">{{$el['item']['price']}} ₽</span>
    </div>
    <a class="mx-2" id="cart-remove-item">
      <button type="button" class="btn btn-light">-</button>
      <input id="cart-remove-item-url" type="text" hidden value="{{route('cart-remove', ['id' => $el['item']['id']])}}">
    </a>
    <span id="cart-item-qty" class="badge badge-primary badge-pill">{{$el['qty']}}</span>
    <a class="mx-2" id="cart-add-item">
      <button type="button" class="btn btn-light">+</button>
      <input id="cart-add-item-url" type="text" hidden value="{{route('cart-add', ['id' => $el['item']['id']])}}">
    </a>
    <a class="mx-2" id="cart-remove-all-items">
      <button type="button" class="btn btn-danger">Удалить</button>
      <input id="cart-remove-all-items-url" type="text" hidden value="{{route('cart-remove-all', ['id' => $el['item']['id']])}}">
    </a>
  </li>
  @endforeach

<form class="my-4" method="get" action="/cart/proceed">
{{csrf_field()}}
  <div class="form-group">
  <label for="payment_method">Способ оплаты</label>
  <select class="form-control w-50 mx-auto" name="payment_method" id="payment_method">
    <?php
    
    foreach ($methods as $key=>$value)
    {
      if($value['name'] == 'Картой')
      {
        foreach($card as $item)
        {
          echo '<option value="'.$value['id'].'">Карта ****'.substr($item['name'], -4).' '.$item['expdate'].'</option>';
        }
      } else {
        if ($key == 0)
        {
          echo '<option selected value="'.$value['id'].'">'.$value['name'].'</option>';
        } else {
          echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
        }
      }
    }
    
    ?>
  </select>
  </div>
  <a href="{{route('cart-proceed')}}" class="buy-btn my-5 mx-auto">
    <button id="cart-total" type="submit" class="btn btn-success">Заказать - {{$total}} ₽</button>
  </a>
</form>
@else
<h3 class="text-center" style="opacity: 0.5;">Корзина пуста :(</h3>
@endif
</ul>
@include('inc.footer')

@endsection