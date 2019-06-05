@extends('layouts.app')

@section('content')
<div class="align_body">
    <div>
    <div class="head">Додавання Роботи</div>
        <div class="border">

        <form class="Addform" method="post" action="/AddDiploma">
            {{ csrf_field() }}
        <table>
            <tr>
                <td>Назва</td>   <td><input text class="textfield"  required name="call"></td>
            </tr>
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

        <script>
            function loadXMLDoc()
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {// код для IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {// код для IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }

                alert(xmlhttp.responseText);
                xmlhttp.open("get","/diploma",true);
                xmlhttp.send();

            }
        </script>
        <div id="myDiv"></div>
        <form>
            <input type=button onclick=loadXMLDoc()>
        </form>
    </div>
@endsection