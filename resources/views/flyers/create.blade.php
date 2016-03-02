@extends('layout')

@section('content')
    <h1>Selling Your Home?</h1>

    <form method="POST" action="/flyers" enctype="multipart/form-data">
        @include('flyers.form')
    </form>

@stop