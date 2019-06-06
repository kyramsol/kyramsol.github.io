@extends('layouts.app')

@section('content')
    <div class="pad">
        <div class="anketa_size ">
            <div>
                <div class="head">Відомості про роботу</div>
            </div>
            <div class="border ">
                <div class="anketa_flex pad">

                    <table class="anketa_table">
                        <tr>
                            <td colspan="2" bgcolor="#dcdcdc"><b>Робота</b></td>
                        </tr>
                        <tr>
                            <td>Назва</td>
                            <td>{{$diploma->description}}</td>
                        </tr>
                        <tr>
                            <td>Спеціальність</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Група</td>
                            <td>{{$diploma->group->group_code}}</td>
                        </tr>
                        <tr>
                            <td>Куратор</td>
                            <td>{{$diploma->kurator}}</td>
                        </tr>
                        <tr>
                            <td>Оцінка</td>
                            <td>{{$diploma->mark}}</td>
                        </tr>
                        <tr>
                            <td>Вид</td>
                            <td>{{$diploma->type}}</td>
                        </tr>
                        <tr>
                            <td>Предмет</td>
                            <td>{{$diploma->subject}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#dcdcdc"><b>Виконавець</b></td>
                        </tr>

                        <tr>
                            <td>Прізвище</td>
                            <td>{{$diploma->student->second_name}}</td>
                        </tr>
                        <tr>
                            <td>імя</td>
                            <td>{{$diploma->student->first_name}}</td>
                        </tr>
                        <tr>
                            <td>По-батькові</td>
                            <td>{{$diploma->student->father_name}}</td>
                        </tr>
                        <tr>
                            <td>Рік вступу</td>
                            <td>{{$diploma->student->initial_year}}</td>
                        </tr>
                    </table>
                </div>
                <div class="pad Addform">
                    <input type="submit" class="button" value="Завантажити">
                </div>
            </div>
        </div>

    </div>
    @endsection