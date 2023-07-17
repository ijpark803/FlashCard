<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyYellow</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
	<style>
	html, body{
		/* width: 100%;
		height: 100%;
		margin:0;
		padding:0; */
		font-family: 'Fredoka One';
	}
	.title{
		font-family: 'Fredoka One';
		font-size: 5000px;
		color: white;
		fond-weight: bold;
		position:relative;
		left: 50px;
		top: 350px;
	}
	.search{
		/* float: left; */
		position: relative;
		left: 50px;
		top: 360px;
	}
	.study{
		position: relative;
		float: right;
		right: 50px;
		top: 400px;
		/* left: 50px; */
	}
	.row{
		height: 100%;
	}
	.search {
		padding: 15px 25px;
		font-size: 20px;
		text-align: center;
		cursor: pointer;

		color: #fff;
		background-color: red;
		border: none;
		border-radius: 14px;
		box-shadow: 0 8px #999;
	}

	.search:hover {
		background-color: #3e8e41
	}

	.search:active {
		background-color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(5px);
	}

	.study {
		padding: 15px 25px;
		font-size: 20px;
		text-align: center;
		cursor: pointer;

		color: #fff;
		background-color: red;
		border: none;
		border-radius: 14px;
		box-shadow: 0 8px #999;
	}

	.study:hover {
		background-color: #3e8e41
	}

	.study:active {
		background-color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(5px);
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
				<!-- <form id="form" class="search">
					<input type="text" id="item" placeholder="Search for Words">
				</form> -->
				<a href="search.php" class="btn btn-dark btn-lg search" role="button">Search</a>

				<!-- add the php file as an a tag here-->
			</div>
			<div class = "col-sm right">
				<a href = "study.php" class="btn btn-dark btn-lg study" role="button">Study</a>

						<!-- add the php file as an a tag here-->
			</div>
		</div>
	</div>
	<!-- <script src="main.js"></script> -->
</body>
</html>