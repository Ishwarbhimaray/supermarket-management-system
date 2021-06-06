
		<body>
		<table align="center"><tr>
		<center><form action="" method="post">
		<td>ENTER EMPLOYEE  SSN:</td><td><input type="text"name="ssn"required placeholder="Employee ssn"></td></tr>
		<tr><td>ENTER PASSWORD:</td><td><input type="password"name="pw"required placeholder="Employee password"><td></tr>
		<tr><td colspan="2"align="center"><input type="submit"name="sub"id="sub"value="Enter"></td></tr>
		</from></center>
		</body>
		
		
<?php
if(isset($_REQUEST['sub']))
	{
	$var1=$_REQUEST['ssn'];
	$var2=$_REQUEST['pw'];
	include("conn.php");
    $query="SELECT * FROM employee WHERE ssn='$var1' AND pass='$var2' and position='employee'";
	$result=mysqli_query($connection,"$query");
	$rows=0;
	while($row= mysqli_fetch_array($result))
	{
		$rows++;
	}
    if($rows>0){
		$query3="delete  from empssn";
		if(mysqli_query($connection,$query3)){ }
		$var1=$_REQUEST['ssn'];
		$query1="insert empssn values('$var1')";
		if(mysqli_query($connection,$query1)){}else{}
      header("Location: invoice.php?cust_id=&product1=&quantity1=&product2=&quantity2=&product3=&quantity3=&product4=&quantity4=");
    }
    else
    {
      $_GLOBALS['msg']=" Wrong Credentials ";
    }
		
	}
?>	