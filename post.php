<!DOCTYPE html>
<meta charset="utf-8">
<?php
	if(isset(  $_POST['submit'] ))
	{
		require "init.php";
		
		extract($_POST);			
			$query = "INSERT INTO post (title,description,email,phone)
			VALUES ('$title', '$description','$email','$phone')";
			mysqli_query($con,$query);
			header("LOCATION:index.html#ribbion");
	}
?>
<html>
<head>																	<!-- head starts here-->
	<title>LugList</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>


<body>
	<div id="top">	
	
	
													<!--Container for logo and seacrh bar-->
		<div id="head">
					<div id="logo">
						LugList
					</div>
			<div class="clear"></div>
		</div>
	
	</div>
	<div id="post_middle">
		
		
		
		<div id="menu">
					<div id="menu_inner">
						<a href="index.html"><div id="browse" class="menuicon"><span>Home</span>
						<br>Back to home page
						</div></a>
						<a href="#"><div id="post" class="menuicon"><span>Browse</span>
						<br>Classified by category
						</div></a>
						<div class="clear"></div>
					</div>
		</div>
		<form method="post">
		<div id="content">
					<div id="post_container">
						<div class="post">
							Post title:<br>
							<input type="text" placeholder="Post's title" name="title" id="title" autocomplete="off" >
							<br>Description:<br>
							<textarea rows="4" cols="110" placeholder="Description" name="description" id="description" autocomplete="off" maxlength="1000" ></textarea>
							<br>Email id:<br>
							<input type="text" placeholder="Email id" name="email" id ="email" autocomplete="off">
							<br>Phone No:<br>
							<input type="text" placeholder="phone no" name="phone" id="phone" autocomplete="off">
							<input type="submit" value="Post" name="submit" id="submit">
						</div>
						<div class="clear"></div>
					
		</div>
		</form>
		<div id="footer">
		&#169 Lug Labs 2013 
	
	
	
	</div>
		
	</div>
	



</body>
</html>