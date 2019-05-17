@extends('layouts.app')

@section('content')
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.reports.users.admin', ['some' => 'data'])
@endsection

@push('scripts')
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.reports.scripts.admin', ['some' => 'data'])
@endpush