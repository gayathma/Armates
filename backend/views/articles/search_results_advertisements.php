<table class="table table-hover p-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Chassis No</th>
            <th>Transmission</th>
            <th>Fuel Type</th>
            <th>Body Type</th>
            <th>Color</th>
            <th>Price</th>
            <th>Added By</th>
            <th>Active Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $result) { ?>
            <tr id="advertisement_<?php echo $result->id; ?>">
                <td class="p-name">
                    <a href="project_details.html"><?php echo ucfirst($result->manufacture . ' ' . $result->model . ' ' . $result->year); ?></a>
                    <br>
                    <small>Created <?php echo date('Y-m-d', strtotime($result->added_date)); ?></small>
                </td>
                <td class="p-team">
                    <?php echo $result->chassis_no; ?>
                </td>
                <td class="p-team">
                    <?php echo $result->transmission; ?>
                </td>
                <td class="p-team">
                    <?php echo $result->fuel_type; ?>
                </td>
                <td class="p-team">
                    <?php echo $result->body_type; ?>
                </td>
                <td class="p-team">
                    <?php echo $result->colour; ?>
                </td>
                <td class="p-progress">
                    <?php echo $result->price; ?>
                </td>
                <td class="p-progress">
                    <?php echo $result->added_by_user; ?>
                </td>
                <td>
                    <?php if ($result->is_published == '1') { ?>
                        <span class="label label-primary">Active</span>
                    <?php } elseif ($result->is_published == '0') { ?>
                        <span class="label label-default">Pending</span>  
                    <?php } else { ?>
                        <span class="label label-danger">Rejected</span>  
                    <?php } ?>
                </td>
                <td>
                    <a class="btn btn-danger btn-xs" onclick="delete_advertisement(<?php echo $result->id; ?>)"><i class="fa fa-trash-o " title="Remove"></i></a>
                    <a href="project_details.html" class="btn btn-info btn-xs"><i class="fa fa-folder" title="View"></i></a>

                </td>
            </tr>

        <?php }
        ?>

    </tbody>
</table>