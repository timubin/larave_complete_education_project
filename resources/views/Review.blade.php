@extends('Layout.app')
@section('title')
Review 
@endsection
@section('content')


<div class="container d-none" id="ReviewMainDiv">
    <div class="row">
    <div class="col-md-12 p-5">
      <button id="ReviewAddNewBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>
    <table id="ReviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Image</th>
          <th class="th-sm">Name</th>
          <th class="th-sm">Description</th>
          <th class="th-sm">Edit</th>
          <th class="th-sm">Delete</th>
        </tr>
      </thead>
      <tbody id="review_table">
    
        
        
      </tbody>
    </table>
    
    </div>
    </div>
    </div>


    <div id="ReviewLoderDiv" class="container">
      <div class="row">
      <div class="col-md-12 p-5 text-center">
     
      <img class="loading-icon m-5" src="{{asset('images/loder.svg')}}" alt="">
      </div>
      </div>
      </div>


      <div id="ReviewWrongDiv" class="container d-none">
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
  id="ReviewDeleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">
        <h5 class="mt-4">Do You Want To Delete ??</h5>
        <h5 id="ReviewServiceDeleteId" class="mt-4 d-none"></h5>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button  id="ReviewDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">
          Yes
        </button>
      </div>
    </div>
  </div>
</div>





<div
  class="modal fade"
  id="ReviewEditModal"
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
        <h5 id="ReviewEditId" class="mt-4 d-none"></h5>
        
        <div id="ReviewEditForm" class="w-100 d-none">
        <input id="ReviewNameID" type="text" class="form-control mb-4" placeholder="Service Name">
        <input id="ReviewDesID" type="text" class="form-control mb-4" placeholder="Service Description">
        <input id="ReviewImgID" type="text" class="form-control mb-4" placeholder="Service Image Link">
      </div>
       
        <img id="ReviewEditLoader" class="loading-icon m-5" src="{{asset('images/loder.svg')}}" alt="">
        <h4  id="ReviewEditWrong" class="d-none">Somthing Went Wrong !</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button  id="ReviewEditConfirmBtn" type="button" class="btn btn-sm btn-danger">
          Save
        </button>
      </div>
    </div>
  </div>
</div>




<div
  class="modal fade"
  id="ReviewAddModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">
       
        <div id="ReviewServiceAddForm" class="w-100">
          <h5 class="mb-4">Add New Service</h5>
        <input id="ReviewNameAddID" type="text" class="form-control mb-4" placeholder="Service Name">
        <input id="ReviewDesAddID" type="text" class="form-control mb-4" placeholder="Service Description">
        <input id="ReviewImgAddID" type="text" class="form-control mb-4" placeholder="Service Image Link">
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          No
        </button>
        <button  id="ReviewAddConfirmBtn" type="button" class="btn btn-sm btn-danger">
          Save
        </button>
      </div>
    </div>
  </div>
</div>















@section('script')


<script type="text/javascript">
 
 
  getReviewsData();

  /* For Service Table */
function  getReviewsData(){
    axios.get('/getReviewData')
    .then(function(response){

      if(response.status==200){

        $('#ReviewMainDiv').removeClass('d-none')
        $('#ReviewLoderDiv').addClass('d-none')

        $('#ReviewDataTable').DataTable().destroy();
        $('#review_table').empty();
        var jsonData=response.data;
        $.each(jsonData,function(i,item){
          $("<tr>").html(
              "<td><img class='table-img' src="+jsonData[i].img+"></td>"+
              '<td>'+jsonData[i].name+'</td>'+
              "<td>"+jsonData[i].des+"</td>"+
              "<td><a class='ReviewEditBtn 'data-id="+jsonData[i].id+"  ><i class='fas fa-edit'></i></a></td>"+
              "<td><a class='ReviewDeleteBtn' data-id="+jsonData[i].id+"><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#review_table')
        });
        
        /* Services Table Delete Icon Click */
        $('.ReviewDeleteBtn').click(function(){
         var id= $(this).data('id');
        $('#ReviewServiceDeleteId').html(id);
        $('#ReviewDeleteModal').modal('show');

        
        });




      /*   Service Table Edit Icon Click */
      $('.ReviewEditBtn').click(function(){
        var id = $(this).data('id');
        $('#ReviewEditId').html(id)
        ReviewUpdateDetails(id);
        $('#ReviewEditModal').modal('show')
      })

      /* searche option and pagination */
      $(document).ready(function () {
$('#ReviewDataTable').DataTable({"order":false});
$('.dataTables_length').addClass('bs-select');
});

      }else{
        $('#ReviewLoderDiv').addClass('d-none')
        $('#ReviewWrongDiv').removeClass('d-none')
      }

    }).catch(function(error){
      $('#ReviewLoderDiv').addClass('d-none')
      $('#ReviewWrongDiv').removeClass('d-none')
    })
}   

       /*  Services  Delete Model Yes Btn */
       $('#ReviewDeleteConfirmBtn').click(function(){
        var id= $('#ReviewServiceDeleteId').html();
        ReviewDelete(id);
      });

/* service Delete */
function ReviewDelete(deleteID){
  $('#ReviewDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
  axios.post('/ReviewDelete',{id:deleteID})
  .then(function(response){
    $('#ReviewDeleteConfirmBtn').html("Yes");
    if(response.status==200){

      if(response.data=1){
        $('#ReviewDeleteModal').modal('hide');
        toastr.success('Delete success.');
         getReviewsData();
      }else{
        $('#ReviewDeleteModal').modal('hide');
        toastr.error('Delete Fail');
         getReviewsData();
      }
    }else{
      $('#ReviewDeleteModal').modal('hide');
      toastr.error("Something Went Wrong");
    }
}).catch(function(error){
    $('#ReviewDeleteModal').modal('hide');
    toastr.error("Something Went Wrong");
  })
}


/* Each Update Services Details */
function ReviewUpdateDetails(detailsID){
  axios.post('/ServiceDetails',{
    id:detailsID
  })
  .then(function(response){
    if(response.status==200){
      $('#ReviewEditForm').removeClass('d-none');
      $('#ReviewEditLoader').addClass('d-none');
  
      var jsonData= response.data;
      $('#ReviewNameID').val(jsonData[0].service_name);
      $('#ReviewDesID').val(jsonData[0].service_des);
      $('#ReviewImgID').val(jsonData[0].service_img);
    }else{
      $('#ReviewEditLoader').addClass('d-none');
      $('#ReviewEditWrong').removeClass('d-none');
    }
  }).catch(function(error){
    $('#ReviewEditLoader').addClass('d-none');
    $('#ReviewEditWrong').removeClass('d-none');
  });
}


       /*  Services  Edit Model Save Btn */
       $('#ReviewEditConfirmBtn').click(function(){
        var id= $('#ReviewEditId').html();
        var name= $('#ReviewNameID').val();
        var des= $('#ReviewDesID').val();
        var img= $('#ReviewImgID').val();
        ReviewUpdate(id,name,des,img);
      })

function ReviewUpdate(serviceID,serviceName,serviceDes,serviceImg){
  
 
   if(serviceName.length==0){
    toastr.error("Service Name is Empty");
  }
  
  else if(serviceDes.length==0){
    toastr.error("Service Description is Empty");
  }
  else if(serviceImg.length==0){
    toastr.error("Service Images is Empty");
  }else{

    $('#ReviewEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
    axios.post('/ReviewUpdate',{
      id:serviceID,
      name:serviceName,
      des:serviceDes,
      img:serviceImg
    })
    .then(function(response){

      if(response.status==200){
        $('#ReviewEditConfirmBtn').html("Save");
        if(response.data=1){
          $('#ReviewEditModal').modal('hide');
          toastr.success('Update success.');
           getReviewsData();
        }else{
          $('#ReviewEditModal').modal('hide');
          toastr.error('Update Fail');
           getReviewsData();
        } 
      }else{
        $('#ReviewEditModal').modal('hide');
        toastr.error("Something Went Wrong");
      }

    }).catch(function(error){
      $('#ReviewEditModal').modal('hide');
      toastr.error("Something Went Wrong")
    });
  }
  
 
}

// Service add new btn click

$('#ReviewAddNewBtnId').click(function(){

  $('#ReviewAddModal').modal('show');
});

 /*  Services  Edit Model Save Btn */
 $('#ReviewAddConfirmBtn').click(function(){
 
  var name= $('#ReviewNameAddID').val();
  var des= $('#ReviewDesAddID').val();
  var img= $('#ReviewImgAddID').val();
  ReviewAdd(name,des,img);
})

// Service add Method 

function ReviewAdd(serviceName,serviceDes,serviceImg){
  
 
  if(serviceName.length==0){
   toastr.error("Service Name is Empty");
 }
 
 else if(serviceDes.length==0){
   toastr.error("Service Description is Empty");
 }
 else if(serviceImg.length==0){
   toastr.error("Service Images is Empty");
 }else{

   $('#ReviewAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animition......
   axios.post('/ReviewAdd',{
     name:serviceName,
     des:serviceDes,
     img:serviceImg
   })
   .then(function(response){

     $('#ReviewAddConfirmBtn').html("Save");
     if(response.status==200){
       if(response.data=1){
         $('#ReviewAddModal').modal('hide');
         toastr.success('Add success.');
          getReviewsData();
         
       }else{
         $('#ReviewAddModal').modal('hide');
         toastr.error('Add Fail');
          getReviewsData();
       } 
     }else{
       $('#ReviewAddModal').modal('hide');
       toastr.error("Something Went Wrong");
     }

   }).catch(function(error){
     $('#ReviewAddModal').modal('hide');
     toastr.error("Something Went Wrong")
   });
 }
 

}
</script>
@endsection
