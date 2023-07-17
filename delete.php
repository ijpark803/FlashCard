<?php
// var_dump($_GET);
	$isUpdated = false;
	if( !isset($_GET["id"]) || empty($_GET["id"])) {
		$error = "Invalid word.";
	}
	else{
		$host = "303.itpwebdev.com";
		$user = "ijpark_db_song";
		$password = "itp303irenepark";
		$db = "ijpark_dictionary_db";

		$mysqli = new mysqli($host, $user, $password, $db);
		if($mysqli -> connect_errno){
			echo $mysqli -> connect_error;
			exit();
		}

		$mysqli -> set_charset('utf8');

		$statement = $mysqli -> prepare("DELETE from words
		WHERE words.id = ?");

		$statement -> bind_param("i", $_GET["id"]);
		$executed = $statement -> execute();
		if(!$executed){
			echo $mysqli -> error;
		}

		// echo "<hr>" . $statement -> affected_rows;

		if($statement -> affected_rows == 1){
			$isUpdated = true;
		}
		// close the prepared statement 
		$statement -> close();

		$mysqli->close();
	}

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
		background-color: #EBE698;
		font-family: 'Fredoka One';

	}
	.right{
		background-color: white;
		/* color:black;
		font-size: 50px;
		position: relative;
		top: 250px; */
		/* width:100%;
		height:100%; */
	}
	.row{
		height: 100%;
	}
	.searchedw{
		position: relative;
		left: 500px;
		top: 250px;
		font-size: 50px;
	}
	.searchedd{
		position: relative;

		top: 360px;
		font-size: 50px;
	}
	.back{
		position: relative;
		top: 350px;
		left: 40px;
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
				<div class="col">
				<a href="study.php" role="button" class="btn btn-primary back">Back to Studying!</a>
			</div> <!-- .col -->
			</div>
			<div class = "col-sm right">
			<?php if ( isset($error) && !empty($error) ) : ?>
				<div class="text-danger">
					<?php echo $error; ?>
				</div>
			<?php endif; ?>

			<?php if ($isUpdated) : ?>
				<div class="text-success">
					<span class="font-italic"><?php echo $_GET['word']; ?></span> was successfully deleted.
				</div>
			<?php endif; ?>

			
			</div>
		</div>
	</div>
	<!-- <script src="main.js"></script> -->

</body>
</html>