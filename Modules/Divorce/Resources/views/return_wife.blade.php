@extends('divorce::layouts.master')
@section('page-title')
{{'Return Wife registration page'}}
@endsection

@section('page-content')
    @include('divorce::Forms.return_wife_form')
@endsection
