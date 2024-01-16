<?php

include_once './SQLConnection.php';

$minPrice = $_POST['minPrice'];
$maxPrice = $_POST['maxPrice'];
$query = "SELECT itemName,itemPrice,stockInHand,itemImagePath FROM Item WHERE itemPrice BETWEEN $minPrice AND $maxPrice;";

$result = mysqli_query($con, $query) or die("Can't Display!");

// print_r($result);
$output = "<tr>
				<th>Photo</th>
				<th>Name</th>
				<th>Price</th>
				<th>Available Quantity</th>
			</tr>";
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result))
		$output .= "<tr>
						<td><img src='./UploadedImages/".$row['itemImagePath']."'></td>
						<td>".$row['itemName']."</td>
						<td>".$row['itemPrice']."</td>
						<td>".$row['stockInHand']."</td>
					</tr>";
	echo $output;
}
else
    echo "No records found!";

$con->close();

?>
