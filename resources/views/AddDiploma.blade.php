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
                    <table>
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
                            <td></td>
                            <td colspan="2">
                                <div class="fileadd"><input class="dropdown" type="text" placeholder="Спеціальність"
                                                            id="Department"><input class="dropdown" type="text"
                                                                                   id="Group" placeholder="группа">
                                </div>
                            </td>
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
            $('#Group').selectmenu({
                select: function (event, ui) {
                    console.log('You selected: ' + ui.item.value + ', ' + ui.item.id);
                    $('#group_id').val(ui.item.id);
                }
            });
            $('#Department').autocomplete({
                source: function (request, response) {
                    console.log(request, response);
                    jQuery.get("/takedepartment", {
                        query: request.term
                    }, function (data) {
                        console.log(data);
                        response(data);
                    });
                },
                select: function (event, ui) {
                    console.log('You selected: ' + ui.item.value + ', ' + ui.item.id, ui.item);
                    var groups = ui.item.groups.map(function (group) {
                        return {value: group.group_code, id: group.id}
                    });
                    $('#department_id').val(ui.item.id);
                }
            });
        </script>
    </div>



@endsection