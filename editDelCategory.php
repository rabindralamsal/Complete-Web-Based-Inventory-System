<?php require_once 'includes/header.php'; ?>

<?php
if($_POST) {
      $category_id = $_POST["category_id"];

      $result = "SELECT * FROM category WHERE category_id = '$category_id'";
      $resultConn = $connect->query($result);
      $row = $resultConn->fetch_array();
}
?>


<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Edit Category</div>
          <div class="panel-body">
            <div class="addOrderMessages"></div>

<div class="okay">
<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="form-group">
    <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Enter category id">
  </div>
  <button type="submit" class="btn btn-primary">Extract details</button>
</form>
</div>


    <form class="form-horizontal" id="submitOrderForm" action="php_action/editCategory.php" method="POST"> 
    <div style="display:none;" class="form-group">
    <input type="text" class="form-control" id="category_id" name="category_id" value="<?php echo $row['category_id'];?>">
  </div>
    <h4>Edit Category</h4><hr style="margin-top: 10px;">
  <div class="form-group">
    <label class="control-label col-sm-2" for="category_name">Category</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $row['category_name'];?>">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="category_status">Status</label>
    <div class="col-sm-9">


        <select class="form-control" id="category_status" name="category_status">
            <option value="1">Continue selling items in this category</option>
            <option value="2">Stop selling items in this category</option>
            </select>
    </div>
  </div>



<button style="margin: 30px 0 30px 0;float:left;" type="submit" class="btn btn-success">Update category</button>

</form>

<form class="form-inline" action="php_action/deleteCategory.php" method="POST">
  <div style="display:none;" class="form-group">
    <input type="text" class="form-control" id="category_id" name="category_id" value="<?php echo $row['category_id'];?>">
  </div>
  <button style="margin: 30px 0 30px 10px;" type="submit" class="btn btn-primary">Delete Category</button>
</form>


      </div>
    </div>  
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>