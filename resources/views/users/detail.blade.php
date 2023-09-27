@extends('layouts.master')

@section('title','Detail')

@section('content')
    <h1>{{$site->localite->commune}}</h1>
    <img src="/storage/sites/{{$site->image}}" >
@endsection