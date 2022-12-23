   /* For Service Table */

   
   function getContactData(){
    axios.get('/getContactData')
    .then(function(response){

      if(response.status==200){

        $('#mainDivContact').removeClass('d-none')
        $('#ContactLoderDiv').addClass('d-none')

        $('#ContactDataTable').DataTable().destroy();
         

        var jsonData=response.data;
        $.each(jsonData,function(i,item){
          $("<tr>").html(
              '<td>'+jsonData[i].contact_name+'</td>'+
              "<td>"+jsonData[i].contact_mobile+"</td>"+
              "<td>"+jsonData[i].contact_email+"</td>"+
              "<td>"+jsonData[i].contact_meg+"</td>"+
              "<td><a class='contactDeleteBtn' data-id="+jsonData[i].id+"><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#contact_table')
        });
        
        /* Services Table Delete Icon Click */
        $('.contactDeleteBtn').click(function(){
         var id= $(this).data('id');
        $('#contactDeleteId').html(id);
        $('#contactDeleteModal').modal('show');
        });





      /* searche option and pagination */
      $(document).ready(function () {
$('#ContactDataTable').DataTable({"order":false});
$('.dataTables_length').addClass('bs-select');
});

      }else{
        $('#ContactLoderDiv').addClass('d-none')
        $('#ContactWrongDiv').removeClass('d-none')
        console.log(error.response)
      }

    }).catch(function(error){
      $('#ContactLoderDiv').addClass('d-none')
      $('#ContactWrongDiv').removeClass('d-none');
      console.log(error.response)
    })
}   

       /*  Services  Delete Model Yes Btn */
       $('#contactDeleteConfirmBtn').click(function(){
        var id= $('#contactDeleteId').html();
        ContactDelete(id);
      });



      /* Contact Delete */
function ContactDelete(deleteID){
  $('#contactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
  axios.post('/contactDelete',{id:deleteID})
  .then(function(response){
    $('#contactDeleteConfirmBtn').html("Yes");
    if(response.status==200){

      if(response.data=1){
        $('#contactDeleteModal').modal('hide');
        toastr.success('Delete success.');
        getContactData();
      }else{
        $('#contactDeleteModal').modal('hide');
        toastr.error('Delete Fail');
        getContactData();
      }
    }else{
      $('#contactDeleteModal').modal('hide');
      toastr.error("Something Went Wrong");
      
    }
}).catch(function(error){
    $('#contactDeleteModal').modal('hide');
    toastr.error("Something Went Wrong");
    
  })
}
