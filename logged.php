<?php
$connect = mysqli_connect("localhost", "root", "", "piwne_smaki");
mysqli_query($connect, "SET CHARSET utf8");
mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
$query = "SELECT * FROM rodzaje";
$result = mysqli_query($connect, $query);

	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	$username =$_SESSION['username'];
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<meta charset="utf-8" />
	<title>Ciekawi smaków piwa!</title>
	<meta name="description" content="To nie blog o alkoholiźmie a o zrozumieniu i degustacji wspaniałych trunków Sprawdź czy znasz takie rodzaje piwa!"/>
	<meta name="keywords" content="piwo, ipa, stout, lager, pilzner, kozlak, piwo hybrydowe, ale, bitter, porter, porter baltycki, india pale ale,hefeweizen, witbier, grodziskie, belgisjkie mocne, barley wine, saison, lambic, piwa z dodatkami, historia piwa, jak zrobic piwo, top piwo, najlepsze piwo, slod, chmiel, jan heweliusz, kopyra z blog kopyra.com "/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style.css" type="text/css" />

	
</head>

<body>
		<div id="logo">
			HELLO MY BEER
		</div>
		
	<div id="menu" >

        <div class="nav">
			<ol>
            <li><a href="logged.php">Strona główna</a></li>
            <li><a href="piwko.php">Moje piwo</a></li> 
			<li><a href="#">Wybierz piwo</a>
			<span class="navd">
				<ul>
				 <?php
				  while($row = mysqli_fetch_array($result))
				  {
				   echo '
				   <li><a id="'.$row["id_rodzaju_skladnika"].'" href="#">'.$row["nazwa"].'</a></li>
				   ';
				  }
				  ?>
				</ul>
				</span>
			</li> 
				<li>		
				<?php  if (isset($_SESSION['username'])) : ?>
				<font color="white" >Witaj <?php echo $_SESSION['username']; ?></font>
				</li>
            <li><a href="index.php?logout='1'">Wyloguj</a> </li>
			<?php endif ?>
			</ol>
        </div>			

	</div>

<div class="layout">
		
		<div id="content" class="content">
		<div class="home_content">
		
				<h1>Browar rzemieślniczy czy kraftowy?</h1>
			
				Definicja „kraftu” przyszła do nas z Ameryki. Dlaczego nie mówimy browar rzemieślniczy, tylko kraftowy? Po polsku bardziej pasowałoby powiedzieć rzemieślniczy, ale „kraft” to zawężenie rzemieślnictwa.
				<br/>	<br/>
				Na czym polega idea „kraftu”? Mówiąc o browarze kraftowym należy mieć na myśli miejsce, w którym właściciel sam opracowuje technologię, a później sam ją wdraża w życie, warząc piwo fizycznie u siebie na miejscu. To nie urządzenia decydują o tym, czy coś jest kraftowe czy nie, tylko fizyczne zaangażowanie właściciela w prowadzoną produkcję.
				<br/>	<br/>
				„Kraft” to zawężenie rzemieślnictwa. To nie tylko fizyczna produkcja, ale przede wszystkim tworzenie produktu w myśli piwowara. Rzemieślnik to ktoś, kto wykonuje jakąś usługę rutynowo. Kraftowiec to jednak swego rodzaju artysta myślący nad nowymi piwami i smakami. Tak powinniśmy postrzegać pojęcie „kraftu”
		</div>
	
		<div>
		<span id="page_details"></span>

			</div>


		</div>	
		
		<div class="sidebarR">
		<h2> Reklama</h2>
			<div class="slides">
			<img src="6.jpg" />
			<img src="5.jpg" />
			<img src="4.jpg" />
			<img src="3.jpg" />
		</div>
			
		</div>
	
</div>
			<div class="footer">
			Ciekawi smaków    &copy; All rights reserved   Powered by Damian Pilny & Wojciech Lindenheim-Locher
		</div>
</body>
</html>

<script>
 function load_page_details(id)
 {
	 $('.home_content').hide();

  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{id:id},
   success:function(data)
   {
    $('#page_details').html(data);
   }
  });
 }

 $('.navd a').click(function(){
  var id_rodzaju_skladnika = $(this).attr("id");
  load_page_details(id_rodzaju_skladnika);
 });
 
  
$(function(){
	// initalizing the first image to class 'top'
	$('.slides img:first').addClass('top');
	//function to alter the image index by changing the class
    var change = function (){
     		var curr = $('.slides img.top');
			var next = curr.next(); 

			// if the next image is not available then 
			// set the class-top to the first image
			// then vanish the current image to
			// show the previous next image
			if(!next.length){

				next = $('.slides img:first');
				next.addClass('top');
		        
		        curr.animate({opacity: 0.0},1000, function() {
		            curr.removeClass('top');
		            curr.css({opacity: 1.0});
		        });

			}else{

				// pick the next image
				// set the opacity to 0
				// den use animation to make it appear
				// above the top image
				next.css({opacity: 0.0})
		        .addClass('top')
		        .animate({opacity: 1.0}, 1000, function() {
		            curr.removeClass('top');
		        });
		    }
     }

    // repeat the function execution for every 3 secs
    setInterval(change, 4000 );


});
 
 
</script>