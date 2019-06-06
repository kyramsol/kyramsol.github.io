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
                            <td>Система онлайн обліку кваліфікаційних робіт</td>
                        </tr>
                        <tr>
                            <td>Спеціальність</td>
                            <td>Обслуговування програмних систем і комплексів</td>
                        </tr>
                        <tr>
                            <td>Код групи</td>
                            <td> 10-і</td>
                        </tr>
                        <tr>
                            <td>Куратор</td>
                            <td>Захарченко В.П.</td>
                        </tr>
                        <tr>
                            <td>Оцінка</td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#dcdcdc"><b>Виконавець</b></td>
                        </tr>

                        <tr>
                            <td>Прізвище</td>
                            <td>Коровай</td>
                        </tr>
                        <tr>
                            <td>імя</td>
                            <td>Сергій</td>
                        </tr>
                        <tr>
                            <td>По-батькові</td>
                            <td> Костянтинович</td>
                        </tr>
                        <tr>
                            <td>Рік вступу</td>
                            <td> 1984</td>
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