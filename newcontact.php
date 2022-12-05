<?php session_start();
	require_once("contact_class.php");
	// require_once("payment_class.php");

	if (isset($_POST['title']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['company']) && isset($_POST['type']) && isset($_POST['assigned-to'])){
		$title = $_POST['title'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$telephone = $_POST['telephone'];
		$company = $_POST['company'];
		$type = $_POST['type'];
		$assigned_to = $_POST['assigned-to'];

		$contact = new Contact($title, $fname, $lname, $email, $telephone, $company, $type, $assigned_to);
		$contact->addContact();
		$contactID = $contact->get_contactID();
		if ($contactID == -1){
			echo"Contact ID not found";
		}
		// else{
		// 	$payment = new Payment($customer->get_customerID(),0,0);
		// 	$payment->addPayment();
		// }
		

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
					<h1>New Contact</h1>
					<div class="record2">
						<!-- <form method="post" id="form" onsubmit="popup()" action="addcontact.php">  -->
							<form method = "post" action = '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
							<div class="cell">	
								<label for="title">Title</label><br>
								<select id="title" name="title">
									<option value="Mr.">Mr</option>
									<option value="Mrs.">Mrs</option>
									<option value="Ms.">Ms</option>
									<option value="Dr.">Dr</option>
									<option value="Prof.">Prof</option>
								</select>
							</div>
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
									<label>Telephone</label>
									<input type="text" name="telephone" id="telephone" placeholder="8763019764" required/>
								</div>
							</div>
							<div class="table">
								<div class="cell">
									<label>Company</label>
									<input type="text" name="company" id="company" placeholder="The Paper Company" required/>
								</div>
								<div class="cell">
									<label for="type">Type</label><br>
									<select id="type" name="type">
										<option value="Sales Lead">Sales lead</option>
										<option value="Support">Support</option>
									</select>
								</div>
							</div>

							<div class="cell">
								<label for="assigned-to">Assigned To</label><br>
								<select id="assigned-to" name="assigned-to">
									<option value="1">Jusayne Chambers</option>
								</select>
							</div><br>
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
