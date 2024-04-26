@extends('dashboard.layouts.master')
@section('title', 'خدمات مجمعه')
@section('page-title', 'خدمات مجمعه')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
    </li>
@endsection
@section('current-page', 'خدمات مجمعه')
@section('content')
    @include('dashboard.layouts.page-link')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard') }}/assets/plugins/notify/css/notifIt.css" rel="stylesheet" />


    <div class="row">

     <livewire:create-group-services />

    </div>












    @include('dashboard.layouts.scripts')

@endsection
