@extends('index')

@section('title', 'Subunit')

@section('content')
<header>
    @include('components.header')
</header>
<main>
    @include('subunit.main')
</main>
@endsection
