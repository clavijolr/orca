

@extends('layouts.modelo')

@section('header')
    @include('dashboards.css')
@endsection


@section('conteudo')
    @include('dashboards.home')
@endsection

@section('scripts')
    @include('dashboards.js')
@endsection
