<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['phone number'];
	$email = $_POST['email'];
	$DepartureDate = $_POST['Departure Date'];
	$ArrivalDate = $_POST['Arrival Date'];
    $NoofGuest = $_POST['No. of Guests'];
    $RoomType = $_POST['Room Type'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, DepartureDate ,ArrivalDate, NoofGuest, RoomType ) values(?, ?, ?, ?, ?, ? ,?,?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number, $DepartureDate ,$ArrivalDate, $NoofGuest, $RoomType );
		$execval = $stmt->execute();
		echo $execval;
		echo "Booking Successfully...";
		$stmt->close();
		$conn->close();
	}
?>