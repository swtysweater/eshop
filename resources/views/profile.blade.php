@extends('layouts.app')

@section('page-title')
Профиль
@endsection

@section('content')
<div class="profile">
    <div class="profile__user">
        <img src="{{asset('images/user.png')}}" alt="">
        <h3>
            {{$userdata->name}}
            <br>
            <small>{{$userdata->email}}</small>
        </h3>
    </div>
    <h4>Способ оплаты</h4>
    <div class="card w-100 my-4">
        <div class="card-body text-center">
            <?php
            
                if (empty($cards))
                {
                    echo 'Вы не добавили свою карту! Перейдите по <a href="'.route('new-card').'">ссылке</a> для добавления.';
                } else {
                    foreach ($cards as $item)
                    {
                        echo '<p class="my-0">Карта ****'.substr($item['name'], -4).' До: '.$item['expdate'].'<a href="'.route('change-card').'"><i class="fa fa-pen mx-4"></i></a><p>';
                    }
                }

            ?>
        </div>
    </div>
    <h4>Адрес</h4>
    <div class="card w-100 my-4">
        <div class="card-body text-center">
            <?php
            
                if (empty($address))
                {
                    echo 'Вы не задали свой адрес для доставки! Перейдите по <a href="'.route('new-address').'">ссылке</a> для добавления.';
                } else {
                    foreach ($address as $item)
                    {
                        echo '<p class="my-0">'.$item['cityname'].', '.$item['name'].'<a href="'.route('change-address').'"><i class="fa fa-pen mx-4"></i></p></a>';
                        echo '<p class="my-0 text-muted">Комментарий: '.$item['comment'].'</p>';
                    }
                }

            ?>
        </div>
    </div>
    <h4>Заказы</h4>
    @foreach($orders->chunk(4) as $key => $chunk)
    <div class="card-deck my-4">
    @foreach($chunk as $order)
    <div class="card" style="max-width: 12rem; min-width: 10rem; margin: 1rem;">
        <div class="card-body">
            @if($order['payment_methodID'] == '3')
            <h5 class="card-title">№{{$order['id']}} <i class="fa fa-credit-card text-success text-small"></i></h5>
            @elseif($order['payment_methodID'] == '2')
            <h5 class="card-title">№{{$order['id']}} <i class="fa fa-money-bill-wave-alt text-success text-small"></i></h5>
            @endif
            <h6 class="card-subtitle mb-2 text-muted">{{$order['total']}} рублей</h6>
            <p class="card-text">
            @foreach($order['items'] as $item)
            @php
            echo $item['name'].'('.$item['qty'].' шт.) - '.$item['price']*$item['qty'].' Р'.'<br>';
            @endphp
            @endforeach
            </p>
        </div>
    </div>
    @endforeach
    </div>
    @endforeach
</div>

@include('inc.footer')

@endsection