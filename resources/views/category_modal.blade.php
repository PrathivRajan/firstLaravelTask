<!-- Modal -->
<div class="container col-md-4">
  <div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="CategoryModal">Add Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-category')}}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group" mb-3>
              <label for="Category Name">Category Name</label>
              <input type="text" name="categoryName" class="form-control" required placeholder="Enter Category Name">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Category</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#CategoryModal">Add Category</button>
</div>
