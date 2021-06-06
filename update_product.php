<!DOCTYPE html>
<html>
<head>
	<title>update product price</title>
	<style type="text/css">
		      body{
        margin: 0px;
        padding: 0px;
        background-repeat: no-repeat;
        background-size: 1300px 610px;
        
		background-image:url(kk.jpeg);
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
      body form {
      	padding: 20px;
      	margin-left: 20%;
      	
      }
      #data{
      	padding: 10px;
      	font-size: 25px;
      }
      #ip1{
      	padding: 5px;
      	font-size: 15zpx;
      }
      #btn{
      	padding: 10px;
      	border-radius: 5px;
      	border-style: none;
      }
      #btn:hover{
      	background-color: #142E54;
      	color: white;
      }
	</style>
</head>
<body>
	<div id="heading"><h2>Update Product Price</h2></div>
	<form action="update_product.php" method="POST">
	<div id="data">
		<?php
		if(isset($_REQUEST['product']))
			{ $vva=$_REQUEST['product'];
			echo"<lable id='data'>Enter the product name : <input type='text' name='product' placeholder='name' id=ip1 value='$vva'></lable>";
			 } 
		else { ?>
			<lable id="data">Enter the product name : <input type="text" name="product" placeholder="name" id="ip1" value=""></lable>
		<?php } 
		?>
		<button id="btn">submit</button>
	</div>
	<div id="data">
		<?php
			if(isset($_REQUEST['product'])){
				include("conn.php");
				$query="SELECT sprice FROM product WHERE name='$_REQUEST[product]'";
				$result=mysqli_query($connection,"$query");
				while($row= mysqli_fetch_array($result))  
				{		
					$query3="delete  from update_pro";
					if(mysqli_query($connection,$query3)){ }
					$var1=$_REQUEST['product'];
					$var2=$row['sprice'];
					$query1="insert into update_pro values('$var1','$var2')";
					if(mysqli_query($connection,$query1)){}else{}
		    		?><lable id="data">current selling price : <?php echo $row['sprice']."<br><br>" ?></lable>
		    		<lable id="data">Enter new sell price : <input type="text" name="product2" placeholder="enter new price" id="ip1"></lable>
		    		<button onclick="print" name="sub"id="btn">submit</button>
					<div><a href="manager.php" style="float">Back</a></div>
		    		<?php
		    	}
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
	</div>

	</form>
</body>
</html>