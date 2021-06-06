<center>
<?php
$count=0;
include("conn.php");
$query="select * from employee where position='employee'";
$result=mysqli_query($connection,"$query");
while($row= mysqli_fetch_array($result))
{
if($count==0)
{
?>
<h1>Employee Details</h1></center>
<table border='1'align='center'>
<th align="center"class="tw"><font color="blue">SSN</th>
<th align="center"class="tw"><font color="blue">NAME</th>
<th align="center"class="tw"><font color="blue">ADDRESS</th>
<th align="center"class="tw"><font color="blue">SALARY</th>
<th align="center"class="tw"><font color="blue">PHONE NO</th>
<th align="center"class="tw"><font color="blue">DEPARTMENT NO</th>
<th align="center"class="tw"><font color="blue">DELETE</th>
</tr>
<?php
}
echo'<td align="center">'.$row['ssn'].'</td>
<td align="center">'.$row['name'].'</td>
<td align="center">'.$row['address'].'</td>
<td align="center">'.$row['salary'].'</td>
<td align="center">'.$row['contact'].'</td>
<td align="center">'.$row['dno'].'</td>';
echo'
<td><center><a href="?delete='.$row['ssn'].'"><button>delete</button></a></center></td>
</tr>';
$count++;
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
<tr><td colspan="7"><center><a href="manager.php">Back</a></td></tr>
</table>