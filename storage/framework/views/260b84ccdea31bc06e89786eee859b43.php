

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-coffee text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0"><i class="fas fa-box"></i> Manage Products</h3>
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus"></i> Add New Product
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="products-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-coffee text-white">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Add New Product</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="addProductForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Product Name *</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Category *</label>
                            <select name="category" class="form-control" required>
                                <option value="">Select Category</option>
                                <option value="Espresso">Espresso</option>
                                <option value="Latte">Latte</option>
                                <option value="Cappuccino">Cappuccino</option>
                                <option value="Cold Coffee">Cold Coffee</option>
                                <option value="Cold Brew">Cold Brew</option>
                                <option value="Traditional">Traditional</option>
                                <option value="Iced Coffee">Iced Coffee</option>
                                <option value="Mocha">Mocha</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description *</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Price *</label>
                            <input type="number" name="price" class="form-control" step="0.01" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Sale Price</label>
                            <input type="number" name="sale_price" class="form-control" step="0.01">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Stock *</label>
                            <input type="number" name="stock" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Product Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(this, 'addImagePreview')">
                            <small class="text-muted">Upload product image (JPG, PNG, GIF)</small>
                            <div id="addImagePreview" class="mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-coffee">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-coffee text-white">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Product</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="editProductForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="product_id" id="edit_product_id">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Product Name *</label>
                            <input type="text" name="name" id="edit_name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Category *</label>
                            <select name="category" id="edit_category" class="form-control" required>
                                <option value="Espresso">Espresso</option>
                                <option value="Latte">Latte</option>
                                <option value="Cappuccino">Cappuccino</option>
                                <option value="Cold Coffee">Cold Coffee</option>
                                <option value="Cold Brew">Cold Brew</option>
                                <option value="Traditional">Traditional</option>
                                <option value="Iced Coffee">Iced Coffee</option>
                                <option value="Mocha">Mocha</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description *</label>
                            <textarea name="description" id="edit_description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Price *</label>
                            <input type="number" name="price" id="edit_price" class="form-control" step="0.01" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Sale Price</label>
                            <input type="number" name="sale_price" id="edit_sale_price" class="form-control" step="0.01">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Stock *</label>
                            <input type="number" name="stock" id="edit_stock" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="is_active" id="edit_is_active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Current Image</label>
                            <div id="current_image_preview" class="mb-2"></div>
                            <label>Change Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(this, 'editImagePreview')">
                            <div id="editImagePreview" class="mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-coffee">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .bg-coffee {
        background: #2c1810 !important;
    }
    .btn-coffee {
        background: #6f4e37;
        color: white;
        border: none;
    }
    .btn-coffee:hover {
        background: #5a3a2a;
        color: white;
    }
    .image-preview {
        max-width: 100px;
        max-height: 100px;
        border-radius: 5px;
        margin: 5px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#' + previewId).html('<img src="' + e.target.result + '" class="image-preview" style="max-width: 150px; max-height: 150px;">');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function() {
    // Initialize DataTable
    var table = $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(route("admin.products.data")); ?>',
        columns: [
            { data: 'id', name: 'id' },
            { 
                data: 'image', 
                name: 'image',
                render: function(data) {
                    if(data) {
                        return '<img src="' + data + '" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                    }
                    return '<span class="text-muted">No image</span>';
                }
            },
            { data: 'name', name: 'name' },
            { data: 'category', name: 'category' },
            { data: 'price', name: 'price' },
            { data: 'stock', name: 'stock' },
            { data: 'is_active', name: 'is_active' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    // Add Product with image
    $('#addProductForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: '<?php echo e(route("admin.products.store")); ?>',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.success) {
                    $('#addProductModal').modal('hide');
                    $('#addProductForm')[0].reset();
                    $('#addImagePreview').html('');
                    table.ajax.reload();
                    alert('Product added successfully!');
                }
            },
            error: function(xhr) {
                alert('Error: ' + (xhr.responseJSON?.message || 'Something went wrong'));
            }
        });
    });

    // Edit Product
    $(document).on('click', '.edit-product', function() {
        let productId = $(this).data('id');
        
        $.ajax({
            url: '/admin/products/' + productId + '/edit',
            method: 'GET',
            success: function(response) {
                $('#edit_product_id').val(response.id);
                $('#edit_name').val(response.name);
                $('#edit_category').val(response.category);
                $('#edit_description').val(response.description);
                $('#edit_price').val(response.price);
                $('#edit_sale_price').val(response.sale_price);
                $('#edit_stock').val(response.stock);
                $('#edit_is_active').val(response.is_active ? '1' : '0');
                
                if(response.image) {
                    $('#current_image_preview').html('<img src="' + response.image + '" style="max-width: 150px; max-height: 150px;" class="border rounded p-1">');
                } else {
                    $('#current_image_preview').html('<span class="text-muted">No image</span>');
                }
                
                $('#editProductModal').modal('show');
            }
        });
    });

    // Update Product with image
    $('#editProductForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        let productId = $('#edit_product_id').val();
        
        $.ajax({
            url: '/admin/products/' + productId,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-HTTP-Method-Override': 'PUT'
            },
            success: function(response) {
                if(response.success) {
                    $('#editProductModal').modal('hide');
                    table.ajax.reload();
                    alert('Product updated successfully!');
                }
            },
            error: function(xhr) {
                alert('Error: ' + (xhr.responseJSON?.message || 'Something went wrong'));
            }
        });
    });

    // Delete Product
    $(document).on('click', '.delete-product', function() {
        if(confirm('Are you sure you want to delete this product?')) {
            let productId = $(this).data('id');
            
            $.ajax({
                url: '/admin/products/' + productId,
                method: 'DELETE',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if(response.success) {
                        table.ajax.reload();
                        alert('Product deleted successfully!');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + (xhr.responseJSON?.message || 'Something went wrong'));
                }
            });
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/admin/products.blade.php ENDPATH**/ ?>