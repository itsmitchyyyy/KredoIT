@extends('layouts.app')
@push('css')
@endpush
@section('content')
    @includeWhen(Auth::user()->user_type == 'MANAGER', 'pages.request.users.manager', ['some' => 'data'])
@endsection
@push('scripts')
    @includeWhen(Auth::user()->user_type == 'MANAGER', 'pages.request.scripts.manager', ['some' => 'data'])
@endpush
