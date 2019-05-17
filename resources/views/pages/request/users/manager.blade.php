<div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Request Items</div>
    
                <div class="card-body">
                    <ul class="nav-tabs nav" id="itemTabs" role="tablist">
                        <li class="nav-item">
                            <a href="#request" class="nav-link active" id="request-tab" data-toggle="tab"
                             role="tab" aria-controls="request" aria-selected="true">
                             Request
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#history" class="nav-link" id="history-tab" data-toggle="tab"
                            role="tab" aria-controls="history" aria-selected="false">History</a>
                        </li>
                        <li class="nav-item">
                            <a href="#returned" class="nav-link" id="returned-tab" data-toggle="tab"
                            role="tab" aria-controls="returned" aria-selected="false">Returned</a>
                        </li>
                    </ul>
                    <div class="tab-content pl-3 p-1" id="itemTabsContent">
                        <div class="tab-pane fade show active" id="request" role="tabpanel" aria-labelledby="request-tab">
                            <div class="table-responsive m-b-40 m-t-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Request Name</th>
                                            <th>Item</th>
                                            <th>Request Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="requestItemsBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                            <div class="table-responsive m-b-40 m-t-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Request Name</th>
                                            <th>Item</th>
                                            <th>Approve By</th>
                                            <th>Request Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="historyBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="returned" role="tabpanel" aria-labelledby="returned-tab">
                            <div class="table-responsive m-b-40 m-t-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Request Name</th>
                                            <th>Item</th>
                                            <th>Approve By</th>
                                            <th>Request Date</th>
                                            <th>Return Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="returnedBody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>