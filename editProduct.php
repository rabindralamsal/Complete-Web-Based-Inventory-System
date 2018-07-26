<?php require_once 'includes/header.php'; ?>

<?php
if($_POST) {
      $product_id = $_POST["product_id"];

      $result = "SELECT * FROM product WHERE product_id = '$product_id'";
      $resultConn = $connect->query($result);
      $row = $resultConn->fetch_array();
}
?>


<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Edit Product</div>
          <div class="panel-body">
            <div class="addOrderMessages"></div>

<div class="okay">
<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="form-group">
    <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Enter product id">
  </div>
  <button type="submit" class="btn btn-primary">Extract details</button>
</form>
</div>


    <form class="form-horizontal" id="submitOrderForm" action="php_action/editProduct.php" method="POST"> 
    <div style="display:none;" class="form-group">
    <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $row['product_id'];?>">
  </div>
    <h4>Edit Product</h4><hr style="margin-top: 10px;">
    
    <div class="form-group">
  <label class="control-label col-sm-2" for="productName">Product Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $row['product_name'];?>" required>
    </div>
  </div>


   <div class="form-group">
    <label class="control-label col-sm-2" for="quantity">Quantity:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" min="1" value="<?php echo $row['quantity'];?>" required>
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="rate">Rate:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate (price per piece)" value="<?php echo $row['rate'];?>" required>
    </div>
  </div>

<button style="margin: 30px 0 30px 0;float:left;" type="submit" class="btn btn-success">Update Product Detail</button>
</form>


      </div>
    </div>  
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>