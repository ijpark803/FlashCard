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
	$mysqli->set_charset('utf8');

	$sql_difficulty = "SELECT * FROM difficulties;";
	$results_difficulty = $mysqli->query($sql_difficulty);
	if(!$sql_difficulty){
		echo $mysqli->error;
		exit();
	}

	$sql_language = "SELECT * FROM languages;";
	$results_language = $mysqli->query($sql_language);
	if(!$sql_language){
		echo $mysqli->error;
		exit();
	}

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyYellow</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
	.title{
		position: absolute;
		top: 190px;
	}
	.input{
		position: relative;
		/* float: left; */
		left: 40px;
		top: 370px;
		box-sizing: border-box;
		width: 60%;
	}
	.input_bars{
		position: relative;
		left: 40px;
		top:370px;
		box-sizing: border-box;
		width: 60%;
	}

	.searchedw{
		position: relative;
		left: 500px;
		top: 65px;
		font-size: 30px;
		/* display: none; */
	}
	.searchedd{
		position: relative;

		top: 360px;
		font-size: 30px;
	}
	.submitted{
		position: relative;
		left: 30px;
		top: 400px;
	}

	




</style>
</head>
<body>
		<?php include 'nav.php'; ?>

	<div class="container-fluid pContainer">
		<div class="row">
			<div class="col-sm left" >
				<form action="" method="GET" id="search_form">
					<div class="input-group input-group-sm mb-3 input">
						<span class="input-group-text search-id" id="inputGroup-sizing-sm">Search</span>
						<input type="text" name="search_word" id="search-id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					</div>
				</form>

				<form action="add_confirmation.php" method="POST">
					<div class="input-group input-group-sm mb-3 input">
						<span class="input-group-text search-id" id="inputGroup-sizing-sm">Word</span>
						<input type="text" name="search_word" id="search-id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					</div>

					<div class="input-group input-group-sm mb-3 input">
						<span class="input-group-text search-id" id="inputGroup-sizing-sm">Definition</span>
						<input type="text" name="definition" id="search-id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					</div>
					<div class="input-group input-group-sm mb-3 input">
						<span class="form-control" id="inputGroup-sizing-sm">Difficulty</span>
						<select name="difficulty_id" id="sound-id" class="form-control">
						<option value="" selected disabled>-- Select One --</option>

						<?php while ($row = $results_difficulty -> fetch_assoc() ):?>
							<option value="<?php echo $row['id'];?>">
								<?php echo $row['difficulty']; ?>
							</option>
						<?php endwhile; ?>

						</select>
					</div>
					<div class="input-group input-group-sm mb-3 input">
						<span class="form-control" id="inputGroup-sizing-sm">Language</span>
						<select name="language_id" id="language-id" class="form-control">
						<option value="" selected disabled>-- Select One --</option>

						<?php while ($row = $results_language -> fetch_assoc() ):?>
							<option value="<?php echo $row['id'];?>">
								<?php echo $row['language']; ?>
							</option>
						<?php endwhile; ?>

						</select>
					</div>
					<div class="col-sm-9 mt-2">
						<button type="submit_button" class="btn btn-primary submitted">Submit</button>
					</div>
				</form>

				<div class="title">
					<h1>
						StudY
					</h1>
					<h1>
						YELLOW<br>
						Search & Add:
					</h1>

				</div>
				<div class="searchedw" id="searched_word">
					<p>word</p>
				</div>

				
			</div>
			<div class = "col-sm right">			
				<div class="searchedd" id = "searched_def">
					<p>definition</p>
				</div>
			</div>
		</div>
	</div>
<script src="main.js"></script>

</body>
</html>