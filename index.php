<?php

if (isset($_POST["company"])) {
	$company = $_POST["company"];
	$name = $_POST["name"];
	$mail = $_POST["mail"];
	$num = $_POST["num"];
	$url = $_POST["url"];
	$reason = $_POST["reason"];

	$body = "Company: ".$company."\nFull Name: ".$name."\nEmail: ".$mail."\nPhone number: ".$num."\nInfringing URL: ".$url."\nReason: ".$reason."\n==DMCAREQ END==\n\n";

	$extra = "";
	while (file_exists("dmcareq_".date("d-m-Y").$extra.".txt")) {
		$extra .= "_";
	}

	file_put_contents("dmcareq_".date("d-m-Y").$extra.".txt", $body);

	if (mail("arf20@arf20.com", "DMCA Letter", $body, "From: dmcaform@arf20.com"))
		echo "Message accepted";
	else echo "Error, message rejected";
}

?>

<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <title>ARFNET</title>
		<style>
			.title {
				font-size: 36px;
			}
			
			header *{
				display: inline-block;
			}
			
			* {
				vertical-align: middle;
				max-width: 100%;
			}
			
			.text {
				width: 500px;
				height: 200px;
			}
			
			.form {
				margin: 20px;
				padding: 20px;
				//border: solid 1px;
			}
		</style>
    </head>

    <body>
		<header>
			<img src="/arfnet_logo.png" width="64">
			<span class="title"><strong>ARFNET</strong></span>
		</header>
		<hr>
		<a class="home" href="/">Home</a><br>
		<h2>ARFNET DMCA Take Down Request Form</h2>
		<hr>
		<form class="form" method="POST" action="/dmcarequest/index.php">
			<label>Company</label><br>
			<input type="text" name="company"></input><br><br>
			<label>Full Name</label><br>
			<input type="text" name="name"></input><br><br>
			<label>Email</label><br>
			<input type="text" name="mail"></input><br><br>
			<label>Phone number</label><br>
			<input type="text" name="num"></input><br><br>
			<label>Infringing URL</label><br>
			<input type="text" name="url"></input><br><br>
			<label>Reason (Copyright information...)</label><br>
			<textarea class="text" name="reason"></textarea><br><br>
			<input type="submit" value="Submit"></input>
		</form>
	</body>
</html>
