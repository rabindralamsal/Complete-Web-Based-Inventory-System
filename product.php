<?php require_once 'includes/header.php'; ?>


<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Manage Products</div>
        <div class="panel-body">
          <div class="div-action"">
            <button class="btn btn-success" data-toggle="modal" data-target="#addProductModal">Add a Product</button>
            <a href="editProduct.php" class="btn btn-warning" role="button">Update Product</a>
          </div>

          <table class="tables" id="manageProductTable" style="width:100%;">
            <thead>
              <tr>
                <th style="text-align: center;">Product ID</th>
                <th style="text-align: center;">Product Name</th>
                <th style="text-align: center;">Rate</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Brand</th>
                <th style="text-align: center;">Category</th>
                <th style="text-align: center;">Status</th>
              </tr>
            </thead>
          </table>


        </div>
    </div>  


  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST"> 
      <div class="modal-body">
        <div id="add-product-messages"></div>

       <div class="form-group">
  <label class="control-label col-sm-3" for="productName">Product Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-3" for="quantity">Quantity:</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" min="1" required>
    </div>
  </div>


   <div class="form-group">
    <label class="control-label col-sm-3" for="rate">Rate:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate (price per piece)" required>
    </div>
  </div>


<div class="form-group">
    <label class="control-label col-sm-3" for="brandName" required>Brand Name:</label>
    <div class="col-sm-9"> 
      <select class="form-control" id="brandName" name="brandName">
        <option value="">---Select---</option>
        <?php
        $sql = "SELECT brand_id, brand_name FROM brands WHERE brand_status = 1 AND brand_active = 1";
        $result = $connect->query($sql);
        while ($row = $result->fetch_array()){
          echo "<option value='".$row[0]."'>".$row[1]."</option>";
        }
        ?>
      </select>
    </div>
  </div>


<div class="form-group">
    <label class="control-label col-sm-3" for="categoryName" required>Category Name:</label>
    <div class="col-sm-9"> 
      <select class="form-control" id="categoryName" name="categoryName">
        <option value="">---Select---</option>
        <?php
        $sql = "SELECT category_id, category_name FROM category WHERE category_status = 1 AND category_active = 1";
        $result = $connect->query($sql);
        while ($row = $result->fetch_array()){
          echo "<option value='".$row[0]."'>".$row[1]."</option>";
        }
        ?>
      </select>
    </div>
  </div>


      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..">Add Product</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
</form>

    </div>
  </div>
</div>

<script type="text/javascript" src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>