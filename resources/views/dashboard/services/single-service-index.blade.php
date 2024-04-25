@extends('dashboard.layouts.master')
@section('title', 'الخدمات المفرده')
@section('page-title', 'الخدمات المفرده')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
    </li>
@endsection
@section('current-page', 'الخدمات المفرده')
@section('content')
    @include('dashboard.layouts.page-link')















    @include('dashboard.layouts.scripts')

@endsection
