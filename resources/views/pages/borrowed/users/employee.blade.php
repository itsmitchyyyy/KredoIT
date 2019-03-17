<div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Borrowed Items</div>
    
                <div class="card-body">
                    <ul class="nav-tabs nav" id="itemTabs" role="tablist">
                        <li class="nav-item">
                            <a href="#borrowed" class="nav-link active" id="borrowed-tab" data-toggle="tab"
                             role="tab" aria-controls="borrowed" aria-selected="true">
                             Borrowed
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#request" class="nav-link" id="request-tab" data-toggle="tab"
                            role="tab" aria-controls="request" aria-selected="false">Request</a>
                        </li>
                    </ul>
                    <div class="tab-content pl-3 p-1" id="itemTabsContent">
                        <div class="tab-pane fade show active" id="borrowed" role="tabpanel" aria-labelledby="borrowed-tab">
                            <div class="table-responsive m-b-40 m-t-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Items</th>
                                            <th>Borrowed Date</th>
                                            <th>Borrowed Return</th>
                                            <th>Approved By</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="borrowedItems"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="request" role="tabpanel" aria-labelledby="request-tab">
                            <div class="table-responsive m-b-40 m-t-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Items</th>
                                            <th>Borrowed Date</th>
                                            <th>Borrowed Return</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="requestItems"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>

    {{--  --}}