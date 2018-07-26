var manageOrdersTable;

$(document).ready(function(){

	$("#navOrder").addClass('active');

	manageOrdersTable = $("#manageOrdersTable").DataTable({
		"ajax" : 'php_action/fetchOrders.php',
		"order" : [[0, "desc"]],
		"paging":   false,
        "info":     false
	});
});