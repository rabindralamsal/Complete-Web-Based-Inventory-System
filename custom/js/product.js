var manageProductTable;

$(document).ready(function(){

	$("#navProduct").addClass('active');

	manageProductTable = $("#manageProductTable").DataTable({
		'ajax' : 'php_action/fetchProduct.php',
		'order' : [],
		"paging":   false,
        "info":     false
	});
});