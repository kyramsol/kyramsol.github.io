@extends('layouts.app')

@section('content')
<div class="align_body">
    <div>
    <div class="head">Додавання даних Студента</div>
        <div class="border">
        <form class="Addform">
        <table >
        <tr>
            <td>Name:</td><td><input text class="textfield" placeholder="Василий" required></td>
        </tr>
        <tr>
            <td>Second Name:</td><td><input text class="textfield" placeholder="Васильевич" required></td>
        </tr>
        <tr>
            <td>Last Name:</td><td><input text class="textfield" placeholder="Василенко" required></td>
        </tr>
        <tr>
            <td>Year:</td><td><input text class="textfield" placeholder="1986" required></td>
        </tr>
        <tr>
            <td></td><td align="right"><input type="submit" class="button" ></td>
        </tr>
        </table>
        </form>
        </div>
    </div>
</div>
@endsection
