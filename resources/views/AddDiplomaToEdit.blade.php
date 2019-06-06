@extends('layouts.app')

@section('content')
    <div class="align_body">
        <div>
            <div class="head">Додавання Роботи</div>
            <div class="border">
                <form class="Addform" method="post" action="/AddDiploma/edit/{{$diploma->id}}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="student_id" name="student_id" required>
                    <input type="hidden" id="group_id" name="group_id" required>
                    <input type="hidden" id="department_id" name="department_id" required>
                    <table>
                        <tr>
                            <td>Творець</td>
                            <td><input type="text" class="textfield" name="autoname" id="student_name"></td>
                        </tr>
                        <tr>
                            <td>Назва</td>
                            <td><input text class="textfield" required name="call" value="{{$diploma->description}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Керівник</td>
                            <td><input text class="textfield" required name="teacher" value="{{$diploma->kurator}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Оцiнка</td>
                            <td><input text class="textfield" required name="mark" value="{{$diploma->mark}}"></td>
                        </tr>
                        <tr>
                            <td>Рік написання</td>
                            <td><input text class="textfield" required name="creation_year"
                                       value="{{$diploma->creation_year}}"></td>
                        </tr>
                        <tr>
                            <td>Предмет</td>
                            <td><input text class="textfield" name="subject" value="{{$diploma->subject}}"></td>
                        </tr>
                        <tr>
                            <td>Вид</td>
                            <td><input text class="textfield" name="type" value="{{$diploma->type}}"></td>
                        </tr>
                        <tr>
                            <td>Відділення</td>
                            <td colspan="2"><input class="dropdown textfield" type="text" required id="Department"></td>
                        </tr>
                        <tr>
                            <td>Группа</td>
                            <td><input class="dropdown textfield" type="text" id="Group" required></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <div class="fileadd"><input type="file" name="filepath" required> <input type="submit"
                                                                                                         class="button">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>


        </div>
        <script>
            $('#student_name').autocomplete({
                source: '/takestudents',
                select: function (event, ui) {
                    console.log('You selected: ' + ui.item.value + ', ' + ui.item.id);
                    $('#student_id').val(ui.item.id);
                }
            });
            $('#Group').autocomplete({
                source: '/takegroup',
                select: function (event, ui) {
                    console.log('You selected: ' + ui.item.value + ', ' + ui.item.id);
                    $('#group_id').val(ui.item.id);
                }
            });
            $('#Department').autocomplete({
                source: '/takedepartment',
                select: function (event, ui) {
                    console.log('You selected: ' + ui.item.value + ', ' + ui.item.id);
                    $('#department_id').val(ui.item.id);
                }
            });
        </script>
    </div>



@endsection