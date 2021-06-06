<?php
	if(isset($_REQUEST['id'])){
		include("conn.php");
		$query="INSERT INTO product(id,name,cprice,sprice,sec_id)
		VALUES('$_POST[id]','$_POST[name]','$_POST[cprice]','$_POST[sprice]','$_POST[sec_id]')";
		if(mysqli_query($connection,$query)){
			?><script type="text/javascript">
				alert("added succsesfully");
			</script><?php
		}
		else{
			?><script type="text/javascript">
				alert("Not added.please check all inputs");
			</script><?php
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>add product</title>
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
      body div form{
      	margin-left: 35%;
      }
      #list{
      	list-style: none;
      }
      #list li{
      	padding: 5px;
      }
      #input{
      	padding: 10px;
      	width: 30%;
      }
      body div form ol span{
      	padding: 10px;
      }
      #button1{
      	padding: 10px;
      	font-size: 17px;
      	border-radius: 7px;
      	border-style: none;

      }
      #button1:hover{
      	background-color: #142E54; 
      	color:white;
      }
    </style>
</head>
<body>
	<div id="heading">
		<h2>Add new product</h2>
	</div>
	<div>
		<form action="add_product.php" method="POST">
			<ul id="list">
				<li><input type="text" name="id" placeholder="product id" required id="input"></li>
				<li><input type="text" name="name" placeholder="Product name" id="input" required></li>
				<li><input type="text" name="cprice" placeholder="cprice" id="input" required></li>
				<li><input type="text" name="sprice" placeholder="sprice" id="input" required></li>
				<li><input type="text" name="sec_id" placeholder="sec_id" id="input" required
					></li>
			</ul>
			<ol>
				<span><button type="reset" value="Reset" id="button1">Reset</button></span>
				<span><button type="submit" value="submit" id="button1">Submit</button></span>
				<span><a href="manager.php">Back</a></span>
			</ol>
		</form>
	</div>
</body>
</html>
