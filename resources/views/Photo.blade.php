@extends('Layout.app')
@section('title')
Photo Gallery
@endsection
@section('content')

<div id="mainDivPhoto" class="container">
    <div class="row">
    <div class="col-md-12 p-5">
        <button id="addNewPhotoBtnId" class="btn my-3 btn-sm btn-danger">Add New </button> 
    </div>
    </div>
    </div>

<div  class="container">
    <div class="row photoRow">

 </div>

 <button class="btn btn-primary btn-sm" id="LoadMoreBtn">Load More</button>
</div>


    <div
  class="modal fade"
  id="PhotoModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-3 text-center">
        <h5 class="mt-4">Add New Photo</h5>
        <button type="button" class="close" data-mdb-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
       
      </div>
      <div class="modal-body">
            <input class="form-control" id="imgInput" type="file">
            <img class="imagePreview mt-2" id="imagePreview" src="" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
          Close
        </button>
        <button id="SavePhoto" type="button" class="btn btn-sm btn-danger">
          Save
        </button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script type="text/javascript">

/************* show modal  *********/
    $('#addNewPhotoBtnId').click(function(){
       $('#PhotoModal').modal('show');
       });

$('#imgInput').change(function (){
    var reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload=function(event){
       var ImgSourcs= event.target.result;
       $('#imagePreview').attr('src',ImgSourcs)
    }
});

$('#SavePhoto').on('click', function(){

  $('#SavePhoto').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
   var photoFile=$('#imgInput').prop('files')[0];
   var formData=new FormData();
    formData.append('photo',photoFile);
    axios.post('/PhotoUplod',formData).then(function(response){
      if(response.status==200 && response.data==1){
        $('#PhotoModal').modal('hide')
        $('#SavePhoto').html('Save');
      toastr.success('Photo Uplode success')
      }else{
        toastr.error('Photo Uplode Faild')
      }
      
    }).catch(function(error){
      $('#PhotoModal').modal('hide')
      toastr.error('Photo Uplode Faild')
      $('#SavePhoto').html('Save')
    })

})
LoadPhoto()

function LoadPhoto(){
  let URL="/PhotoJSON"
  axios.get(URL).then(function(response){

  $.each(response.data, function(i,item){
    $("<div class='col-md-3 p-1'>").html(
      "<img data-id="+item['id']+" class='imageRow' src="+item['location']+ ">"+
      "<button data-id="+item['id']+" data-photo="+item['location']+" class='btn deletePhoto btn-sm'>Delete</button>"
    ).appendTo('.photoRow');
  });

  $('.deletePhoto').on('click',function(event){
    let id = $(this).data('id');
    let photo = $(this).data('photo');
    photoDelete(photo,id);

    event.preventDefault();
  })
  }).catch(function (error){
    console.log(error);
  })
}
var imgID =0;
function LoadByID(FirstImgId,loadMoreBtn){
 let imgID=FirstImgId+8;
 let PhotoId =imgID + FirstImgId;
  let URL="/PhotoJSONByID/"+imgID;
  loadMoreBtn.html("<div class='spinner-border spinner-border-sm' role='status'></div>")
  axios.get(URL).then(function(response){
    loadMoreBtn.html("Load More")
  $.each(response.data, function(i,item){
    $("<div class='col-md-3 p-1'>").html(
      "<img data-id="+item['id']+" class='imageRow' src="+item['location']+ ">" +
      "<button data-id="+item['id']+" data-photo="+item['location']+" class='btn btn-sm'>Delete</button>"
    ).appendTo('.photoRow');
  });

  }).catch(function (error){
    console.log(error);
  })
}

$('#LoadMoreBtn').on('click',function(){
  var loadMoreBtn=$(this);
  var FirstID= $(this).closest('div').find('img').data('id');
LoadByID(FirstID,loadMoreBtn)
})

function photoDelete(OldPhotoURL,id){

  let URL="/photoDelete";
  let MyFormData = new FormData();
  MyFormData.append('OldPhotoURL',OldPhotoURL);
  MyFormData.append('id',id);

  axios.post(URL,MyFormData).then(function(response){
    if(response.status==200 && response.data==1){
      toastr.success('Photo Delete Success');
     window.location.href="/photo";
     
    }else{
      toastr.error('Delete Faild Try Again');
      
    }
  }).catch(function(error){
    toastr.error('Delete Faild Try Again');

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
    console.log(error.config);

  })
}


</script>
@endsection

