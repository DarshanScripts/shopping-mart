<?php
session_start();

$prodId = $_SESSION['sessId'];
$prodName = "";
$prodPrice = "";

if (file_exists("./CustomerShopping.txt")) {
	$file = fopen("./CustomerShopping.txt", 'r');

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
				if ($srNo == $prodId) {
					$prodName = $itemName;
					$prodPrice = $itemPrice;
					break;
				}
				$srNo++;
			}
		}
	}
} else
	die("File doesn't exists!");


if (isset($_POST['btnsubmit'])) {
	// echo "<pre>";  print_r($_POST);  echo "</pre>";
	// echo "<pre>";  print_r($_FILES);  echo "</pre>";

	$valid = true;

	$fileName = $_FILES['pimage']['name'];
	$fileTmpName = $_FILES['pimage']['tmp_name'];
	$fileSize = $_FILES['pimage']['size'];
	$fileExt = @strtolower(end(explode('.', $fileName)));
	$ext = array("jpeg", "jpg", "bmp", "png");
	if (in_array($fileExt, $ext) === false) {
		echo "Invalid Image Format!";
		$valid = false;
	}
	// checking file size which is in bytes i.e. 1024B * 200KB
	else if ($fileSize > 204800) {
		echo "Size must be less than 200KB!";
		$valid = false;
	}

	//if data are valid then insert in database
	if ($valid) {
		include_once './SQLConnection.php';

		move_uploaded_file($fileTmpName, "./UploadedImages/" . $fileName);
		// insertion with prepared statement
		$query = "INSERT INTO Item(itemName,itemPrice,stockInHand,itemImagePath,createdDate) VALUES(?,?,?,?,?);";
		if ($stmt = $con->prepare($query)) {
			$stmt->bind_param('siiss', $name, $price, $stock, $path, $curdate);
			$name = $_POST['txtpname'];
			$price = $_POST['txtprice'];
			$stock = $_POST['txtstock'];
			$path = $fileName;
			$curdate = date('Y-m-d h:i:s');
			$stmt->execute();
			if ($stmt)
				echo "<script>alert('Record inserted successfully!');</script>";
			else
				echo "<script>alert('Record not inserted!');</script>";
			$stmt->close();
		}
	}
	$con->close();
}

?>
<html>

<head>
	<title>Product Entry</title>
</head>

<body>
	<form method="POST" action="" enctype="multipart/form-data">
		<fieldset style="width: 450px;">
			<legend>Product Entry</legend>
			<table border="0" align="center">
				<tr>
					<td align="right"> Product Name: </td>
					<td><input type="text" name="txtpname" value="<?php echo $prodName; ?>"></td>
				</tr>
				<tr>
					<td align="right"> Product Price: </td>
					<td><input type="text" name="txtprice" value="<?php echo $prodPrice; ?>"></td>
				</tr>
				<tr>
					<td align="right"> Stock in Hand: </td>
					<td><input type="number" name="txtstock"></td>
				</tr>
				<tr>
					<td align="right">Product Image: </td>
					<td><input type="file" name="pimage" /></td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<br><input type="submit" name="btnsubmit" value="Submit" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>

</html>