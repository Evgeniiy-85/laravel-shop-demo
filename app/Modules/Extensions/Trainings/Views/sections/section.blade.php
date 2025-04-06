@extends('layouts.main')

@section('title')
    {{ $training->title }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('trainings.section', $category, $training, $section) }}
@endsection

@section('content')
    <h1>{{ $training->title }}</h1>

    <div class="site-trainings">
        @include('trainings::lessons.list')
    </div>
@endsection
