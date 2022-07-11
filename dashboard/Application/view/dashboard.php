<?php

   include '../config/conn.php';

// ?>
// <?php
//  $data= '';
//   $query = "SELECT id, amount, type, description FROM expence";
//   $result = $conn->query($query);
//   if($result){
//       while($row= $result->fetch_assoc()){
//          $data.= "{id= '".$row['id']."',amount = '".$row['amount']."', type= '".$row['type']."'},";
          
         
//       }
//   }else{
//       echo $conn->error;
//   }
// $data = substr($data, 0,-2);

// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<body>

<div class="main-body">
<div class="page-wrapper">
    <!-- [ Main Content ] start -->
    <div class="row">
        <!--[ daily sales section ] start-->
        <!--[ daily sales section ] end-->
        <!--[ Monthly  sales section ] starts-->
        <div class="col-md-6 col-xl-4">
            <div class="card Monthly-sales">
                <div class="card-block">
                    <h6 class="mb-4">Income</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-green f-30 m-r-10"></i>$
                            <?php
                            $data= array();

                                $query= "SELECT SUM(amount) FROM expence WHERE type='income'";
                                $result= $conn->query($query);
                              if($result){
                                  while($row=$result->fetch_assoc()){
                                        // $data[]= $row;
                                        // print_r($data[0]);
                                   echo $row['SUM(amount)'];
                                  }
                              }else{
                                  echo $conn->error;
                              }


                            ?>
                        </h3>
                        </div>
                        <div class="col-3 text-right">
                            <p class="m-b-0">36%</p>
                        </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                        <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!--[ Monthly  sales section ] end-->
        <!--[ year  sales section ] starts-->
        <div class="col-md-12 col-xl-4">
            <div class="card yearly-sales">
                <div class="card-block">
                    <h6 class="mb-4">Expence</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-red f-30 m-r-10"></i>$
                            <?php
                            $data= array();

                                $query= "SELECT SUM(amount) FROM expence WHERE type='expence'";
                                $result= $conn->query($query);
                              if($result){
                                  while($row=$result->fetch_assoc()){
                                        // $data[]= $row;
                                        // print_r($data[0]);
                                   echo $row['SUM(amount)'];
                                  }
                              }else{
                                  echo $conn->error;
                              }


                            ?>
                        </h3>
                        </div>
                        <div class="col-3 text-right">
                            <p class="m-b-0">80%</p>
                        </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card Monthly-sales">
                <div class="card-block">
                    <h6 class="mb-4">Total Balance</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-green f-30 m-r-10"></i>$
                            <?php
                            $data= array();

                                $query= "SELECT SUM(amount) FROM expence ";
                                $result= $conn->query($query);
                              if($result){
                                  while($row=$result->fetch_assoc()){
                                        // $data[]= $row;
                                        // print_r($data[0]);
                                   echo $row['SUM(amount)'];
                                  }
                              }else{
                                  echo $conn->error;
                              }


                            ?>
                        </h3>
                        </div>
                        <div class="col-3 text-right">
                            <p class="m-b-0">36%</p>
                        </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                        <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            
        </div>
        <!--[ year  sales section ] end-->
        <!--[ Recent Users ] start-->
  <div class="container" style="width: 54%; display: flex; margin: auto; margin-bottom: 100px; justify-content: center; align-items: center;">
  <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
        <canvas id="lineChart" style="width:100%;max-width:700px"></canvas>
  </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
   
<script>

    var xyValues = [
    {x:50, y:7},
    {x:60, y:8},
    {x:70, y:8},
    {x:80, y:9},
    {x:90, y:9},
    {x:100, y:9},
    {x:110, y:10},
    {x:120, y:11},
    {x:130, y:14},
    {x:140, y:14},
    {x:150, y:15}
  ];
  
  new Chart("myChart", {
    type: "scatter",
    data: {
      datasets: [{
        pointRadius: 4,
        pointBackgroundColor: "rgb(0,0,255)",
        data: xyValues
      }]
    },
    options: {
      legend: {display: false},
      scales: {
        xAxes: [{ticks: {min: 40, max:160}}],
        yAxes: [{ticks: {min: 6, max:16}}],
      }
    }
  });
  var xValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("lineChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    },{
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    },{
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});

</script>
</body>
</html>


<?php

include 'footer.php';




?>      