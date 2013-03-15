<!DOCTYPE html>
<meta charset="utf-8">

<html>	
<head>																<!-- head starts here-->
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
		<div id="search">
					<span>Manipal's classified</span>
					<form method="post">
					<input type="text" id="searchbar" name="search" placeholder="Search" autocomplete="off" autofocus>
					<a href="#"><input type="submit" id="searchbutton" value="Go"></a>
					</form>
		</div>
		<div class="clear"></div>
		
		
		
	</div>
	
	
	
	<div id="middle">
		
		
		
		<div id="menu">
					<div id="menu_inner">
						<a href="browse.php"><div id="browse" class="menuicon"><span>Browse</span>
						<br>Classified by category
						</div></a>
						<a href="post.php"><div id="post" class="menuicon"><span>Post</span>
						<br>Classified on page
						</div></a>
						<div class="clear"></div>
					</div>
		</div>
		
						<?php
							require "init.php";
							if(isset($_POST["search"])&&($_POST["search"]!=""))
							{ 
								echo '<div id="content">
					<div id="ribbion">
						<img src="arrowdown.png" style="align:left;border-radius:10px;" width="30px" height="30px"/>
						<span>Scroll down to view search results</span>
					</div>
					<div id="classified_container">';
								$w=-1;$p=0;
								$arq[0]=-12;
								$str=$_POST["search"];
								$str=$str." ";
								$output2="";
								$output="";
								$j=0;
								for($i=0;$i<strlen($str);$i++)
								{
									$k=substr($str,$i,1);
									if($k==" ")
								{
									  $t=$i-$j;
									  $s=substr($str,$j,$t);
									  $j=$i+1;
									 $query="select * from post where title like '%$s%' or description like '%$s%' or category like '%$s%' order by time desc";
									 $results=mysqli_query($con,$query);

									if(mysqli_num_rows($results)>=1)
									{
										while($row=mysqli_fetch_array($results))
										{

											$id=$row['post_id'];
											$output.="TITLE:".$row['title']."<br />";
											$output.="DESCRIPTION:".$row['description']."<br />";
											$output.="CATEGORY:".$row['category']."<br />";
											$output.="CONTACT INFO:".$row['contact']."<br />";
											$unix=strtotime($row['time']."GMT");
											$tim=date("jS \of F Y",$unix);
											$output.="POSTED AT:".$tim." at ".date('H:i:s', $unix)."<br />";
											for($e=0;$e<=$w;$e++)
											{
											  if($arq[$e]==$id)
											   {$p=1;break;
												}
											}
														
											if($p!=1)
											{
												$output2.=$output;
												echo '<a href="listing.php?id='.$row['post_id'].'"><div class="classified">'.$row['title'].'<p>
												<u>posted on</u>:'.$tim.' at '.date('H:i:s', $unix).'&nbsp<u>under</u>:'.$row['category'].'</p>
												</div></a>';
											}
											$pos=0;
											$arq[++$w]=$id;
											$output="";
										}// close of while;
										
									}//close of inner if
								}//close of outer if 
							}//close of for
							if($output2=="")
							{	echo '<div style="text-align:center;padding:1px;font-size:30px"><img src="error.png" text-align="right" width="31px" height="31px">&nbspNo match found<br><span style="color:#757575;font-size:25px">Recently posted classifieds:</span></div>';
								$res=mysqli_query($con,"select * from post order by time desc limit 50")
								or die(mysqli_error($con));
								date_default_timezone_set('Asia/Kolkata');
								while ($row=mysqli_fetch_array($res))
								{
									$unix=strtotime($row['time']."GMT");
									$tim=date("jS \of F Y",$unix);
									echo '<a href="listing.php?id='.$row['post_id'].'"><div class="classified">'.$row['title'].'<p>
										<u>posted on</u>:'.$tim.' at '.date('H:i:s', $unix).'&nbsp<u>under</u>:'.$row['category'].'</p>
										</div></a>';
								}
							}
							
						}
							else
							{	
								echo '
								<div id="content">
					<div id="ribbion">
						<img src="arrowdown.png" style="align:left;border-radius:10px;" width="30px" height="30px"/>
						<span>Scroll down to view classifieds</span>
					</div>
					<div id="classified_container">';
								$res=mysqli_query($con,"select * from post order by time desc")
								or die(mysqli_error($con));
								
								while ($row=mysqli_fetch_array($res))
								{
									$unix=strtotime($row['time']."GMT");
									$tim=date("jS \of F Y",$unix);
									echo '<a href="listing.php?id='.$row['post_id'].'"><div class="classified">'.$row['title'].'<p>
										<u>posted on</u>:'.$tim.' at '.date('H:i:s', $unix).'&nbsp<u>under</u>:'.$row['category'].'</p>
										</div></a>';
								}
							}
						?>
					</div>
					<div class="clear"></div>
		</div>
		
		<div id="footer">
		&copy Lug Labs 2013 
	
	
	
	</div>
		
	</div>
	



</body>
</html>
