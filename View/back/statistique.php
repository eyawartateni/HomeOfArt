<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/commentaire.php';
include_once '../../Controller/commentaireC.php';

$conn=mysqli_connect("localhost","root","","atelierphp2");
$result = mysqli_query($conn, "SELECT * FROM commentaire");
$artnum=mysqli_num_rows($result);

?>

  

<!DOCTYPE html>
<html lang="en">

<head>

   

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load Charts and the corechart package.
    google.charts.load('current', {'packages':['corechart']});


    google.charts.setOnLoadCallback(drawTotalSales);

    // Draw the Column chart for total Sales per Cities
    function drawTotalSales() {
        var data = google.visualization.arrayToDataTable([
          ['id_client_commentaire', 'id_commentaire'],
          <?php
     if($artnum >0)
      {
    ?>
         <?php
       while($row = mysqli_fetch_array($result)){
        echo"['".$row['id_client_commentaire']."',".$row['id_commentaire']."],";
    }
         ?>
           <?php
    }
    ?>
        ]);
      
        var options = {
            title: 'COMMENTAIRE ',
           
            height:500,
            width:1500,
            is3D: true,
            pieStartAngle: 100,      
            sliceVisibilityThreshold: .2,
            left: 0, 
            top: 20,
            alignment:'center',
            titleTextStyle: {
            color: '333333',
           fontName: 'Arial',
            fontSize: 10
    },
    
            
            //animation: {duration: 1000, easing: 'out',}
           
            //chartArea: {left: 0, top: 20, width: "100%", height: "100%"},
        };
      
      
        // Create and draw the visualization.
          var chart = new google.visualization.PieChart(document.getElementById('traffic-chart')).draw(data, options);
       
    }

    </script>

</head>


<body>

<div   class="stat"  id="traffic-chart" class="traffic-chart"></div>


</body>






</html>


