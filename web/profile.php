<?php include_once('backend/profile.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Finance Tracker Dashboard</title>
	
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
		
  <link rel="stylesheet" href="backend/css/pages/dashboard.css">
	<link 
		rel="stylesheet" type="text/css" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>
	<div class="frame">
		<header class="navigation-area">
			<h3 class="app-name">Apollo Probe</h3>
			<h1 class="heading">Dashboard</h1>

			
		</header>

		<main class="main">
				

				<form class="forma" action="" method="post">
					<center><span class="display"><?php echo $msg ?> </span></center><br>
		<div class="form__field">
			<i class="fa fa-user icon"></i>
			<input type="text" name="fullname" value="<?php echo $name ?>">
		</div>
	
		<div class="form__field">
			<i class="fa fa-envelope icon"></i>
			<input type="text" name="email" value="<?php echo $email ?>">
		</div>
	
		<div>
				<center><input type="submit" name="submit" value="Update" class="button">
<br>
<a href="./dashboard.html" style="text-decoration: none;color: white;margin: 16px">Go Back</a>
				</center>
		</div>
	</form>


			<hr class="vertical-divider">

			<p class="comment">
				<i class="comment__emoji">&#128515;</i><!--happy => &#128515;-->
				<span> -- Profile Details --</span><br>
                <b>Full Name: </b><?php echo $name; ?>
                <b>Email: </b><?php echo $email; ?>
			</p>
		</main>
		<div class="center__button"></div>
	</div>
</body>
</html>