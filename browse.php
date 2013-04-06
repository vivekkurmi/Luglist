<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>																	<!-- head starts here-->
	<title>LugList</title>
	<link href="style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
	<!--pagenation script starts here-->
	<script type="text/javascript">
	$(function() 
	{
		$('.more').live("click",function() 
		{
			var $_POST = <?php echo json_encode($_POST); ?>;
			var CAT=$_POST["category"];
			var ID = $(this).attr("id");
			if(ID>1)
			{
				$("#more"+ID).html('<img src="moreajax.gif" />');

				$.ajax({
				type: "POST",
				url: "ajax_more_browse.php",
				data:"lastmsg="+ ID+"&category="+CAT,
				cache: false,
				success: function(html){
				$("ol#updates").append(html);
				$("#more"+ID).remove();// removing old more button
				},
				});
			}
			else
			{
			$("#more"+ID).remove();// no results
			}

			return false;
		});
	});
	</script>
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
				
			</div>
					<div id="post_container">
										<ol class="timeline" id="updates">
								<?php
									require "init.php";
									if (isset($_POST['category']))
									{
										$var=$_POST['category'];
										$res=mysqli_query($con,"select * from post where category like'".$var."' order by time desc limit 2")
										or die(mysqli_error($con));
										
										while ($row=mysqli_fetch_array($res))
										{
											$msg_id=$row['post_id'];
											$unix=strtotime($row['time']."GMT");
											$tim=date("jS \of F Y",$unix);
											echo '<a href="listing.php?id='.$row['post_id'].'"><div class="post">'.$row['title'].'<p>
												<u>posted on</u>:'.$tim.' at '.date('H:i:s', $unix).'&nbsp<u>under</u>:'.$row['category'].'</p>
												</div></a>';
										}
								echo '</ol>';
								?>
								<!--the paganation box code-->
								<div id="more<?php echo $msg_id; ?>" class="morebox">
								<a href="#" id="<?php echo $msg_id; ?>" class="more">more</a>
								</div>
								<?php

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
