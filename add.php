<?php
if(isset($_REQUEST['id'])){
include("conn.php");
$query = "INSERT INTO employee VALUES ('$_POST[id]','$_POST[name]',
'$_POST[address]','$_POST[email]','$_POST[dob]',$_POST[age],'$_POST[dno]',
'$_POST[pass]','$_POST[salary]','$_POST[contact]','employee')";
if(mysqli_query($connection,$query)){
      ?><script type="text/javascript">
        alert("added succsesfully");
      </script><?php
    }
    else{
      ?><script type="text/javascript">
        alert("Not added!.please check all inputs");
      </script><?php
    }
}
?>

<!DOCTYPE html>
<head>
<title>add employee</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
      body{
        margin: 0px;
        padding: 0px;
        background-repeat: no-repeat;
        background-size: 1300px 610px;
        background-color:  #b3ecff;
      }


      #heading{
        width: 100%;
        height: 50%;
        background-color: #142E54;
        color: white;
      }
      #heading h2{
        text-align: center;
        font-family: "lota";
        font-weight: 600;
        font-size: 40px;
        margin: 0px;
        padding: 20px;
      }
      body div form ol span{
      	padding: 5px;
      }
      #input{
      	padding: 8px;
      }
      #submit{
      	padding: 10px;
      	border-radius: 6px;
      	border:none;
      	text-align: center;
      	width: 20%;
      	font-size: 20px;
      }
      #submit:hover{
      	background-color: #007399;
      	color: white;
      }
</style>
</head>
<body>
	<div id="heading">
		<h2>Add new employee</h2>
	</div>
<div><a href="manager.php" style="float: right">Back</a></div>
<div>
	<form name="insert" action="add.php" method="POST" >
		<ol>
			<span><input ype="text" name="id" required placeholder="Employee Id" id="input"/></span>
			<span><input type="text" name="name" required placeholder="Employee name" id="input"/></span>
			<span><input type="text" name="address" required placeholder="Address" id="input"/></span>
			<span><input type="text" name="email" required placeholder="E-mail" id="input"/></span>
		</ol>
		<ol>
			<span><input type="text" name="dob"  placeholder="Date of birth(dd/mm/yy)" id="input"/></span>
			<span><input type="text" name="age" placeholder="Age" id="input"/></span>
			<span><input type="text" name="pass" required placeholder="Password" id="input"/></span>
			<span><input type="text" name="salary" required placeholder="Salary" id="input"/></span>
		</ol>
		<ol><span><input type="text" name="contact" required placeholder="Contact" id="input"/></span>
		<span><input type="text" name="dno" required placeholder="DEPARTMENT NO" id="input"/></span></ol>
		<ol><span><button id="submit">Submit</button></span></ol>
	</form>
</div>
</body>
</html>