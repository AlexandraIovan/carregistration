<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php
		$firstName = $_POST["first_name"];
		$lastName = $_POST["last_name"];
		$brand = $_POST["car_name"];
		$model = $_POST["model_name"];
		$year = $_POST["year"];
		$color = $_POST["color"];
		$fuel = $_POST["fuel"];

		echo $firstName." ".$lastName." ".$brand." ".$model." ".$year." ".$color." ".$fuel; 

		$serverName = "localhost";
		$userName = "root";
		$password = "";
		$dbName = "admin";

		$conn = new mysqli($serverName, $userName, $password, $dbName);
		if($conn->connect_error) {
			die("Connection failed".$conn->connect_error);
		}

		$statement = $conn->prepare("INSERT INTO masini (prenume, nume,marca,model,an,culoare,combustibil) VALUES (?,?,?,?,?,?,?)");
		$statement->bind_param("ssssiss", $firstName, $lastName, $brand, $model, $year, $color, $fuel);
		$statement->execute();

		mysqli_stmt_close($statement);
		mysqli_close($conn);
		header('Location:cars.php');




 ?>

</body>
</html>
