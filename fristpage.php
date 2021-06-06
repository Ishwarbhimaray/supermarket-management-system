
<?php
	if(isset($_REQUEST['employee1']) || isset($_REQUEST['manager1']))
	{
	if($_REQUEST['employee1']=='emp1') {
		header("Location: emp1.php");
	}
	else if($_REQUEST['manager1']=='mngr1'){
		header("Location: login.php");
	}

	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>frist page</title>
     <style type="text/css">
          h2{
      font-family: "courier";
    }
      body{
        margin:0px;
        padding: 0px;
        /*background-color:black;*/
        background-image: url(download.jpeg);
        background-repeat: no-repeat;
        background-size: 1300px 610px;


      }
      body form{
        border-color: #58221C
        background-color:#EDEDEC;
        color: black;
        opacity: 0.8;
        margin: 8% 30% 0px 30%;
        padding: 30px;

      }
      #title{
        margin-top:0px;
        padding: 25px;
        text-align: center;
        background-color: #E65415;
        color: white;
        font-family: "lota";
        font-weight: 600;
        font-size: 40px;
        height: 30px;

        
      }
      #idt{
        font-family: 
      }
      body form h2{
        text-align: center;
        margin-top: -10px;
              }
      body form div{
        padding: 0px;
        margin: 0px;
        font-size: 40px;
        color: blue;
        font-family: "lota";
        font-weight: 600;

      }
      body form div button{
        padding: 15px;
        position: center;
        border-radius: 5px;
        border-style: none;
        width: 100%;
        font-size: 20px;
      }
      body form div button:hover{
        background-color: #016748;
        padding: 20px;
        color: yellow;
      }
      ul li{
        list-style: none;
        display: inline-block;
      }
      #styl{
        display: inline-block;
        margin-top: -20%;
      }
    </style>
</head>
<body>
	<h2 id="title">Super market</h2>
	 <form action = "" method="post">
    <div><label id="styl">Welcome to Supermarket</label></div><br>
      <div >
    		Login as:<ul>
          <li><button name="employee1" value="emp1" >Employee</button> </li>
          <li><button name="manager1" value="mngr1">Manager</button></li>
          </ul>
      </div>
    </form> 
</body>
</html>
