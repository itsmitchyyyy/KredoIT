@extends('layouts.app')
@push('css')
    <style>
        .position-unset {
            position: unset;
        }

        .disabled {
            cursor: not-allowed;
        }

        .allowed {
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.items.users.admin', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'EMPLOYEE', 'pages.items.users.employee', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'MANAGER', 'pages.items.users.manager', ['some' => 'data'])
@endsection
@push('scripts')
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.items.scripts.admin', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'EMPLOYEE', 'pages.items.scripts.employee', ['some' => 'data'])
@endpush
