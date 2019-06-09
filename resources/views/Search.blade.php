@extends('layouts.app')

@section('content')
    <div class="align_body">
        <div>
            <div class="head">Розширений пошук</div>
            <div class="border">
                <form method="get" action="/Search" class="Addform" >
                    {{ csrf_field() }}
                    <input type="hidden" name="dpart_id" id="department_id" value="">
                    <table>
                        <tr>
                            <td colspan="4"><input type=text class="main" placeholder="Пошук Роботи"
                                                   name="search"></td>
                            <td><input type="submit" class="button" value="Пошук"></td>
                            <td>

                            </td>
                        </tr>
                        <tr>

                            <td> У проміжку</td>
                            <td>
                                <select class="selection" name="f_year">
                                    <option></option>
                                    @foreach($array[0] as $year)
                                        <option>{{$year->creation_year}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="selection" name="s_year">
                                    <option></option>
                                    @foreach($array[0] as $year)
                                        <option>{{$year->creation_year}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>Пошук за</td>
                            <td><select class="selection" name="select">
                                    <option>Назва</option>
                                    <option>Ім'я</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Спеціальність</td>
                            <td colspan="3">
                                <select class="selection" id="Department">
                                    <option></option>
                                    @foreach($array[1] as $department)
                                        <option value={{$department->id}}>{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </td>

                        </tr>
                        <tr>

                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </div>
    <script>
        $('#Department').change(function () {
            var selectedOptions = $('#Department').find(':selected')[0];
            $('#department_id').val(selectedOptions.value);
        });
    </script>
@endsection
