<?php 
include('local.settings.php'); 
$connection = mysql_connect($db_host,$db_username,$db_password); 
mysql_select_db($db_database); 
 
$query = "select * from mb_link order by mb_link_order asc"; 
$result = mysql_query($query,$connection); 
 
$num_rows = mysql_num_rows($result); 
if($num_rows > 0){ 
?> 
<ul class="links"> 
<?php 
 while($row = mysql_fetch_array($result)){ 
?> 
<li><a href="<?php echo $row['mb_link_url']; ?>" target="_blank"><?php echo 
$row['mb_link_text']; ?></a></li> 
<?php 
 } 
?> 
</ul> 
<?php 
} 
mysql_close($connection); 
?>