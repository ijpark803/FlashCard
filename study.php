<?php

	$host = "303.itpwebdev.com";
	$user = "ijpark_db_song";
	$password = "itp303irenepark";
	$db = "ijpark_dictionary_db";
	$mysqli = new mysqli($host, $user, $password, $db); 

	if($mysqli ->connect_errno){
		// display the error message in plain english
		echo $mysqli->connect_error;
		//terminates the program. php stops running after this statement and does not run any subsequent code.
		exit();
	}
	$mysqli->set_charset('utf-8');

	$sql = "SELECT * FROM words";

	$results = $mysqli->query($sql);
	if(!$results) {
		echo $mysqli->error;
		exit();
	}
	// var_dump($results);
	$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyYellow</title>
	<link rel="stylesheet" href="style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
	<style>
	html, body{
		background-color: white;
		font-family: 'Fredoka One';

	}
	.left{
		background-color: white;
		color:white;
	}
	.right{
		/* background-color: white; */
		color:black;
		/* width:100%;
		height:100%; */
	}
	.title{
		color: #EBE698 ;
	}
	.row{
		height: 100%;
	}
	.word{
		font-size:40px;
		/* background-color: red; */
		width: auto;

	}
	p {
		position: relative;
		right: 90px;
		color: white;
		font-size: 40px;
		width: auto;
	}
	p:hover{
         color:black;
	} 
	.notice{
		position: relative;
		left: 150px;
	}
	/* .clicked{
		width: auto;
		float:right;
		font-size: 11px;
	} */
	.returned{
		padding: 15px;
	}
	.blank{
		padding: 10px;
	}

</style>
</head>
<body>
    <?php include 'nav.php'; ?>
	<div class="container-fluid pContainer">
		<div class="row">
			<div class="col-sm left" >
				<div class="title">
					<h1>
						StudY
					</h1>
					<h1>
						YELLOW
					</h1>
				</div>
			</div>
			<div class = "col-sm right">
				<div class = "container">
					<div class = "row notice">
						Click to view the definition <br>
						<?php echo "You have " . $results->num_rows . " saved word(s)"; ?>

					</div>
					<?php while($row = $results->fetch_assoc()): ?>
						<div class="row returned">
							<!-- <tr>
							<td> -->
								<a onclick="return confirm('You are about to delete the word <?php echo $row['word'] ?>. ');" href="delete.php?id=<?php echo $row['id']; ?>&word=<?php echo $row['word']?>" class="btn btn-danger delete-btn">
									Done with Studying?  
								</a>
								<div class="blank"> </div>
								<a href = "details.php?id=<?php echo $row['id']; ?>" ">
									<?php echo $row['word']; ?>


						</div>
					<?php endwhile;?>
				</div>
			
			</div>
		</div>
	</div>
	<!-- <script src="main.js"></script> -->

</body>
</html>