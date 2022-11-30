@extends('layouts.layout')
@section('content')

@if($errors->any())
    <div class="alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach    
        </ul>
    </div>
@endif
<form action="/article/store" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Дата</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Имя статьи</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Аннотация</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="annotation">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Описание</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="description">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection