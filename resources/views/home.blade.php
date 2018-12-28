@extends('layouts.master')

@section('side-bar')

	@if(Auth()->User()->family)
	    @include('Include.Menu.member-side-bar')
	@else
	    @include('Include.Menu.user-side-bar')
	@endif

@endsection

@section('page-content')

	@if(Auth()->User()->family)
	    @include('Include.Pages.family_home')
	@else
	    @include('Include.Pages.user_home')
	@endif

@endsection


