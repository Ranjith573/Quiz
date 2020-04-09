
<!DOCTYPE>
<html>
<?php require 'dbconfig.php';
session_start();
$_SESSION['name']=isset($_POST['name']) ? $_POST['name'] :'';
?>
<head>
<title>Quiz</title>
<style>
body {
    background: url("bg.jpg");
	background-size:100%;
	background-repeat: no-repeat;
	position: relative;
	background-attachment: fixed;
}
/* button */
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: skyblue;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
 
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
 
.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
 
.button:hover span {
  padding-right: 25px;
}
 
.button:hover span:after {
  opacity: 1;
  right: 0;
}
.title{
	background-color: navy blue;
	font-size: 28px;
  padding: 20px;
	
}
.button3 {
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f4e542;
}
 
.button3:hover {
    background-color: #f4e542;
    color: Black;
}
</style>
</head>
<center>
<div class="title">QUIZ</div>
<?php if (isset($_POST['name'])) {
    $name = $_POST['name'];
echo "<h3>Hii $name lets start the quiz</h3>";
}?>
<?php 
if (isset($_POST['click']) || isset($_GET['start'])) {
@$_SESSION['clicks'] += 1 ;

$c = $_SESSION['clicks'];
if(isset($_POST['usr'])) { $userselected = $_POST['usr'];
$fetchqry2 = "UPDATE `quiz` SET `usr`='$userselected' WHERE `Qno`=$c-1"; 
$result2 = mysqli_query($con,$fetchqry2);
}} else {
$_SESSION['clicks'] = 0;
}
//echo($_SESSION['clicks']);
																?>
<div class="bump"><br><form><?php if($_SESSION['clicks']==0){ ?> <button class="button" name="start" float="left"><span>START QUIZ</span></button> <?php } ?></form></div>
<form action="" method="post">  				
<table><?php if(isset($c)) {   $fetchqry = "SELECT * FROM `quiz` where qno='$c'"; 
				$result=mysqli_query($con,$fetchqry);
				$num=mysqli_num_rows($result);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC); }
		  ?>
<tr><td><h1><br><?php echo @$row['Question'];?></h3></td></tr> <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6){ ?>
  <tr><td><h3><input required type="radio" name="usr" value="<?php echo $row['Option 1'];?>">&nbsp;<?php echo $row['Option 1']; ?><br>
  <tr><td><h3><input required type="radio" name="usr" value="<?php echo $row['Option 2'];?>">&nbsp;<?php echo $row['Option 2'];?></td></tr>
  <tr><td><h3><input required type="radio" name="usr" value="<?php echo $row['Option 3'];?>">&nbsp;<?php echo $row['Option 3']; ?></td></tr>
  <tr><td><h3><input required type="radio" name="usr" value="<?php echo $row['Option 4'];?>">&nbsp;<?php echo $row['Option 4']; ?><br><br><br></td></tr>
  <tr><td><h3><button class="button3" name="click" >Next</button></td></tr> <?php }  
																	?> 


 <?php if($_SESSION['clicks']>5){
	$qry3 = "SELECT `ans`, `usr` FROM `quiz`;";
	$result3 = mysqli_query($con,$qry3);
	$storeArray = Array();
	while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) 
	{
     if($row3['ans']==$row3['usr'])
	{
		@$_SESSION['score'] += 1 ;
	 }
}

 ?>
 
 <h2>Result</h2>
 <span>No. of Correct Answer:&nbsp;
<?php
$no = @$_SESSION['score'] + 1;
echo $no; 
 session_unset(); ?></span><br>
 <span>Your Score:&nbsp<?php echo $no*2; ?></span>
<?php $na=@$_SESSION['name'];
echo $na;?>
<?php } ?>
</center>
</body>
</html>