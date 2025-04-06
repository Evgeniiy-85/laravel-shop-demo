@extends('layouts.main')

@section('title')
    {{ $training->title }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('trainings.training', $category, $training) }}
@endsection

@section('content')
    <h1>{{ $training->title }}</h1>

    <div class="site-trainings">
        @if($sections)
            @include('trainings::sections.list')
        @else
            @include('trainings::lessons.list')
        @endif
    </div>
@endsection
