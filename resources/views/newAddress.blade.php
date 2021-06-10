@extends('layouts.app')

@section('page-title')
Новый адрес
@endsection

@section('content')
<div class="profile__newaddress">
    <h1>Новый адрес</h1>
    <form method="POST" class="my-4 text-left">
        {{csrf_field()}}
        <div class="form-group">
            <label for="city">Город</label>
            <select class="form-control" id="city" name="city">
            <?php
            
                foreach($cities as $city)
                {
                    echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';
                }
            
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Адрес</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Улица, дом, корпус, квартира">
        </div>
        <div class="form-group">
            <label for="comment">Комментарий для курьера</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success my-1 w-100">Добавить</button>
    </form>
</div>
@endsection