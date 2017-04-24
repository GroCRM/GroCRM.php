<?php

require_once '../vendor/autoload.php';

if (isset($_POST['submit'])) {
	
	$client = new GroCRM\Client("YOUR_API_KEY_HERE");
	
	$first_name = $_POST["first_name"];	
	$last_name = $_POST["last_name"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];
	$email = $_POST["email"];
	
	$notes = "SUBJECT:\n";
	$notes .= $subject;
	$notes .= "\n\n";
	$notes .= "MESSAGE:\n";
	$notes .= $message;
	
	try {
		$newContact = $client->contacts()->create(["type_id" => 1, "first_name" => $first_name, "last_name" => $last_name, "email" => $email, "notes" => $notes]);
	} catch (GuzzleHttp\Exception\ClientException $e) {
		$response = $e->getResponse();
		$statusCode = $response->getStatusCode();
		$body = $response->getBody()->getContents();
		$errors = json_decode($body, true);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			
			html, body {
				background-color: #f0f0f0;
			}
			
			body {
				font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			}
			
			h1 {
				color: #757575;
				padding: 10px 0px 20px 0px;
				margin: 0px;
			}
			
			input[type=text], textarea {
				font-size: 17px;
				width: 100%;
				margin-top: 4px;
				margin-bottom: 10px;
				padding: 8px;
				border: 1px solid #cccccc;
				border-radius: 3px;
				box-sizing: border-box;
			}
			
			input[type=text]:focus, textarea:focus {
				outline: 0;
				border: 1px solid #3AB0D3;
			}
			
			textarea {
				resize: vertical;
			}
			
			input[type=submit] {
				background-color: #5cb85c;
				color: white;
				border: none;
				border-radius: 4px;
				padding: 15px;
				width: 100%;
				cursor: pointer;
				font-size: 17px;
			}
			
			input[type=submit]:hover {
				background-color: #469146;
			}
			
			.container {
				width: 500px;
				background-color: #fff;
				padding: 35px 45px;
				margin: 30px auto;
				box-shadow: 1px 5px 10px #d0d0d0;
			}
			
			.debug {
				width: 590px;
				background-color: #dfdfdf;
				margin: 50px auto;
			}
			
			.debug pre {
				padding: 35px 45px;
			}
			
			.debug-title {
				width: 100%;
				text-align: center;
				font-size: 20px;
				padding: 20px 0px;
				border-bottom: 1px solid #9e9e9e;
			}
			
			
		</style>
	</head>
	<body>
		<div class="container">
			<h1>Contact us today!</h1>
			<form method="post">
				<input type="text" id="first_name" name="first_name" placeholder="first name">
				<input type="text" id="last_name" name="last_name" placeholder="last name">
				<input type="text" id="email" name="email" placeholder="email">
			
				<br/>
				<br/>
				<br/>
				<input type="text" id="subject" name="subject" placeholder="subject">
				<textarea id="message" name="message" placeholder="message" style="height: 150px;"></textarea>
				
				<input type="submit" name="submit" value="Contact us!">
			</form>
		</div>
		
		<?php if (isset($newContact)) { ?>
		<div class="debug">
			<div class="debug-title">DEBUG</div>
			<pre><?php var_export($newContact); ?></pre>
		</div>
		<?php } ?>
		
		<?php if (isset($errors)) { ?>
		<div class="debug">
			<div class="debug-title">DEBUG</div>
			<pre><?php echo "Status Code: $statusCode\n\n"; var_export($errors); ?></pre>
		</div>
		<?php } ?>
		
	</body>
</html>