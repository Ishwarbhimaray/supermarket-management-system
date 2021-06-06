<!DOCTYPE html>
<html>
<head>
	<title>views</title>
	<style type="text/css">
      body{
        margin: 0px;
        padding: 0px;
        background-repeat: no-repeat;
        background-size: 1300px 610px;
        background-image: url(i2.jmysqli);
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
        margin: 0px;
        padding: 0px;
        
      }
 
      #button1{
        font-size: 20px;
        border-radius: 7px;
        border: none;
        padding: 10px;
        width: 25%;
      }
      #button1:hover{
        background-color: #142E54;
        color: #fff;
      }
      #button{
        float: right;
        margin-right: 10px;
        font-size: 20px;
        border-radius: 7px;
        border: none;
        padding: 10px;
        width: 25%;
      }
      #button:hover{
        background-color: #ff471a;
        color: #fff;
      }
      #button2{
        float: right;
        margin-right: 15px;
        font-size: 25px;
        color: black;
      }
      #button2:hover{
        color: #ff471a;
      }
      #name1{
      	font-size:20px;
      }
      #id{
      	margin-left: 10%;
      }
  </style>
</head>
<body>
	<div id="heading"><h2>Views</h2></div>
	<div><a href="manager.php" style="float: right">Back</a></div>
	<form action="views.php" method="POST">
		<div>
		    <ol>
		        <span><button id="button1"name="name1" value="add1" class="add">sections under dnumber='6'</button></span>
		        <!--<span><button id="button1"name="name2" value="remove2" class="add">Average salary of the employee</button></span>-->
		    </ol>
		  </div>
		  <div >
		    <ol>
		        <span><button id="button1"name="name3" value="add2" class="add">products in dno='1'</button></span>
		        <!--<span><button id="button1"name="name4" value="remove1" class="add">customers paid by Paytm</button></span>-->
		    </ol>
		  </div>
		 
		  <div>
		    <ol>
		    <!--<span><button id="button1"name="name5" value="add3" class="add">Best customer</button></span>-->
		  </ol>
		  </div>
		  <hr noshade="" style="margin-right: 30%">
		  <?php
		  	if(isset($_REQUEST['name1'])){
				include('conn.php');
				$result1=mysqli_query($connection,"select count(*) from department join section on dnumber=dno where dnumber='6'");
				$row1=mysqli_fetch_row($result1);
				echo "<label id='name1'>Number of sections under dno='6' : ".$row1[0]."</label><br>";
				echo "<label id='name1'>Names of the sections : </label><br> ";
				$result=mysqli_query($connection,"select name
										from department join section on dnumber=dno
										where dnumber='6'");
				$rows=mysqli_num_rows($result);
				$row=mysqli_fetch_row($result);	
				$fields=mysqli_num_fields($result);

				
				if($rows>0){
			 		?>
				<section class="table">
			 	<table id="table" cellpadding="15px" cellspacing="0px" style="background: rgba(255, 255, 255, 0.0) border:none; border-color: $000000;">
			 	<?php
			 	echo "<tr><td>".$row[0]."</td></tr>";
			 	for ($i=0; $i<$rows; $i++) { 
			 		$row=mysqli_fetch_row($result);
			 		echo "<tr id='row'>";
			 		for($j=0;$j<$fields;$j++){
						echo "<td>".$row[$j]."</td>";
					}
					echo "</tr>";
			 		}echo "</table></section>"; 
			 		}									  		

		  	}
		  	else if(isset($_REQUEST['name2'])){
		  		include('conn.php');
				$result=mysqli_query($connection,"select avg(salary) as avg from employee where ssn in (select ssn from employee EXCEPT select mgssn from department)");
				while($row= mysqli_fetch_array($result))
				{
				echo "<label id='name1'>Average salary of employee except managers : ".$row['avg']."</label>";
				}
		  	}
		  	else if(isset($_REQUEST['name3'])){
		  		include('conn.php');
				$result=mysqli_query($connection,"SELECT P.name FROM Product AS P LEFT OUTER JOIN section AS S ON P.sec_id=S.id 
					WHERE P.sec_id IN ( SELECT id
     				FROM section,department
     				WHERE dno=dnumber AND dnumber='1')");
				$rows=mysqli_num_rows($result);
				$row=mysqli_fetch_row($result);	
				$fields=mysqli_num_fields($result);
				echo "<label id='name1'>All products in the dno='1' :</label>";
	 		if($rows>0){
		 		?>

			<section class="table">
		 	<table id="table" cellpadding="15px" cellspacing="0px" style="background: rgba(255, 255, 255, 0.0) border:none; border-color: $000000;">
		 	<?php
		 	for ($i=0; $i < $rows; $i++) { 
		 		$row=mysqli_fetch_row($result);
		 		echo "<tr id='row'>";
		 		for($j=0;$j<$fields;$j++){
					echo "<td>".$row[$j]."</td>";
				}
				echo "</tr>";
		 		}echo "</table></section>"; 
		 		}					  		
		  	}
		  	else if(isset($_REQUEST['name4'])){
		  		include('conn.php');
				$result=mysqli_query($connection,"select name
										from customer as c inner join invoice as i on c.id=i.cust_id
										where payment_mode_id=( select id 
																from payment 
																where mode_of='Paytm');");
				$rows=mysqli_num_rows($result);
				$row=mysqli_fetch_row($result);
				$fields=mysqli_num_fields($result);
				echo "<label id='name1'>Names of the customers who paid by PAYTM</label> : ";
		 		if($rows>0){
			 		?>

				<section class="table">
			 	<table id="table" cellpadding="15px" cellspacing="0px" style="background: rgba(255, 255, 255, 0.0) border:none; border-color: $000000;">
			 	<?php
			 	for ($i=0; $i < $rows; $i++) { 
			 		$row=mysqli_fetch_row($result);
			 		echo "<tr id='row'>";
			 		for($j=0;$j<$fields;$j++){
						echo "<td>".$row[$j]."</td>";
					}
					echo "</tr>";
			 		}echo "</table></section>"; 
			 		}				
		  		
		  	}
		  	else if(isset($_REQUEST['name5'])){
		  		include('conn.php');
				$result=mysqli_query($connection,"select name,address from customer,invoice where customer.id=cust_id and amount=(select max(amount) from invoice)");
				$rows=mysqli_num_rows($result);
				$row=mysqli_fetch_row($result);
				$fields=mysqli_num_fields($result);
				echo "<label id='name1'>Best customer of supermarket : </label><br>";
				echo "<br> ".$row[0]." ".$row[1];					  		
		  	}
		  ?>
	</form>
</body>
</html>