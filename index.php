<?php
	//include_once('assets\php\insertdatabase.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Binh Bui: Github Repositories Listing</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- PAG CSS -->
	<link href="assets/css/my_style.css" rel="stylesheet">
	
	<!-- Fontawesome -->
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">PHPandGIT</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PHP and GIT App <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li ><a href="show_github_repo_list.php">Show Repo List</a></li>
                <li><a href="retrieve_github_repo.php">Retrieve/Update Repo List</a></li>                
				<li><a href="edit_github_repo_list.php">Edit Repo List </a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Me on social</li>
                <li><a href="https://www.facebook.com/binhsuse">Facebook Link</a></li>
                <li><a href="https://www.linkedin.com/in/binhbuingoc">LinkedIn Link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<!-- Page content -->
	<div class="container">	
      <!-- Using Jumbotron -->
      <div class="jumbotron pag_homepage_slider pag_page_content">
        <h1>PHP And GitHub</h1>
        <p class="lead">
			Pulling the most starred GitHub PHP repositories  <br />			
		</p>		
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4 col-md-4 ">
			<div class="pag_col pag_col_blue">
			  <h2>Retrieve Favorited Github Repos</h2>
			  <p class="">Click on the button below to retrieve the latest current favorited PHP Github Repositories</p>
			  <p> After you click on the button below, the data from Github API will be retrieved and stored in our database. <br />
					<span class="text-danger">Note: If the data exist, it will be updated.</span></p>
			  <p class="pag_col_bt"><a class="btn btn-info btn-lg" href="retrieve_github_repo.php" role="button">Retrieve/Update Repo List </a></p>
			</div>
        </div>
        <div class="col-lg-4 col-md-4">
			<div class=" pag_col pag_col_green pag_col_center">
			  <h2>Show Github Repos List</h2>
			  <p>Click on the button below to see the list of current favorited PHP Github repos on our database</p>
			  <p class="pag_col_bt"><a class="btn btn-success btn-lg" href="show_github_repo_list.php" role="button">Show Repo List </a></p>          
			</div>
       </div>
        <div class="col-lg-4 col-md-4">
			<div class="pag_col pag_col_yellow">
			  <h2>Update Github Repos List</h2>
			  <p>Click on the button below, if you would like to edit and update the Github Repositories Listing your way </p>
			  <p class="pag_col_bt"><a class="btn btn-warning btn-lg" href="edit_github_repo_list.php" role="button">Edit Repo List </a></p>
			</div>
        </div>
      </div>
    </div> <!-- /container -->
	
	<footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; <?php echo date("Y"); ?> Greenk - <a href="mailto:binhsuse@gmail.com"> Mail to: Binh Bui </a></p>
      </div>
    </footer>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- PAG Script -->
	<script src="assets/js/pag_script.js"> </script>
	
  </body>
</html>

