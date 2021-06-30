
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fa fa-comment-dots"></i>&nbsp;&nbsp;Feedbacks</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?=base_url('Admin')?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Feedbacks</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div> <!-- /.Content header -->
    
    <!-- Content Main-->
    <div class="content">
      <div class="container-fluid">

        <div class="row mt-3">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header row">
                <h2 class="card-title col">List of Feedbacks:</h2>
                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#add">+ Add new Feedback</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="bookdt" class="table table-bordered table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Feedback</th>
                      <th>Name & designation</th>
                      <th>Rating</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- display Data-->
                    <?php foreach ($data as $d){?>
                      <tr>
                        <td class=""><img src="<?=base_url('assets/clients/').$d->img_src?>" alt="" height="50"></td>
                        <td><?=substr($d->content,0,100)." . . ."?></td>
                        <td class=""><?=$d->name?> <br><small>(<?=$d->desig?>)</small> </td>
                        <td class=""><?=$d->rating?> </td>
                        <td>
                          <a href="<?=base_url('Delete/Feedback/'.$d->id)?>" onclick="confirmation(event)" class="btn del-btn btn-danger mb-1" title="Delete Feedback"><i class="fa fa-trash-alt"></i></a>
                          <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#edit<?=$d->id?>" title="Edit Feedback"><i class="fa fa-edit"></i></button>
                        </td>
                      </tr>

                      <!-- edit modal -->
                        <div class="modal fade" id="edit<?=$d->id?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"> <i class="fa fa-edit"></i> &nbsp; Edit Feedback:</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" action="<?=base_url()?>Edit/Feedback/<?=$d->id?>" enctype="multipart/form-data">
                                      <div class="row">
                                        <div class="form-group col-12">
                                          <label for="content" class="m-0">Feedback:</label>
                                          <p class="m-0 text-sm text-muted">(Max. 400 Characters)</p>
                                          <textarea name="content" id="content" minlength="1" maxlength="400" class="form-control mt-2" rows="5" required><?=$d->content?></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="name" class="m-0">Person name:</label>
                                          <p class="text-sm text-muted m-0">(Max. 40 Characters)</p>
                                          <input type="text" class="form-control mt-2" minlength="1" maxlength="40" name="name" value="<?=$d->name?>" id="name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="img" class="m-0">Person image: (Max size: 500kb)</label>
                                          <p class="text-sm text-muted m-0">( Choose only if you want to change the current image)</p>
                                          <div class="custom-file mt-2">
                                            <input type="file" class="custom-file-input" id="img" name="img">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                          </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="name" class="m-0">Designation:</label>
                                          <input type="text" class="form-control mt-2" minlength="1" maxlength="100" name="desig" value="<?=$d->desig?>" id="desig" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="name" class="m-0">Feedback rating:</label>
                                          <select name="rating" class="form-control mt-2">
                                            <option value="5" <?=$d->rating==5?' selected':''?>>5</option>
                                            <option value="4" <?=$d->rating==4?' selected':''?>>4</option>
                                            <option value="3" <?=$d->rating==3?' selected':''?>>3</option>
                                            <option value="2" <?=$d->rating==2?' selected':''?>>2</option>
                                            <option value="1" <?=$d->rating==1?' selected':''?>>1</option>
                                          </select>
                                        </div>
                                      </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-recycle"></i>&nbsp; Update</button>
                                    </form>
                                </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                      <!-- /edit modal -->

                    <?php }?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>

</div> <!-- /.Wrapper -->


 <!-- Add modal -->
  <div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">+ Add Feedback:</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form role="form" method="post" action="<?=base_url();?>Add/Feedback" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-12">
                    <label for="content" class="m-0">Feedback: *</label>
                    <p class="text-sm text-muted mt-0 mb-2">(Max. 400 Characters)</p>
                    <textarea name="content" id="content" class="form-control" minlength="1" maxlength="400" rows="5" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="name" class="m-0">Person Name: *</label>
                    <p class="text-sm text-muted">(Max. 40 Characters)</p>
                    <input type="text" class="form-control" name="name" maxlength="40" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="img" class="m-0">Person image:</label>
                  <p class="text-sm text-muted">( Max image size : 500kb )</p>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input m-0" id="img" name="img" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="name" class="m-0">Designation:</label>
                    <input type="text" class="form-control mt-2" minlength="1" maxlength="100" name="desig" id="desig" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name" class="m-0">Feedback rating:</label>
                  <select name="rating" class="form-control mt-2" required>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                  </select>
                </div>
              </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">+ Add</button>
            </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- /Add modal -->

<!-- DataTable assets -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>


<script>

// Init Datatable
  $(function () {
    $('#bookdt').DataTable({
      "pageLength": 10,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      // "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true
    });
  });


// Name of the file appearing on selecting image
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

</script>
