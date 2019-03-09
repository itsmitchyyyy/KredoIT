<div class="modal fade" id="listItemModal" tabindex="-1" role="dialog" aria-labelledby="listItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listItemModalLabel">Add model</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="listItemForm">
                    @csrf
                    <div class="form-group">
                        <label for="itemName">Item Name</label>
                        <input type="text" name="itemName" id="itemName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="categorySelect">Category </label>
                        <select name="category_id" id="categorySelect" class="form-control populate-select" data-source="{{ route('category.index') }}" data-valueKey="id" data-displayKey="categoryName"></select>
                    </div>
                    <div class="form-group">
                        <label for="brandSelect">Brand </label>
                        <select name="brand_id" id="brandSelect" class="form-control populate-select" data-source="{{ route('brand.index') }}" data-valueKey="id" data-displayKey="brandName"></select>
                    </div>
                    <div class="form-group">
                        <label for="modelSelect">Model </label>
                        <select name="model_id" id="modelSelect" class="form-control populate-select" data-source="{{ route('model.index') }}" data-valueKey="id" data-displayKey="modelName"></select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option selected disabled></option>
                            <option value="FUNCTIONAL">FUNCTIONAL</option>
                            <option value="DEFECTED">DEFECTED</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="addListItemBtn">Confirm</button>
            </div>
        </div>
    </div>
</div>