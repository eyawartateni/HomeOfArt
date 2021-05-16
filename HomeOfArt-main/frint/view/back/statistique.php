<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/commentaire.php';
include_once '../../Controller/commentaireC.php';

$conn=mysqli_connect("localhost","root","","seemyart");
$result = mysqli_query($conn, "SELECT * FROM likes");
$artnum=mysqli_num_rows($result);

?>

  

<!DOCTYPE html>
<html lang="en">

<head>

   

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load Charts and the corechart package.
    google.charts.load('current', {'packages':['corechart']});
    google.charts.load('current', {'packages':['bar']});

    google.charts.setOnLoadCallback(drawTotalSales);

    // Draw the Column chart for total Sales per Cities
    function drawTotalSales() {
        var data = google.visualization.arrayToDataTable([
          ['id_client', 'id_like'],
          <?php
     if($artnum >0)
      {
    ?>
         <?php
       while($row = mysqli_fetch_array($result)){
        echo"['".$row['id_client']."',".$row['id_like']."],";
    }
         ?>
           <?php
    }
    ?>
        ]);
      
        var options = {
            title: 'LIKE ',
           
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

          var barchart_options = {title:'Barchart: Best seller',
                       width:400,
                       height:300,
                       legend: 'none',
                       title: 'LIKE',
            subtitle: '',
            animation:{
        duration: 1000,
        easing: 'inAndOut',
      },
                    };
                    
        var barchart =  new google.charts.Bar(document.getElementById('aloe'));
        barchart.draw(data, google.charts.Bar.convertOptions(barchart_options));
       
    }

    </script>

</head>


<body>

<div   class="stat"  id="traffic-chart" class="traffic-chart"></div>
<td><div id="aloe" style="border: 1px solid #ccc"></div></td>


</body>






</html>


