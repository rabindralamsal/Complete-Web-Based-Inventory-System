<?php require_once 'includes/header.php'; ?>


<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Please verify the details and finalize payment</div>
          <div class="panel-body">
    <form class="form-horizontal" id="submitOrderForm" action="php_action/createOrder.php" method="POST"> 
    <h4>Customer Details</h4><hr style="margin-top: 10px;">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Customer Name</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter customer's full name" value="<?php echo $_POST["name"]; ?>" readonly="readonly">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Contact</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter customer's phone number" value="<?php echo $_POST["contact"]; ?>" readonly="readonly">
    </div>
  </div>



  <h4 style="margin-top:40px;">Order Details</h4><hr style="margin-top: 10px;">
    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Order Date</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="date" id="date" value="<?php echo $_POST["date"]; ?>" readonly="readonly">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Selected Product</label>
    <div class="col-sm-9"> 
    <input type="text" class="form-control" name="product_name" id="product_name" value="<?php
          $pid = $_POST["productId"];$productSql = "SELECT * FROM product WHERE product_id = '$pid'";$productData = $connect->query($productSql);$value = $productData->fetch_assoc();$p_name = $value['product_name'];echo "$p_name";?>" readonly="readonly">      
    </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="name">Product ID</label>
    <div class="col-sm-9"> 
    <input type="text" class="form-control" name="product_id" id="product_id" value="<?php echo $value['product_id'] ;?>" readonly="readonly">      
    </div>
  </div> 

<div class="check"><p>There are <b><?php
$pid = $_POST["productId"];
$infoSql = "SELECT quantity FROM product WHERE product_id = '$pid'";
$productData = $connect->query($infoSql);
$res = $productData->fetch_assoc();
$p_quant = $res['quantity'];
echo "$p_quant";
?></b> <?php echo $value['product_name'] ;?> available. Please verify that customer need doesn't exceed our stock. If it exceeds, go back to previous page and consider limiting the no. of items as per our stock.</p>

<div class="form-group">
    <label class="control-label col-sm-2" for="contact">No of items</label>
    <div class="col-sm-9"> 
      <input type="number" class="form-control" name="numberOfItems" id="numberOfItems" value="<?php echo $_POST["numberOfItems"]; ?>" readonly="readonly">
    </div>
  </div></div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Vat applicable</label>
    <div class="col-sm-9"> 
      <input type="text" width="100px" class="form-control" name="vat" id="vat" value="<?php echo $_POST["vat"]; ?>" readonly="readonly">
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Discount (%)</label>
    <div class="col-sm-9"> 
      <input type="text" width=100px class="form-control" name="discount" id="discount" value="<?php echo $_POST["discount"]; ?>" readonly="readonly">
    </div>
  </div>


<h4 style="margin-top:40px;">Cost Details (Costs are in Rupees)</h4><hr style="margin-top: 10px;">
    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Price (1 Unit)</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="unitPrice" id="unitPrice" value="<?php echo $value['rate']; ?>" readonly="readonly">
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Sub-total</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="subTotal" id="subTotal" value="<?php
       $numberOfItems = $_POST["numberOfItems"];
       $unitPrice = $value['rate'];
       $subTotal = $numberOfItems * $unitPrice;
        echo $subTotal; 
        ?>"
        readonly="readonly">
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Discount to be applied</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="discounted" id="discounted" value="<?php
       $discountPercent = $_POST["discount"];
       $discounted = $subTotal * ($discountPercent/100);
        echo $discounted; 
        ?>"
        readonly="readonly">
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Final subtotal</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="finalSubtotal" id="finalSubtotal" value="<?php
       $finalSubtotal = $subTotal - $discounted;
        echo $finalSubtotal; 
        ?>"
        readonly="readonly">
    </div>
  </div>

<br>
<p>After applying 13% vat to the discounted total</p><br>

    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Total payable</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" name="total" id="total" value="<?php
       $total = $finalSubtotal + ((13/100) * $finalSubtotal);
        echo $total; 
        ?>"
        readonly="readonly">
    </div>
  </div>


<h4 style="margin-top:40px;">Payment Details</h4><hr style="margin-top: 10px;">
    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Payment Type</label>
    <div class="col-sm-9">
       <select class="form-control" name="paymentType" id="paymentType" required>
        <option value="">---Select---</option>
         <option value="cash">Cash</option>
         <option value="card">Debit/Credit Card</option>
         <option value="ebanking">Internet Banking</option>
         <option value="upi">Unified Payment Interface (UPI)</option>
       </select>
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Amount Paid</label>
    <div class="col-sm-9"> 
      <input onkeyup='Calculate();' type="text" class="form-control" name="paid" id="paid" placeholder="How much amount did the customer pay?" required>
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="contact">Due</label>
    <div class="col-sm-9"> 
      <input type="number" class="form-control" name="due" id="due" required readonly="readonly">
    </div>
  </div>

<button style="margin: 30px 0 30px 0;" type="submit" class="btn btn-primary" id="addOrdersBtn">Save order</button>
</form>


      </div>
    </div>  
  </div>
</div>


<script>
function Calculate()
{
  var total = document.getElementById('total').value;
  var paid = document.getElementById('paid').value; 
  var due = parseFloat(total) - parseFloat(paid);
  document.getElementById('due').value = parseInt(due);
}
</script>

<?php require_once 'includes/footer.php'; ?>