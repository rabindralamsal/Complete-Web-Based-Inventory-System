<?php require_once 'includes/header.php'; ?>

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Add an order</div>
          <div class="panel-body">
            <div class="addOrderMessages"></div>


    <form class="form-horizontal" id="submitOrderForm" action="payment.php" method="POST"> 
    <h5>Customer Details</h5><hr style="margin-top: 10px;">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Customer Name</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter customer's full name" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Contact</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter customer's phone number" required>
    </div>
  </div>



  <h5 style="margin-top:40px;">Order Details</h5><hr style="margin-top: 10px;">
    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Order Date</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Select Product</label>
    <div class="col-sm-9"> 
      <select class="form-control" name="productId" id="productId">
                    <option value="">---Select---</option>
                    <?php
                      $productSql = "SELECT * FROM product WHERE quantity != 0";
                      $productData = $connect->query($productSql);

                      while($row = $productData->fetch_array()) {                     
                        echo "<option value='".$row['product_id']."' id='product".$row['product_id']."'>".$row['product_name']."</option>";
                      }
                    ?>
                  </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="contact">No of items</label>
    <div class="col-sm-9"> 
      <input type="number" class="form-control" name="numberOfItems" id="numberOfItems" placeholder="How many of em" min="1" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Vat applicable</label>
    <div class="col-sm-9"> 
      <input type="text" width="100px" class="form-control" name="vat" id="vat" value="13%" readonly="readonly">
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Discount (%)</label>
    <div class="col-sm-9"> 
      <input type="text" width=100px class="form-control" name="discount" id="discount" placeholder="Enter discount (in %)" required>
    </div>
  </div>


<button style="margin: 30px 0 30px 0;" type="submit" class="btn btn-primary" id="addOrdersBtn">Continue to payment details</button>
</form>


      </div>
    </div>  
  </div>
</div>




<script type="text/javascript" src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>