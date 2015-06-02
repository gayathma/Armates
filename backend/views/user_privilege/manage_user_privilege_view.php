<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <?php echo 'Assign Privileges For ' . ' - ' . ucfirst($user_detail->name); ?>
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div>
                <header class="panel-heading tab-bg-dark-navy-blue">
                    <ul class="nav nav-tabs" id="emp_privi_tab">
                        <?php
                        $privilege_master_service = new Privilege_master_service();
                        $privilege_service        = new Privilege_service();

                        $systems = $this->config->item('SYSTEMS');

                        $a = 0;
                        foreach ($systems as $system) {
                            ++$a;
                            ?>
                            <li <?php if ($a == 1) { ?>class="active" <?php } ?>>
                                <a data-toggle="tab" <?php if ($a == 1) { ?>aria-expanded="true" <?php } else { ?>aria-expanded="false" <?php } ?> href="#tabs-<?php echo $a; ?>"><span class="semi-bold"><?php echo $system; ?></span></a>
                            </li>
                        <?php } ?>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <?php
                        $a = 0;
                        foreach ($systems as $system) {
                            ++$a;
                            ?>
                            <div class="tab-pane <?php if ($a == 1) { ?> active <?php } ?>" id="tabs-<?php echo $a; ?>">
                                <div class="row">
                                    <?php
                                    $privilege_masters = $privilege_master_service->get_privilege_master_by_system_code($system);
                                    if (count($privilege_masters) != 0) {
                                        ?> 
                                        <div class="col-lg-12" >
                                            <div class="checkboxes">
                                                <label class="label_check" for="privilegesystem<?php echo $system; ?>">
                                                    <div id="msgsystem<?php echo $system ?>" class="msgsystem"></div>
                                                    <div id="loader_ajax_check_all_hrm<?php echo $system; ?>" class="loader_ajax_check_all_hrm"> </div>
                                                    <input type="checkbox" value="<?php echo $system; ?>" onclick="save_privileges_from_system('<?php echo $system; ?>',<?php echo $user_detail->id; ?>)" name="privilegessystem[]" id="privilegesystem<?php echo $system; ?>" class="checkbox msgsystemchk<?php echo $system; ?>">
                                                    Select All - <?php echo $system; ?> 
                                                </label>

                                            </div>
                                        </div>
                                        <hr width="100%">
                                        <?php foreach ($privilege_masters as $privilege_master) {
                                            ?>
                                            <div>
                                                <h4><span class="semi-bold"><?php echo $privilege_master->master_privilege; ?></span></h4>

                                                <p>
                                                    <?php
                                                    $privileges = $privilege_service->get_privileges_by_master_privilege_assigned_for($privilege_master->privilege_master_code, $user_detail->user_type);

                                                    foreach ($privileges as $privilege) {
                                                        ?>

                                                    <div class="col-lg-12" >
                                                        <div class="checkboxes">
                                                            <label class="label_check"  for="privilege<?php echo $privilege->privilege_code; ?>"><?php echo $privilege->privilege; ?>
                                                                <input <?php
                                                                if (in_array($privilege->privilege_code, $assigned_privileges)) {
                                                                    echo 'checked="checked"';
                                                                }
                                                                ?>  type="checkbox" value="<?php echo $privilege->privilege_code; ?>" onclick="save_privileges_from_user(<?php echo $privilege->privilege_code; ?>,<?php echo $user_id; ?>)" name="privileges[]" id="privilege<?php echo $privilege->privilege_code; ?>" class="checkbox chkbox<?php echo $system; ?>">
                                                            </label>
                                                            <div id="msg<?php echo $privilege->privilege_code; ?>" class="msgdisplay"></div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                </p>
                                            </div>
                                            <hr width="100%"/>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript">

    $('#user_menu').addClass('active');


//    
    function save_privileges_from_system(system_code, user_id) {

        var loadersh = document.getElementById("loader_ajax_check_all_hrm" + system_code);
        loadersh.style.display = "inline";
        $("#loader_ajax_check_all_hrm" + system_code).html('<i id="animate-icon" class="fa fa-spinner fa fa-2x fa-spin"></i>');

        $("#msgsystem" + system_code).html('');
        var checkboxes = $('.chkbox' + system_code);
        $checkbox = document.getElementById('privilegesystem' + system_code);
        if ($($checkbox).is(':checked')) {
            checkboxes.attr("checked", true);
        } else {
            checkboxes.attr("checked", false);
        }

        if ($($checkbox).is(':checked')) {
            $.post(site_url + '/user_privilege/user_privileges_add_all', {system_code: system_code, user_id: user_id}, function(msg)
            {
                if (msg == 1) {

                    $("#msgsystem" + system_code).html('<i  class="fa fa-thumbs-o-up fa-1x"></i> ');
                    $("#loader_ajax_check_all_hrm" + system_code).html('');

                } else {
                    $("#msgsystem" + system_code).html('<i  class="fa fa-thumbs-o-down fa-1x"></i> ');
                    $("#loader_ajax_check_all_hrm" + system_code).html('');

                }
            });
        } else {
            $.post(site_url + '/user_privilege/user_privileges_delete_all', {system_code: system_code, user_id: user_id}, function(msg)
            {

                if (msg == 1) {

                    $("#msgsystem" + system_code).html('<i  class="fa fa-thumbs-o-up fa-1x"></i> ');
                    $("#loader_ajax_check_all_hrm" + system_code).html('');

                } else {
                    $("#msgsystem" + system_code).html('<i  class="fa fa-thumbs-o-down fa-1x"></i> ');
                    $("#loader_ajax_check_all_hrm" + system_code).html('');

                }
            });
        }
    }


    function save_privileges_from_user(privilige_code, user_id) {

        $("#msg" + privilige_code).html('');
        $("#loader_ajax_check_all_hrm" + privilige_code).html('<i id="animate-icon" class="fa fa-spinner fa fa-2x fa-spin"></i>');

        $checkbox = document.getElementById('privilege' + privilige_code);

        $.post(site_url + '/user_privilege/add_user_privileges', {pri_code: privilige_code, user_id: user_id}, function(msg)
        {

            if (msg == 1) {

                $("#msg" + privilige_code).html('<i  class="fa fa-thumbs-o-up fa-1x"></i> ');

            } else {
                $("#msg" + privilige_code).html('<i  class="fa fa-thumbs-o-down fa-1x"></i> ');
            }
        });

    }
</script>



