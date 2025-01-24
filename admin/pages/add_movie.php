<?php
include('header.php');
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>

<?php
include('../../form.php');
$frm = new formBuilder;
?> 

<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Movie</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Add Movie</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <?php include('../../msgbox.php'); ?>
                <form action="process_add_movie.php" method="post" enctype="multipart/form-data" id="form1">
                    <div class="form-group">
                        <label class="control-label">Movie Name</label>
                        <input type="text" name="name" class="form-control" />
                        <?php $frm->validate("name", array("required", "label" => "Movie Name")); ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Genre</label>
                        <input type="text" name="genre" class="form-control">
                        <?php $frm->validate("genre", array("required", "label" => "genre", "regexp" => "text")); ?>
                    <div class="form-group">
                        <label class="control-label">Cast</label>
                        <input type="text" name="pemeran" class="form-control">
                        <?php $frm->validate("pemeran", array("required", "label" => "Cast", "regexp" => "text")); ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">durasi</label>
                        <input type="time" name="durasi" class="form-control" />
                        <?php $frm->validate("durasi", array("required", "label" => "durasi")); ?>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <input type="text" name="deskripsi" class="form-control">
                        <?php $frm->validate("deskripsi", array("required", "label" => "Description")); ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Release Date</label>
                        <input type="date" name="tanggal" class="form-control" />
                        <?php $frm->validate("tanggal", array("required", "label" => "Release Date")); ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <input type="file" name="image" class="form-control" />
                        <?php $frm->validate("image", array("required", "label" => "Image")); ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Trailer Youtube Link</label>
                        <input type="text" name="video_url" class="form-control" />
                        <?php $frm->validate("video_url", array("label" => "Youtube Link", "max" => "500")); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Movie</button>
                    </div>
                </form>
            </div> 
        </div>
    </section>
</div>

<?php include('footer.php'); ?>
<script>
    <?php $frm->applyvalidations("form1"); ?>
</script>
