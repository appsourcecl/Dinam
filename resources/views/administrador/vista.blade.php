@extends('layouts.master_ejemplo')

@section('title', "mensaje pasando por la vista al master" )

@section('content')

  <h1>{{ $mensaje }}</h1>

@stop
