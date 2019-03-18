@extends('layouts.app')
@push('css')
@endpush
@section('content')
    @includeWhen(Auth::user()->user_type == 'MANAGER', 'pages.request.users.manager', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.request.users.admin', ['some' => 'data'])
@endsection
@push('scripts')
    @includeWhen(Auth::user()->user_type == 'MANAGER', 'pages.request.scripts.manager', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.request.scripts.admin', ['some' => 'data'])
@endpush
