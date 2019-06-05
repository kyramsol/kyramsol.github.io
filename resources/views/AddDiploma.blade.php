@extends('layouts.app')

@section('content')
<div class="align_body">
    <div>
    <div class="head">Додавання Роботи</div>
        <div class="border">

        <form class="Addform" method="post" action="/AddDiploma/new" enctype="multipart/form-data">
            {{ csrf_field() }}
        <table>
            <tr>
                <td>Творець</td>   <td><input text class="textfield"  required name="creator"></td>
            </tr>
        <tr>
            <td>Назва</td>   <td><input text class="textfield"  required name="call"></td>
        </tr>
        <tr>
            <td>Керівник</td>   <td><input text class="textfield"  required name="teacher"></td>
        </tr>
        <tr>
            <td>Оцiнка</td>   <td><input text class="textfield"  required name="mark"></td>
        </tr>
            <tr>
                <td>Рік написання</td>   <td><input text class="textfield"  required name="creation_year"></td>
            </tr>
            <tr>
                <td></td><td colspan="2"><div class="fileadd"><input class="dropdown"  list="Department" placeholder="Спеціальність"><input class="dropdown"  list="Group" placeholder="группа"></div></td>
            </tr>


        <tr>
            <td colspan="2"><div class="fileadd"><input type="file" name="filepath">   <input type="submit" class="button" ></div></td>
        </tr>
        </table>
        </form>
        </div>
        <datalist id="Department">
            @foreach($choose[0] as $department)
            <option>{{$department->name}}</option>
            @endforeach
        </datalist>

        <datalist id="Group">
            @foreach($choose[1] as $group)
                <option>{{$group->group_code}}</option>
            @endforeach
        </datalist>
    </div>
</div>
    <div>


@endsection