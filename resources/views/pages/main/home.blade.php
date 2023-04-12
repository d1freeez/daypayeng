@extends('pages.layouts.main')
@section('content')
    @if ($user)
        <vue-layout :user="{{$user}}"></vue-layout>
    @else
        <vue-layout></vue-layout>
    @endif
@endsection
@section('script')
@endsection
