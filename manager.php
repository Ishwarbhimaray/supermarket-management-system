<?php
if(isset($_REQUEST['name'])){
	if($_REQUEST['name']=='add1'){
		header("Location:add_product.php");
	}
	else if($_REQUEST['name']=='add2'){
		header("Location:add.php");
	}
  else if($_REQUEST['name']=='add3'){
    header("Location:update_product.php");
  }
	else if($_REQUEST['name']=='remove1'){
		header("Location:remove.php");
	}
	else if($_REQUEST['name']=='remove2'){
		header("Location:remove_product.php");
	}
  else if($_REQUEST['name']=='view'){
    header("Location:views.php");
  }
  else if($_REQUEST['name']=='exit'){
    header("Location:fristpage.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>test page</title>
  <style type="text/css">
      body{
        margin: 0px;
        padding: 0px;
		
        background-repeat: no-repeat;
        background-size: 1300px 610px;
        background-color: #e3e8e5;
		
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
        padding: 20px;
        background-color: #A7967E;
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
        font-size: 15px;
        border-radius: 7px;
        border: none;
        padding: 10px;
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

    </style>
</head>
<body>
  <div id="heading">
     <h2>Supermarket managment</h2>
  </div>
<div>
    <ol>
    <span><a href="fristpage.php" id="button2" name="name" value="exit"><font color="yellow">Logout</a></span>
    </ol>
  </div>
  <form action="manager.php" method="POST">
  <center>
  <div>
    <ol>
        <span><button id="button1"name="name" value="add1" class="add">Add Product</button></span>
        <span><button id="button1"name="name" value="remove2" class="add">View Product</button></span>
    </ol>
  </div>
  <div >
    <ol>
        <span><button id="button1"name="name" value="add2" class="add">Add Employee</button></span>
        <span><button id="button1"name="name" value="remove1" class="add">View Employee</button></span>
    </ol>
  </div>
 
  <div>
    <ol>
    <span><button id="button1"name="name" value="add3" class="add">Update Product price</button></span>
	<span><button id="button1"name="name" value="view" class="add">View</button></span>
  </ol>
  </div>
 </center>