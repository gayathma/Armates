<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <?php echo $heading; ?>
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>


            <div class="panel-body">
                <div class="form">
                    <table class="table table-hover p-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Is Main Image</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($images as $image) {
                                ?>
                                <tr id="img_<?php echo $image->id; ?>">
                                    <td>
                                        <span class="preview">
                                            <a href="<?php echo base_url(); ?>/uploads/articles/ar_<?php echo $id; ?>/<?php echo $image->image_path; ?>"  data-gallery><img src="<?php echo base_url(); ?>/uploads/articles/ar_<?php echo $id; ?>/<?php echo $image->image_path; ?>" width="100px"></a>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="checkboxes">
                                            <input <?php
                                            if ($image->is_main == '1') {
                                                echo 'checked="checked"';
                                            }
                                            ?>  type="checkbox" value="<?php echo $image->id; ?>" onclick="change_main(<?php echo $image->id; ?>, this)"  class="checkbox">

                                        </div>

                                    </td>
                                    <td>
                                        <button class="btn btn-danger delete" onclick="delete_image('<?php echo $image->id; ?>','<?php echo $image->image_path; ?>','<?php echo $image->article_id; ?>')">
                                            <i class="glyphicon glyphicon-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
                                                $('#articles_menu').addClass('active');

                                                function change_main(image_id, element) {

                                                    var main;
                                                    if ($(element).is(':checked')) {
                                                        main = 1;
                                                    } else {
                                                        main = 0;
                                                    }

                                                    $.post(site_url + '/articles/change_image_main', {image_id: image_id, main: main}, function(msg)
                                                    {

                                                    });
                                                }

                                                function delete_image(image_id, path, article_id) {



                                                    $.post(site_url + '/articles/delete_image', {image_id: image_id, path: path, article_id: article_id}, function(msg)
                                                    {
                                                        if (msg == 1) {
                                                            $('#img_' + image_id).hide();
                                                        }
                                                    });
                                                }

</script>


<script src="<?php echo base_url(); ?>backend_resources/jupload/js/tmpl.min.js"></script>
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/load-image.min.js"></script>
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/canvas-to-blob.min.js"></script>
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url(); ?>backend_resources/jupload/js/main.js"></script>

<!-- jQuery UI styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>backend_resources/jupload/css/jquery-ui-1.8.21.custom.css" id="theme" />
<!-- jQuery Image Gallery styles -->

<!-- CSS to style the file input field as button and adjust the jQuery UI progress bars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>backend_resources/jupload/css/jquery.fileupload.css" />


