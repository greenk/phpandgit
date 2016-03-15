
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
            <li><a href="index.php">Home</a></li>
            <li class="active" ><a href="about.php">About</a></li>            
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
        <h1>Welcome to Binh Bui's Blog</h1>
        <p class="lead">
			Crafting web application is my favorite thing to do. <br />
			Thank you for using my app.
		</p>		
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-12">
			Follow me on:
			<ul class="list-inline pag_follow_me">
				<li> <a href="https://www.facebook.com/binhsuse" target="_blank"> <i class="fa fa-facebook-official"></i> </a> </li>
				<li> <a href="https://www.linkedin.com/in/binhbuingoc" target="_blank"> <i class="fa fa-linkedin-square"></i> </a> </li>
				<li> <a href="https://twitter.com/binhbn" target="_blank"> <i class="fa fa-twitter-square"></i> </a> </li>
				<li> <a href="mailto: binhsuse@gmail.com" target="_blank"> <i class="fa fa-envelope"></i> </a> </li>
			</ul>
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

