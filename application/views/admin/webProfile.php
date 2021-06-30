
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fa fa-globe"></i>&nbsp; <?=APP_NAME?> web profile:</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('Admin')?>">Home</a></li>
              <li class="breadcrumb-item active"><?=APP_NAME?>  profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container fluid -->
    </div><!-- /.Content Header -->

      <!-- Content Main -->
    <div class="content">
      <div class="container-fluid">
      
        <div class="row mb-2">
          <div class="col">
            <div class="card">
                <div class="card-body d-flex flex-wrap">
                    <div class="col">
                      <label class="label">E-mail:</label><br>
                      <span><?=$profile->email; ?></span> <br><br>
                      <label class="label">Contact no.:</label><br>
                      <span><?=$profile->phone1; ?></span> <br><br>
                      <label class="label">Contact no.: <span class="text-muted"> &nbsp;(Alt)</span></label><br>
                      <span><?=$profile->phone2; ?></span> <br><br>
                      <label class="label">Whatsapp no.:</label><br>
                      <span><?=$profile->whatsapp_no; ?></span> <br><br>
                      <label class="label">Address:</label><br>
                      <span><?=nl2br($profile->address_line1)  ?></span><br><br>
                    </div>
                    <div class="col">
                      <label class="label">Facebook link:</label><br>
                      <span><?=$profile->fblink; ?></span><br><br>
                      <!-- <label class="label">LinkedIn link:</label><br>
                      <span><?=$profile->linkedinlink; ?></span><br><br> -->
                      <label class="label">Instagram link:</label><br>
                      <span><?=$profile->instalink; ?></span><br><br>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#webproedit-modal"><i class="fa fa-edit" aria-hidden="true"></i> &nbsp; Edit Web profile </button>
                </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->

      </div><!-- /.container-fluid -->
    </div><!--/. Content Main -->

</div><!-- /.wrapper -->


<!-- edit Web profile modal -->
  <div class="modal fade " id="webproedit-modal">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp; Edit web profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form role="form" method="post" class="d-flex" action="<?php echo base_url();?>Edit/webProfile">
                  <div class="col">
                    <input type="text" class="form-control" name="id" id="id" value="<?=$profile->id; ?>" hidden>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?=$profile->email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone1">Contact no. :</label>
                        <input type="text" class="form-control" name="phone1" id="phone1" value="<?=$profile->phone1; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone2">Contact no. : <span class="text-muted">&nbsp;(Alt)</span> </label>
                        <input type="text" class="form-control" name="phone2" id="phone2" value="<?=$profile->phone2; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="whatsapp_no">Whatsapp no. : </label>
                        <input type="text" class="form-control" name="whatsapp_no" id="whatsapp_no" value="<?=$profile->whatsapp_no; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address_line1">Address:</label>
                        <textarea name="address_line1" id="address_line1" class="form-control" rows="6"><?=$profile->address_line1 ?></textarea>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                        <label for="fblink">Facebook link:</label>
                        <input type="url" class="form-control" name="fblink" id="fblink" value="<?=$profile->fblink;?>" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="instalink">LinkedIn Link:</label>
                        <input type="url" class="form-control" name="linkedinlink" id="linkedinlink" value="<?=$profile->linkedinlink;?>" required>
                    </div> -->
                    <div class="form-group">
                        <label for="instalink">Instagram Link:</label>
                        <input type="url" class="form-control" name="instalink" id="instalink" value="<?=$profile->instalink;?>" required>
                    </div>
                  </div>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" ><i class="fa fa-recycle"></i>&nbsp; Update</button>
              </form>
          </div>


      </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
<!-- /edit web profile modal -->
