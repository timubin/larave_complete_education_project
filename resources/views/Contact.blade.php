@extends('Layout.app')

@section('content')


<div id="mainDivContact" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-5">
    <table id="ContactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
         
          <th class="th-sm">Name</th>
          <th class="th-sm">Mobile</th>
          <th class="th-sm">Email</th>
          <th class="th-sm">Message</th>
          <th class="th-sm">Delete</th>
        </tr>
      </thead>
      <tbody id="contact_table">
        
      </tbody>
    </table>
    
    </div>
    </div>
    </div>



    <div id="ContactLoderDiv" class="container">
        <div class="row">
        <div class="col-md-12 p-5 text-center">
        <img class="loading-icon m-5" src="{{asset('images/loder.svg')}}" alt="">
       </div>
        </div>
        </div>
  
  
        <div id="ContactWrongDiv" class="container d-none">
          <div class="row">
          <div class="col-md-12 p-5 text-center">
          <h2>Somthing Went Wrong !</h2>
          </div>
          </div>
          </div>

 {{----------------------------- delete modal -----------------------}}
          <div
          class="modal fade"
          id="contactDeleteModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Do You Want To Delete ??</h5>
                <h5 id="contactDeleteId" class="mt-4 d-none"></h5>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">
                  No
                </button>
                <button  id="contactDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">
                  Yes
                </button>
              </div>
            </div>
          </div>
        </div>
        


@endsection

@section('script')

<script type="text/javascript">
getContactData()
</script>
@endsection