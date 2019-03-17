@extends('layouts.app')
@section('content')
    @includeWhen(Auth::user()->user_type == 'EMPLOYEE', 'pages.borrowed.users.employee', ['some' => 'data'])
@endsection
@push('scripts') 
    @includeWhen(Auth::user()->user_type == 'EMPLOYEE', 'pages.borrowed.scripts.employee', ['some' => 'data'])
@endpush