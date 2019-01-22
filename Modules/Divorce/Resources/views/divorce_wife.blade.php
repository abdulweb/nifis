@extends('divorce::layouts.master')
@section('page-title')
{{'Divorece registration page'}}
@endsection

@section('page-content')
    @includes('divorce::Forms.divorce_wife_form')
@endsection