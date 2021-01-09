
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emails";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, email, date, domain_name FROM subscriptions";

if($_GET){
//do something if $_GET is set 

	//Sorting by email
	if(isset($_GET['sort'])){
		if ($_GET['sort'] == 'email'){
			$sql = "SELECT domain_name FROM subscriptions GROUP BY domain_name HAVING COUNT(domain_name) > 0";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<button><a href='show_data.php?email=" .$row["domain_name"]. "'>" .$row["domain_name"]. "</a></button>";
			}
		}
	   		$sql = "SELECT id, email, date, domain_name FROM subscriptions ORDER BY email";
	   		$result = $conn->query($sql);
		}
	}
	//Sorting by date
	if(isset($_GET['sort'])){
		if ($_GET['sort'] == 'date'){
			$sql = "SELECT domain_name FROM subscriptions GROUP BY domain_name HAVING COUNT(domain_name) > 0";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<button><a href='show_data.php?email=" .$row["domain_name"]. "'>" .$row["domain_name"]. "</a></button>";
				}
			}
	    	$sql = "SELECT id, email, date, domain_name FROM subscriptions ORDER BY date";
	    	$result = $conn->query($sql);
		}
	}
	//Delete by clicking on desired email
	if(isset($_GET['delete'])){
		if ($_GET['delete']){

			$sql = "DELETE FROM subscriptions WHERE id=".$_GET['delete']."";
			$result = $conn->query($sql);
			$sql = "SELECT id, email, date, domain_name FROM subscriptions ORDER BY date";
			$result = $conn->query($sql);
			header('Location: show_data.php');
		}
	}
	//Filter by email providers
	if(isset($_GET['email'])){
		if ($_GET['email']){
			$sql = "SELECT domain_name FROM subscriptions GROUP BY domain_name HAVING COUNT(domain_name) > 0";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<button><a href='show_data.php?email=" .$row["domain_name"]. "'>" .$row["domain_name"]. "</a></button>";
				}
			}
			$sql = "SELECT id, email, date, domain_name FROM subscriptions WHERE domain_name = '".$_GET['email']."'";
			$result = $conn->query($sql);
		}
	}
} 

//if $_GET is NOT set sort by date (default)
if(!$_GET){
	$sql = "SELECT domain_name FROM subscriptions GROUP BY domain_name HAVING COUNT(domain_name) > 0";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<button><a href='show_data.php?email=" .$row["domain_name"]. "'>" .$row["domain_name"]. "</a></button>";
		}
	}
	
	$sql = "SELECT id, email, date, domain_name FROM subscriptions ORDER BY date";
	$result = $conn->query($sql);
} 

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th><a href='show_data.php?sort=email'>Email</a></th><th><a href='show_data.php?sort=date'>Date</a></th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td><a href='show_data.php?delete=" .$row["id"]. "'>" . $row["email"]. "</a></td><td>" . $row["date"]. "</td></tr>";
        
    }
    echo "</table>";
} else {
   	echo "No emails found in database!";
}


$conn->close();
?>

</body>
</html>
