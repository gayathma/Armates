<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Website Reviews
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <!--                        <div class="btn-group">
                                                    <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#comments_add_modal" data-toggle="modal">
                                                        Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>-->
                    </div>
                    <table  class="display table table-bordered table-striped" id="comment_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Active Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="comments_<?php echo $result->id; ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $result->title; ?></td>
                                    <td><?php echo $result->description; ?></td>
                                    <td align="center">
                                        <?php if ($result->is_published) { ?>
                                            <a class="btn btn-success btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 0, this)" title="click to deactivate manufacture"><i class="fa fa-check"></i></a> 
                                        <?php } else { ?> 
                                            <a class="btn btn-warning btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 1, this)" title="click to activate manufacture"><i class="fa fa-exclamation-circle"></i></a> 
                                        <?php } ?>
                                    </td>
                                    <td align="center">
    <!--                                        <a href="<?php echo site_url(); ?>/comments/manage_comments" class="btn btn-success btn-xs"><i class="fa fa-pencil"  data-original-title="Update"></i></a>-->
                                        <a class="btn btn-danger btn-xs" onclick="delete_comment(<?php echo $result->id; ?>)" ><i class="fa fa-trash-o " title="" data-original-title="Remove"></i></a>

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

<script type="text/javascript">

    $('#comments_menu').addClass('active open');

    $(document).ready(function () {
        $('#comment_table').dataTable();
    });
    //delete comment
    function delete_comment(id) {
        if (confirm('Are you sure want ot delete this comment ?')) {
            $.ajax({
                type: "POST",
                url: site_url + '/comments/delete_comments',
                data: "id=" + id,
                success: function (msg) {
                    if (msg == 1) {
                        $('#comments_' + id).hide();
                        toastr.success("Successfully deleted !!", "AutoVille");
                    }
                    else if (msg == 2) {
                        alert('Cannot be deleted as it is already assigned to others. !!');
                    }

                }
            });
        }
    }

    //change publish status of comment
    function change_publish_status(comment_id, value, element) {
        var condition = 'Do you want to activate this Comment?';
        if (value == 0) {
            condition = 'Do you want to deactivate this Comment?';
        }

        if (confirm(condition)) {
            $.ajax({
                type: "POST",
                url: site_url + '/comments/change_publish_status',
                data: "id=" + comment_id + "&value=" + value,
                success: function (msg) {
                    if (msg == 1) {
                        if (value == 1) {
                            $(element).parent().html('<a class="btn btn-success btn-xs" onclick="change_publish_status(' + comment_id + ', 0, this)" title="click to deactivate comment"><i class="fa fa-check"></i></a> ');
                        } else {
                            $(element).parent().html('<a class="btn btn-warning btn-xs" onclick="change_publish_status(' + comment_id + ', 1, this)" title="click to activate comment"><i class="fa fa-exclamation-circle"></i></a> ');
                        }
                    } else if (msg == 2) {

                    }
                }
            });
        }

    }
</script>
