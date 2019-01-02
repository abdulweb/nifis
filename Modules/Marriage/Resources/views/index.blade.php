@extends('marriage::layouts.master')

@section('page-content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('marriage.name') !!}
    </p>
@stop
