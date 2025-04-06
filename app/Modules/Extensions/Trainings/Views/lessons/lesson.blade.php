@extends('layouts.main')

@section('title')
    {{ $lesson->title }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('trainings.lesson', $category, $training, $section, $lesson) }}
@endsection

@section('content')
    <h1>{{ $lesson->title }}</h1>

    <div class="site-trainings">
        @if($elements->count())
            <div class="lesson-elements">
                @foreach($elements as $element)
                    {!! $element->settings['html'] !!}
                @endforeach
            </div>
        @endif
    </div>
@endsection

<style>
    body {
        background-color: #fff!important;
    }
    .lesson-elements {

        padding: 20px;
    }
</style>
