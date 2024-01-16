<?php
session_start();

echo "<h1 align='center'>Shopping Mart</h1>
		<center><a href='./DisplayProduct.php'>Display Product</a></center>
		<hr>";

// Q1-----------------------------------------------------------------
// checking the file exists or not
if (file_exists("./CustomerShopping.txt")) {
	$file = fopen("./CustomerShopping.txt", 'r');
	echo    "<h3 align='center'>State wise Total Order</h3>
			<table border=1 cellpadding=5 cellspacing=0 align='center'>
				<tr>
					<th>Sr. No</th>
					<th>State Name</th>
					<th>Total Order in ₹</th>
				</tr>";

	include_once "./CommonFunctions.php";

	$totalOrders = array();
	$customerArray = array();

	while (!feof($file)) {
		$line = fgets($file);
		// checking $line variable is not empty or not & if not then perform operations
		if (!empty($line)) {
			// echo $line . "<br>";

			$customerArray = explode(', ', $line);
			// echo "<pre>";  print_r($customerArray);  echo "</pre>";

			$orderAmt = $customerArray[6];
			$state = $customerArray[7];

			// state wise sum of total ordrs
			if (isset($totalOrders[$state]))
				$totalOrders[$state] += $orderAmt;
			else
				$totalOrders[$state] = $orderAmt;

			// echo "<pre>";  print_r($totalOrders);  echo "</pre>";
		}
	}

	// displaying Q1 O/P
	$srNo = 1;
	foreach ($totalOrders as $state => $amt) {
		echo "<tr>
				<td>" . $srNo . "</td>
				<td>" . getState($state) . "</td>
				<td>" . $amt . "</td>
			  </tr>";

		$srNo++;
	}
	echo "</table>";


	// Q2-----------------------------------------------------------------

	if (isset($_POST['btnSave'])) {
		$_SESSION['sessId'] = $_POST['btnSave'];
		header('location: ProductEntryForm.php');
	}

	$file = fopen("./CustomerShopping.txt", 'r');
	echo    "<br>
			<h3 align='center'>Item Details</h3>
			<form action='' method='POST'>
			<table border=1 cellpadding=5 cellspacing=0 align='center'>
				<tr>
					<th>Sr. No</th>
					<th>Item Name</th>
					<th>Item Price in ₹</th>
					<th>Action</th>
				</tr>";

	$customerArray = array();
	$itemArray = array();

	$srNo = 1;
	while (!feof($file)) {
		$line = fgets($file);
		// checking $line variable is not empty or not & if not then perform operations
		if (!empty($line)) {
			$customerArray = explode(', ', $line);
			// echo "<pre>";  print_r($customerArray);  echo "</pre>";

			$itemName = $customerArray[5];
			$itemPrice = $customerArray[6];

			if (in_array($itemName, $itemArray) === false) {
				array_push($itemArray, $itemName);
				echo "<tr>
						<td>" . $srNo . "</td>
						<td>" . $itemName . "</td>
						<td>" . $itemPrice . "</td>
						<td><button name='btnSave' value='" . $srNo . "'>SaveToDB</button></td>
			 		  </tr>";
				$srNo++;
			}
		}
	}
	echo "</table></form>";

	// echo "<pre>";  print_r($itemArray);  echo "</pre>";
} else
	die("File doesn't exists!");
