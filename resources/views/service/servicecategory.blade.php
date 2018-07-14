@extends('layout.master')
@section('style')
@endsection
@section('content')

<section class="content-header">
      <h1>
        Service
        <small>Category</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Category</li>
      </ol>
    </section>

      <div class="modal modal-info fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Category</h4>
          </div>
          
          <div class="modal-body">
                  <!-- Custom Tabs (Pulled to the right) -->
                  <form action="#" method="POST" id="frm-category-create" enctype ="multipart/form-data">
                  {!! csrf_field() !!}
                    <div class="row">

                      <div class="form-group">
                          <label for="category" class="col-sm-3 control-label">Service Category: </label>                      
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="category" id="category">
                          </div>
                      </div>

                  </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="col-md-12">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs ">
            <li class="active"><a href="#tab_1" data-toggle="tab">Active</a></li>
            <li class="pull-right"> 
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-category">Add Category</button></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      
                      <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped" id="delivery-table">
                
                          <tbody>
  
                          <tr class="info">
                            <th><input type="checkbox"></th>
                            <th class="mailbox-subject"><center><a>Category Name</a></center></th>
                            <th class="mailbox-subject"><center><a>Operation</a></center></th>
                          </tr>

                          @foreach($servicecategories as $category)
                          <tr class="info">
                            <td><input type="checkbox"></td>
                            <td class="mailbox-subject"><center><a href="#">{{$category->servicecat_name}}</a></center></td>
                            <td class="mailbox-name"><center><div class="btn-group"><a class="button btn btn-success btn-sm" href="#"></i> Edit</a>
                            </center>
                            </td>
                         </tr>
                         @endforeach
                         
                          </tbody>

                        </table>
                        <!-- /.table -->
                      </div>
                      <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.tab-pane -->
            
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      </div>
      <!-- Main content -->
    </section>
@endsection

@section('script')
<script>

$('#frm-category-create').on('submit',function(e){
  e.preventDefault();
  console.log('pressed');
  var data = $(this).serialize();
  console.log(data);
  var formData = new FormData($(this)[0]);

  $.ajax({
    url: "{{route('createServiceCategory')}}",
    type: "POST",
    data: formData,
    async: false,
    success: function(response){
    console.log(response);
     $("[data-dismiss = modal]").trigger({type: "click"});

        },
        cache: false,
        contentType: false,
        processData: false
  });
});

</script>
@endsection