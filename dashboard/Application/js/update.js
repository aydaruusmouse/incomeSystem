let btnAction= "Insert";

  
loadData()


$("#btn").on("click", function () {
    $("#info-model").modal("show");
})

$("#save").on("click", function(){
    $(".tbody").html("");
  
    let form_data= new FormData($("#studentForm")[0]);
    if(btnAction=="Insert"){
        form_data.append("action", "register_expence");
    } else{
        form_data.append("action", "update_expence");
    }
  
 
  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "../api/expence.php",
    data: form_data,
    processData: false,
    contentType: false,
    success: function (data) {
        console.log(data);
        let status= data.status;
        let respond= data.data;
        if(respond){
            DisplayMessage("success", respond);
            // $("#info-model").modal("hide");
            // $("#studentForm")[0].reset();
        }else{
            DisplayMessage("error", respond);
        }
        
        loadData();
    
        
      
    }
    

})
})
function  loadData() {

    $(".tbody").html("");
    let sendingData= {
        "action" : "read_expence"
    }
 
    

  $.ajax({

     method :"POST",
     dataType : "JSON",
     url: "../api/expence.php",
     data: sendingData,
     success: function (data) {
         let htmlTable;
         let respond= data;
         let html;
         let tr;
       if(respond){
            
         
                 respond.forEach(res => {
                   
                     for(let r in res) {
                         if(res[r].type=="income"){
                            tr+= ` <tr>

                            <td>${res[r].id}</td>
                            <td>${res[r].amount}</td>
                            <td><span class="badge badge-success">${res[r].type}</span></td>
                            <td>${res[r].description}</td>
                            <td>${res[r].date}</td>
                            <td><a href="#" class=" btn btn-primary update_info"  update_id=${res[r].id}><i class="fas fa-edit"></i></a></td>
                            <td><a href="#" class=" btn btn-danger delete_info"  delete_id=${res[r].id}> <i class="fas fa-trash"></i></a></td>
                         
                            
                      </tr>
                      
                      `
                         }else {
                            tr+= ` <tr>

                            <td>${res[r].id}</td>
                            <td>${res[r].amount}</td>
                            <td><span class="badge badge-danger">${res[r].type}</span></td>
                            <td>${res[r].description}</td>
                            <td>${res[r].date}</td>
                            <td><a href="#" class=" btn btn-primary update_info" update_id=${res[r].id}><i class="fas fa-edit"></i></a></td>
                            <td><a href="#" class=" btn btn-danger delete_info " delete_id=${res[r].id}><i class="fas fa-trash"></i></a></td>
                         
                            
                      </tr>
                      
                      `
                      
                         }
                    
                    

                     }
                  
                 });
                   $(".tbody").append(tr);
            
           
       }
           
         
         
     },
     error: function (data) {
         
         console.log("error ", data);
     }

    })
}
function  get_user_info(id) {

   
    let sendingData= {
        "action" : "get_user_info",
        "id": id
    }
 
    console.log(sendingData);

  $.ajax({

     method :"POST",
     dataType : "JSON",
     url: "../api/expence.php",
     data: sendingData,
     success: function (data) {
        
         let respond= data;

       if(respond){
           $("#update_id").val(respond.data['id']);
           console.log(respond.data);
           console.log(respond.data['amount']);
           $("#amount").val(respond.data['amount']);
           $("#type").val(respond.data['type']);
           $("#description").val(respond.data['description']);
           btnAction="update";
       }
     },
     error: function (data) {
         
         console.log("error ", data);
     }

    })
}
function  delete_info(id) {

   
    let sendingData= {
        "action" : "delete_info",
        "id": id
    }
 
    

  $.ajax({

     method :"POST",
     dataType : "JSON",
     url: "../api/expence.php",
     data: sendingData,
     success: function (data) {
        
         let respond= data;
         let status= data.status;
         console.log(respond);
         console.log(status);
        if(status){
            // swal("Good job!", "Your Deleted Succefully!", "success");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                    loadData();
                  swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  });
                } else {
                  swal("Your imaginary file is safe!");
                }
              });
            
            console.log("Deleted");
        }
     },
     error: function (data) {
         
         console.log("error ", data);
     }

    })
}

$("#table").on("click","a.update_info",function(){
    $("#info-model").modal("show");

    let id=$(this).attr("update_id");
    get_user_info(id);
    $("#update_id").val(id);
    
})
$("#table").on("click","a.delete_info",function(){

    let id=$(this).attr("delete_id");
     delete_info(id);
    
    
    
    console.log(id);
    
})

function DisplayMessage(type, message){
    let success= document.querySelector(".alert-success");
    let error=  document.querySelector(".alert-danger");
    if(type == "success"){
         error.classList="alert alert-danger d-none";
         success.classList="alert alert-success";
         success.innerHTML= message;
         setTimeout(function(){
            $("#info-model").modal("hide");
            $("#studentForm")[0].reset();
            success.classList="alert alert-success d-none";
         },3000)
    }else{
        error.classList="alert alert-danger";
        success.classList="alert alert-success d-none";
        error.innerHTML= message;
    }
}
$("#btn1").on('click', ()=>{
    console.log("clickedddd");
    $(".tbody").html("");
    let form_data= new FormData($("#studentForm")[0]);
   form_data.append("action", "register_expence");
  
   $.ajax({
     method: "POST",
     dataType: "JSON",
     url: "../api/expence.php",
     data: form_data,
     processData: false,
     contentType: false,
     success: function (data) {
         console.log(data);
         let status= data.status;
         let respond= data.data;
         if(respond){
             console.log(respond);
             DisplayMessage("success", respond);
             $("#info-model").modal("hide");
             $("#studentForm")[0].reset();
         }else{
             DisplayMessage("error", respond);
         }
         
         loadData();
     
         
       
     }
     
 
 })
 })
console.log("hello");
        

