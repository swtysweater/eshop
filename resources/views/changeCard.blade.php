@extends('layouts.app')

@section('page-title')
Изменить карту
@endsection

@section('content')
<div class="profile__newcard">
    <h1>Изменить карту</h1>
    <form method="POST" class="my-4 text-left">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Номер карты</label>
            <input type="text" class="form-control" name="name" id="name" required value="{{$cards['0']['name']}}">
        </div>
        <div class="form-group">
            <label for="expdate">Дата окончания срока действия</label>
            <input type="text" class="form-control" id="expdate" name="expdate" placeholder="01/20" required value="{{$cards['0']['expdate']}}">
        </div>
        <div class="form-group">
            <label for="cvc">CVC/CVV код</label>
            <input type="password" class="form-control" id="cvc" name="cvc" required value="{{$cards['0']['cvc']}}">
        </div>
        <button type="submit" class="btn btn-success my-1 w-100">Сохранить</button>
    </form>
</div>
@endsection