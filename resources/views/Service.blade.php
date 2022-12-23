@extends('Layout.app')

@section('content')

<div class="container d-none" id="mainDiv">
    <div class="row">
    <div class="col-md-12 p-5">
      <button id="addNewBunId" class="btn my-3 btn-sm btn-danger">Add New </button>
    <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Image</th>
          <th class="th-sm">Name</th>
          <th class="th-sm">Description</th>
          <th class="th-sm">Edit</th>
          <th class="th-sm">Delete</th>
        </tr>
      </thead>
      <tbody id="service_table">
    
        
        
      </tbody>
    </table>
    
    </div>
    </div>
    </div>


    <div id="loderDiv" class="container">
      <div class="row">
      <div class="col-md-12 p-5 text-center">
     
      <img class="loading-icon m-5" src="{{asset('images/loder.svg')}}" alt="">
      </div>
      </div>
      </div>


      <div id="WrongDiv" class="container d-none">
        <div class="row">
        <div class="col-md-12 p-5 text-center">
       
        <h2>Somthing Went Wrong !</h2>
        </div>
        </div>
        </div>

@endsection

<!-- Button trigger modal -->
{{-- <button
  type="button"
  class="btn btn-primary"
  data-mdb-toggle="modal"
  data-mdb-target="#exampleModal"
>
  Launch demo modal
</button> --}}

<!-- Modal -->
<div
  class="modal fade"
  id="deleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">
        <h5 class="mt-4">Do You Want To Delete ??</h5>
        <h5 id="serviceDeleteId" class="mt-4 d-none"></h5>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button  id="serviceDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">
          Yes
        </button>
      </div>
    </div>
  </div>
</div>





<div
  class="modal fade"
  id="editModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-3 text-center">
        <h5 id="serviceEditId" class="mt-4 d-none"></h5>
        
        <div id="serviceEditForm" class="w-100 d-none">
        <input id="serviceNameID" type="text" class="form-control mb-4" placeholder="Service Name">
        <input id="serviceDesID" type="text" class="form-control mb-4" placeholder="Service Description">
        <input id="serviceImgID" type="text" class="form-control mb-4" placeholder="Service Image Link">
      </div>
       
        <img id="serviceEditLoader" class="loading-icon m-5" src="{{asset('images/loder.svg')}}" alt="">
        <h4  id="serviceEditWrong" class="d-none">Somthing Went Wrong !</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button  id="serviceEditConfirmBtn" type="button" class="btn btn-sm btn-danger">
          Save
        </button>
      </div>
    </div>
  </div>
</div>




<div
  class="modal fade"
  id="addModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">
       
        <div id="serviceAddForm" class="w-100">
          <h5 class="mb-4">Add New Service</h5>
        <input id="serviceNameAddID" type="text" class="form-control mb-4" placeholder="Service Name">
        <input id="serviceDesAddID" type="text" class="form-control mb-4" placeholder="Service Description">
        <input id="serviceImgAddID" type="text" class="form-control mb-4" placeholder="Service Image Link">
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button  id="serviceAddConfirmBtn" type="button" class="btn btn-sm btn-danger">
          Save
        </button>
      </div>
    </div>
  </div>
</div>















@section('script')


<script type="text/javascript">
 
 
 getServicesData();

  /* For Service Table */
function getServicesData(){
    axios.get('/getServiceData')
    .then(function(response){

      if(response.status==200){

        $('#mainDiv').removeClass('d-none')
        $('#loderDiv').addClass('d-none')

        $('#serviceDataTable').DataTable().destroy();
        $('#service_table').empty();
        var jsonData=response.data;
        $.each(jsonData,function(i,item){
          $("<tr>").html(
              "<td><img class='table-img' src="+jsonData[i].service_img+"></td>"+
              '<td>'+jsonData[i].service_name+'</td>'+
              "<td>"+jsonData[i].service_des+"</td>"+
              "<td><a class='serviceEditBtn 'data-id="+jsonData[i].id+"  ><i class='fas fa-edit'></i></a></td>"+
              "<td><a class='serviceDeleteBtn' data-id="+jsonData[i].id+"><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#service_table')
        });
        
        /* Services Table Delete Icon Click */
        $('.serviceDeleteBtn').click(function(){
         var id= $(this).data('id');
        $('#serviceDeleteId').html(id);
        $('#deleteModal').modal('show');

        
        });




      /*   Service Table Edit Icon Click */
      $('.serviceEditBtn').click(function(){
        var id = $(this).data('id');
        $('#serviceEditId').html(id)
        ServiceUpdateDetails(id);
        $('#editModal').modal('show')
      })

      /* searche option and pagination */
      $(document).ready(function () {
$('#serviceDataTable').DataTable({"order":false});
$('.dataTables_length').addClass('bs-select');
});

      }else{
        $('#loderDiv').addClass('d-none')
        $('#WrongDiv').removeClass('d-none')
      }

    }).catch(function(error){
      $('#loderDiv').addClass('d-none')
      $('#WrongDiv').removeClass('d-none')
    })
}   

       /*  Services  Delete Model Yes Btn */
       $('#serviceDeleteConfirmBtn').click(function(){
        var id= $('#serviceDeleteId').html();
        ServiceDelete(id);
      });

/* service Delete */
function ServiceDelete(deleteID){
  $('#serviceDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
  axios.post('/ServiceDelete',{id:deleteID})
  .then(function(response){
    $('#serviceDeleteConfirmBtn').html("Yes");
    if(response.status==200){

      if(response.data=1){
        $('#deleteModal').modal('hide');
        toastr.success('Delete success.');
        getServicesData();
      }else{
        $('#deleteModal').modal('hide');
        toastr.error('Delete Fail');
        getServicesData();
      }
    }else{
      $('#deleteModal').modal('hide');
      toastr.error("Something Went Wrong");
    }
}).catch(function(error){
    $('#deleteModal').modal('hide');
    toastr.error("Something Went Wrong");
  })
}


/* Each Update Services Details */
function ServiceUpdateDetails(detailsID){
  axios.post('/ServiceDetails',{
    id:detailsID
  })
  .then(function(response){
    if(response.status==200){
      $('#serviceEditForm').removeClass('d-none');
      $('#serviceEditLoader').addClass('d-none');
  
      var jsonData= response.data;
      $('#serviceNameID').val(jsonData[0].service_name);
      $('#serviceDesID').val(jsonData[0].service_des);
      $('#serviceImgID').val(jsonData[0].service_img);
    }else{
      $('#serviceEditLoader').addClass('d-none');
      $('#serviceEditWrong').removeClass('d-none');
    }
  }).catch(function(error){
    $('#serviceEditLoader').addClass('d-none');
    $('#serviceEditWrong').removeClass('d-none');
  });
}


       /*  Services  Edit Model Save Btn */
       $('#serviceEditConfirmBtn').click(function(){
        var id= $('#serviceEditId').html();
        var name= $('#serviceNameID').val();
        var des= $('#serviceDesID').val();
        var img= $('#serviceImgID').val();
        ServiceUpdate(id,name,des,img);
      })

function ServiceUpdate(serviceID,serviceName,serviceDes,serviceImg){
  
 
   if(serviceName.length==0){
    toastr.error("Service Name is Empty");
  }
  
  else if(serviceDes.length==0){
    toastr.error("Service Description is Empty");
  }
  else if(serviceImg.length==0){
    toastr.error("Service Images is Empty");
  }else{

    $('#serviceEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
    axios.post('/ServiceUpdate',{
      id:serviceID,
      name:serviceName,
      des:serviceDes,
      img:serviceImg
    })
    .then(function(response){

      if(response.status==200){
        $('#serviceEditConfirmBtn').html("Save");
        if(response.data=1){
          $('#editModal').modal('hide');
          toastr.success('Update success.');
          getServicesData();
        }else{
          $('#editModal').modal('hide');
          toastr.error('Update Fail');
          getServicesData();
        } 
      }else{
        $('#editModal').modal('hide');
        toastr.error("Something Went Wrong");
      }

    }).catch(function(error){
      $('#editModal').modal('hide');
      toastr.error("Something Went Wrong")
    });
  }
  
 
}

// Service add new btn click

$('#addNewBunId').click(function(){

  $('#addModal').modal('show');
});

 /*  Services  Edit Model Save Btn */
 $('#serviceAddConfirmBtn').click(function(){
 
  var name= $('#serviceNameAddID').val();
  var des= $('#serviceDesAddID').val();
  var img= $('#serviceImgAddID').val();
  ServiceAdd(name,des,img);
})

// Service add Method 

function ServiceAdd(serviceName,serviceDes,serviceImg){
  
 
  if(serviceName.length==0){
   toastr.error("Service Name is Empty");
 }
 
 else if(serviceDes.length==0){
   toastr.error("Service Description is Empty");
 }
 else if(serviceImg.length==0){
   toastr.error("Service Images is Empty");
 }else{

   $('#serviceAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
   axios.post('/ServiceAdd',{
     name:serviceName,
     des:serviceDes,
     img:serviceImg
   })
   .then(function(response){

     $('#serviceAddConfirmBtn').html("Save");
     if(response.status==200){
       if(response.data=1){
         $('#addModal').modal('hide');
         toastr.success('Add success.');
         getServicesData();
         
       }else{
         $('#addModal').modal('hide');
         toastr.error('Add Fail');
         getServicesData();
       } 
     }else{
       $('#addModal').modal('hide');
       toastr.error("Something Went Wrong");
     }

   }).catch(function(error){
     $('#addModal').modal('hide');
     toastr.error("Something Went Wrong")
   });
 }
 

}
</script>
@endsection
