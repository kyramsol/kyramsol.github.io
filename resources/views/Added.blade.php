@extends('layouts.app')

@section('content')
    <div class="align_body">
        <div>
            <div class="head">
                Успіх!!!
            </div>
            <div class="border">
                <div class="added_text">Дані додані успішно!</div>

                <div class="align">

                    <form action="/SearchResults">
                        <input type="submit" class="button" value="На головну">
                    </form>
                    <form action="/AddDiploma">
                        <input type="submit" class="button" value="Завантажити Роботу">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection