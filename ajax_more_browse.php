<?php
require "init.php";
if(isset($_POST['lastmsg']))
{
	$lastmsg=$_POST['lastmsg'];
	$var=$_POST['category'];
	$res=mysqli_query($con,"select * from post where category like'".$var."' and post_id<'$lastmsg' order by time desc limit 2")
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
	$num_results = mysqli_num_rows($res);
	if ($num_results==0)
		$msg_id=1;
	echo '</ol>';
	?>
	
	<div id="more<?php echo $msg_id; ?>" class="morebox">
	<a href="#" id="<?php echo $msg_id; ?>" class="more">more</a>
	</div>
	<?php
}
?>
