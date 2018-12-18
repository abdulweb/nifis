
@extends('layouts.app')

@section('content')

	@if($user->subscribed())
	    {{'welcome subscriber'}}
	@else
	    {{'You need to subscribe to E-mail Messages for your family activities do that now'}} <a href="{{route('home')}}">Home</a> <a href="{{route('join-subs')}}">Subscribe</a>
	@endif

@stop