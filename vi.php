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
<tr>
<td><center><a href="?update='.$row['id'].'"><button>update</button></a></center></td>
</tr>';
$count++;
}
if(isset($_GET['update']))
{
$var1=$_GET['update'];
include("conn.php");
$query3="update  from product where id='$var1' ";
if(mysqli_query($connection,$query3)){ }
else{ }
}
if(isset($_REQUEST['sub']))
			{
				$var3=$_REQUEST['product2'];
				include("conn.php");
				$query="SELECT * FROM update_pro";
				$result=mysqli_query($connection,"$query");
				while($row= mysqli_fetch_array($result))  
				{		
				$var1=$row['name'];
				$var2=$row['sprice'];
				include("conn.php");
		    	$new_result="UPDATE product SET sprice='$var3' WHERE sprice='$var2' and  name='$var1' ";
				if(mysqli_query($connection,$new_result)){
				?>
				<script type="text/javascript">
				alert("new price updated");
				</script>
				<?php	
				}else{
					?>
				<script type="text/javascript">
				alert("new price not updated");
				</script>
				<?php	
				}
				}
			}
			?>