<?php
//folder for themes files
$themeFolder = "themes";
$themeName = "iptelecom";
//dedicated user name for db queries in dedicated installation
$dedicatedUserName = "randrade";

return array(
    //default theme
    "theme"=>$themeFolder.".".$themeName.".",
    "theme_name"=>$themeName,
    //if installation is dedicated
    "isDedicated" => true,
    //dedicated user name for db queries in dedicated installation
    //AFTER INSTALLATION: CREATE ACCOUNT WITH THIS USER NAME
    "dedicatedUserName" => $dedicatedUserName
);

//if installation is dedicated
$isDedicated = true;

