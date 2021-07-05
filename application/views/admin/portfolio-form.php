

<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="ml-2 text-dark"><?= isset($data) ? '<i class="fas fa-edit"></i>&nbsp;&nbsp;Edit work' : '+&nbsp;&nbsp;Add work' ?></h4>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=base_url('Admin/Portfolio')?>">Works</a></li>
                <li class="breadcrumb-item active"><?= isset($data) ? 'Edit' : 'Add new' ?> work</li>
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
                <div class="card-body">
                    <form role="form" method="post" action="<?= isset($data) ? base_url('Edit/updatePortfolio/'.$data->id) : base_url('Add/savePortfolio') ?>" enctype="multipart/form-data">
                     
                        <div class="row mb-4">
                            <div class="form-group col-md-12">
                                <label for="name" class="text-sm mr-2 pt-2">Work title <span class="text-danger">*</span> :</label>
                                <input type="text" value="<?= isset($data) ? $data->title: '' ?>" class="form-control" name="title" id="title" required>
                            </div>

                            <!-- <div class="form-group col-md-6">
                                <label for="img" class="text-sm mr-2 pt-2">Image <?= isset($data) ? '' : '<span class="text-danger">*</span>' ?> :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" accept=".png, .jpg, .jpeg, .gif, .bmp, .svg" name="img" <?= isset($data) ? '' : 'required' ?>>
                                    <label class="custom-file-label" for="img">Choose image</label>
                                </div>
                                <?php if(isset($data)){?>
                                    <p class="mt-3">Current image : <img src="<?=base_url('assets/portfolio/').$data->img_src?>" alt="" height="90"></p>   
                                <?php }?> 
                            </div> -->

                            <div class="form-group col-md-6">
                                <label for="category" class="text-sm mr-2 pt-2">Category :</label>
                                <input type="text" value="<?= isset($data) ? $data->category : '' ?>" class="form-control" name="category" id="category" placeholder="Category of the work (5 to 8 words)">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="short_descr" class="text-sm mr-2 pt-2">Short Description :</label>
                                <textarea class="form-control" name="short_descr" rows="5" maxlength="300"><?= isset($data) ? $data->short_descr : null ?></textarea>
                                <small class="d-block text-right">* Max 300 characters</small>
                            </div>
                        </div>
                        <div class="row ml-1">
                            <a href="<?=base_url('Admin/Portfolio')?>" class="btn btn-secondary mr-3 col-md-2"><strong>x</strong> Cancel</a>
                            <button type="submit" class="btn btn-primary col-md-2"><?= isset($data) ? '<i class="fa fa-recycle"></i> Update' : '<strong>+ </strong> Submit' ?></button>
                        </div>
                    </form>
                
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>

</div> <!-- /.Wrapper -->

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

    $('#summernote').summernote({
        height: 300
    });

    // Name of the file appearing on selecting image
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>


