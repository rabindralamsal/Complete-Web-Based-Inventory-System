<?php require_once 'php_action/core.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>Reliance Store | JNU Branch</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="custom/css/custom.css">
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/jquery-ui/jquery-ui.min.css">
	<script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Reliance Store | JNU Branch</a>
    </div>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
        <div class="collapse navbar-collapse" id="myNavbar">

    <ul class="nav navbar-nav">
      <li id="navDashboard" style="border-right: solid 1px #ddd;"><a href="dashboard.php">Dashboard</a></li>
      <li id="navBrand" style="border-right: solid 1px #ddd;"><a href="brand.php">Brand</a></li>
      <li id="navCategory" style="border-right: solid 1px #ddd;"><a href="category.php">Category</a></li>
      <li id="navProduct"><a href="product.php">Product</a></li>
      <li id="topNavAddOrder" style="background-color:#459845;border-right: dotted 2px #1d6b1d;"><a style="color:#ffffff;" href="addOrders.php">Add an Order</a></li>
      <li id="topNavManageOrder" style="background-color:#459845;border-right: dotted 2px #1d6b1d;"><a style="color:#ffffff;" href="manageOrders.php">List Orders</a></li>
      <li id="topNavManageOrder" style="background-color:#459845;"><a style="color:#ffffff;" href="specificOrder.php">View an order</a></li>
</ul>


        <ul class="nav navbar-nav navbar-right" id="navProfile">
          <li id="topNavSetting" style="border-left: solid 1px #ddd;border-right: solid 1px #ddd;"><a href="setting.php">Settings</a></li>
          <li id="topNavLogout"><a href="logout.php">Logout</a></li>
        </ul>
    </div>
  </div>
</nav>
<div class="container">