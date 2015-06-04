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