<?php require_once 'includes/header.php'; ?>

<?php
if($_POST) {
      $order_id = $_POST["order_id"];

      $result = "SELECT * FROM orders WHERE order_id = '$order_id'";
      $resultConn = $connect->query($result);
      $row = $resultConn->fetch_array();
}
?>


<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">View Specific Order</div>
          <div class="panel-body">
            <div class="addOrderMessages"></div>

<div class="okay">
<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="form-group">
    <input type="text" class="form-control" id="order_id" name="order_id" placeholder="Enter an order id">
  </div>
  <button type="submit" class="btn btn-primary">Extract details</button>
</form>
</div>


    <form class="form-horizontal" id="submitOrderForm" action="php_action/updatePayment.php" method="POST"> 
    <h4>Customer Details</h4><hr style="margin-top: 10px;">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Customer Name</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['client_name'];?>" readonly="readonly">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Contact</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $row['client_contact'];?>" readonly="readonly">
    </div>
  </div>



  <h4 style="margin-top:40px;">Order Details</h4><hr style="margin-top: 10px;">
    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Order Date</label>
    <?php echo $row['date'];?>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Selected Product</label>
    <div class="col-sm-9"> 
    <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $row['product_name'];?>" readonly="readonly">      
    </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="name">Product ID</label>
    <div class="col-sm-9"> 
    <input type="text" class="form-control" name="product_id" id="product_id" value="<?php echo $row['product_id'];?>" readonly="readonly">      
    </div>
  </div> 


<div class="form-group">
    <label class="control-label col-sm-2" for="contact">No of items</label>
    <div class="col-sm-9"> 
      <input type="number" class="form-control" name="numberOfItems" id="numberOfItems" value="<?php echo $row['noOfProducts'];?>" readonly="readonly">
    </div>
</div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Vat applicable</label>
    <div class="col-sm-9"> 
      <input type="text" width="100px" class="form-control" name="vat" id="vat" value="<?php echo $row['vat'];?>" readonly="readonly">
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Discount (%)</label>
    <div class="col-sm-9"> 
      <input type="text" width=100px class="form-control" name="discount" id="discount" value="<?php echo $row['discount'];?>" readonly="readonly">
    </div>
  </div>


<h4 style="margin-top:40px;">Cost Details (Costs are in Rupees)</h4><hr style="margin-top: 10px;">
    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Price (1 Unit)</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="unitPrice" id="unitPrice" value="<?php
      $pid = $row['product_id'];
      $pidrun = "SELECT rate FROM product WHERE product_id = '$pid'";
      $strresult = $connect->query($pidrun);
      $pidrow = $strresult->fetch_array();
      echo $pidrow[0]; ?>" readonly="readonly">
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Sub-total</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="subTotal" id="subTotal" value="<?php echo $row['sub_total'];?>"
        readonly="readonly">
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Discount to be applied</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="discounted" id="discounted" value="<?php echo $row['discount'];?>"
        readonly="readonly">
    </div>
  </div>


<br>
<p>After applying 13% vat to the discounted total</p><br>

    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Total payable</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="total" id="total" value="<?php echo $row['total_amount'];?>"
        readonly="readonly">
    </div>
  </div>


<h4 style="margin-top:40px;">Payment Details</h4><hr style="margin-top: 10px;">
    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Payment Type</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="paymentType" id="paymentType" value="<?php echo $row['payment_type'];?>" readonly="readonly"> 
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Amount Paid</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="paid" id="paid" value="<?php echo $row['paid'];?>" readonly="readonly">
    </div>
  </div>



<div class="check"><p>Collect the due amount and make an update in the "Due" field below.</p>
   <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Due amount</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="due" id="due" value="<?php echo $row['due'];?>">
    </div>
  </div>
</div>



<?php
if ($row['due'] == 0){
  echo '<button style="margin: 30px 0 30px 0;float:left;" type="submit" class="btn btn-success" id="addOrdersBtn" readonly="readonly" disabled>Update order</button>';
} else{
  echo '<button style="margin: 30px 0 30px 0;float:left;" type="submit" class="btn btn-success" id="addOrdersBtn" readonly="readonly">Update order</button>';
}
?>
</form>

<form class="form-inline" action="php_action/removeOrder.php" method="POST">
  <div style="display:none;" class="form-group">
    <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $row['product_id'];?>">
    <input type="text" class="form-control" id="noOfProducts" name="noOfProducts" value="<?php echo $row['noOfProducts'];?>">
    <input type="text" class="form-control" id="order_id" name="order_id" value="<?php echo $row['order_id'];?>">

  </div>
  <button style="margin: 30px 0 30px 10px;" type="submit" class="btn btn-primary">Delete this order</button>
</form>


      </div>
    </div>  
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>