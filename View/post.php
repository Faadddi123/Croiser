<?php include 'View/head.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="View/assets/img/favicon.ico">
<title>Mediumish - A Medium style template by WowThemes.net</title>
<!-- Bootstrap core CSS -->
<link href="View/assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Fonts -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="View/assets/css/mediumish.css" rel="stylesheet">

</head>
<body>



<!-- Begin Article
================================================== -->
<div class="container">
	<div class="row">

		<!-- Begin Fixed Left Share -->
		<div class="col-md-2 col-xs-12">
		
		</div>
		<!-- End Fixed Left Share -->

		<!-- Begin Post -->
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="mainheading">

			
				<!-- End Top Menta -->

				<h1 class="posttitle"><?php echo $wikis[0]->getTitle(); ?></h1>

			</div>

			<!-- Begin Featured Image -->
			<img class="featured-image img-fluid" src="View/image_uploaded/<?php echo $wikis[0]->getimage(); ?>" alt="">
			<!-- End Featured Image -->

			<!-- Begin Post Content -->
			<div class="article-post">
				<?php echo $wikis[0]->getContent(); ?>
			</div>
			<!-- End Post Content -->



		</div>
		<!-- End Post -->

	</div>
</div>
<!-- End Article
================================================== -->

<div class="hideshare"></div>

<!-- Begin Related
================================================== -->
<div class="graybg">
	<div class="container">
		<div class="row listrecent listrelated">

			
			<!-- end post -->

		</div>
	</div>
</div>
<!-- End Related Posts
================================================== -->







<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
