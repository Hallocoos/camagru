<?php
session_start();
include "templates/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>User Profile</title>
</head>

<body class="purp_body">

	<section class="hero is-fullheight">
		<div class="hero-body">
			<div class="container">
				<?php
				include "functions/getUserDetails.php";
				$_SESSION['URI'] = $_SERVER['REQUEST_URI'];
				echo getUserProfile($_GET['name']);
				echo '<section class="section column"><div class="container">';
				echo getUserImages($_GET['name']);
				?>
			</div>
	</section>
	</div>
	</div>
	</section>

</body>

</html>