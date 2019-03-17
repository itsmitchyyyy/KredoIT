<script>
    $(function(){
       getRequest();
    });

    function getRequest(){
        $.ajax({
            url: "{{ route('request.list') }}"
        }).then(function(result){
            var options = '';
            result.map(function(res) {
                options += `<tr>
                <td>`+res.user.employee.employee_fname+` `+res.user.employee.employee_lname+`</td>
                <td>`+res.item.itemName+`</td>
                <td>`+res.request_date+`</td>
                <td>`+res.request_return_date+`</td>
                <td>`+res.status+`</td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                    </div>
                </td>
                </tr>`;
            });
        });
    }
</script>

{{-- var options = '';
            result.map(function(res) {
                options += `<tr>
                <td>`+res.categories[0].categoryName+`</td>
                <td>`+res.brand[0].brandName+`</td>
                <td>`+res.models[0].modelName+`</td>
                <td>`+res.quantity+`</td>
                <td>`+res.status+`</td>
                <td id="tditem`+res.id+`" class="tdItems">
                   <div class="d-flex flex-row flex-wrap justify-content-end">
                        <input type="checkbox" id="option`+res.id+`" onclick="addQuantity('tditem`+res.id+`', this)">
                   </div>
                </td>
                </tr>`;
            }); --}}