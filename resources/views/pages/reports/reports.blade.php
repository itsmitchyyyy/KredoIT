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

        .overview-box {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
        }

        .overview-box .text h2 {
            font-size: 20px;
        }

        .overview-box .text span {
            font-size: 16px;
        }

        @media (max-width: 1519px) and (min-width: 992px) {
            .overview-item {
                padding-bottom: 15px;
            }
        }
    </style>
@endpush
@section('content')
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.reports.users.admin', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'MANAGER', 'pages.reports.users.manager', ['some' => 'data'])
@endsection

@push('scripts')
    @includeWhen(Auth::user()->user_type == 'ADMIN', 'pages.reports.scripts.admin', ['some' => 'data'])
    @includeWhen(Auth::user()->user_type == 'MANAGER', 'pages.reports.scripts.manager', ['some' => 'data'])
@endpush