<?php 
	$email = $_POST['emailbox'];
	$currdate = date('Y/m/d');
	$domain_full = substr($email, strpos($email, '@') + 1);
	$domain = substr($domain_full, 0, strpos($domain_full, '.'));
	//DATABASE conn
	$con = new mysqli('localhost','root','','emails');
	if($con->connect_error){
		die('Connection failed : '.$con->connect_error);
	}else{
		$stmt = $con->prepare("insert into subscriptions(email, date, domain_name) values(?,?,?)");
		$stmt->bind_param("sss",$email, $currdate, $domain);
		$stmt->execute();
		$stmt->close();
		$con->close();
	}
	header("Location: sub_done.html");
	exit;
?>