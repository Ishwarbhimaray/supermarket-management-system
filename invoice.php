
<!DOCTYPE html>
<html>
<head>
	<title>Bill details</title>
	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
			/*background-color: #fff;*/
			background-image: url(i2.jmysqli);
		}
		body div form{
			padding: 20px;
			background-color: #fff;
			margin: 0% 15% 0% 15%;
			border: fixed;
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

      #subhead{
      	background-color: #fff;
      	margin-bottom: 10px;
      	padding-bottom: 20px;
      }

      #subhead1{
      	float: left;
      	padding-right: 8px;
      	font-size: 20px;
      	font-family: 'lota';
      }
      #subhead2{
      	float:right;
      }

      #table{
      	border: solid;
      }
      #input1{
      	padding: 10px;
      	font-size: 17px;
      }
      #input2{
      	padding:5px;
      	font-size: 17px;
      	border-style: none;
      }

      #button1{
    		padding: 8px;
    		font-size: 15px;
    		border-radius: 7px;
    		border-style: none;
    		float: center;
    	}
      #button1:hover{
      	background-color: #142E54;
      	color: white;
      }
      .buttons ol{
      	float: right;
      	display: inline-block;
      }

	</style>
</head>
<body>
	<div id="heading"><h2>BILL DETAIL</h2></div>
	<div>
	<form id='main'>
		<div id="subhead">
			<ol>
				<span id="subhead1">Employee : <label name="emp_id" value="emp123">
				<?php 
				include("conn.php");
				$query="select * from empssn";
				$result=mysqli_query($connection,"$query");
				while($row= mysqli_fetch_array($result))
				{echo $row['ssn'];}?></label></span>
				 
					<?php 
						if(isset($_REQUEST['cust_id']))
						{ 
					     $vva=$_REQUEST['cust_id'];
						echo"<span id='subhead1'><lable> Customer :<input type='text' name='cust_id' id='input2' value='$vva'></lable></span>";
						 } 
						else { ?>
						<span id="subhead1"><lable> Customer :<input type="text" name="cust_id" id="input2" autofocus></lable></span>
						<?php } ?>
				<span id="subhead2"><a href="fristpage.php">logout</a></span>
			</ol>
		</div>
		<div class="table">
			<table id="table" cellpadding="10" align="center" summary="bill" width="500" cellspacing="5">
			<thead>
				<tr class="hd">
					<th>S1.NO</th>
					<th>Product</th>
					<th>Quantity</th>
					<th>SellPrice</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr align="center">
					<td>1</td>

					<?php 
						if(isset($_REQUEST['product1']))
						{ $vv1=$_REQUEST['product1'];
						echo"<td><label><input id='input1' type='text' name='product1' list='' value='$vv1'></label></td>	";
						} 
						else { ?>
							<td><label><input type="text" name="product1" list="" autofocus="true"></label></td>
						<?php } ?>
						<?php
						if(isset($_REQUEST['quantity1']))
						{ $vv1=$_REQUEST['quantity1'];
						echo"<td><input id='input1'type='number' name='quantity1' align='center' value='$vv1'></td>";
						 } 
						else { ?>
						<td><input type="number" name="quantity1" align="center" ></td>
					<?php } ?>
					<?php
						if(isset($_REQUEST['product1'])){
							include("conn.php");
							$result1="SELECT sprice from product where name='$_REQUEST[product1]'";
							$result=mysqli_query($connection,"$result1");
							$rows = mysqli_num_rows($result);
							$fields=mysqli_num_fields($result);
							$row=mysqli_fetch_row($result);
							echo "<td>".$row[0]."</td>";
							/*
							if($rows>0){
								 	for ($i=0; $i < $rows; $i++) { 
	 									$row=mysqli_fetch_row($result);
	 									for($j=0;$j<$fields;$j++){
										echo "<td>".$row[$j]."</td>";
										}
	 								}
							}*/
						
						if(isset($_REQUEST['quantity1'])){
							$value=$_REQUEST['quantity1'];
							$result1=$value*$row[0];
							echo "<td>".$result1."</td>";
						}
					}
					?>
					

				</tr>
					<tr align="center">
					<td>2</td>
					<?php 
						if(isset($_REQUEST['product2']))
						{ $vv1=$_REQUEST['product2'];
						echo"<td><label><input id='input1'type='text' name='product2' list='' value='$vv1'></label></td>";	
						 } 
						else { ?>
							<td><label><input type="text" name="product2" list=""></label></td>
						<?php } ?>
						<?php
						if(isset($_REQUEST['quantity2']))
						{ $vv1=$_REQUEST['quantity2'];
						echo"<td><input id='input1'type='number' name='quantity2' align='center' value='$vv1'></td>";
					 } 
						else { ?>
							<td><input type="number" name="quantity2" align="center" ></td>
						<?php } ?>
					<?php
						if(isset($_REQUEST['product2'])){
							include("conn.php");
							$result=mysqli_query($connection,"SELECT sprice from product where name='$_REQUEST[product2]'");
							$rows = mysqli_num_rows($result);
							$fields=mysqli_num_fields($result);
							$row=mysqli_fetch_row($result);
							echo "<td>".$row[0]."</td>";

						if(isset($_REQUEST['quantity2'])){
							$result2=$value*$row[0];
							echo "<td>".$result2."</td>";
						}
					}
					?>

				</tr>
				<tr align="center">
					<td>3</td>
					<?php 
						if(isset($_REQUEST['product3']))
						{ $vv1=$_REQUEST['product3'];
						echo"<td><label><input id='input1'type='text' name='product3' list='' value='$vv1'></label></td>";
						
						 } 
						else { ?>
							<td><label><input type="text" name="product3" list=""></label></td>
						<?php } ?>
						<?php
						if(isset($_REQUEST['quantity3']))
						{ $vv1=$_REQUEST['quantity3'];
						echo"<td><input id='input1'type='number' name='quantity3' align='center' value='$vv1'></td>";
						 } 
						else { ?>
							<td><input type="number" name="quantity3" align="center" ></td>
						<?php } ?>
					<?php
						if(isset($_REQUEST['product3'])){
							include("conn.php");
							$result=mysqli_query($connection,"SELECT sprice from product where name='$_REQUEST[product3]'");
							$rows = mysqli_num_rows($result);
							$fields=mysqli_num_fields($result);
							$row=mysqli_fetch_row($result);
							echo "<td>".$row[0]."</td>";
			
						if(isset($_REQUEST['quantity3'])){
							$value=$_REQUEST['quantity3'];
							$result3=$value*$row[0];
							echo "<td>".$result3."</td>";
						}
					}
					?>

				</tr>
				<tr align="center">
					<td>4</td>
					<?php 
						if(isset($_REQUEST['product4']))
						{ $vv1=$_REQUEST['product4'];
						echo"<td><label><input id='input1'type='text' name='product4' list='' value='$vv1'></label></td>";						
						 } 
						else { ?>
							<td><label><input type="text" name="product4" list=""></label></td>
						<?php } ?>
						<?php
						if(isset($_REQUEST['quantity4']))
						{ $vv1=$_REQUEST['quantity4'];
						echo"<td><input id='input1'type='number' name='quantity4' align='center' value='$vv1'></td>";
					} 
						else { ?>
							<td><input type="number" name="quantity4" align="center" value=""></td>
						<?php } ?>
					<?php
						if(isset($_REQUEST['product4'])){
							include("conn.php");
							$result=mysqli_query($connection,"SELECT sprice from product where name='$_REQUEST[product4]'");
							$rows = mysqli_num_rows($result);
							$fields=mysqli_num_fields($result);
							$row=mysqli_fetch_row($result);
							echo "<td>".$row[0]."</td>";
						
						if(isset($_REQUEST['quantity4'])){
							$value=$_REQUEST['quantity4'];
							$result4=$value*$row[0];
							echo "<td>".$result4."</td>";
						}
					}
					?>

				</tr >
			</tbody>
			<tfoot>
				<tr align="right">
					<td colspan="4" style="font-size: 22px;">Total</td>
						<?php

						$total=$result1+$result2+$result3+$result4;
					
						echo "<td>".$total."<td>";
						?>
				</tr>
			</tfoot>
		</table>
		</div>
	<div class="buttons">
		<ol >
			<span><button id="button1">click</button></span>
			<span><button type="reset" value="reset" id="button1">Reset</button></span>
			<span><button onclick="myFunction()" id="button1">Print Bill</button></span>
		</ol>
	</div>
	</form>
	</div>
	<script>
		function myFunction() {
  		window.print();
		}
	</script>
</body>
</html>