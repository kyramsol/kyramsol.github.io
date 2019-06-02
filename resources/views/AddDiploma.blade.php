@extends('layouts.app')

@section('content')
<div class="align_body">
    <div>
    <div class="head">Додавання Роботи</div>
        <div class="border">
        <form class="Addform">
        <table>
        <tr>
            <td>Назва</td>   <td><input text class="textfield"  required name="call"></td>
        </tr>
        <tr>
            <td>Куратор</td>   <td><input text class="textfield"  required name="teacher"></td>
        </tr>
        <tr>
            <td>Оцiнка</td>   <td><input text class="textfield"  required name="mark"></td>
        </tr>
        <tr>
            <td>ФАЙЛ??????</td>   <td><input text class="textfield"  required name="filepath"></td>
        </tr>
        <tr>
            <td></td>   <td align="right"><input type="submit" class="button" ></td>
        </tr>
        </table>
        </form>
        </div>
    </div>
</div>
@endsection