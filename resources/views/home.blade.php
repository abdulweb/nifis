@extends('layouts.home')

<div class="alert alert-success">
	@if(session('notice'))
	    {{session('notice')}}
	@endif
</div>


