<?php require_once 'includes/header.php'; ?>

<div style="background-color: transparent;margin:0px;padding:0px;border-radius:0px;" class="jumbotron">

<p style="color: #ffffff;">Quick view of the inventory!</p>
<div class="row">
<div class="col-sm-4" id="totalBrands">
<div class="card">
<div class="card-body">
<h5 class="card-title">Number of brands (on going)</h5>
<h2 class="card-text" style="text-align: center;">
<?php 
$totalBrands = "SELECT COUNT(brand_id) FROM brands WHERE brand_active=1";
$totalBrandsResult = $connect->query($totalBrands);
$totalBrandsResultRow = $totalBrandsResult->fetch_array();
echo $totalBrandsResultRow[0];
?>
</h2>
</div>
</div>
</div>


<div class="col-sm-4" id="totalCategories">
<div class="card">
<div class="card-body">
<h5 class="card-title">Number of categories (on going)</h5>
<h2 class="card-text" style="text-align: center;">
<?php 
$totalCategories = "SELECT COUNT(category_id) FROM category WHERE category_active=1";
$totalCategoriesResult = $connect->query($totalCategories);
$totalCategoriesResultRow = $totalCategoriesResult->fetch_array();
echo $totalCategoriesResultRow[0];
?>	
</h2>
</div>
</div>
</div>


<div class="col-sm-4" id="totalProducts">
<div class="card">
<div class="card-body">
<h5 class="card-title">No. of unique products (available)</h5>
<h2 class="card-text" style="text-align: center;">
<?php 
$totalProducts = "SELECT COUNT(product_id) FROM product WHERE quantity >0";
$totalProductsResult = $connect->query($totalProducts);
$totalProductsResultRow = $totalProductsResult->fetch_array();
echo $totalProductsResultRow[0];
?>
</h2>
</div>
</div>
</div>
</div>


<div class="row" id="rowSeperator">
<div class="col-sm-6" id="totalSales">
<div class="card">
<div class="card-body">
<h3 class="card-title">Total sales till date (Rs.)</h3>
<h1 class="card-text" style="text-align: center;overflow: hidden;width: 97%;">
<?php 
$totalSales = "SELECT SUM(total_amount) FROM orders";
$totalSalesResult = $connect->query($totalSales);
$totalSalesResultRow = $totalSalesResult->fetch_array();
$ts = $totalSalesResultRow[0];
echo $ts;
?>
</h1>
</div>
</div>
</div>


<div class="col-sm-6" id="totalCollected">
<div class="card">
<div class="card-body">
<h3 class="card-title">Total amount collected (Rs.)</h3>
<h1 class="card-text" style="text-align: center;overflow: hidden;width: 97%;">
<?php 
$totalDue = "SELECT SUM(due) FROM orders";
$totalDueResult = $connect->query($totalDue);
$totalDueResultRow = $totalDueResult->fetch_array();
$td =  $totalDueResultRow[0];
$d = $ts - $td;
echo $d;
?>
</h1>
</div>
</div>
</div>
</div>


<div class="row" id="rowSeperator">
<div class="col-sm-4" id="totalCustomers">
<div class="card">
<div class="card-body">
<h5 class="card-title">Our total customers</h5>
<h2 class="card-text" style="text-align: center;">
<?php 
$totalCustomers = "SELECT COUNT( DISTINCT(client_name)) FROM orders";
$totalCustomersResult = $connect->query($totalCustomers);
$totalCustomersResultRow = $totalCustomersResult->fetch_array();
echo $totalCustomersResultRow[0];
?>	
</h2>
</div>
</div>
</div>


<div class="col-sm-4" id="totalOrders">
<div class="card">
<div class="card-body">
<h5 class="card-title">Number of orders till date</h5>
<h2 class="card-text" style="text-align: center;">
<?php 
$totalOrders = "SELECT COUNT(order_id) FROM orders";
$totalOrdersResult = $connect->query($totalOrders);
$totalOrdersResultRow = $totalOrdersResult->fetch_array();
echo $totalOrdersResultRow[0];
?>	
</h2>
</div>
</div>
</div>


<div class="col-sm-4" id="totalDue">
<div class="card">
<div class="card-body">
<h5 class="card-title">Due (amount yet to be collected)</h5>
<h2 class="card-text" style="text-align: center;"><?php echo $td; ?></h2>
</div>
</div>
</div>
</div>

</div><!-- /jumbotron -->


<?php require_once 'includes/footer.php'; ?>