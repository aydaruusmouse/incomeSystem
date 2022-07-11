
loadData()

let actionType= "Insert";
//  
$('.btn').on('click', function(){
    $('#info-model').modal("show");
   
    
})
$("#btn").on('click', function (e) {
$(".tbody").html("");
 
    let data_form= new FormData($("#studentForm")[0]);
  if(actionType=="Insert"){
    data_form.append("action","Insert");
  }else{
    data_form.append("action","UpdateStudent");
  }

  console.log(data_form);
  $.ajax({
    method: "POST",
    dataType: "JSON",
    url: "api.php",
    data: data_form,
    processData: false,
    contentType: false,
    success: function (data) {
        let status= data.status;
        let respond= data.data;
        alert(respond);
        $("#studentForm")[0].reset();
        actionType="Insert";
        loadData();
        console.log(data);
    },
    error: function (data) {
        console.log(data);
    }

})

})

function  loadData() {

   
       let sendingData= {
           "action" : "ReadAll"
       }
    
       console.log(sendingData);
   
     $.ajax({
   
        method :"POST",
        dataType : "JSON",
        url: "api.php",
        data: sendingData,
        success: function (data) {
            let htmlTable;
            let respond= data;
          
            respond.forEach(list => {
                for(let key in list){
                    htmlTable= `
                   <tr>
                     <td>${list.Id}</td>
                     <td>${list.name}</td>
                     <td>${list.class}</td>
                     <td><a class="btn btn-primary update_info" update_id=${list.Id}>Update</a></td>
                     <td>  <a  class="btn btn-danger delete_id" delete_id=${list.Id}>Delete</a></td>
                     
               
                     
                   </tr>
                 `
                }
              $(".tbody").append(htmlTable);
            });
            
        },
        error: function (data) {
            
            console.log("error", data);
        }
   
       })
   }
   
   function  fecthData(id) {

   
    let sendingData= {
        "action" : "ReadStudent_info",
        "id" : id
    }
 
    console.log(sendingData);

  $.ajax({

     method :"POST",
     dataType : "JSON",
     url: "api.php",
     data: sendingData,
     success: function (data) {
    
         
         let respond= data;
         console.log(respond);
         if(respond){
            //  $("#id").val(respond[0].Id);
            //  $("#name").val(respond[0].name);
            //  $("#class").val(respond[0].class);
            respond.forEach(list =>{
                console.log(list);
               let id= list.Id;
               let name= list.name;
               let clases= list.class;
               $("#id").val(id);
               $("#name").val(name)
               $("#class").val(clases);
               
               
            })
            $('#info-model').modal("show");
            actionType="UpdateStudent";
         }
         
     },
    

    })
}
function  DeleteData(id) {
    
   
    let sendingData= {
        "action" : "DeleteStudent",
        "id" : id
    }
 
    console.log(sendingData);

  $.ajax({

     method :"POST",
     dataType : "JSON",
     url: "api.php",
     data: sendingData,
     success: function (data) {
    
         let status= data.status;
         let respond= data;
    
         if(status){
             alert("deleted")
           
         }
         
         
     },
    

    })
}
   $(".tbody").on("click","a.update_info", function () {

         let id= $(this).attr("update_id");
         console.log(id);
        // $('#info-model').modal("show");
        fecthData(id);
        
   
   })
   $(".tbody").on("click","a.delete_id", function () {

         let id= $(this).attr("delete_id");
         console.log(id);
        // $('#info-model').modal("show");
        if(confirm("are you sure to delete")){
            loadData();
            DeleteData(id);
            
        }
      
        
   
   })