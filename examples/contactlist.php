<?php
	
require_once '../vendor/autoload.php';

$client = new GroCRM\Client("YOUR_API_KEY_HERE");

$contacts = $client->contacts()->getAll();
$items = $contacts["items"];

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style>
			
			html, body {
				background-color: #f0f0f0;
				font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			}
			
			pre {
				font-family: -apple-system, BlinkMacSystemFont, sans-serif;
				background-color: inherit;
				border: none;
			}
			
			.container {
				margin-top: 50px;
				margin-bottom: 50px;
				background-color: #fff;
			}
			
		</style>
	</head>
	<body>
		<div class="container">
			<h1>Contacts</h1>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Tags</th>
							<th>Notes</th>
						</tr>
					</thead>
					<?php foreach ($items as $item) { ?>
					<tr>
						<td><?php echo $item["id"]; ?></td>
						<td>
							<?php 
								if (isset($item["name"])) {
									echo $item["name"]; 
								} else {
									echo $item["first_name"]." ".$item["last_name"];
								}
							?>
						</td>
						<td><?php echo $item["email"]; ?></td>
						<td><?php echo json_encode($item["tags"]); ?></td>
						<td><pre><?php echo $item["notes"]; ?></pre></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</body>
</html>