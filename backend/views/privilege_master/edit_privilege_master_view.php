<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Privilege Master Quick Edit</h4>
</div>
<form id="edit_privilege_master_form" name="edit_privilege_master_form">
    <div class="modal-body">

        <div class="form-group">
            <label class="form-label">Master Privilege</label>
            <span style="color: red">*</span>

            <input id="master_privilege" class="form-control" type="text" name="master_privilege" value="<?php echo $privilege_master->master_privilege; ?>" >                                                           
        </div>

        <div class="form-group">
            <label class="form-label">Master Privilege Description</label>
            <span style="color: red">*</span>

            <input id="master_privilege_desc" class="form-control" type="text" name="master_privilege_desc" value="<?php echo $privilege_master->master_privilege_description; ?>" >                              
        </div>


        <div class="form-group">
            <label class="form-label">System</label>
            <span style="color: red">*</span>

            <select name="system_code" id="system_code" class="select2 form-control"  style="width: 50%">
                <?php 
                $systems=$this->config->item('SYSTEMS');
                foreach ($systems as $system) { ?>
                    <option value="<?php echo $system; ?>" <?php if ($system == $privilege_master->system_code) { ?> selected="true" <?php } ?>><?php echo $system; ?></option>
                <?php } ?>
            </select>                                   
        </div>

        <div id="edit_privilege_master_msg" class="form-row"> </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" id="privilege_master_code" name="privilege_master_code" value="<?php echo $privilege_master->privilege_master_code; ?>"/>

        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>

<script type="text/javascript">
    $('#settings_parent_menu').addClass('active open');


    //edit Master Privilege Form
    $('#edit_privilege_master_form').validate({
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
            $.post(site_url + '/privilege_master/edit_master_privilege', $('#edit_privilege_master_form').serialize(), function(msg)
            {
                if (msg == 1) {

                    $('#edit_privilege_master_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                    window.location = site_url + '/privilege_master/manage_privilege_masters';
                } else {
                    $('#edit_privilege_master_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                }
            });
        }
    });

</script>