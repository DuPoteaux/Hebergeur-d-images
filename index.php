<?php

//verifer si image bien recu
if (isset($_FILES['image'])&& $_FILES['image']['error']==0) {
	$error=1;
	if($_FILES['image']['size']<=300000)
{
//extension
	$infoImage=pathinfo($_FILES['image']['name']);
	$extensionImage=$infoImage['extension'];
	$extensionArray=array('png','jpg','jpeg','gif');
	if (in_array($extensionImage, $extensionArray)) {
		$adress='upload/'.time().rand().rand(). '.' .$extensionImage;
		move_uploaded_file($_FILES['image']['tmp_name'], $adress);
		$error=0;
	}
}	
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> HEBERGEUR D'IMAGES GRATUIT</title>
</head>
<style type="text/css">
	html ,body{ margin :0;font-family:georgia ;}
	header{text-align: center; background: red; }
    .contener{ width: 500px; margin:auto;  }
    article { margin-top: 50px; background: #f7f7f7; padding: 10px;}
    #image{ max-width: 200px ;text-align: center;  }


    button{ margin-top: 20px; margin-left: 210px; background-color:solid; }
    h2{ margin-top: 0;text-align: center; }
</style>
<body>
	<!--HEADER-->
	<header>
		<h1>PHOTOSHOOT</h2>
	</header>
	<!--FORMULAIRE-->
   <div class="contener">
	<article>
		<h2>hebergez vos images</h2 >
		<?php
		if (isset($error) && $error==0) {
			echo '
			<img src="'.$adress.'" id="image" /><br />
             <input type="text" value="http://localhost/HerbergeurImage/'.$adress.'"/>' ;
		}
		else if (isset($error) && $error==1) {
			echo 'votre image ne peut pas etre envoyer ,veuillez verifier son extension et sa taille( maximum a 3Mo)' ;
		}
		?>




		<form method="post" action="index.php" enctype="multipart/form-data" >
			<p>
				<input type="file" required name="image" /><br/>
				<div style="margin: auto;">
				<button type="submit">heberger</button></div>
			</p>
			
		</form>
	</article>
    </div>
	
</form>
<footer style=" text-align: center;
	padding: 0;
	font-size: 0.9em;
	t"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
2021 © <strong style="font-size: 25px "> ₯ </strong> <br>
		<a href="#">contact</a>
		 <a href="#">a propos</a>
	</footer>
</body>
</html>
