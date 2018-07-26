<?php require_once 'includes/header.php'; ?>

<?php
if($_POST) {
      $brand_id = $_POST["brand_id"];

      $result = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
      $resultConn = $connect->query($result);
      $row = $resultConn->fetch_array();
}
?>


<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Edit Brand</div>
          <div class="panel-body">
            <div class="addOrderMessages"></div>

<div class="okay">
<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="form-group">
    <input type="text" class="form-control" id="brand_id" name="brand_id" placeholder="Enter brand id">
  </div>
  <button type="submit" class="btn btn-primary">Extract details</button>
</form>
</div>


    <form class="form-horizontal" id="submitOrderForm" action="php_action/editBrand.php" method="POST"> 
    <div style="display:none;" class="form-group">
    <input type="text" class="form-control" id="brand_id" name="brand_id" value="<?php echo $row['brand_id'];?>">
  </div>
    <h4>Edit brand</h4><hr style="margin-top: 10px;">
  <div class="form-group">
    <label class="control-label col-sm-2" for="brand_name">Brand</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="brand_name" id="brand_name" value="<?php echo $row['brand_name'];?>">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="brand_status">Status</label>
    <div class="col-sm-9">
              <select class="form-control" id="brand_status" name="brand_status">
                  <option value="1">Continue selling this brand</option>
                  <option value="2">Stop selling this brand</option>
                </select>
      </div>
  </div>



<button style="margin: 30px 0 30px 0;float:left;" type="submit" class="btn btn-success">Update brand</button>

</form>

<form class="form-inline" action="php_action/deleteBrand.php" method="POST">
  <div style="display:none;" class="form-group">
    <input type="text" class="form-control" id="brand_id" name="brand_id" value="<?php echo $row['brand_id'];?>">
  </div>
  <button style="margin: 30px 0 30px 10px;" type="submit" class="btn btn-primary">Delete Brand</button>
</form>


      </div>
    </div>  
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>