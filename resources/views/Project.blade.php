@extends('Layout.app')

@section('content')

<div class="container d-none" id="projectMainDiv">
    <div class="row">
    <div class="col-md-12 p-5">
      <button id="addNewProjectBtn" class="btn my-3 btn-sm btn-danger">Add New </button>
    <table id="projectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Image</th>
          <th class="th-sm">Name</th>
          <th class="th-sm">Description</th>
          <th class="th-sm">Link</th>
          <th class="th-sm">Edit</th>
          <th class="th-sm">Delete</th>
        </tr>
      </thead>
      <tbody id="project_table">
    
        
        
      </tbody>
    </table>
    
    </div>
    </div>
    </div>


    <div id="projectLoderDiv" class="container">
      <div class="row">
      <div class="col-md-12 p-5 text-center">
     
      <img class="loading-icon m-5" src="{{asset('images/loder.svg')}}" alt="">
      </div>
      </div>
      </div>


      <div id="projectWrongDiv" class="container d-none">
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
  id="projectDeleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">
        <h5 class="mt-4">Do You Want To Delete ??</h5>
        <h5 id="projectDeleteId" class="mt-4 d-none"></h5>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button  id="projectDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">
          Yes
        </button>
      </div>
    </div>
  </div>
</div>





<div
  class="modal fade"
  id="projectEditModal"
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
        <h5 id="projectEditId" class="mt-4 d-none"></h5>
        
        <div id="projectEditForm" class="w-100 d-none">
        <input id="projectNameID" type="text" class="form-control mb-4" placeholder="Project Name">
        <input id="projectDesID" type="text" class="form-control mb-4" placeholder="Project Description">
        <input id="projectLinkID" type="text" class="form-control mb-4" placeholder="Project Description">
        <input id="projectImgID" type="text" class="form-control mb-4" placeholder="Project Image Link">
      </div>
       
        <img id="projectEditLoader" class="loading-icon m-5" src="{{asset('images/loder.svg')}}" alt="">
        <h4  id="projectEditWrong" class="d-none">Somthing Went Wrong !</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button  id="projectEditConfirmBtn" type="button" class="btn btn-sm btn-danger">
          Save
        </button>
      </div>
    </div>
  </div>
</div>




<div
  class="modal fade"
  id="projectAddModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">
       
        <div id="projectAddForm" class="w-100">
          <h5 class="mb-4">Add New Project</h5>
        <input id="projectNameAddID" type="text" class="form-control mb-4" placeholder="Project Name">
        <input id="projectDesAddID" type="text" class="form-control mb-4" placeholder="Project Description">
        <input id="projectLinkAddID" type="text" class="form-control mb-4" placeholder="Project Link">
        <input id="projectImgAddID" type="text" class="form-control mb-4" placeholder="Project Image Link">
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button  id="projectAddConfirmBtn" type="button" class="btn btn-sm btn-danger">
          Save
        </button>
      </div>
    </div>
  </div>
</div>


@section('script')


<script type="text/javascript">
 
 
 getProjectData();

   /* For Service Table */
   function getProjectData(){
    axios.get('/getProjectData')
    .then(function(response){

      if(response.status==200){

        $('#projectMainDiv').removeClass('d-none')
        $('#projectLoderDiv').addClass('d-none')

        $('#projectDataTable').DataTable().destroy();
        $('#project_table').empty();
        var jsonData=response.data;
        $.each(jsonData,function(i,item){
          $("<tr>").html(
              "<td><img class='table-img' src="+jsonData[i].project_img+"></td>"+
              '<td>'+jsonData[i].project_name+'</td>'+
              "<td>"+jsonData[i].project_des+"</td>"+
              "<td>"+jsonData[i].project_link+"</td>"+
              "<td><a class='projectEditBtn 'data-id="+jsonData[i].id+"  ><i class='fas fa-edit'></i></a></td>"+
              "<td><a class='projectDeleteBtn' data-id="+jsonData[i].id+"><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#project_table')
        });
        
        /* Services Table Delete Icon Click */
        $('.projectDeleteBtn').click(function(){
         var id= $(this).data('id');
        $('#projectDeleteId').html(id);
        $('#projectDeleteModal').modal('show');
        });




      /*   Service Table Edit Icon Click */
      $('.projectEditBtn').click(function(){
        var id = $(this).data('id');
        $('#projectEditId').html(id)
        ProjectUpdateDetails(id);
        $('#projectEditModal').modal('show')
      })

      /* searche option and pagination */
      $(document).ready(function () {
$('#projectDataTable').DataTable({"order":false});
$('.dataTables_length').addClass('bs-select');
});

      }else{
        $('#projectLoderDiv').addClass('d-none')
        $('#projectWrongDiv').removeClass('d-none')
        console.log(error.response)
      }

    }).catch(function(error){
      $('#projectLoderDiv').addClass('d-none')
      $('#projectWrongDiv').removeClass('d-none');
      console.log(error.response)
    })
}   

       /*  Services  Delete Model Yes Btn */
       $('#projectDeleteConfirmBtn').click(function(){
        var id= $('#projectDeleteId').html();
        ProjectDelete(id);
      });

/* Project Delete */
function ProjectDelete(deleteID){
  $('#projectDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
  axios.post('/ProjectDelete',{id:deleteID})
  .then(function(response){
    $('#projectDeleteConfirmBtn').html("Yes");
    if(response.status==200){

      if(response.data=1){
        $('#projectDeleteModal').modal('hide');
        toastr.success('Delete success.');
        getProjectData();
      }else{
        $('#projectDeleteModal').modal('hide');
        toastr.error('Delete Fail');
        getProjectData();
      }
    }else{
      $('#projectDeleteModal').modal('hide');
      toastr.error("Something Went Wrong");
      
    }
}).catch(function(error){
    $('#projectDeleteModal').modal('hide');
    toastr.error("Something Went Wrong");
    
  })
}


/* Each Update Project Details */
function ProjectUpdateDetails(detailsID){
  axios.post('/getProjectDetails',{
    id:detailsID
  })
  .then(function(response){
    if(response.status==200){
      $('#projectEditForm').removeClass('d-none');
      $('#projectEditLoader').addClass('d-none');
  
      var jsonData= response.data;
      $('#projectNameID').val(jsonData[0].project_name);
      $('#projectDesID').val(jsonData[0].project_des);
      $('#projectLinkID').val(jsonData[0].project_link);
      $('#projectImgID').val(jsonData[0].project_img);
    }else{
      $('#projectEditLoader').addClass('d-none');
      $('#projectEditWrong').removeClass('d-none');
    }
  }).catch(function(error){
    $('#projectEditLoader').addClass('d-none');
    $('#projectEditWrong').removeClass('d-none');
  });
}


       /*  Services  Edit Model Save Btn */
       $('#projectEditConfirmBtn').click(function(){
        var id= $('#projectEditId').html();
        var name= $('#projectNameID').val();
        var des= $('#projectDesID').val();
        var link= $('#projectLinkID').val();
        var img= $('#projectImgID').val();
        ProjectUpdate(id,name,des,link,img);
      })

function ProjectUpdate(ProjectID,projectName,projectDes,projectLink,projectImg){
  
 
   if(projectName.length==0){
    toastr.error("Service Name is Empty");
  }
  
  else if(projectDes.length==0){
    toastr.error("Service Description is Empty");
  }
  else if(projectLink.length==0){
    toastr.error("project Link is Empty");
  }
  else if(projectImg.length==0){
    toastr.error("Service Images is Empty");
  }else{

    $('#projectEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
    axios.post('/ProjectUpdate',{
      id:ProjectID,
      name:projectName,
      des:projectDes,
      link:projectLink,
      img:projectImg
    })
    .then(function(response){

      if(response.status==200){
        $('#projectEditConfirmBtn').html("Save");
        if(response.data=1){
          $('#projectEditModal').modal('hide');
          toastr.success('Update success.');
          getProjectData();
        }else{
          $('#projectEditModal').modal('hide');
          toastr.error('Update Fail');
          getProjectData();
        } 
      }else{
        $('#projectEditModal').modal('hide');
        toastr.error("Something Went Wrong");
        console.log(error.response)
      }

    }).catch(function(error){
      $('#projectEditModal').modal('hide');
      toastr.error("Something Went Wrong")
      
      if (error.response) {
      // The request was made and the server responded with a status code
      // that falls out of the range of 2xx
      console.log(error.response.data);
      console.log(error.response.status);
      console.log(error.response.headers);
    } else if (error.request) {
      // The request was made but no response was received
      // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
      // http.ClientRequest in node.js
      console.log(error.request);
    } else {
      // Something happened in setting up the request that triggered an Error
      console.log('Error', error.message);
    }


    });
  }
  
 
}

// Service add new btn click

$('#addNewProjectBtn').click(function(){

  $('#projectAddModal').modal('show');
});

 /*  Services  Edit Model Save Btn */
 $('#projectAddConfirmBtn').click(function(){
 
  var name= $('#projectNameAddID').val();
  var des= $('#projectDesAddID').val();
  var link= $('#projectLinkAddID').val();
  var img= $('#projectImgAddID').val();
  ProjectAdd(name,des,link,img);
})

// Service add Method 

function ProjectAdd(projectName,projectDes,projectLink,projectImg){
  
 
  if(projectName.length==0){
   toastr.error("Project Name is Empty");
 }
 
 else if(projectDes.length==0){
   toastr.error("Project Description is Empty");
 }
 else if(projectLink.length==0){
   toastr.error("Project Description is Empty");
 }
 else if(projectImg.length==0){
   toastr.error("Project Images is Empty");
 }else{

   $('#projectAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
   axios.post('/ProjectAdd',{
     name:projectName,
     des:projectDes,
     link:projectLink,
     img:projectImg
   })
   .then(function(response){

     $('#projectAddConfirmBtn').html("Save");
     if(response.status==200){
       if(response.data=1){
         $('#projectAddModal').modal('hide');
         toastr.success('Add success.');
         getProjectData();
         
       }else{
         $('#projectAddModal').modal('hide');
         toastr.error('Add Fail');
         getProjectData();
       } 
     }else{
       $('#projectAddModal').modal('hide');
       toastr.error("Something Went Wrong");
     
     }

   }).catch(function(error){
     $('#projectAddModal').modal('hide');
     toastr.error("Something Went Wrong");

     if (error.response) {
      // The request was made and the server responded with a status code
      // that falls out of the range of 2xx
      console.log(error.response.data);
      console.log(error.response.status);
      console.log(error.response.headers);
    } else if (error.request) {
      // The request was made but no response was received
      // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
      // http.ClientRequest in node.js
      console.log(error.request);
    } else {
      // Something happened in setting up the request that triggered an Error
      console.log('Error', error.message);
    }
    
     
   });
 }
 

}

</script>
@endsection
