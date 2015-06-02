<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Privileges
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#add_privilege_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <table class="display table table-bordered table-striped" id="privilege_table" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Master Privilege</th>
                                <th>Privilege</th>
                                <th>Human Friendly Code</th>
                                <th>Assign For</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach ($privileges as $privilege) {
                                ?> 
                                <tr  id="privileges_<?php echo $privilege->privilege_code; ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $privilege->master_privilege; ?></td>
                                    <td><?php echo $privilege->privilege; ?></td>
                                    <td><?php echo $privilege->priviledge_code_HF; ?></td>
                                    <td>
                                        <?php if ($this->config->item('SUPERADMIN') == $privilege->assign_for) { ?> 
                                            <span class="label label-success">Super Administrator</span>
                                        <?php } else if ($this->config->item('ADMIN') == $privilege->assign_for) { ?>
                                            <span class="label label-primary">Administrator</span>
                                        <?php } else if ($this->config->item('REGISTERED') == $privilege->assign_for) { ?>
                                            <span class="label label-warning">Registered User</span>
                                        <?php } else { ?>
                                            <span class="label label-info">All</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_privilege_pop_up(<?php echo $privilege->privilege_code; ?>)">
                                            <i class="fa fa-pencil"  title="Update"></i>
                                        </a>
                                        <a class="btn btn-danger btn-xs"   title="Delete this Privilege" onclick="delete_privilege(<?php echo $privilege->privilege_code; ?>)">
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
<div class="modal fade" id="add_privilege_modal" tabindex="-1" role="dialog" aria-labelledby="add_privilege_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Privilege</h4>
            </div>
            <form id="add_privilege_form" name="add_privilege_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Master Privilege</label>
                        <span style="color: red">*</span>
                        <select name="master_privilege_code" id="master_privilege_code" class="select2 form-control"  >
                            <?php foreach ($master_privileges as $master_privilege) {
                                ?> 
                                <option value="<?php echo $master_privilege->privilege_master_code; ?>"><?php echo $master_privilege->master_privilege; ?></option>
                            <?php } ?>
                        </select>    
                    </div>

                    <div class="form-group">
                        <label class="form-label">Privilege</label>
                        <span style="color: red">*</span>
                        <input id="privilege" class="form-control" type="text" name="privilege" onkeyup="auto_write_human_friendly_code()">                              
                    </div>


                    <div class="form-group">
                        <label class="form-label">Privilege Description</label>
                        <span style="color: red">*</span>

                        <input id="privilege_desc" class="form-control" type="text" name="privilege_desc">                              
                    </div>

                    <div class="form-group">
                        <label class="form-label">Human Friendly Privilege Code</label>
                        <span style="color: red">*</span>

                        <input id="privilege_hf" class="form-control" type="text" name="privilege_hf" readonly="true">                              
                    </div>

                    <div class="form-group">
                        <label class="form-label">Assign For</label>
                        <span style="color: red">*</span>

                        <select name="assign_for" id="assign_for" class="select2 form-control"  >
                            <option value="1">Super Administrator</option>
                            <option value="2">Administrator</option>
                            <option value="3">Registered User</option>

                        </select>                              
                    </div>
                    <div id="add_privilege_msg" class="form-row"> </div>
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


<!--Privileges Edit Modal -->
<div  class="modal fade "   id="privilege_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="privilege_edit_content">

        </div>
    </div>
</div>



<script type="text/javascript">
    $('#settings_menu').addClass('active');

    $(document).ready(function() {

        $('#privilege_table').dataTable();

//add Privilege Form
        $('#add_privilege_form').validate({
            rules: {
                master_privilege_code: {
                    required: true
                },
                privilege: {
                    required: true
                },
                privilege_desc: {
                    required: true
                },
                privilege_hf: {
                    required: true
                },
                assign_for: {
                    required: true
                }
            }, submitHandler: function(form)
            {
                $.post(site_url + '/privilege/add_new_privilege', $('#add_privilege_form').serialize(), function(msg)
                {
                    if (msg == 1) {
                        $('#add_privilege_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                        add_privilege_form.reset();
                        location.reload();
                    } else {
                        $('#add_privilege_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                    }
                });


            }
        });
    });


    //delete privileges
    function delete_privilege(id) {

        if (confirm('Are you sure want to delete this Privilege ?')) {

            $.ajax({
                type: "POST",
                url: site_url + '/privilege/delete_privilege',
                data: "id=" + id,
                success: function(msg) {
                    //alert(msg);
                    if (msg == 1) {
                        //document.getElementById(trid).style.display='none';
                        $('#privileges_' + id).hide();
                    }
                    else if (msg == 2) {
                        alert('Cannot be deleted as it is already assigned to Privilege');
                    }
                }
            });
        }
    }

    //this is to autofill the Privilege Human Code	
    function auto_write_human_friendly_code() {

        var privilege_text = $("#privilege").val();

        //replace spaces with _
        var replaced_text = privilege_text.replace(/ /g, "_");

        //convert to upper case
        $('#privilege_hf').val(replaced_text.toUpperCase());
    }


    //Edit Privileges
    function  display_edit_privilege_pop_up(privilege_id) {

        $.post(site_url + '/privilege/load_edit_privilege_content', {privilege_id: privilege_id}, function(msg) {

            $('#privilege_edit_content').html('');
            $('#privilege_edit_content').html(msg);
            $('#privilege_edit_div').modal('show');
        });
    }
</script>