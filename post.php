<!DOCTYPE html>
<meta charset="utf-8">
<?
if(isset(  $_POST['submit'] ))
								{
									require "init.php";
									
									extract($_POST);
										if($title=="" | $contact=="")
										$message="Please enter valid data";
										else
										{
										$var=time();
										$var2=gmdate("Y-m-d H:i:s", $var);
										$query = "INSERT INTO post (title,description,email,category,contact,time)
										VALUES ('$title', '$description', '$email' , '$category' , '$contact' , '$var2')";
										mysqli_query($con,$query);
										header("LOCATION:index.php#ribbion");
									}
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
						<a href="index.php"><div id="browse" class="menuicon"><span>Home</span>
						<br>Back to home page
						</div></a>
						<a href="browse.php"><div id="post" class="menuicon"><span>Browse</span>
						<br>Classified by category
						</div></a>
						<div class="clear"></div>
					</div>
		</div>
		<form method="post">
		<div id="content">
					<div id="post_container">
							<div class="post">
										Post title:<span style="color:red">*</span><br>
										<input type="text" placeholder="Post's title" name="title" id="title" autocomplete="off" required>
										Description:<br>
										<textarea rows="4" cols="110" placeholder="Description" name="description" id="description" autocomplete="off" maxlength="1000" ></textarea>
										<br>Email id:<br>
										<input type="email" placeholder="Email id" name="email" id ="email" autocomplete="off">
										<br>Contact No:<span style="color:red">*</span><br>
										<input type="text" placeholder="Contact no" name="contact" id="contact" autocomplete="off" maxlength="13" required>
										Category<span style="color:red">*</span>:
										<select name="category" style="font-size:25px" required>
											<option value="" disabled="disabled" selected="selected">Please select a category</option>
											<option value="General">General</option>
											<option value="Electronics">Electronic</option>
											<option value="Stationary">Sationary</option>
											<option value="Personal">Personal</option>
											<option value="Sports">Sports</option>
										</select>
										<div id="required" style="display:block;font-size:20px;width:100%;margin-bottom:10px">
											(<span style="color:red">*</span> required)<br>
										</div>
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
