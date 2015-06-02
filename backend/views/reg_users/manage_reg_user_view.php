<header class="panel-heading">
    Manage Registered Users
    <span class="tools pull-right">
        <a href="javascript:;" class="fa fa-chevron-down"></a>
        <a href="javascript:;" class="fa fa-times"></a>
    </span>
</header>
<!-- page start-->
<ul class="directory-list">
    <li><a onclick="load_reg_users_by_letter('A')" style="cursor: pointer">a</a></li>
    <li><a onclick="load_reg_users_by_letter('B')" style="cursor: pointer">b</a></li>
    <li><a onclick="load_reg_users_by_letter('C')" style="cursor: pointer">c</a></li>
    <li><a onclick="load_reg_users_by_letter('D')" style="cursor: pointer">d</a></li>
    <li><a onclick="load_reg_users_by_letter('E')" style="cursor: pointer">e</a></li>
    <li><a onclick="load_reg_users_by_letter('F')" style="cursor: pointer">f</a></li>
    <li><a onclick="load_reg_users_by_letter('G')" style="cursor: pointer">g</a></li>
    <li><a onclick="load_reg_users_by_letter('H')" style="cursor: pointer">h</a></li>
    <li><a onclick="load_reg_users_by_letter('I')" style="cursor: pointer">i</a></li>
    <li><a onclick="load_reg_users_by_letter('J')" style="cursor: pointer">j</a></li>
    <li><a onclick="load_reg_users_by_letter('K')" style="cursor: pointer">k</a></li>
    <li><a onclick="load_reg_users_by_letter('L')" style="cursor: pointer">l</a></li>
    <li><a onclick="load_reg_users_by_letter('M')" style="cursor: pointer">m</a></li>
    <li><a onclick="load_reg_users_by_letter('N')" style="cursor: pointer">n</a></li>
    <li><a onclick="load_reg_users_by_letter('O')" style="cursor: pointer">o</a></li>
    <li><a onclick="load_reg_users_by_letter('P')" style="cursor: pointer">p</a></li>
    <li><a onclick="load_reg_users_by_letter('Q')" style="cursor: pointer">q</a></li>
    <li><a onclick="load_reg_users_by_letter('R')" style="cursor: pointer">r</a></li>
    <li><a onclick="load_reg_users_by_letter('S')" style="cursor: pointer">s</a></li>
    <li><a onclick="load_reg_users_by_letter('T')" style="cursor: pointer">t</a></li>
    <li><a onclick="load_reg_users_by_letter('U')" style="cursor: pointer">u</a></li>
    <li><a onclick="load_reg_users_by_letter('V')" style="cursor: pointer">w</a></li>
    <li><a onclick="load_reg_users_by_letter('W')" style="cursor: pointer">x</a></li>
    <li><a onclick="load_reg_users_by_letter('X')" style="cursor: pointer">y</a></li>
    <li><a onclick="load_reg_users_by_letter('Y')" style="cursor: pointer">z</a></li>
</ul>

<div class="directory-info-row">
    <div class="row" id="reg_user_filter_content">

        <?php
        $i = 0;
        $n = 0;
        foreach ($results as $result) {
            ?>
            <div class="col-md-6 col-sm-6"id="reg_user<?php echo $result->id; ?>" >
                <?php ++$i; ?>
                <div class="panel" >

                    <div class="panel-body">
                        <div class="media" >


                            <a class="pull-left" href="#">
                                <?php if (empty($result->profile_pic)) { ?>
                                    <img alt="" class="thumb media-object" height="120" width="100" src="<?php echo base_url(); ?>/uploads/user_avatars/avatar.jpg" >
                                <?php } else { ?>
                                    <img alt="" class="thumb media-object" height="120" width="100" src="<?php echo base_url(); ?>/uploads/user_avatars/<?php echo $result->profile_pic; ?>" >
                                <?php } ?>
                            </a>

                            <div class="media-body" >
                                <?php if ($result->is_online) { ?>
                                    <h4><i class="fa  fa-circle  text-success"></i>
                                        <?php echo $result->title; ?> <?php echo $result->name; ?> <span class="text-muted small"> - <?php echo $result->type; ?></span></h4>
                                    <?php } else { ?>
                                    <h4><i class="fa  fa-circle  text-danger"></i>
                                        <?php echo $result->name; ?> <span class="text-muted small"> - <?php echo $result->type; ?></span></h4>

                                <?php } ?>
                                <!--                                <ul class="social-links">
                                                                    <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                                    <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                                                    <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                                                                    <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                                                                </ul>-->

                                <address>Address : <?php echo $result->address; ?><br>
                                    <abbr title="Phone">Tel:</abbr> <?php echo $result->contact_no_1; ?><br>

                                    <email>E-mail : <?php echo $result->email; ?></email><br>
                                </address>
                                <br>
                                <span class="p-team">
                                    <span>
                                        <?php if ($result->is_published) { ?>
                                            <a class="btn btn-success btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 0, this)" title="click to disable user"><i class="fa fa-check"></i></a>
                                        <?php } else { ?>
                                            <a class="btn btn-warning btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 1, this)" title="click to enable user"><i class="fa fa-exclamation-circle"></i></a>
                                        <?php } ?>
                                    </span>



                                    <a class="btn btn-danger btn-xs" onclick="load_after_deleted(<?php echo $result->id; ?>)" ><i class="fa fa-trash-o " title="" title="Remove"></i></a>
                                    <a class="btn btn-info btn-xs" href="<?php echo site_url(); ?>/user_privilege/manage_user_privileges/<?php echo $result->id; ?>">Assign Privileges</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>
</div>
<!-- page end-->

<script type="text/javascript">

        $('#user_menu').addClass('active');

        function change_online_status(user_id, value, element) {

            $.ajax({
                type: "POST",
                url: site_url + '/reg_users/change_online_status',
                data: "id=" + user_id + "&value=" + value,
                success: function(msg) {
                    if (msg == 1) {
                        if (value == 1) {
                            $(element).parent().html('<h4><i class="fa  fa-circle  text-success"></i><?php echo $result->name; ?> <span class="text-muted small"> - Registered User</span></h4>');
                        } else {
                            $(element).parent().html('<h4><i class="fa  fa-circle  text-danger"></i><?php echo $result->name; ?> <span class="text-muted small"> - Registered User</span></h4>');
                        }
                    }
                    else if (msg == 2) {
                        alert("Error!!");
                    }
                }
            });

        }
        //load registered users by letter
        function load_reg_users_by_letter(letter) {
            $.ajax({
                type: "POST",
                url: site_url + '/reg_users/load_reg_users_by_letter',
                data: "myletter=" + letter,
                success: function(msg)
                {
                    $('#reg_user_filter_content').html(msg);
                }
            });
        }

        function change_publish_status(user_id, value, element) {

            var condition = 'Do you want to enable this user ?';
            if (value == 0) {
                condition = 'Do you want to disable this user?';
            }

            if (confirm(condition)) {
                $.ajax({
                    type: "POST",
                    url: site_url + '/reg_users/change_publish_status',
                    data: "id=" + user_id + "&value=" + value,
                    success: function(msg) {
                        if (msg == 1) {
                            if (value == 1) {
                                $(element).parent().html('<a class="btn btn-success btn-xs" onclick="change_publish_status(' + user_id + ',0,this)" title="click to disable user"><i class="fa fa-check"></i></a>');
                            } else {
                                $(element).parent().html('<a class="btn btn-warning btn-xs" onclick="change_publish_status(' + user_id + ',1,this)" title="click to enable user"><i class="fa fa-exclamation-circle"></i></a>');
                            }

                        } else if (msg == 2) {
                            alert('Error!!');
                        }
                    }
                });
            }
        }

        function load_after_deleted(user_id) {
            if (confirm('Are you sure want to delete this user?')) {
                $.ajax({
                    type: "POST",
                    url: site_url + '/reg_users/delete_reg_users',
                    data: "user_id=" + user_id,
                    success: function(msg)
                    {
                        if (msg == 1) {
                            $('#reg_user' + user_id).hide();
                        }
                        else if (msg == 2) {
                            alert('Error!!');
                        }
                    }
                });
            }
        }

</script>

