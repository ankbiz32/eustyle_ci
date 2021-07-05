<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="ml-2 text-dark">Edit work images</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Admin/Portfolio') ?>">Works</a></li>
                        <li class="breadcrumb-item active">Edit work images</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div> <!-- /.Content header -->

    <!-- Content Main-->
    <div class="content">
        <div class="container-fluid">
            <div class="row ml-3 mt-3">
                <div class="card card-primary col-sm-4 px-0">
                    <div class="card-header">
                        Add more images
                    </div>
                    <div class="card-body">
                        <form role="form" method="post" action="<?= base_url('Add/savePortfolioImage/'.$data[0]->portfolio_id) ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="img" class="text-sm mr-2 pt-2">Image <?= isset($data) ? '' : '<span class="text-danger">*</span>' ?> :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" accept=".png, .jpg, .jpeg, .gif, .bmp, .svg" name="img" required>
                                    <label class="custom-file-label" for="img">Choose image</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Add Image</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="row ml-3 mt-3">
                <div class="col-sm-9">
                    <div class="row">
                        <?php foreach ($data as $d){?>
                        <div class="col-sm-4 col-6">
                            <img src="<?=base_url('assets/portfolio/').$d->img_src?>" class="w-100" alt="">
                            <br>
                            <?php if(count($data)>1) {?>
                                <a href="<?=base_url('Delete/portfolioImage/'.$d->id)?>" onclick="confirmation(event)" class="btn btn-danger mt-2">Delete</a>
                            <?php } else {?>
                                <p>Cannot delete image. Add more images to see delete option. </p>
                            <?php }?>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>

</div> <!-- /.Wrapper -->

<script>

    // Name of the file appearing on selecting image
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>