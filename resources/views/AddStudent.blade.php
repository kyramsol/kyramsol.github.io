@extends('layouts.app')

@section('content')
<div class="align_body">
    <div>
    <div class="head">Додавання даних Студента</div>
        <div class="border">
        <form class="Addform" action="/student/new" method="post">
        <table >
            {{ csrf_field() }}
        <tr>
            <td>Прізвище: &nbsp </td><td><input text class="textfield"  required name="sname"></td>
        </tr>
        <tr>
            <td>Ім'я: &nbsp </td><td><input text class="textfield" p required name="name"></td>
        </tr>
        <tr>
            <td>По-батькові: &nbsp </td><td><input text class="textfield"  required name="fname"></td>
        </tr>
        <tr>
            <td>Рік вступу: &nbsp </td><td><input text class="textfield"  required name="year"></td>
        </tr>
        <tr>
            <td></td><td align="right"><input type="submit" class="button" value="Відправити"></td>
        </tr>
        </table>
        </form>
        </div>
    </div>
</div>
@endsection
