<?php


?>

<html>

<head>
	<title>Product Details</title>
	<style>
		td{
			text-align: center;
			vertical-align: middle;
			padding-right: 20px;
		}
	</style>
	<script src="./jquery.js"></script>
</head>

<body>
	<!-- <form method="POST" action="" enctype="multipart/form-data"> -->
		<fieldset style="width: 95%;">
			<legend>Filter Data based on Product Price</legend>
			<table align="center">
				<tr>
					<td> Min Price: <input type="text" id="minPrice">&emsp;&emsp;</td>
					<td> Max Price: <input type="text" id="maxPrice">&emsp;&emsp;</td>
					<td><input type="button" id="btnGo" value="Go" /></td>
				</tr>
			</table>
		</fieldset>
		<br><br>
		<fieldset style="width: 95%; display:none;" id="availableProd">
			<legend>Available Product</legend>
			<table align="center" id="showData">
				
			</table>
		</fieldset>
	<!-- </form> -->

	<!-- sending asynchoronous request and displaying -->
	<script>
		$(document).ready(function(){
			$("#btnGo").click(function(){
				var minPrice = $("#minPrice").val();
				var maxPrice = $("#maxPrice").val();
				$.ajax({
					url: "FilterProduct.php",
					type: "POST",
					data: {'minPrice': minPrice, 'maxPrice': maxPrice},
					success: function(data){
						// console.log("Success!");
						// console.log(data);
						$("#availableProd").html(data);
						$("#availableProd").show();
					}
				});
			});
		});
	</script>
</body>

</html>