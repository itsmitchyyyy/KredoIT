<script>
    $(function(){
       getBorrowed();
       getRequest();
    });

    function getBorrowed(){
        $('#borrowedItems').empty();
        $.ajax({
            url: "{{ route('borrowed.list') }}"
        }).then(function(result){
            var options = '';
            result.map(function(res){
                options += `<tr>
                <td>`+res.item.itemName+` (`+res.kredo_item_no+`)</td>
                <td>`+moment(res.request_date).format('MMMM DD, YYYY')+`</td>
                <td>`+moment(res.request_return_date).format('MMMM DD, YYYY')+`</td>
                <td>`+res.request_approver_id+`</td>
                <td>`+res.request_status.toUpperCase()+`</td>
                </tr>`;
            });
            $('#borrowedItems').append(options);
        });
    }

    function getRequest(){
        $('#requestItems').empty();
        $.ajax({
            url: "{{ route('borrowed.list') }}"
        }).then(function(result){
            var options = '';
            result.map(function(res){
                options += `<tr>
                <td>`+res.item.itemName+` (`+res.kredo_item_no+`)</td>
                <td>`+moment(res.request_date).format('MMMM DD, YYYY')+`</td>
                <td>`+moment(res.request_return_date).format('MMMM DD, YYYY')+`</td>
                <td>`+res.request_status.toUpperCase()+`</td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" onclick="deleteRequest(`+res.id+`)" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                    </div>
                </td>
                </tr>`;
            });
            $('#requestItems').append(options);
        });
    }

    function deleteRequest(id){
        swal({
            title: "Cancel Request",
            icon: "warning",
            text: "Are you sure you want to cancel this request?"
        }).then(function(){
            $.ajax({
                type: 'delete',
                url: "{{ route('borrowed.delete') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                }
            }).then(function(){
                swal({
                    title: "Success",
                    icon: "success",
                    text: 'Request Cancelled',
                    timer: 1000,
                    button: false
                }).then(function(){
                    getBorrowed();
                    getRequest();
                });
            });
        });
    }
</script>