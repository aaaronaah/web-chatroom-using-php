<?php

// getting the value of post parameters 
$room = $_POST['room'];

//checking for the input string size
if (strlen($room)>20 or strlen($room)<2) {
	$msg = "Please enter a name between 2 to 20 charcters!";
	echo '<script language="javascript">';
	echo 'alert("'.$msg.'");';
	echo 'window.location="http://localhost/mychatroom";';
	echo '</script>';
}
//checking if room name numeric
elseif (!ctype_alnum($room)) {
	$msg = "Please enter an alpha-numeric room name!";
	echo '<script language="javascript">';
	echo 'alert("'.$msg.'");';
	echo 'window.location="http://localhost/mychatroom";';
	echo '</script>';
}
else{
	//connecting to the database
	include 'db_connect.php';
}

//checking if room already exists
$sql = "SELECT * FROM rooms WHERE roomname = '$room'";
$result = mysqli_query($conn,$sql);
if ($result) {
	
	if (mysqli_num_rows($result)>0) {
		$msg = "Please enter a diiferent room name! This room is already claimed.";
		echo '<script language="javascript">';
		echo 'alert("'.$msg.'");';
		echo 'window.location="http://localhost/mychatroom";';
		echo '</script>';
	}
	else{
		$sql = "INSERT INTO rooms (roomname, starttime) VALUES ('$room', CURRENT_TIMESTAMP);";
		if (mysqli_query($conn,$sql)) {
			$msg = "Your room is ready! You can chat now!";
			echo '<script language="javascript">';
			echo 'alert("'.$msg.'");';
			echo 'window.location="http://localhost/mychatroom/rooms.php?roomname='.$room.'";';
			echo '</script>';
		}
	}
}
else{
	echo "Error".mysqli_error($conn);
}


?>