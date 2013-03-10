<!DOCTYPE html>
<meta charset="utf-8">
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
						<a href="post.php"><div id="post" class="menuicon"><span>Post</span>
						<br>Classified on page
						</div></a>
						<div class="clear"></div>
					</div>
		</div>
		<div id="content">
			<div id="ribbion">
				
			</div>
					<div id="post_container">
										<div style="text-align:center;margin-bottom:10px">
										<form method="post">
										<select name="category" style="font-size:32px" type="submit">
											<option value="" disabled="disabled" selected="selected">Please select a category</option>
											<option value="General">General</option>
											<option value="Electronics">Electronic</option>
											<option value="Stationary">Sationary</option>
											<option value="Personal">Personal</option>
											<option value="Sports">Sports</option>
										</select>
										<input type="submit"  style="font-size:32px;width:100px" value="Get it" name="submit" id="submit">
										</form>
										</div>
								<?php
									require "init.php";
									if (isset($_POST['category']))
									{
										$var=$_POST['category'];
										$res=mysqli_query($con,"select * from post where category like'".$var."' order by time desc")
										or die(mysqli_error($con));
										
										while ($row=mysqli_fetch_array($res))
										{
											$unix=strtotime($row['time']."GMT");
											$tim=date("jS \of F Y",$unix);
											echo '<a href="listing.php?id='.$row['post_id'].'"><div class="post">'.$row['title'].'<p>
												<u>posted on</u>:'.$tim.' at '.date('H:i:s', $unix).'&nbsp<u>under</u>:'.$row['category'].'</p>
												</div></a>';
										}
								
									}
								?>
					<div class="clear"></div>
					</div>
		<div id="footer">
		&#169 Lug Labs 2013 
	
	
	
	</div>
		
	</div>
	



</body>
</html>
