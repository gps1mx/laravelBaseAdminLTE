@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

Fullname: {{ Auth::user()->fullname }}

dd($permissionNames);


@stop