<?php
	
	$pager = 0;
	if (isset($_GET['page']))
		$pager = intval($_GET['page']) + 1;	
	
	require_once('assets/php/readdatabase.php');
		
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
	
	<!-- Fontawesome -->
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- PAG CSS -->
	<link href="assets/css/my_style.css" rel="stylesheet">
	
	

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
            <li ><a href="index.php">Home</a></li>
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
		
		<h1 class="pag_page_content" > List Of The Most Starred Public PHP Projects </h1>
		
		<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li><a href="#">PHP and Git App</a></li>
		  <li class="active">Show Repo List</li>
		</ol>
		
		<?php if ($message_flag!=1)  
		{
			echo "<div class='jumbotron alert-danger'>";
			echo " <h1> <i class=\"fa fa-ban\"></i>  $message_short_log !!!! </h1>";
			echo " <p> $message_log</p> ";
			echo '<p> <a class="btn btn-info btn-lg" href="index.php" role="button"> Go back to homepage</a> </p>';
			echo '</div>';
		}
		?>
		
		
		<ul class="list-unstyled pag_list">
			<li class="pag_list_header">
				<div class="row">
					<div class="col-xs-2"> # ID </div>
					<div class="col-xs-6"> Repository Name </div>
					<div class="col-xs-2"> Number of Star </div>
					<div class="col-xs-2"> Detail </div>
				</div>
			</li>
			<?php 
			if ($message_flag==1) {
			while ($row = $sth->fetch()) {?>
			<li class="pag_list_item">
				<div class="row pag_list_item_title">
					<div class="col-xs-2"> <?php echo $row['git_id']; ?> </div>
					<div class="col-xs-6 pag_list_item_title_col2"> <span><img class="pag_list_item_title_img" src="<?php echo pag_decode_data($row['img_url']); ?>" /></span> <?php echo pag_decode_data($row['git_name']); ?> </div>
					<div class="col-xs-2"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <?php echo $row['stargazers_count']; ?> </div>
					<div class="col-xs-2"> <button type="button" class="btn btn-info" onclick="pag_js_toggle(this)" >More...</button> </div>
				</div>
				
				<div class="row pag_list_item_detail">
					<div class="media">
						<a class="media-left pag_media_left_add_padding" href="<?php echo pag_decode_data($row['homepage']); ?>">
							<img style="width: 100px;" class="media-object img-rounded" src="<?php echo pag_decode_data($row['img_url']); ?>" alt="Project Logo">
						</a>
						
						<div class="media-body">
							<h2 class="media-heading display-4"> <?php echo pag_decode_data($row['full_name']); ?> </h2>														
							<h5> URL: <a href="<?php echo pag_decode_data($row['url']); ?>"> <?php echo pag_decode_data($row['url']); ?> </a> </h5>
							<p class="text-muted"> Last Pushed: <?php echo date('Y-m-d\TH:i:s\Z', strtotime($row['last_push_date'])); ?> - Created Date: <?php echo date('Y-m-d\TH:i:s\Z',strtotime($row['create_date'])); ?> </p>
							<?php echo pag_decode_data($row['description']); ?>
						</div>
					
					</div>
				</div>
			</li>
			<?php } // We release cursor memory and then close connection
					// mysql_free_result($retval);					
					// mysql_close($conn);
					$dbh = null;
				} // Close of if message_flag == 1
			?>			
		</ul>
		
		<hr />
		<!-- Paginator -->
		<div class="row text-center">
			<ul class="pagination pagination-lg">
			  <li <?php if ($pager < 20) echo 'class="active"'; ?>><a href="show_github_repo_list.php" >1</a></li>
			  <li <?php if ($pager < 40 && $pager >20) echo 'class="active"';?>><a href="show_github_repo_list.php?page=20" >2</a></li>
			  <li <?php if ($pager < 60 && $pager >40) echo 'class="active"';?>><a href="show_github_repo_list.php?page=40" >3</a></li>
			  <li <?php if ($pager < 80 && $pager >60) echo 'class="active"';?>><a href="show_github_repo_list.php?page=60" >4</a></li>
			  <li <?php if ($pager < 100 && $pager >80) echo 'class="active"';?>><a href="show_github_repo_list.php?page=80" >5</a></li>
			</ul>		
		</div>
    </div> <!-- /container -->
	
	<a href="#" class="back_to_top" style="display: inline;"> 
		<i class="fa fa-arrow-circle-up"></i>
			Go to top
	</a>
	
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


