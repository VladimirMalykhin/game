<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Расчетное задание</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="profile.php">Профиль <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="game.php">Играть</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Выйти</a>
      </li>

    </ul>
  </div>
</nav>
<?php
include('connect.php');
if(isset($_POST['create'])){
 $_SESSION['creator']=$_SESSION['login'];
 $_SESSION['game']=1;
 $_SESSION['coun']=0;
}
if(isset($_POST['inlet'])){
 if(!$_SESSION['player1']){
	$_SESSION['player1']=$_SESSION['login'];
    header('Location: steps.php');	
 }
 else{
   if(!$_SESSION['player2']){
	$_SESSION['player2']=$_SESSION['login'];
    header('Location: steps.php');		
   }
   else{
	 if(!$_SESSION['player3']){
	 $_SESSION['player3']=$_SESSION['login']; 
	 header('Location: steps.php');	
     }
     else{
	   if(!$_SESSION['player4']){
	   $_SESSION['player4']=$_SESSION['login'];
       header('Location: steps.php');		   
       }
	   else{
		 echo 'Мест нет';
	   }
     }		 
   }	   
 }

}
if($_SESSION['login'] == $_SESSION['player1'] || $_SESSION['login'] == $_SESSION['player2'] || $_SESSION['login'] == $_SESSION['player3'] || $_SESSION['login'] == $_SESSION['player4']){
  header('Location: steps.php');
}
if($_SESSION['isauth']==0){
header('Location: index.php');
}
else{
if($_SESSION['game']==1){
echo '
<div class="text-center;" style="margin-top:150px; text-align:center">
<form method="POST">
<input type="submit" class="btn btn-primary" name="inlet" value="Войти в игру">
</form>

</div>';
}
else{
	echo '
<div class="text-center;" style="margin-top:150px; text-align:center">
<form method="POST">
<input type="submit" class="btn btn-primary" name="create" value="Создать игру">
</form>
</div>';
}
}
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>