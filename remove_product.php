<center>
<?php
$count=0;
include("conn.php");
$query="select * from product";
$result=mysqli_query($connection,"$query");
while($row= mysqli_fetch_array($result))
{
if($count==0)
{
?>
<h1>Product Details</h1></center>
<table border='1'align='center'>
<th align="center"class="tw"><font color="blue">PRODUCT ID</th>
<th align="center"class="tw"><font color="blue">NAME</th>
<th align="center"class="tw"><font color="blue">CELLING PRICE</th>
<th align="center"class="tw"><font color="blue">SPRICE</th>
<th align="center"class="tw"><font color="blue">SECTION ID</th>
<th align="center"class="tw"><font color="blue">DELETE</th>
<th align="center"class="tw"><font color="blue">UPDATE</th>
</tr>
<?php
}
echo'<td align="center">'.$row['id'].'</td>
<td align="center">'.$row['name'].'</td>
<td align="center">'.$row['cprice'].'</td>
<td align="center">'.$row['sprice'].'</td>
<td align="center">'.$row['sec_id'].'</td>';
echo'
<td><center><a href="?delete='.$row['id'].'"><button>delete</button></a></center></td>
<td><center><a href="update_product.php" update='.$row['id'].'"><button>update</button></a></center></td>
</tr>';
$count++;
}
if(isset($_GET['update']))
{
$var2=$_GET['update'];
include("conn.php");
$query3="update  from product where id='$var2' ";
if(mysqli_query($connection,$query3)){ }
else{ }
}
if(isset($_GET['delete']))
{
$var1=$_GET['delete'];
include("conn.php");
$query3="delete  from product where id='$var1' ";
if(mysqli_query($connection,$query3)){ }
else{ }
}
?>
<tr><td colspan="7"><center><a href="manager.php">Back</a></td></tr></table></center>