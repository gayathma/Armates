<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
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
                    <form class="cmxform form-horizontal tasi-form" name="frm_content" id="frm_content" method="post" >


                        <div class="form-group">
                            <div class="col-lg-6">
                                <label for="title">Title<span class="mandatory">*</span></label>
                                <input id="title" class="form-control" name="title" type="text" placeholder="Enter Article Title">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6">
                                <label for="client">Article Category<span class="mandatory">*</span></label>
                                <select id="category" class="form-control" name="category">
                                    <option value="">Select Article Category</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6">
                                <label for="css_class">CSS Class<span class="mandatory">*</span></label>
                                <select id="css_class" class="form-control" name="css_class">
                                    <option value="">Select CSS Class</option>
                                    <?php foreach ($css_classes as $css_class) { ?>
                                        <option value="<?php echo $css_class ?>"><?php echo $css_class; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-6">
                                <label for="vid_url">Video Url</label>
                                <input id="vid_url" class="form-control" name="vid_url" type="text" placeholder="Enter Video URL">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6">
                                <label for="client">Client<span class="mandatory">*</span></label>
                                <input id="client" class="form-control" name="client" type="text" placeholder="Enter Client">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-lg-8">
                                <label for="challenge">Challenge<span class="mandatory">*</span></label>
                                <textarea class="form-control" id="challenge" name="challenge" rows="5">
                                    
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-lg-8">
                                <label for="solution">Solution<span class="mandatory">*</span></label>
                                <textarea class="form-control" id="solution" name="solution" rows="5">
                                    
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-lg-8">
                                <label for="result">Result<span class="mandatory">*</span></label>
                                <textarea class="form-control" id="result" name="result" rows="5">
                                    
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-lg-12">
                                <label for="description">Description</label>
                                <textarea class="wysihtml5 form-control" id="description" name="description" rows="10">
                                    
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-11 col-lg-10">
                                <button class="btn btn-info" type="submit" >Save</button>

                            </div>
                        </div>

                        <span id="rtn_msg"></span>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript">
    $('#articles_menu').addClass('active');

//   $('.wysihtml5').wysihtml5();
    $('.wysihtml5').wysihtml5({
        "font-styles": true, //Font styling, e.g. h1, h2, etc
        "color": true, //Button to change color of font
        "emphasis": true, //Italics, bold, etc
        "textAlign": true, //Text align (left, right, center, justify)
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers
        "blockquote": true, //Button to insert quote
        "link": true, //Button to insert a link
        "table": true, //Button to insert a table
        "image": true, //Button to insert an image
        "video": true, //Button to insert video
        "html": true //Button which allows you to edit the generated HTML
    });


    $(document).ready(function() {

        $('#article_categories_table').dataTable();

        //add articles form validation
        $("#frm_content").validate({
            rules: {
                title: "required",
                client: "required",
                challenge: "required",
                solution: "required",
                result: "required",
                css_class: "required"
            }, submitHandler: function(form)
            {
                $.post(site_url + '/articles/save_article', $('#frm_content').serialize(), function(msg)
                {
                    if (msg == 1) {
                        $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');


                        frm_content.reset();
                        window.location = site_url + '/articles/manage_articles';


                    } else {
                        $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                    }
                });
            }
        });

    });

</script>                  




