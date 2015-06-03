
<ul class="sidebar-menu" id="nav-accordion">
    <li>
        <a  href="<?php echo site_url(); ?>/dashboard" id="dashboard_menu">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" id="user_menu">
            <i class="fa fa-users"></i>
            <span>Users</span>
        </a> 
        <ul class="sub">
            <li><a  href="<?php echo site_url(); ?>/users/manage_admins" onclick="">Manage Administrators</a></li>
            <!--<li><a  href="<?php echo site_url(); ?>/reg_users/manage_registered_users">Manage Registered Users</a></li>-->
        </ul>
    </li>

     <?php
    $perm = Access_controll_service::check_access('ADD_ADVERTISEMENT');
   if ($perm) 
   {        ?>
        <li class="sub-menu">
            <a href="javascript:;" id="articles_menu">
                <i class="fa fa-film"></i>
                <span>Articles</span>
            </a>
            <ul class="sub">
                <li><a  href="<?php echo site_url(); ?>/articles/manage_articles">My Articles</a></li>
            </ul>
        </li>
    <?php } ?>
        

    <li class="sub-menu">
        <a href="javascript:;" id="pages_menu">
            <i class="fa fa-folder-open"></i>
            <span>Manage Pages</span>
        </a> 
        <ul class="sub">
            <li><a href="<?php echo site_url(); ?>/contents/load_contents_by_hcode/ABOUTUS">About Us</a></li>
            <li><a href="<?php echo site_url(); ?>/contents/load_contents_by_hcode/SERVICES">Services</a></li>
            <li><a href="<?php echo site_url(); ?>/contents/load_contents_by_hcode/BLOG">Blog</a></li>
            <li><a href="<?php echo site_url(); ?>/contents/load_contents_by_hcode/CONTACT">Contact</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" id="comments_menu">
            <i class="fa fa-comment-o"></i>
            <span>Reviews</span>
        </a> 
        <ul class="sub">
            <li><a  href="<?php echo site_url(); ?>/comments/manage_comments">Website Reviews</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" id="vehicle_spec_menu">
            <i class="fa fa-cogs"></i>
            <span>Article Specifications</span>
        </a>
        <ul class="sub">
            <li><a  href="<?php echo site_url(); ?>/article_categories/manage_article_categoriess">Manage Article Categories</a></li>
        </ul>        
    </li>

    <li class="sub-menu">
        <a href="javascript:;" id="settings_menu">
            <i class="fa  fa-wrench"></i>
            <span>Settings</span>
        </a>
        <ul class="sub">
            <li><a  href="<?php echo site_url(); ?>/privilege_master/manage_privilege_masters">Manage Master Privileges</a></li>
            <li><a  href="<?php echo site_url(); ?>/privilege/manage_privileges">Manage Privileges</a></li>

        </ul>        
    </li>




</ul>

