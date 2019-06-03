@extends('layouts.app')

@section('content')
    <div class="pad">
        <div>
    <div class="position">

        <form>
            <input type=text class="main" placeholder="Пошук Роботи" required name="search">
            <input type="submit" class="button" value="Пошук">
        </form>
        <div class="align">
            <form action="/student">
                <input type="submit" class="button" value="Додати студента">
            </form>
            <form action="/AddDiploma">
                <input type="submit" class="button" value="Завантажити Роботу">
            </form>
        </div>
    </div>
    <h4>Пошук по запиту:</h4>
    <table class="tablestyle" >
        <tr>
            <th>Назва Роботи</th>    <th></th> <th>Виконавець</th>     <th>Спеціальність</th>        <th>Вид роботи</th> <th>Предмет</th> <th>Оцінка</th>
        </tr>
        @foreach($students as $s)
        <tr>
            <td>Система онлайн обліку кваліфікаційних робіт </td>      <td><a href="/student/{{$s->id}}"><i class="far fa-edit"></i></a></td>  <td>{{ $s->second_name}}&nbsp{{ $s->first_name }}&nbsp{{$s->father_name}}</td>      <td> </td>      <td> </td>      <td> </td>      <td> </td>
        </tr>
            @endforeach
    </table>
        </div>
    </div>
@endsection