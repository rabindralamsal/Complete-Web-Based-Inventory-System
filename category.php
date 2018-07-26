<?php require_once 'includes/header.php'; ?>

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Manage Categories</div>
        <div class="panel-body">
          <div class="div-action"">
            <button class="btn btn-success" data-toggle="modal" data-target="#addCategoryModal">Add a Category</button>
            <a href="editDelCategory.php" class="btn btn-warning" role="button">Edit / Remove Category</a>

          </div>

          <table class="tables" id="manageCategoryTable" style="width:100%;">
            <thead>
              <tr>
                <th style="text-align: center;">Category ID</th>
                <th style="text-align: center;">Category Name</th>
                <th style="text-align: center;">Business</th>
              </tr>
            </thead>
          </table>


        </div>
    </div>  


  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addCategoryModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form class="form-horizontal" id="submitCategoryForm" action="php_action/createCategory.php" method="POST"> 
      <div class="modal-body">
        <div id="add-category-messages"></div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="categoryName">Category:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="categoryStatus" required>Status:</label>
    <div class="col-sm-10"> 
      <select class="form-control" id="categoryStatus" name="categoryStatus">
        <option value="1">Start selling items in this category</option>
      </select>

    </div>
  </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="createCategoryBtn" data-loading-text="Loading..">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
</form>

    </div>
  </div>
</div>

<script type="text/javascript" src="custom/js/category.js"></script>

<?php require_once 'includes/footer.php'; ?>