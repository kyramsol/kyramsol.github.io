@extends('layouts.app')

@section('content')
    <div class="align_body">
        <div>
            <div class="head">Додавання даних Студента</div>
            <div class="border">
                <form class="Addform" action="/student/change/{{$student->id}}" method="post">
                    <table>
                        {{ csrf_field() }}
                        <tr>
                            <td>Прізвище: &nbsp</td>
                            <td><input text class="textfield" required name="sname" value="{{$student->second_name}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Ім'я: &nbsp</td>
                            <td><input text class="textfield" p required name="name" value="{{$student->first_name}}">
                            </td>
                        </tr>
                        <tr>
                            <td>По-батькові: &nbsp</td>
                            <td><input text class="textfield" required name="fname" value="{{$student->father_name}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Рік вступу: &nbsp</td>
                            <td><input text class="textfield" required name="year" value="{{$student->initial_year}}">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right"><input type="submit" class="button" value="Відправити"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
