    <?php 
   // unset($_GLOBALS['msg']);
  if(isset($_REQUEST['username']))
  {
	$var1=$_REQUEST['username'];
	$var2=$_REQUEST['password'];
	include("conn.php");
    $query="SELECT * FROM employee WHERE name='$var1' AND pass='$var2'";
	$result=mysqli_query($connection,"$query");
	$rows=0;
	while($row= mysqli_fetch_array($result))
	{
		$rows++;
	}
    if($rows>0){
      header("Location: manager.php");
    }
    else
    {
      $_GLOBALS['msg']=" Wrong Credentials ";
    }
  }
  ?>

<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style type="text/css">
      body{
        margin:0px;
        padding: 0px;
        color: blue;
        /*background-color: #DADBDD;*/
        background-image: url(kk.jpeg);
        background-repeat: no-repeat;
        background-size: 1300px 610px;

      }
      body form{
        border: none;
        background-color:#33444E;
        color: white;
        margin: 5% 38%  15% 18%;
        padding: 30px;
        border-radius: 10px;


      }
      body form h2{
        text-align: center;
        margin-top: -10px;
        font-size: 35px;
      }
      body form div{
        padding: 10px;
        opacity: 0.8;
      }
      .extra a{
        color: white;
        list-style: none;
        display: inline-block;
        text-decoration-style: none;
      }
      .extra a:hover{
        color: #853B99;
      }
      body form div button{
        padding: 13px;
        position: center;
        border-radius: 5px;
        border-style: none;
        width: 50%;
      }
      body form div button:hover{
        background-color: #853B99;
      }
      .mail input{
        border-style: none;
        padding: 6px;
      }
      .protection input{
        border-style: none;
        padding: 6px;
      }
      #title{
        margin-top:0px;
        padding: 25px;
        text-align: center;
        background-color: #21272D;
        font-size: 40px;
        height: 30px;

        
      }
      #text{
        font-size: 25px;
        font-family: "neue helvetica";      
      }
    </style>
    <title>login</title>
  </head>
  <body>
    <?php
    if(isset($_GLOBALS['msg'])){

      ?>
    <h4 style="text-align: center;background-color: #ffbbcc;color: #000000;"><?php echo $_GLOBALS['msg'];?></h4>
    <?php
    }
    ?>
    <h2 id="title">Login to Supermarket</h2>
    <div><a href="fristpage.php" style="float: right">Back</a></div>
    <form action = "login.php" method="get">
      
      <div class="mail">
        <label id="text">username :<input type="text" name="username" style="width: 100%;" placeholder="Enter username" required="required"></label>
      </div>
      <div class="protection">
        <label id="text">password :<input type="password" name="password" style="width: 100%" placeholder="password" required=""></label>
      </div>
      <div>
        <button >submit</button>
      </div>
      <div class="extra">
        <a href="#">Forgot password?</a><br>
      </div>
    </form> 
  </body>
</html>


