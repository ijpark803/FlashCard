<?php
    // var_dump($_GET['id']);
	if( !isset($_GET["id"]) || empty($_GET["id"])) {
		$error = "Invalid Word.";
	}
	else{

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

        $sql = " SELECT * FROM words WHERE id =" . $_GET['id'] . ";";
        $results = $mysqli->query($sql);
	    if(!$results) {
            echo $mysqli->error;
            exit();
	    }

        $row = $results -> fetch_assoc();

	$mysqli->close();
    
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
		top: 360px;
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
		top: 360px;
		font-size: 30px;
		/* display: none; */
	}
	.searchedd{
		position: relative;

		top: 320px;
        font-size: 30px;
        color: white;
	}
	.submitted{
		position: relative;
		left: 30px;
		top: 400px;
    }
    .hovered{
        position: relative;
        top: 340px;
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
				<div class="searchedw" id="searched_word">
					<p><?php echo $row['word']?></p>
				</div>

				
			</div>
			<div class = "col-sm right">
                <div class="hovered">
                <p>hover to see definition </p>
                </div>
				<div class="searchedd" id = "searched_def">
                    <p> <?php echo $row['defined']?></p>
				</div>

                <form action="edit_confirmation.php" method="POST">
					<div class="input-group input-group-sm mb-3 input">
						<span class="input-group-text search-id" id="inputGroup-sizing-sm">Edit Definition</span>
						<input type="text" name="search_word" id="search-id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					</div>

                    <div class="col-sm-9 mt-2">
                            <button type="submit_button" class="btn btn-primary submitted">Submit</button>
                    </div>

                    <input type = "hidden" name="word_id" value = "<?php echo $_GET["id"] ?>">
                </form>

			</div>
		</div>
	</div>
<!-- <script src="main.js"></script> -->
<script>
    let test = document.getElementById("searched_def");

	test.addEventListener("mouseover", function( event ) {

      event.target.style.color = "#EBE698";
    
      setTimeout(function() {
    event.target.style.color = "white";
  }, 700);
}, false);
</script>
</body>
</html>