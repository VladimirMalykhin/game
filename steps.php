<?php
include 'connect.php';
if($_SESSION['isauth'] == 0){
	header('Location: index.php');
}
if($_SESSION['game'] == 0){
	header('Location: game.php');
}
?>
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
if(isset($_POST['do'])){
	if($_POST['count']<4){
	  if($_SESSION['last']!=$_SESSION['login']){
	  $_SESSION['coun']=$_SESSION['coun']+$_POST['count'];
	  $_SESSION['last']=$_SESSION['login'];
	  if($_SESSION['coun']>19){
		  header("Location: win.php");
	  }
	  }
	  else{
		echo 'Не ваш ход';  
	  }
	}
	else{
		echo 'Больше 3 нельзя';
	}
}
if($_SESSION['player1'] && $_SESSION['player2'] && $_SESSION['player3'] && $_SESSION['player4']){
	echo '
<div class="text-center;" style="margin-top:150px; text-align:center">
<h1>Взяли <span class="badge badge-secondary">'.$_SESSION['coun'].'</span> из 20 палочек</h1>
<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Количество</label>
    <input type="number" name="count" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>

  <input type="submit" class="btn btn-primary" name="do" value="Submit">
</form>
</div>';
}
else{
	echo 'Недостаточно игроков';
}

?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>