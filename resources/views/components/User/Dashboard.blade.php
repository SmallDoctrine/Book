@extends('layouts.app')
@section('cont')

   <h1>{{\Illuminate\Support\Facades\Auth::user()->name}} , добро Пожаловать !)</h1>


@endsection
