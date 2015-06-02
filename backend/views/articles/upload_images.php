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
                    <form  id="fileupload"  action="<?php echo site_url() . '/fileupload' ?>" method="POST" enctype="multipart/form-data">

                        <fieldset class = "adminList">
                            <div class="form-group">

                                <div class="right  no-padding fileupload-buttonbar">
                                    <div class="span7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files...</span>
                                            <input type="file" name="files[]" multiple>
                                        </span>
                                        <button type="submit" class="btn btn-primary start" id="start_upload" >
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>Start upload</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning cancel">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span>Cancel upload</span>
                                        </button>


                                    </div>
                                    <!-- The global progress information -->
                                    <div class="span5 fileupload-progress fade">
                                        <!-- The global progress bar -->
                                        <div class="progress progress-success progress-striped active">
                                            <div class="bar" style="width:0%;"></div>
                                        </div>
                                        <!-- The extended global progress information -->
                                        <div class="progress-extended">&nbsp;</div>
                                    </div>
                                </div>
                                <!-- The loading indicator is shown during file processing -->
                                <label><em>Upload images for article.</em></label>
                                <br>
                                <input type="hidden" id="last_article_id" value="<?php echo $id; ?>" name="last_article_id"/>
                                <span id="image_msg"></span>
                                <!-- The table listing the files available for upload/download -->
                                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                            </div>   

                        </fieldset>

                    </form>

                    <!-- The template to display files available for upload -->
                    <script id="template-upload" type="text/x-tmpl">
                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                        <tr class="template-upload fade">
                        <td>
                        <span class="preview"></span>
                        </td>
                        <td>
                        <p class="name">{%=file.name%}</p>
                        <strong class="error text-danger"></strong>
                        </td>
                        <td>
                        <p class="size">Processing...</p>
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                        </td>
                        <td>
                        {% if (!i && !o.options.autoUpload) { %}
                        <button class="btn btn-primary start" disabled style="display:none;">
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                        </button>
                        {% } %}
                        {% if (!i) { %}
                        <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                        </button>
                        {% } %}
                        </td>
                        </tr>
                        {% } %}
                    </script>
                    <!-- The template to display files available for download -->
                    <script id="template-download" type="text/x-tmpl">
                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                        <tr class="template-download fade" >
                        <td>
                        <span class="preview">
                        {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                        </span>
                        </td>
                        <td>
                        <p class="name">
                        {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                        <span>{%=file.name%}</span>
                        {% } %}
                        </p>
                        {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                        {% } %}
                        </td>
                        <td>
                        <span class="size">{%=o.formatFileSize(file.size)%}</span>
                        </td>
                        <td>
                        {% if (file.deleteUrl) { %}
                        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                        </button>
                        {% } else { %}
                        <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                        </button>
                        {% } %}
                        </td>
                        </tr>
                        {% } %}
                    </script>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
         $('#articles_menu').addClass('active');
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


