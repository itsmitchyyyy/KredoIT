@extends('layouts.app')
@push('css')
    <style>
        .notification-list-icon {
            padding: 10px;
            border-radius: 100%;
            background: green;
            color: white;
            height: 50px;
            margin-right: 1em;
        }

        .notification-list-icon i {
            font-size: 26px;
        }

        .notification-header {
            display: flex;
            align-items: center;
            background: rgba(49, 89, 253, 0.9);
            color: #fff;
        }
        

        .notification-header i {
            margin-right: .25rem;
        }

    </style>
@endpush
@section('content')
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.notification.users.admin', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'EMPLOYEE', 'pages.notification.users.employee', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'MANAGER', 'pages.notification.users.manager', ['some' => 'data'])
@endsection
@push('scripts')
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.notification.scripts.admin', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'EMPLOYEE', 'pages.notification.scripts.employee', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'MANAGER', 'pages.notification.scripts.manager', ['some' => 'data'])
@endpush
