<?php

   error_reporting(0);







                        

                           $i = 0;

                           $kume = array();



                           if ($handle = opendir('source')) {

                           

                             while (false !== ($entry = readdir($handle))) 

                           {

                           

                                 if ($entry != "." && $entry != "..") 

                             {

                           

                               $kume[$i] = $entry ;	

                               $i = $i+1;

                              

                                       

                               

                                 }

                           

                           }

                           

                             closedir($handle);

                           }

                       $j = rand(0, $i-1);

                          $ders6 ="index.php?izle=". $kume[$j];


                          if(isset($_GET['izle']))

                          {

                            $izle = $_GET['izle'];

                            

                          }

											else{

                               

                       echo '<script> window.location = "index.php?izle='. $kume[$j] .'" </script>'; 
                    //  echo '<script>    Next();  </script>'; 
                   

                           }



?>





<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">





  </head>

  <body >

   



    <!-- Optional JavaScript; choose one of the two! -->



    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!--

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    -->

	



	<div class="container">

  <div class="row">

    <div class="col">

      

<button onclick="openFullscreen();">Play</button><button onclick="Next();">Next</button>



    

    <video width="100%" controls id="myvideo" width="480" height="320" controls autoplay onplay="openFullscreen()" >

  <source src="<?php echo "source/".$izle ;?>" type="video/mp4">

  <source src="movie.ogg" type="video/ogg">



</video>

    </div>

    <div class="col">

	<?php


                           sort($kume);
for ($j = 0 ; $j <= $i ; $j++ ) {
  
  $linkyaz = str_replace(' ', '%20', $kume[$j]);
  echo	"<a class='page-link' href=index.php?izle=".$linkyaz."   >".$kume[$j]."</a>";
  //echo	"<a class='page-link' href=index.php?izle=".$kume[$j]."   >".$kume[$j]."</a>";
  
}
	?>


	  

	  

	  

	  

    </div>

  </div>

 

</div>

	

	



	

	

  </body>

  

  <script>





var elem = document.getElementById("myvideo");





var videolar = <?php echo json_encode($kume); ?>;









elem.onended = function() 

						{

							var sira = Math.floor(Math.random() *<?php echo $i ; ?>);

elem.src = "source/" + videolar[sira] ;

console.log("source/" + videolar[sira] );



						};



           



</script>

<script>

var elem = document.getElementById("myvideo");



function openFullscreen() {

  elem.play();

  if (elem.requestFullscreen) {

    elem.requestFullscreen();

  } else if (elem.webkitRequestFullscreen) { /* Safari */

    elem.webkitRequestFullscreen();

  } else if (elem.msRequestFullscreen) { /* IE11 */

    elem.msRequestFullscreen();

  }

  

}
function Next() {
	
var sira = Math.floor(Math.random() *<?php echo $i ; ?>);

elem.src = "source/" + videolar[sira] ;

console.log("source/" + videolar[sira] );

	
  

}
</script>



</html>

