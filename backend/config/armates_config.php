<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//Custom configuration file.

//This is to set the site title
$config['APPLICATION_MAIN_TITLE'] = "Armates ";
$config['LOGIN_OPTION']           = 1;


//User Types
$config['ALL'] = 0;
$config['SUPERADMIN'] = 1;
$config['ADMIN']      = 2;
$config['REGISTERED'] = 3;

//Systems
$systems= array('ADVERTISEMENT','USERS','PAGES','REVIEWS','VEHICLE SPECS','SETTINGS');
$config['SYSTEMS']=$systems;

$config['css_classes']= array('col2-3','col1-3');