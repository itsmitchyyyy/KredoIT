@extends('layouts.app')
@push('css')
    <style>
        .position-unset {
            position: unset;
        }
    </style>
@endpush
@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Items</div>

                <div class="card-body">
                    <ul class="nav-tabs nav" id="itemTabs" role="tablist">
                        <li class="nav-item">
                            <a href="#listitems" class="nav-link active" id="list-items-tab" data-toggle="tab"
                             role="tab" aria-controls="listitems" aria-selected="true">
                             List Items
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#category" class="nav-link" id="category-tab" data-toggle="tab"
                            role="tab" aria-controls="category" aria-selected="false">Category</a>
                        </li>
                        <li class="nav-item">
                            <a href="#brand" class="nav-link" id="brand-tab" data-toggle="tab"
                            role="tab" aria-controls="brand" aria-selected="false">Brand</a>
                        </li>
                        <li class="nav-item">
                            <a href="#model" class="nav-link" id="model-tab" data-toggle="tab"
                            role="tab" aria-controls="model" aria-selected="false">Model</a>
                        </li>
                    </ul>
                    <div class="tab-content pl-3 p-1" id="itemTabsContent">
                        <div class="tab-pane fade show active" id="list-items" role="tabpanel" aria-labelledby="list-items-tab">
                            <div class="table-responsive m-b-40 m-t-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listItemsBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
                            @include('pages.items.modals.category')
                            <div class="d-flex justify-content-end">
                                <button class="au-btn au-btn--green" type="button" data-toggle="modal" data-target="#categoryModal">ADD</button>
                            </div>
                            <div class="table-responsive m-b-40 m-t-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="categoryBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                            <div class="table-responsive m-b-40 m-t-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Brand</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="brandBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="model" role="tabpanel" aria-labelledby="model-tab">
                            <div class="table-responsive m-b-40 m-t-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Model</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modelBody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function categories(){
            $('#categoryBody').empty();
            $.ajax({
                url: "{{ route('category.index') }}",
                type: "get",
                dataType: "json",
                success: function(res) {
                    var categoryData = '';
                    for(var i = 0; i < res.length; i++) {
                        categoryData += `<tr><td>`+res[i].categoryName+`</td>
                            <td>
                            <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button></td></tr>`;
                    }
                    $('#categoryBody').html(categoryData);
                }
            })
        }
        $(function() {
            categories();
            $('#addCategoryBtn').click(function(){
                var formData = $('#addCategoryForm').serialize();
                $.ajax({
                    url: "{{ route('category.create') }}",
                    type: "post",
                    data: formData,
                    success: function(res) {
                        categories();
                        $('#categoryModal').modal('hide');
                    }
                })
            });
            var listItemsData = `<tr><td>2018-09-29 05:57</td><td>Mobile</td><td>iPhone X 64Gb Grey</td>
                                <td class="process">Processed</td><td>$999.00</td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </div></td></tr>`;
            var brandData = `<tr><td>Lenovo</td>
                                <td>
                                    <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button></td></tr>`;
            var modelData = `<tr><td>Model</td>
                                <td>
                                    <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button></td></tr>`;
            $('#listItemsBody').append(listItemsData);
            $('#brandBody').append(brandData);
            $('#modelBody').append(modelData);
        });
    </script>
    <script>
        $('#categoryModal').on('show.bs.modal', function(){
            $('.section__content').toggleClass('position-unset');
        });
        $('#categoryModal').on('hide.bs.modal', function(){
            $('.section__content').toggleClass('position-unset');
        });
    </script>
@endpush
