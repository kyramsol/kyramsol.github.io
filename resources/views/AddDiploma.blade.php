@extends('layouts.app')

@section('content')
    <div class="align_body">
        <div>
            <div class="head">Додавання Роботи</div>
            <div class="border">
                <form class="Addform" method="post" action="/AddDiploma/new" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="student_id" name="student_id">
                    <input type="hidden" id="group_id" name="group_id">
                    <input type="hidden" id="department_id" name="department_id">
                    <table >
                        <tr>
                            <td>Творець</td>
                            <td><input type="text" class="textfield" name="autoname" id="student_name" value=""></td>
                        </tr>
                        <tr>
                            <td>Назва</td>
                            <td><input text class="textfield" required name="call"></td>
                        </tr>
                        <tr>
                            <td>Керівник</td>
                            <td><input text class="textfield" required name="teacher"></td>
                        </tr>
                        <tr>
                            <td>Оцiнка</td>
                            <td><input text class="textfield" required name="mark"></td>
                        </tr>
                        <tr>
                            <td>Рік написання</td>
                            <td><input text class="textfield" required name="creation_year"></td>
                        </tr>
                        <tr>
                            <td>Предмет</td>
                            <td><input text class="textfield" name="subject" value="—"></td>
                        </tr>
                        <tr>
                            <td>Вид</td>
                            <td><input text class="textfield" name="type" value=""></td>
                        </tr>
                        <tr>
                            <td>Спеціальність</td>
                            <td>

                                <select id="Department" class="selection">
                                    <option selected disabled hidden style='display: none' value=''></option>
                                    @foreach ($departments as $department)
                                        <option value={{$department->id}} groups={{$department->groups}}>
                                            {{$department->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>

                            <td>Група</td>
                            <td>
                                <select id="Group" class="selection">
                                </select>
                            </td>
                        </tr>
                        </td>



                        <tr>
                            <td colspan="2">
                                <div class="fileadd">
                                    <input type="file" name="filepath" required>
                                    <input type="submit" class="button">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
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
        $('#Group').change(function () {
            var selectedOptions = $('#Group').find(':selected')[0];
            $('#group_id').val(selectedOptions.value);
        });
        $('#Department').change(function () {
            var selectedOptions = $('#Department').find(':selected')[0];
            $('#department_id').val(selectedOptions.value);
            $('#group_id').val(null);
            $("#Group").empty();
            var groups = JSON.parse(selectedOptions.attributes.groups.value);
            $("#Group").append($('<option selected disabled hidden style=\'display: none\' value=\'\'></option>'));
            groups.forEach(function (item) {
                $("#Group").append($("<option  value=" + item.id + ">" + item.group_code + "</option>"));
            });

        });
    </script>




@endsection