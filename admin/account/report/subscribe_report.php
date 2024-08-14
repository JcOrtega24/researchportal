<?php
    include "../inc/header2.php";
    // include "../../resource/"
    if (empty($_SESSION['id'])) 
    {
        // include "";
        header("Location: ../../../login/login.php");
    }
?>

<!--==========================
    Intro Section
  ============================-->
<section id="intro" class="clearfix">
    <div class="container">
        <h3 style="color:#fff;">&nbsp;<b> Report for Account Subscription </b></h3>
    </div>
</section>
  
<main id="main">
    <body>
        <?php 
            $query = "SELECT subcribe, count(*) as number FROM tblaccount WHERE ucategory='Student' GROUP BY subcribe";  
            $result = mysqli_query($connect, $query);
        ?>  
        <div class="container" style="background-color: pink;">
            <!-- Left Side -->
            <div style="display: inline-table; float:left">    
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
                <script type="text/javascript">  
                google.charts.load('current', {'packages':['corechart']});  
                google.charts.setOnLoadCallback(drawChart);  
                    function drawChart(){  
                        var data = google.visualization.arrayToDataTable([  
                            ['Subscribe', 'Number'],  
                            <?php  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    if($row['subcribe'] == "Yes"){
                                        $rows = "Subscribe";
                                        echo "['".$rows."', ".$row["number"]."],";  
                                    }
                                    if($row['subcribe'] == "No"){
                                        $rows = "Unsubscribe";
                                        echo "['".$rows."', ".$row["number"]."],";  
                                    }
                                }  
                            ?>  
                        ]);  
                        var options = {  
                            title: 'Percentage of Subscribe Account',  
                            //is3D:true,  
                            pieHole: 0.4  
                        };  
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                        chart.draw(data, options);  
                    }  
                </script>
                <br>
                <div style="width:600px;">   
                    <div id="piechart" style="width: 500px; height: 300px;"></div>  
               </div>  
            </div>

            <!-- Right Side -->
            <div style="display: inline-table; float:right">
                <div class="card">
                    <h5 style="margin-top:10px; margin-left:10px; margin-right:10px;"><center>Number of Subscribe/Unsubscribe Students</center></h5>
                    <h5><center>Total No. of Account: <b><u><?php echo get_alluser($connect)->num_rows; ?></u></b></center></h5>
                    <ul>
                        <li>Number of Subscribe Account: <b><u><?php echo get_subscribe($connect)->num_rows; ?></u></b></li>
                        <li>Number of Unsubscribe Account: <b><u><?php echo get_unsubscribe($connect)->num_rows; ?></b></u></li>
                    </ul>
                </div>
            </div>
        </div> 
    </body>
</main>