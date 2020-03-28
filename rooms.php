<?php
//get parameters
$roomname = $_GET['roomname'];

//connect to the database
include 'db_connect.php';

//execute sql to check if room exists
$sql = "SELECT * FROM rooms WHERE roomname = '$roomname'";

$result = mysqli_query($conn, $sql);

if ($result) {
	//check whether room exists
	if (mysqli_num_rows($result) == 0) {
		$msg = "This room does not exists! Try creating a new one.";
		echo '<script language="javascript">';
		echo 'alert("'.$msg.'");';
		echo 'window.location="http://localhost/mychatroom";';
		echo '</script>';
	}
}
else{
	echo "Error : ".mysqli_error($conn);
}


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles for this template 
    <link href="css/cover.css" rel="stylesheet">  -->

<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

.anyclass{
	height: 350px;
	overflow-y: scroll; 
}
</style>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">mychatroom</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Contact</a>
      </nav>
    </div>
  </header>
</div>
<h2>Chat Messages - <?php echo $roomname; ?></h2>

<div class="container">
	<div class="anyclass">
		
	</div>
</div>

<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Add messages"><br>
<button class="btn btn-default" name="submitmsg" id="submitmsg">Send</button>




<!-- Bootstarp core javascript 
placed at the end so that the page loads faster
added by me  -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
<script type="text/javascript">

//check for new messages every 3 seconds
setInterval(runFunction, 3000);
function runFunction() {
	$.post("htcont.php", {room: '<?php echo $roomname ?>'},
		function (data, status) {
			document.getElementsByClassName('anyclass')[0].innerHTML = data;
		}

		)
}

//using enter key to submit. credits to :- https://www.w3schools.com/howto/howto_js_trigger_button_enter.asp
// Get the input field
var input = document.getElementById("usermsg");
// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("submitmsg").click();
  }
}); 

	//if user submits the form 
	$("#submitmsg").click(function(){
	var $clientmsg = $("#usermsg").val();
    $.post("postmsg.php", {text: $clientmsg, room: '<?php echo $roomname ?>', ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>'  },
    function(data, status){
    	document.getElementsByClassName('anyclass')[0].innerHTML = data;});
    $("#usermsg").val("");
    return false;
	});
</script>

</body>
</html>
