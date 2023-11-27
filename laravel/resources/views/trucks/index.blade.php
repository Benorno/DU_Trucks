@extends('index')

@section('title', 'Trucks')

@section('content')
<header>
    @include('components.header')
</header>
<main>
    @include('trucks.main')
</main>
@endsection
