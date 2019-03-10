@extends('layouts.app')
@push('css')
    <style>
        .position-unset {
            position: unset;
        }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Account</div>

                <div class="card-body">
                    @include('pages.account.modals.create')
                    <div class="d-flex justify-content-end">
                        <button class="au-btn au-btn--green" data-id="createModal" onclick="openModal(this)">Add</button>
                    </div>
                    <div class="table-responsive m-b-40 m-t-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="accountsBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        function fillUpData(res){
            var name = res.employee.employee_fname + res.employee.employee_lname;
            return `<tr><td>`+name+`</td><td>`+res.user_type+`</td>
            <td>`+res.email+`</td><td>`+res.employee.employee_address+`</td><td>`+res.employee.employee_phone+`</td>
            <td>`+res.user_status+`</td><td>
            <div class="table-data-feature">
                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="zmdi zmdi-delete"></i>
                </button>
            </div></td></tr>`;
        }

        function getData(id, route){
            $(id).empty();
            $.ajax({
                url: route,
                type: "get",
            }).then(function(res){
                var data = '';
                for(var i = 0; i < res.length; i++) {
                    data += fillUpData(res[i]);
                }
                $(id).html(data);
            });
        }
        function openModal(event){
            var id = $(event).data('id');
            $('#'+id).modal('show');
        }

        $('.modal').on('show.bs.modal', function(){
            $('.section__content').toggleClass('position-unset');
        });
        $('.modal').on('hide.bs.modal', function(){
            $('.section__content').toggleClass('position-unset');
            $(this).find('form').trigger('reset');
        });

        $(function(){
            getData('#accountsBody', "{{ route('account.list') }}");
            
           
        });
    </script>
@endpush