<script>
    $(function(){
        // $('#requestReturnDate').datepicker({
        //     format: 'yyyy-mm-dd',
        //     orientation: "auto",
        //     startDate: new Date(),
        //     todayHighlight: true
        // });

        if($('button').is(":disabled")) {
            $('button').addClass('disabled');
        }

        $.ajax({
            url: "{{ route('item.list') }}"
        }).then(function(result){
            var options = '';
            result.map(function(res){
                options += `<tr>
                <td>`+res.itemNo+`</td>
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
            });
            $('#itemBody').append(options);
        });

        $('#sendRequest').click(function(){
            // var returnDate = $('#requestReturnDate');
            var arrayQuantity = [];
            var arrayItemId = [];
            var input = $('.inputQuantities').filter(function(i, e) {
                if(e.value != '')
                arrayQuantity.push(e.value);
                arrayItemId.push(e.id.replace(/[^0-9/]/gi, ''));
            });
            if(arrayQuantity.length > 0 && arrayItemId.length > 0) {
                $.ajax({
                type: 'post',
                url: "{{ route('request.create') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    quantity: arrayQuantity,
                    items: arrayItemId
                }
                }).then(function(res){
                    $('.tdItems').find(':checkbox').prop('checked', false);
                    $('.tdItems').find('div').find('input[type="text"]').remove();
                    // $('#requestReturnDate').addClass('d-none');
                    // returnDate.val('');
                    arrayQuantity = [];
                    arrayItemId = [];
                });
            } else {
                alert('Please fill up all fields');
            }
        });
    });

    function addQuantity(id, target){
      var idNumber = id.replace(/[^0-9/]/gi, '');
      if($(target).is(":checked")) {
            $('#'+id).find('div').append(`<input type='text' placeholder='Quantity' name='totalQuantity[]' id='quantityInput`+idNumber+`' class='au-input au-input--full ml-2 w-25 inputQuantities'>`);
            $('#sendRequest').prop('disabled', false).removeClass('disabled');
                // $('#requestReturnDate').removeClass('d-none');
        }
        else {
            $('#quantityInput'+idNumber).remove();
            if($('.tdItems').find('.inputQuantities').length > 0) {
                $('#sendRequest').prop('disabled', false).removeClass('disabled');
                // $('#requestReturnDate').removeClass('d-none');
            }
            else {
                $('#sendRequest').prop('disabled', true).addClass('disabled');
                // $('#requestReturnDate').addClass('d-none');
            }
        } 
    }
</script>