<?php session_start();
	require_once("users_class.php");
	// require_once("payment_class.php");

	if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['userPassword']) && isset($_POST['email']) && isset($_POST['role'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$userPassword = $_POST['userPassword'];
		$email = $_POST['email'];
		$role = $_POST['role'];

		$user = new User($fname, $lname, $userPassword, $email, $role);
		$user->addUser();
		$userID = $user->get_userID();
		if ($userID == -1){
			echo"User ID not found";
		}

	}

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Info2180 - Project 2</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href = "dashboard.css">
		</head>
	<body>
		<?php include 'header.php';?>
		<div class="container">
			<div class="back">
				<div class="buttons">
					<div><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
					<div><a href="newcontact.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>New Contact</a></div>
					<div><a href="users.php"><i class="	fa fa-users" aria-hidden="true"></i>Users</a></div>
					<hr>
					<div><a href="home.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></div>
				</div>
			</div>	
			<div class="background">
				<div class="records">
					<h1>New User</h1>
					<div class="record2">
						<!-- <form method="post" id="form" onsubmit="popup()" action="addcontact.php">  -->
							<form method = "post" action = '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
							
							<div class="table">
								<div class="cell">
									<label for="fname">First Name</label>
									<input type="text" name="fname" id="fname" placeholder="Jane" required/>
								</div>
								<div class="cell">
									<label for="lname">Last Name</label>
									<input type="text" name="lname" id="lname" placeholder="Doe" required/>
								</div>
							</div>
							<div class="table">
								<div class="cell">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" placeholder="janedoe@gmail.com" required/>
								</div>
								<div class="cell">
									<label>Password</label>
									<input type="text" name="userPassword" id="userPassword" required/>
								</div>
							</div>
							<div class="table">
								<div class="cell">
									<label for="role">Type</label><br>
									<select id="role" name="role">
										<option value="Admin">Admin</option>
										<option value="Member">Member</option>
									</select>
								</div>
							</div>

							<div class="save-button">
								<button type="submit" id="save">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
