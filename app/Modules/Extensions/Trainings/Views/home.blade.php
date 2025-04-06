@extends('layouts.main')

@section('title')
    Онлайн тренинги
@endsection

@section('content')
    <h1>Онлайн тренинги</h1>

    <div class="site-trainings">
        @if($trainings)
            <div class="trainings-filter">
                @include('trainings::trainings.filter.filter')
            </div>
            <livewire:filter-list :list="$trainings" :include="'trainings::trainings.filter.list'"/>
        @else
            @include('trainings::categories.list')
        @endif
    </div>
@endsection
