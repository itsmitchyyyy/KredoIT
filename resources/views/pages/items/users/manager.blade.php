<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header">MANAGER</div>

            <div class="card-body">
                <ul class="nav-tabs nav" id="itemTabs" role="tablist">
                    <li class="nav-item">
                        <a href="#list-items" class="nav-link active" id="list-items-tab" data-toggle="tab"
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
                        @include('pages.items.modals.list-items')
                        <div class="d-flex justify-content-end">
                            <button class="au-btn au-btn--green" type="button" data-id="listItemModal" onclick="openModal(this)">ADD</button>
                        </div>
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
                            <button class="au-btn au-btn--green" type="button" data-id="categoryModal" onclick="openModal(this)">ADD</button>
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
                        @include('pages.items.modals.brand')
                        <div class="d-flex justify-content-end">
                            <button class="au-btn au-btn--green" type="button" data-id="brandModal" onclick="openModal(this)">ADD</button>
                        </div>
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
                        @include('pages.items.modals.model')
                        <div class="d-flex justify-content-end">
                            <button class="au-btn au-btn--green" type="button" data-id="modelModal" onclick="openModal(this)">ADD</button>
                        </div>
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