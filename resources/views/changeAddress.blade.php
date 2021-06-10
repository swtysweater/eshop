@extends('layouts.app')

@section('page-title')
Изменить адрес
@endsection

@section('content')
<div class="profile__changeaddress">
    <h1>Изменить адрес</h1>
    <form method="POST" class="my-4 text-left">
        {{csrf_field()}}
        <div class="form-group">
            <label for="city">Город</label>
            <select class="form-control" id="city" name="city">
            <?php
            
                foreach($cities as $city)
                {
                    if ($address['0']['cityID'] == $city['id'])
                    {
                        echo '<option selected value="'.$city['id'].'">'.$city['name'].'</option>';
                    } else {
                        echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';
                    }
                }
            
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Адрес</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Улица, дом, корпус, квартира" value="{{$address['0']['name']}}">
        </div>
        <div class="form-group">
            <label for="comment">Комментарий для курьера</label>
            <textarea class="form-control" id="comment" name="comment" rows="3">{{$address['0']['comment']}}</textarea>
        </div>
        <button type="submit" class="btn btn-success my-1 w-100">Сохранить</button>
    </form>
</div>
@endsection