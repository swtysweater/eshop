@extends('layouts.app')

@section('page-title')
Новая карта
@endsection

@section('content')
<div class="profile__newcard">
    <h1>Новая карта</h1>
    <form method="POST" class="my-4 text-left">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Номер карты</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="expdate">Дата окончания срока действия</label>
            <input type="text" class="form-control" id="expdate" name="expdate" placeholder="01/20" required>
        </div>
        <div class="form-group">
            <label for="cvc">CVC/CVV код</label>
            <input type="text" class="form-control" id="cvc" name="cvc" required>
        </div>
        <button type="submit" class="btn btn-success my-1 w-100">Добавить</button>
    </form>
</div>
@endsection