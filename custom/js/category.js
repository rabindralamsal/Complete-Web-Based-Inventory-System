var manageCategoryTable;

$(document).ready(function(){

	$("#navCategory").addClass('active');

	manageCategoryTable = $("#manageCategoryTable").DataTable({
		'ajax' : 'php_action/fetchCategory.php',
		'order' : [],
		"paging":   false,
        "info":     false
	});
});