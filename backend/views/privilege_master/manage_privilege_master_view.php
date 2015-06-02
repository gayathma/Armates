<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Privilege Master
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#add_privilege_master_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <table class="display table table-bordered table-striped" id="privilege_master_table" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Master Privilege</th>
                                <th>Description</th>
                                <th>System</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach ($privilege_masters as $privilege_master) {
                                ?> 
                                <tr  id="privilege_master_<?php echo $privilege_master->privilege_master_code; ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $privilege_master->master_privilege; ?></td>
                                    <td><?php echo $privilege_master->master_privilege_description; ?></td>
                                    <td>
                                        <?php echo $privilege_master->system_code; ?> 

                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_master_privilege_pop_up(<?php echo $privilege_master->privilege_master_code; ?>)">
                                            <i class="fa fa-pencil"  title="Update"></i>
                                        </a>
                                        <a class="btn btn-danger btn-xs"  title="Delete this Master Privilege" onclick="delete_privilege_master(<?php echo $privilege_master->privilege_master_code; ?>)">
                                            <i class="fa fa-trash-o " title="Remove"></i>
                                        </a>

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

<!-- Modal -->
<div class="modal fade" id="add_privilege_master_modal" tabindex="-1" role="dialog" aria-labelledby="add_privilege_master_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Privilege Master</h4>
            </div>
            <form id="add_privilege_master_form" name="add_privilege_master_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="form-label">Master Privilege</label>
                        <span style="color: red">*</span>

                        <input id="master_privilege" class="form-control" type="text" name="master_privilege" >                              
                    </div>


                    <div class="form-group">
                        <label class="form-label">Master Privilege Description</label>
                        <span style="color: red">*</span>

                        <input id="master_privilege_desc" class="form-control" type="text" name="master_privilege_desc">                              
                    </div>


                    <div class="form-group">
                        <label class="form-label">System</label>
                        <span style="color: red">*</span>

                        <select name="system_code" id="system_code" class="select2 form-control"  >
                            <?php
                            $systems=$this->config->item('SYSTEMS');
                            foreach ($systems as $system) { ?>
                                <option value="<?php echo $system; ?>" ><?php echo $system; ?></option>
                            <?php } ?>
                        </select>                              
                    </div>

                    <div id="add_privilege_master_msg" class="form-row"> </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success" type="submit">Save changes</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!--Master Privileges Edit Modal -->
<div  class="modal fade "   id="master_privilege_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="master_privilege_edit_content">

        </div>
    </div>
</div>


<script type="text/javascript">
    $('#settings_menu').addClass('active');


    $(document).ready(function() {

        $('#privilege_master_table').dataTable();


        //add Master Privilege Form
        $('#add_privilege_master_form').validate({
            rules: {
                master_privilege: {
                    required: true
                },
                master_privilege_desc: {
                    required: true
                },
                system_code: {
                    required: true
                }
            }, submitHandler: function(form)
            {
                $.post(site_url + '/privilege_master/add_new_privilege_master', $('#add_privilege_master_form').serialize(), function(msg)
                {
                    if (msg == 1) {
                        $('#add_privilege_master_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                        add_privilege_master_form.reset();
                        location.reload();
                    } else {
                        $('#add_privilege_master_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                    }
                });
            }
        });

    });

    //delete master pivileges
    function delete_privilege_master(id) {

        if (confirm('Are you sure want to delete this Master Privilege ?')) {

            $.ajax({
                type: "POST",
                url: site_url + '/privilege_master/delete_privilege_master',
                data: "id=" + id,
                success: function(msg) {
                    if (msg == 1) {

                        $('#privilege_master_' + id).hide();
                    }
                    else if (msg == 2) {
                        alert('Cannot be deleted as it is already assigned to Master Privilege');
                    }
                }
            });
        }
    }
    
    
    //Edit Maser Privileges
    function  display_edit_master_privilege_pop_up(master_privilege_id) {

        $.post(site_url + '/privilege_master/load_edit_privilege_master_content', {master_privilege_id: master_privilege_id}, function(msg) {

            $('#master_privilege_edit_content').html('');
            $('#master_privilege_edit_content').html(msg);
            $('#master_privilege_edit_div').modal('show');
        });
    }
</script>