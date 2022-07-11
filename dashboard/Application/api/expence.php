<?php

header('Content-type: application/json');

include "../config/conn.php";
// $action= $_POST['action'];

function register_expence($conn){
       $data= array();
       extract($_POST);
    //    $amount= $_POST['amount'];
    //    $type= $_POST['type'];
    //    $description= $_POST['description'];
    //    $user_Id= $_POST['user_Id'];
    //    $query= "CALL Register_expence_sp('','$amount', '$type', '$description', 'user2022')";
    $query= "CALL Register_expence_sp('','$amount', '$type', '$description','user2022')";
       $result= $conn->query($query);
       if($result){
           $row= $result->fetch_assoc();
           if($row['Message']== 'Deny'){
            $data= array("status"=> false, "data"=> "hadhaagagu kuguma filna");
           } elseif($row['Message']=='Registered'){
            $data= array("status"=> true, "data"=> "register succesfully");
           }
       
       }else{
           $data= array("status"=> false, "data"=> $conn->error);
       }
       echo json_encode($data);
}
function update_expence($conn){
    $data= array();
    extract($_POST);
    // $id= $_POST['id'];
 //    $amount= $_POST['amount'];
 //    $type= $_POST['type'];
 //    $description= $_POST['description'];
 //    $user_Id= $_POST['user_Id'];
    $query= "CALL Register_expence_sp('27','$amount', '$type', '$description', 'user2022')";
    $result= $conn->query($query);
    if($result){
        $row= $result->fetch_assoc();
        if($row['Message']== 'Updated'){
         $data= array("status"=> true, "data"=> "Update Succesfully");
        // } elseif($row['Message']=='Registered'){
        //  $data= array("status"=> true, "data"=> "register succesfully");
        // }
        }
    
    }else{
        $data= array("status"=> false, "data"=> $conn->error);
    }
    echo json_encode($data);
}

function read_expence($conn){
    $data= array();
    $query= "SELECT * FROM expence";
    $result= $conn->query($query);
    if($result){
        while ($row=$result->fetch_assoc()) {
            $data[]= $row;
            # code...
        }
     $data= array($data);
    }else{
        $data= array("status"=> false, "data"=> "error occured");
    }
    echo json_encode($data);
}

if(isset($_POST['action'])){
   $action = $_POST['action'];
   $action($conn);
}else {
  
    echo json_encode(array("status"=> true, "Data"=> "Action is Required"));
}





function get_user_info($conn){
    $data= array();
    $id = $_POST['id'];
    
    $query= "SELECT * FROM expence where id='$id'";
    $result= $conn->query($query);
    if($result){
        $row= $result->fetch_assoc();
        $data = array("status"=> true, "data"=> $row);
    
    }else{
        $data= array("status"=> false, "data"=> "error occured");
    }
    echo json_encode($data);
}
function delete_info($conn){
    $data= array();
    $id = $_POST['id'];
    
    $query= "DELETE  FROM expence where id='$id'";
    $result= $conn->query($query);
    if($result){
    
        $data = array("status"=> true, "data"=> "delete");
    
    }else{
        $data= array("status"=> false, "data"=> "error occured");
    }
    echo json_encode($data);
}

function income($conn){
    
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


}

?>