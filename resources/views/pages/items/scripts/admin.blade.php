<script>
    function fillUpData(res, attribute){
        if(attribute == 'category' || attribute == 'model' || attribute == 'brand') {
            var fieldName;
            if(attribute == 'category') 
               fieldName = res.categoryName;
            else if(attribute == 'model')
                fieldName = res.modelName;
            else if(attribute == 'brand')
                fieldName = res.brandName;

            return `<tr><td>`+fieldName+`</td>
                    <td>
                    <div class="table-data-feature">
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="zmdi zmdi-edit"></i>
                    </button>
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </button></td></tr>`;
        } else if(attribute == 'list'){
            return `<tr><td>`+res.categories[0].categoryName+`</td><td>`+res.brand[0].brandName+`</td><td>`+res.models[0].modelName+`</td>
                    <td class="process">`+res.quantity+`</td><td>`+res.status+`</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </div></td></tr>`;
        }
    }

    function getData(id, route, attribute){
        $(id).empty();
        $.ajax({
            url: route,
            type: "get",
            dataType: "json",
            success: function(res) {
                console.log(res);
                var data = '';
                for(var i = 0; i < res.length; i++) {
                    data += fillUpData(res[i], attribute);
                }
                $(id).html(data);
            }
        })
    }

    function populateSelectForm(){
        $('select[data-source]').each(function(){
            var $select = $(this);
            $select.empty();
            $select.append('<option></option>');
            $.ajax({
                url: $select.attr('data-source'),
            }).then(function(options){
                options.map(function(option){
                    var $option = $('<option>');

                        $option
                            .val(option[$select.attr('data-valueKey')])
                            .text(option[$select.attr('data-displayKey')]);
                    
                    $select.append($option);
                });
            });
        });
    }
    $(function() {
        populateSelectForm();
        getData("#listItemsBody", "{{ route('item.list') }}", "list");
        getData("#categoryBody", "{{ route('category.index') }}", "category");
        getData("#modelBody", "{{ route('model.index') }}", "model");
        getData("#brandBody", "{{ route('brand.index') }}", "brand");

        $('#addCategoryBtn').click(function(){
            var formData = $('#addCategoryForm').serialize();
            $.ajax({
                url: "{{ route('category.create') }}",
                type: "post",
                data: formData,
                success: function(res) {
                    getData("#categoryBody", "{{ route('category.index') }}", "category");
                    populateSelectForm();
                    $('#categoryModal').modal('hide');
                }
            })
        });
        $('#addModelBtn').click(function(){
            var formData = $('#addModelForm').serialize();
            $.ajax({
                url: "{{ route('model.create') }}",
                type: "post",
                data: formData,
                success: function(res) {
                    getData("#modelBody", "{{ route('model.index') }}", "model");
                    populateSelectForm();
                    $('#modelModal').modal('hide');
                }
            })
        });
        $('#addBrandBtn').click(function(){
            var formData = $('#addBrandForm').serialize();
            $.ajax({
                url: "{{ route('brand.create') }}",
                type: "post",
                data: formData,
                success: function(res) {
                    getData("#brandBody", "{{ route('brand.index') }}", "brand");
                    populateSelectForm();
                    $('#brandModal').modal('hide');
                }
            })
        });
        $('#addListItemBtn').click(function(){
            var formData = $('#listItemForm').serialize();
            $.ajax({
                url: "{{ route('item.create') }}",
                type: "post",
                data: formData,
                success: function(res) {
                    getData("#listItemsBody", "{{ route('item.list') }}", "list");
                    populateSelectForm();
                    $('#listItemModal').modal('hide');
                }
            })
        });
    });
</script>
<script>
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
</script>