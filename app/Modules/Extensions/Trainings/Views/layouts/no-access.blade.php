@extends('layouts.main')

@section('title')
    Нет доступа
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render("trainings.$access->model_name", $access->category, $access->training, $access->section, $access->lesson) }}
@endsection

@section('content')
    @php
        $replace = [
            'lesson' => 'уроку',
            'section' => 'разделу',
            'training' => 'тренингу',
        ];
    @endphp

    <h1>{{ $access->model->title }}</h1>

    <div class="site-trainings">
        <h3>У вас нет доступа к этому {{ $replace[$access->model_name] }}</h3>
        @if(!Auth::check())
            <script>
                $(function() {
                    (new bootstrap.Modal(document.querySelector('#login-modal'))).show();
                });
            </script>
        @endif


    </div>
@endsection
