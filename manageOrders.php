<?php require_once 'includes/header.php'; ?>

<style type="text/css">
  .container{
    width:100%;
  }
</style>

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">Listing all Orders</div>
        <div class="panel-body">

          <table class="tables" id="manageOrdersTable" style="width:100%;">
            <thead>
              <tr>
                <th>Order Id</th>
                <th style="width:75px;">Order Date</th>
                <th>Client Name</th>
                <th>Contact</th>
                <th>Product</th>
                <th>No. of items</th>
                <th>Amount</th>
                <th>Payment status</th>
                <th>Due amount</th>
              </tr>
            </thead>
          </table>
        </div>
    </div>  
  </div>
</div>
<script type="text/javascript" src="custom/js/orders.js"></script>

<?php require_once 'includes/footer.php'; ?>