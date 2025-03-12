<!DOCTYPE html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
	</head>

	<body>
		<div id="container">
			<?php include 'Includes/template/nav.php'; ?>
			<?php include 'Includes/template/header.php'; ?>
			<div class="content main">
				<div class="sec">
					<h1>Login Form</h1>
					<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
						Username: <input type = "text" name = "usernameLogin" placeholder = "Username"> <br/><br/>
						Password:  <input type = "password" name = "passLogin" placeholder = "Password"> <br/><br/>
						<input type = "submit" ><br/><br/>
					</form>
					<?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $username = $_POST['usernameLogin'];
                        $password = $_POST['passLogin'];

                        include 'includes/functions/functions.php';
                        login($username, $password);
                    }
			?>
				</div>
			</div>
			<?php include 'Includes/template/aside.php'?>
			<?php include 'Includes/template/footer.php'; ?>
		</div>
	</body>
</html>