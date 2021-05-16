<?php

require_once ('index.html');
include_once "../../config.php";
include_once '../../Model/commande.php';
include_once '../../Controller/CommandeC.php';

$conn=mysqli_connect("localhost","root","","seemyart");
$result = mysqli_query($conn, "SELECT * FROM commande");
$artnum=mysqli_num_rows($result);

?>



<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin
    ="anonymous">
<style type="text/css">
.center
    {
      width: 60%;
      margin-right: auto;
      margin-left: auto;
      background:#FFFFFF;
      
      min-height: 800px;
      padding : 50 px 50px ;
    }

    .publication
    {
      display: flex;
      flex-wrap: wrap;
      align-content: space-around; 
      
  
    }

    .card
    {
      margin-right: 20px
      
    }

    body
    {
      width: 100%;
      height: 100vh;
      background :#FFFFFF;
    }

    </style>


   

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load Charts and the corechart package.
    google.charts.load('current', {'packages':['corechart']});
    google.charts.load('current', {'packages':['bar']});

    google.charts.setOnLoadCallback(drawTotalSales);

    // Draw the Column chart for total Sales per Cities
    function drawTotalSales() {
        var data = google.visualization.arrayToDataTable([
          ['refcommande', 'prixtotal'],
          <?php
     if($artnum >0)
      {
    ?>
         <?php
       while($row = mysqli_fetch_array($result)){
        echo"['".$row['refcommande']."',".$row['prixtotal']."],";
    }
         ?>
           <?php
    }
    ?>
        ]);
      
        var options = {
            title: '    COMMANDE ',
           
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
                       width:500,
                       height:300,
                       legend: 'none',
                       title: 'COMMANDE',
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


<div   class="stat"   id="traffic-chart" class="traffic-chart"></div>
<td><div id="aloe" style="border: 1px solid #ccc" ></div></td>


</body>






</html>

