<!-- page start-->
<section class="panel">
    <header class="panel-heading">
        All Articles
        <span class="pull-right">
            <button type="button" onclick="reload_articles()" class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> Refresh</button>
        </span>
    </header>
    <div id="article_div" class="panel-body"> 
        <div class="adv-table">
            <div class="clearfix">
                <div class="btn-group">
                    <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="<?php echo site_url(); ?>/articles/add_article_view" >
                        Add New
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <table class="table table-hover p-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Client</th>
                        <th>Challenge</th>
                        <th>Solution</th>
                        <th>Added By</th>
                        <th>Active Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) { ?>
                        <tr id="article_<?php echo $result->id; ?>">
                            <td class="p-name">
                                <a href="#"><?php echo ucfirst($result->title); ?></a>
                                <br>
                                <small>Created <?php echo date('Y-m-d', strtotime($result->added_date)); ?></small>
                            </td>
                            <td class="p-team">
                                <?php echo $result->category_name; ?>
                            </td>
                            <td class="p-team">
                                <?php echo $result->client; ?>
                            </td>
                            <td class="p-team">
                                <?php echo substr($result->challenge, 0, 20) . ' ...'; ?>
                            </td>
                            <td class="p-team">

                                <?php echo substr($result->solution, 0, 20) . ' ...'; ?>
                            </td>

                            <td class="p-progress">
                                <?php echo $result->added_by_user; ?>
                            </td>
                            <td>
                                <?php if ($result->is_published == '1') { ?>
                                    <span class="label label-primary">Active</span>
                                    <!--<a class="btn btn-success btn-xs"  onclick="change_article_status(<?php echo $result->id; ?>, 2, this);"><i class="fa fa-arrow-up " title="Reject Advertisement"></i></a>--> 
                                <?php } elseif ($result->is_published == '0') { ?>
                                    <span class="label label-default">Pending</span> 
                                    <!--<a class="btn btn-success btn-xs"  onclick="change_article_status(<?php echo $result->id; ?>, 1, this);"><i class="fa fa-arrow-up " title="Approve Advertisement"></i></a>--> 
                                <?php } else { ?>
                                    <span class="label label-danger">Rejected</span>  
                                <?php } ?>


                            </td>
                            <td>
                                <a href="<?php echo site_url(); ?>/articles/edit_article/<?php echo $result->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil" title="Edit Article"></i></a>
                                <a class="btn btn-danger btn-xs"  onclick="delete_article(<?php echo $result->id; ?>);"><i class="fa fa-trash-o " title="Remove"></i></a>
                                <a href="<?php echo site_url(); ?>/articles/upload_images/<?php echo $result->id; ?>" class="btn btn-info btn-xs"><i class="fa  fa-cloud-upload" title="Upload Images"></i></a>
                                <a href="<?php echo site_url(); ?>/articles/image_settings/<?php echo $result->id; ?>" class="btn btn-success btn-xs"><i class="fa  fa-cog" title="Image Settings"></i></a>

                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- page end-->


<script type="text/javascript">
    //delete article
    function delete_article(id) {

        if (confirm('Are you sure want to delete this Article?')) {

            $.ajax({
                type: "POST",
                url: site_url + '/articles/delete_articles',
                data: "id=" + id,
                success: function(msg) {
                    //alert(msg);
                    if (msg == 1) {
                        //document.getElementById(trid).style.display='none';
                        $('#article_' + id).hide();
                    }
                    else if (msg == 2) {
                        alert('Cannot be deleted as it is already assigned to others. !!');
                    }
                }
            });
        }
    }

    function change_article_status(article_id, value, element) {

        var condition = 'Do you want to approve this article ?';
        if (value == 2) {
            condition = 'Do you want to reject this article?';
        }

        if (confirm(condition)) {
            $.ajax({
                type: "POST",
                url: site_url + '/articles/change_publish_status',
                data: "id=" + article_id + "&value=" + value,
                success: function(msg) {
                    if (msg == 1) {
                        if (value == 1) {
                            $(element).parent().html('<span class="label label-primary">Active</span><a class="btn btn-success btn-xs"  onclick="change_article_status(' + article_id + ', 2, this);"><i class="fa fa-arrow-up " title="Reject Advertisement"></i></a> ');
                        } else {
                            $(element).parent().html('<span class="label label-danger">Rejected</span> ');
                        }

                    } else if (msg == 2) {
                        alert('Error !!');
                    }
                }
            });
        }
    }

    //Reloading articles
    function reload_articles() {
        $('#article_div').html('<center><div class="load-anim"><i id="animate-icon" class="fa fa-spinner fa-3x fa-spin loader-icon-margin"></i></div></center>');
        var x = $('.load-anim').show().delay(5000);
        $.post(site_url + '/articles/search_articles', {}, function(msg) {
            $('#article_div').html('');
            $('#article_div').html(msg);
            x.fadeOut('slow');
        });
    }

</script>


<!-- active selected menu -->

<script type="text/javascript">
    $('#articles_menu').addClass('active');
</script>