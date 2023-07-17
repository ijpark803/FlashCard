
<?php 
	$host = "303.itpwebdev.com";
	$user = "ijpark_db_song";
	$password = "itp303irenepark";
	$db = "ijpark_dictionary_db";

	$isUpdated = false;

	// var_dump($_POST);

	if ( !isset($_POST['search_word']) || empty($_POST['search_word']) ) {

		$error = "Please fill out all required fields.";
	}
	else if ( !isset($_POST['definition']) || empty($_POST['definition']) ) {

		$error = "Please fill out all required fields.";
	}
	else if ( !isset($_POST['difficulty_id']) || empty($_POST['difficulty_id']) ) {

		$error = "Please fill out all required fields.";
	}
	else if ( !isset($_POST['language_id']) || empty($_POST['language_id']) ) {

		$error = "Please fill out all required fields.";
	}
	else{
		$mysqli = new mysqli($host, $user, $password, $db); 
		if($mysqli ->connect_errno){
			// display the error message in plain english
			echo $mysqli->connect_error;
			//terminates the program. php stops running after this statement and does not run any subsequent code.
			exit();
		}
		$mysqli->set_charset('utf8');

		$statement = $mysqli ->prepare("INSERT INTO words(word, defined, difficulties_id, languages_id) 
		VALUES (?, ?, ?, ?)");

		$statement->bind_param("ssii", $_POST["search_word"], $_POST["definition"], $_POST["difficulty_id"], $_POST["language_id"]);

		$executed = $statement->execute();
		if(!$executed){
			echo $mysqli -> error;
		}
		// echo "<hr>" . $statement -> affected_rows;

		if($statement -> affected_rows == 1){
			$isUpdated = true;
		}

		$statement -> close();
		$mysqli -> close();
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
				<a href="search.php" role="button" class="btn btn-primary back">Back to Add Form</a>
			</div> <!-- .col -->
			</div>
			<div class = "col-sm right">
			<?php if ( isset($error) && !empty($error) ) : ?>
				<div class="text-danger font-italic">
					<?php echo $error; ?>
				</div>
			<?php endif; ?>
			<?php if ($isUpdated) : ?>
			<div class="text-success">
				<span class="font-italic"><?php echo $_POST['search_word']; ?></span> was successfully added.
			</div>
			<?php endif; ?>

			
			</div>
		</div>
	</div>
	<!-- <script src="main.js"></script> -->

</body>
</html>