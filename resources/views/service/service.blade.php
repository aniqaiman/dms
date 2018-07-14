@extends('layout.master')
@section('style')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection
@section('content')

    <section class="content-header">
      <h1>
        Service
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Service</li>
      </ol>
    </section>

    <!-- Modal -->
    <div class="modal modal-info fade" id="add-service" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" >Add Service</h4>

          </div>
          <div class="modal-body">
                  <!-- Custom Tabs (Pulled to the right) -->

                  <form action="#" method="POST" id="frm-service-create" enctype ="multipart/form-data">
                  {!! csrf_field() !!}
                    <div class="row">
                        <div class="form-group">
                          <label for="tour_name" class="col-sm-3 control-label">Tour Name: </label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="tour_name" id="tour_name">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="tour_date" class="col-sm-3 control-label">Tour Date</label>
                          <div class="col-sm-9">
                          <input type="date" class="form-control" name="tour_date" id="tour_date">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="tour_pax" class="col-sm-3 control-label">Tour Pax</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="tour_pax" id="tour_pax">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="tour_cat" class="col-sm-3 control-label">Tour Category</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="tour_cat" id="tour_cat">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="tour_image" class="col-sm-3 control-label">Tour Image</label>
                          <div class="col-sm-9">
                          <input type="file" class="form-control" name="tour_image" id="tour_image">
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
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-service">Add Service</button></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="mailbox-controls">

                      </div>
                      <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped" id="service-table">
                          <thead>
                          <tr class="info">
                            <th><input type="checkbox"></th>
                            <th class="mailbox-star"><center><a href="#">Id</a></center></th>
                            <th class="mailbox-name"><center><a href="#">Service Category</a></center></th>
                            <th class="mailbox-name"><center><a href="#">Service Package</a></center></th>
                            <th class="mailbox-name"><center><a href="#">Service Date</a></center></th>
                            <th class="mailbox-name"><center><a href="#">Service Pax</a></center></th>
                            <th class="mailbox-name"><center><a href="#">Service Image</a></center></th>
                            <th class="mailbox-name"><center><a href="#">Operation</a></center></th>
                          </tr>
                          </thead>
                           
                           <tbody>        
                           @foreach($services as $service)
                          <tr class="info">
                            <td><input type="checkbox"></td>
                            <td class="mailbox-star"><center><a href="#">{{$service->service_id}}</a></center></td>
                            <td class="mailbox-name"><center><a href="#">{{$service->service_cat}}</a></center></td>
                            <td class="mailbox-date"><center><a href="#">{{$service->service_package}}</a></center></td>
                            <td class="mailbox-star"><center><a href="#">{{$service->service_date}}</a></center></td>
                            <td class="mailbox-star"><center><a href="#"></a>{{$service->service_pax}}</center></td>
                            <td class="mailbox-star"><center><a href="#"></a></center></td>
                            <td class="mailbox-name"><center><div class="btn-group"><a class="button btn btn-success btn-sm" href="#"></i> Edit</a>
                            </center>
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
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function(){
    $('#service-table').DataTable();
    $('#frm-service-create').on('submit',function(e)
    {
        e.preventDefault();
        console.log('pressed');
        var data = $(this).serialize();
        console.log(data);
        var formData = new FormData($(this)[0]);

        $.ajax(
        {
            url:"{{route('createService')}}", 
            type: "POST",
            data: formData,
            async: false,
            success: function(response)
            {
                console.log(response);
                 $("[data-dismiss = modal]").trigger({type: "click"});
            },
               cache: false,
               contentType: false,
               processData: false,
        });
    });
});

</script>
@endsection