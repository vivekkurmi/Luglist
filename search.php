

<form name="details" action="search.php" method="POST">

<p>Search term: <input type="text" name="search" /></p>


<p><input type="submit" value="Search" /></p>

</form>





<?php

if(isset($_POST["search"])&&($_POST["search"]!=""))
{
$w=-1;$p=0;
$arq[0]=-12;
$conn=mysqli_connect("localhost","root","data","add")or die("error");
$str=$_POST["search"];
$str=$str." ";

$j=0;
for($i=0;$i<strlen($str);$i++)
{
$k=substr($str,$i,1);
if($k==" ")
{
  $t=$i-$j;
  $s=substr($str,$j,$t);
  $j=$i+1;
 $query="select * from adds where title like '%$s%' or description like '%$s%' or category like '%$s%' order by time desc";

$results=mysqli_query($conn,$query);

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
echo $output;
echo "<br />";echo "<br />";
}
$pos=0;
$arq[++$w]=$id;
$output="";
}// close of while

echo "<br />";
}//close of inner if
else
echo "not found<br />";
}//close of outer if 
}//close of for
}

else
{
$conn=mysqli_connect("localhost","root","data","add")or die("error");
$query="select * from adds order by time desc";
$results=mysqli_query($conn,$query);


if(mysqli_num_rows($results)>=1)
{

$count=0;
$output="";
while($row=mysqli_fetch_array($results))
{

$count++;
$output.="TITLE:".$row['title']."<br />";
$output.="DESCRIPTION:".$row['description']."<br />";
$output.="CATEGORY:".$row['category']."<br />";
$output.="CONTACT INFO:".$row['contact']."<br />";
$unix=strtotime($row['time']."GMT");
$tim=date("jS \of F Y",$unix);
$output.="POSTED AT:".$tim." at ".date('H:i:s', $unix)."<br />";
if($count<=5){
echo $output;
echo "<br />";echo "<br />";}
$output="";

}

echo "<br />";
}
else
echo "not found";
}
?>

