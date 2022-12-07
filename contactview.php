
<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dolphin_crm';

    
    
    $link = mysqli_connect($host, $username, $password, $dbname);
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    else{
            
            $contactviewid = $_GET['contactviewid'];
            $sql_check = "SELECT * FROM contacts WHERE id='$contactviewid'";
            $contactinfo = mysqli_fetch_assoc(mysqli_query($link,$sql_check));

            $contactid = $contactinfo['id'];
            $title = $contactinfo['title'];
            $fname = $contactinfo['firstname'];
            $lname = $contactinfo['lastname'];
            $email = $contactinfo['email'];
            $telephone = $contactinfo['telephone'];
            $company = $contactinfo['company'];
            $assignedto = $contactinfo['assigned_to'];
            $date = date_create(substr($contactinfo['created_at'], 0, 10));
            $created_at=date_format($date, "F j, Y");
            $date1 = date_create(substr($contactinfo['updated_at'], 0, 10));
            $updated_at=date_format($date1, "F j, Y");

            $viewnotes = "SELECT * FROM notes Where contact_id='$contactid'";
	        $vnotes = mysqli_query($link,$viewnotes);

            $sql = "SELECT * FROM users WHERE id='$assignedto'";
            $userinfo = mysqli_fetch_assoc(mysqli_query($link,$sql));
            $firstname=$userinfo['firstname'];
            $lastname=$userinfo['lastname'];

            


            if (isset($_POST['newnotes'])) {
                $newnotes = $_POST['newnotes'];
                $sql_notes_check = "SELECT id FROM notes WHERE contact_id = '$contactviewid'";
                $result = mysqli_query($link, $sql_notes_check);
                if ($result->num_rows == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $sql_notes_check = "INSERT INTO notes (contact_id, comment) VALUES ('$contactid','$newnotes')";

                    if (mysqli_query($link, $sql_notes_check)) {
                        echo "<h4>Note added successfully</h4>";
                    } else {
                        echo "Error adding note: " . mysqli_error($conn);
                    }
                }
                else{
                    $sqlnote = "INSERT INTO notes (contact_id, comment) VALUES ('$contactid','$newnotes')";
                    if(mysqli_query($link, $sqlnote)){
                        echo "<h4>Note was added successfully.</h4>";
                    } else{
                        echo "ERROR: Could not able to execute $sqlnote. " . mysqli_error($link);
                    }
                }
            }
                

    } 
?>



<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  	<link rel="stylesheet" href="contactview.css">
		</head>
	<body>
		<?php include 'header.php';?>
		<div class="container">
			<div class="back">
				<div class="buttons">
					<div><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
					<div><a href="newcontact.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>New Contact</a></div>
					<div><a href="users.php"><i class="fa fa-users" aria-hidden="true"></i>Users</a></div>
					<hr>
					<div><a href="home.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></div>
				</div>
			</div>	
			<div class="background">
                <div class="records">
                    <div class="top">
                        <div class = "userprofile">
                            <img src="avatar.jpg" alt="Avatar">
                            <h2><?=$title?> <?=$fname?> <?=$lname?></h2>
                            <p class="dates">Created on <?=$created_at?></p>
                            <p class="dates">Updated on <?=$updated_at?></p>
                        </div>
                        <div class = "buttons1">
                            <button type="submit" id="assign">Assign To Me</button>
                            <button type="submit" id="switch">Switch to Sales Lead</button>
                        </div>
                    </div>


                    <div class = "contactInfo">
                        <div class="email">
                            <p>Email</p>
                            <p><?=$email?></p>
                        </div>
                        <div class="telephone">
                            <p>Telephone</p>
                            <p><?=$telephone?></p>
                        </div>
                        <div class="company">
                            <p>Company</p>
                            <p><?=$company?></p>
                        </div>
                        <div class="assignedto">
                            <p>Assigned To</p>
                            <p><?=$firstname?> <?=$lastname?></p>
                        </div>
                       
                    </div>

                    <div class="notes">
                        <div class ="heading">
                            <p>Notes</p>
                        </div>

                        <div class="allnotes">
                            <?php foreach ($vnotes as $contactnote): ?>
                                <p users_name><?=$firstname?> <?=$lastname?></p>
                                <p><?= $contactnote['comment']; ?></p>
                                <?php 
                                    $notedate = date_create(substr($contactnote['created_at'], 0, 20));
                                    $date_note_created = date_format($notedate, "F j, Y  g:ia");
                                ?>
                                <p><?= $date_note_created ?></p><br>
                            <?php endforeach; ?>
                        </div>

                        <div class="addnotes">
                            <p>Add a note about <?=$fname?> </p>
                            <div class="details">
                                <form method="POST" action = "contactview.php?contactviewid=<?= $contactviewid; ?>">
									<input type="text" name="newnotes" id="newnotes" placeholder="Enter details here" required/>
                                    <div class="save-button">
								        <button type="submit" id="save">Add Note</button>
							        </div>
            
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>	
			</div>		
		</div>
	</body>
</html>