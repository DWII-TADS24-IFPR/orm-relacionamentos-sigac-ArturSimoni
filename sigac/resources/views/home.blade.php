@extends('layouts.app')

@section('title','SIGAC - Home')

@section('content')
<p>HOME</P>
    @if ($idade>=18)
    <p>Você é maior de idade</p>
    @else
    <p>Você é menor de idade</p>
    @endif

    @foreach ($frutas as $frutas)
    <p>Fruta: <Strong>{{$frutas}}</strong></p>
    @endforeach
@endsection
