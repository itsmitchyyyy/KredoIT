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
                    @include('pages.account.modals.edit')
                    <div class="d-flex justify-content-end">
                        <button class="au-btn au-btn--green" data-id="createModal" onclick="openModal(this)">Add</button>
                    </div>
                    <div class="table-responsive m-b-40 m-t-40">
                        <table class="table table-borderless table-data3" id="accountTable">
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
            if(res.user_type != 'ADMIN'){
            var name = res.employee.employee_fname + res.employee.employee_lname;
            return `<tr><td ondblclick="updateTd(this)">`+name+`</td><td ondblclick="updateTd(this)">`+res.user_type+`</td>
            <td ondblclick="updateTd(this)">`+res.email+`</td><td ondblclick="updateTd(this)">`+res.employee.employee_address+`</td>
            <td class=ondblclick="updateTd(this)">`+res.employee.employee_phone+`</td>
            <td ondblclick="updateTd(this)">`+res.user_status+`</td><td>
            <div class="table-data-feature">
                <button class="item" data-toggle="tooltip" data-placement="top" onclick="editAccount(`+res.id+`)" title="Edit">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <button class="item" data-toggle="tooltip" onclick="deleteAccount(`+res.id+`, `+res.employee.id+`)" data-placement="top" title="Delete">
                    <i class="zmdi zmdi-delete"></i>
                </button>
            </div></td></tr>`;
        }
        }

        function editAccount(id){
            $.ajax({
                url: "{{ route('account.get') }}",
                data: {
                    id: id
                }
            }).then(function(res){
                res.map(function(user){
                    $('#edit_user_type').val(user.user_type);
                    $('#edit_email').val(user.email);
                    $('#edit_first_name').val(user.employee.employee_fname);
                    $('#edit_last_name').val(user.employee.employee_lname);
                    $('#edit_middle_name').val(user.employee.employee_mname);
                    $('#edit_phone').val(user.employee.employee_phone);
                    $('#edit_user_status').val(user.user_status);
                    $('#edit_address').val(user.employee.employee_address);
                    $('#updateAccountBtn').data('id', id);
                    $('#updateModal').modal('show');
                });
            });
        }

        function deleteAccount(id, emp_id){
            swal({
            title: "Delete Account",
            icon: "warning",
            text: "Are you sure you want to delete this account?"
            }).then(function(value){ 
                if(value){
                $.ajax({
                    type: 'delete',
                    url: "{{ route('account.delete') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        emp_id: emp_id
                    }
                }).then(function(){
                    swal({
                        title: "Success",
                        icon: "success",
                        timer: 1000,
                        button: false,
                        text: "Account Deleted"
                    }).then(function(){
                        getData('#accountsBody', "{{ route('account.list') }}");
                    });
                });
            }
            });
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

        function updateTd(event){
               var currentElem = $(event);
               var value = $(event).html(); 
               newInput(currentElem, value);
        }

        function newInput(elem, value){
            $(elem).html('<input class="tdVal form-control" type="text" value="' + value + '"/>');
            $('.tdVal').focus();
            $('.tdVal').keyup(function(event){
                if(event.keyCode == 13) {
                    $(elem).html($('.tdVal').val().trim()); 
                }
            });
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
            
            $('#createAccountBtn').click(function(){
                var formData = $('#createAccountForm').serialize();
                $.ajax({
                    type: "post",
                    url: "{{ route('account.create') }}",
                    data: formData
                }).then(function(){
                    getData('#accountsBody', "{{ route('account.list') }}");
                    $('#createModal').modal('hide');
                });
            });

            $('#updateAccountBtn').click(function(){
                var data = $('#updateAccountForm').serializeArray();
                var formData = {};
                $.each(data, function(i, field){
                    formData[field.name] = field.value;
                });
                formData['id'] = $(this).data('id');
                $.ajax({
                    type: "put",
                    url: "{{ route('account.update') }}",
                    data: formData
                }).then(function(){
                    getData('#accountsBody', "{{ route('account.list') }}");
                    $('#updateModal').modal('hide');
                });
            });

        });
    </script>
@endpush