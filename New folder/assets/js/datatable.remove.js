$(function() {
	$('#produk').dataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "http://localhost/ProjectUAS/Home/dataTable",
			"type": "POST"
		},
		columns: [
			{data: "productid"},
			{data: "productname"},
			{data: "qty"},
			{data: "price"},
			{
				data: null, render: function() {
					return "<button id='remove'>Remove</button>";
				}
			}

		],
	}).dataTableSearch(500);

	$("body").on("click", "#remove", function(event){
		var answer = confirm("You really want to delete data?")
		if (answer){
			var pid = $(this).closest('tr').children('td:nth(0)').text();

			$.ajax({
				type: "POST",
				url: "http://localhost/ProjectUAS/Home/delete",
				datatype : "html",
				data: {
					id: pid
				},
				success: function(data){
					$('#produk').DataTable().ajax.reload();
					alert(data);
				}
			});
		}

	});
});