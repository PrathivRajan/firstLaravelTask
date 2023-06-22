<!-- Modal -->
<div class="container col-md-6">
    <div class="modal fade" id="ProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="ProductModal">Add Product</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group" mb-3>
                  <label for="Product Code">Select Category</label>
                  <select class="form-control" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach ($categoryDetails as $category)
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group" mb-3>
                  <label for="Product Code">Product Code</label>
                  <input type="text" name="productCode" class="form-control" value="<?= (rand(00000000,99999999)); ?>" readonly required placeholder="Enter Product Code">
                </div>
                <div class="form-group" mb-3>
                  <label for="Product Name">Product Name</label>
                  <input type="text" name="productName" class="form-control" required placeholder="Enter Product Name">
                </div>
                <div class="form-group" mb-3>
                  <label for="Product Description">Product Description</label>
                  <input type="text" name="productDescription" class="form-control" required placeholder="Enter Product Description">
                </div>
                <div class="form-group" mb-3>
                  <label for="Product Price">Product Price</label>
                  <input type="text" name="productPrice" class="form-control" required placeholder="Enter Product Price">
                </div>
                <div class="form-group" mb-3>
                  <label for="Product Image">Product Image</label>
                  <input type="file" name="image" class="form-control" required placeholder="Enter Product Image">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Product</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#ProductModal">Add Product</button>
  </div>
