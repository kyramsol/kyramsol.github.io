@extends('layouts.app')

@section('content')

    <div class="pad">
        <div>
            <div class="position">

                <form method="post" action="/Search">
                    {{ csrf_field() }}

                    <input type=text class="main" placeholder="Пошук Роботи" required name="search">
                    <input type="submit" class="button" value="Пошук">
                    <br><a href="/CoolSearch">Розширений пошук</a>
                </form>
                <div class="align">

                    <form action="/student">
                        <input type="submit" class="button" value="Додати студента">
                    </form>
                    <form action="/AddDiploma">
                        <input type="submit" class="button" value="Завантажити Роботу">
                    </form>
                </div>
            </div>
            <h4>Пошук по запиту:</h4>
            <table class="tablestyle">
                <tr>
                    <th></th>
                    <th>Назва Роботи</th>
                    <th></th>
                    <th >Виконавець</th>
                    <th>Спеціальність</th>
                    <th>Група</th>
                    <th>Вид</th>
                    <th>Рік створення</th>
                </tr>
                @foreach($diplomas as $diploma)
                    <tr>

                        <td>
                            <a href="AddDiploma/change/{{$diploma->id}}">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td> <a href="/Diploma/{{$diploma->id}}">{{$diploma->description}}</a></td>
                        <td>
                            <a href="/student/{{$diploma->id}}">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            {{$diploma->student->second_name}}
                            {{$diploma->student->first_name}}
                            {{$diploma->student->father_name}}
                        </td>
                        <td>{{$diploma->department->name}}</td>
                        <td>{{$diploma->group->group_code}}</td>
                        <td>{{$diploma->type}}</td>
                        <td>{{$diploma->creation_year}} </td>
                    </tr>
                @endforeach
            </table>
            <div class="container">
                <?php foreach ($diplomas as $user): ?>
    <?php echo $user->name; ?>
  <?php endforeach; ?>
            </div>

            <?php echo $diplomas->render(); ?>
        </div>
    </div>

@endsection