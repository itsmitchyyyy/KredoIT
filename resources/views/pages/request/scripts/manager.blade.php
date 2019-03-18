<script>
    $(function(){
       getRequest();
       getReturned();
       getHistory();
    });

    function fillUpTBody(res, attribute){
        if(attribute == 'request') {
            return `<tr>
                    <td>`+res.user.employee.employee_fname+` `+res.user.employee.employee_lname+`</td>
                    <td>`+res.item.itemName+`</td>
                    <td>`+moment(res.request_date).format('MMMM DD, YYYY')+`</td>
                    <td>`+moment(res.request_return_date).format('MMMM DD YYYY')+`</td>
                    <td>
                        <button class="btn btn-success" onclick="updateRequest(`+res.requests.id+`, 'approved')">
                            Approve
                        </button>
                        <button class="btn btn-danger" onclick="updateRequest(`+res.requests.id+`, 'denied')">
                            Deny
                        </button>
                    </td>
                    </tr>`;
        } else {
            return `<tr>
                    <td>`+res.user.employee.employee_fname+` `+res.user.employee.employee_lname+`</td>
                    <td>`+res.requests.item.itemName+`</td>
                    <td>`+res.requests.approver.employee.employee_fname+` `+res.requests.approver.employee.employee_lname+`</td>
                    <td>`+moment(res.requests.request_date).format('MMMM DD, YYYY')+`</td>
                    <td>`+moment(res.requests.request_return_date).format('MMMM DD YYYY')+`</td>
                    </tr>`;
        }
    }

    function getHistory(){
        $('#historyBody').empty();
        $.ajax({
            url: "{{ route('purchase.list') }}",
        }).then(function(result){
            var options = '';
            result.map(function(res){
                if(res.user != null)
                options += fillUpTBody(res, 'all');
            });
            $('#historyBody').append(options);
        });
    }

    function getReturned(){
        $('#returnedBody').empty();
        $.ajax({
            url: "{{ route('purchase.list') }}",
        }).then(function(result){
            var options = '';
            result.map(function(res){
                if(res.item_request_status == 'returned' && res.user != null)
                    options += fillUpTBody(res, 'all');
            });
            $('#returnedBody').append(options);
        });
    }

    function getRequest(){
        $('#requestItemsBody').empty();
        $.ajax({
            url: "{{ route('request.list') }}"
        }).then(function(result){
            var options = '';
            result.map(function(res) {
                if(res.request_status == 'pending' && res.user != null)
                    options += fillUpTBody(res, 'request');
            });
            $('#requestItemsBody').append(options);
        });
    }

    function updateRequest(id, status){
        $.ajax({
            type: 'put',
            url: "{{ route('request.update') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                request_status: status
            }
        }).then(function(res){
            swal({
                title: "Success",
                icon: "success",
                timer: 1000,
                button: false,
                text: "Status Updated"
            }).then(function(){
                getRequest();
                getHistory();
                getReturned();
            });
        });
    }
</script>