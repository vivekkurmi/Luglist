<?php
								require "init.php";
								echo gmdate("Y-m-d H:i:s", time());
								$id = $_GET['id']; // I got this from the URL
								$res = mysqli_query($con,"Select * from adds where post_id = ".$id);
								$row= mysqli_fetch_array($res);
								echo $row['title'];
								echo $row['description'];echo $row['email'];echo $row['phone'];
?>
