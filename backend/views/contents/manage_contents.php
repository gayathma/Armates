<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
<!--            <header class="panel-heading">
                <?php echo $inner_title; ?>
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>-->


            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal tasi-form" name="frm_content" id="frm_content" method="post" >
                        <div class="form-group ">
                            
                            <div class="col-lg-12">
                                <textarea class="wysihtml5 form-control" id="content_text" name="content_text" rows="20">
                                    <?php echo $content_data->content; ?>
                
                                </textarea>
                                <input type="hidden" id="content_id" name="content_id" value="<?php echo $content_data->content_id; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-11 col-lg-10">
                                <button class="btn btn-info" type="button" onclick="update_content()">Save</button>
                                
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
    $('#pages_menu').addClass('active');

//   $('.wysihtml5').wysihtml5();
   $('.wysihtml5').wysihtml5({
    "font-styles":  true, //Font styling, e.g. h1, h2, etc
    "color":        true, //Button to change color of font
    "emphasis":     true, //Italics, bold, etc
    "textAlign":    true, //Text align (left, right, center, justify)
    "lists":        true, //(Un)ordered lists, e.g. Bullets, Numbers
    "blockquote":   true, //Button to insert quote
    "link":         true, //Button to insert a link
    "table":        true, //Button to insert a table
    "image":        true, //Button to insert an image
    "video":        true, //Button to insert video
    "html":         true //Button which allows you to edit the generated HTML
});
        

    function update_content() {

        var content_text = encodeURIComponent(editor.getValue());
        var content_id = $('#content_id').val();

        $.ajax({
            type: "POST",
            url: site_url + '/contents/update_content',
            data: "content_text=" + content_text + "&content_id=" + content_id,
            success: function(msg) {
                if (msg == 1) {
                    $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');

                } else {
                     $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');


                }

            }

        });

    }

</script>                  




