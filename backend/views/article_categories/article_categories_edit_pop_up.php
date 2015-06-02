<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Article Category Quick Edit</h4>
</div>
<form id="edit_article_categories_form" name="edit_article_categories_form">
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Article Category<span class="mandatory">*</span></label>
            <input id="name" class="form-control" name="name" type="text" value="<?php echo $article_categories->name; ?>">
            <input id="article_categories_id"  name="article_categories_id" type="hidden" value="<?php echo $article_categories->id; ?>">
        </div>
        <span id="rtn_msg_edit"></span>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>

<script type="text/javascript">

    //edit article_categories form validation
    $("#edit_article_categories_form").validate({
        rules: {
            name: "required"
        },
        messages: {
            name: "Please enter a article_categories"
        }, submitHandler: function(form)
        {
            $.post(site_url + '/article_categories/edit_article_categories', $('#edit_article_categories_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $('#rtn_msg_edit').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');

                    window.location = site_url + '/article_categories/manage_article_categoriess';
                } else {
                    $('#rtn_msg_edit').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                }
            });


        }
    });
</script>