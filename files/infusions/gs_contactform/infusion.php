<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Infusion: gs_contactform      	                           	|
 | Author:   GUL-Sonic											|
 | web		 http://www.germanys-united-legends.de 				|
 | Email	 gul-sonic@online.de 								|
 +--------------------------------------------------------------+
 | This program is released as free software under the			|
 | Affero GPL license. You can redistribute it and/or			|
 | modify it under the terms of this license which you			|
 | can read by viewing the included agpl.txt or online			|
 | at www.gnu.org/licenses/agpl.html. Removal of this			|
 | copyright header is strictly prohibited without				|
 | written permission from the original author(s).				|
 +--------------------------------------------------------------*/
 
 if (!defined("IN_FUSION")) {
    die("Access Denied");
}

include INFUSIONS . "gs_contactform/infusion_db.php";

if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}

// Infusion general information
$inf_title = $locale['gsc000'];
$inf_version = $locale['gsc001'];
$inf_developer = "GUL-Sonic";
$inf_weburl = "http://germanys-united-legends.de";
$inf_email = "gul-sonic@online.de";
$inf_folder = "gs_contactform";
$inf_description = $locale['gsc002'];

$inf_newtable[1] = DB_GSC_CONTACT . "(
id int(11) NOT NULL auto_increment,
gsc_ip varchar(100) NOT NULL,
gsc_name varchar(100) NOT NULL,
gsc_geb varchar(100) NOT NULL,
gsc_firma varchar(100) NOT NULL,
gsc_position varchar(100) NOT NULL,
gsc_adress varchar(100) NOT NULL,
gsc_plzort varchar(100) NOT NULL,
gsc_tel varchar(100) NOT NULL,
gsc_mobil varchar(100) NOT NULL,
gsc_fax varchar(100) NOT NULL,
gsc_email varchar(100) NOT NULL,
gsc_web varchar(100) NOT NULL,
gsc_userdef1 varchar(100) NOT NULL,
gsc_userdef2 varchar(100) NOT NULL,
gsc_userdef3 varchar(100) NOT NULL,
gsc_userdef4 varchar(100) NOT NULL,
gsc_betreff varchar(100) NOT NULL,
gsc_nachricht TEXT NOT NULL,
gsc_timestamp INT(10) UNSIGNED NOT NULL DEFAULT '0',
PRIMARY KEY  (id)
)ENGINE=MyISAM;";

$inf_newtable[2] = DB_GSC_SUBJECT . " (
id int(11) NOT NULL auto_increment,
sub_name varchar(100) NOT NULL,
PRIMARY KEY  (id)
)ENGINE=MyISAM;";

$inf_newtable[3] = DB_GSC_FIELDS . " (
id int(11) NOT NULL auto_increment,
field_name varchar(100) NOT NULL,
field_place varchar(100) NOT NULL,
field_err varchar(100) NOT NULL,
PRIMARY KEY  (id)
)ENGINE=MyISAM;";

$inf_newtable[4] = DB_GSC_SETTINGS . " (
id int(11) NOT NULL auto_increment,
form_header varchar(250) NOT NULL,
geb_show BOOL NOT NULL,
geb_requ BOOL NOT NULL,
firma_show BOOL NOT NULL,
firma_requ BOOL NOT NULL,
position_show BOOL NOT NULL,
position_requ BOOL NOT NULL,
adress_show BOOL NOT NULL,
adress_requ BOOL NOT NULL,
plzort_show BOOL NOT NULL,
plzort_requ BOOL NOT NULL,
tel_show BOOL NOT NULL,
tel_requ BOOL NOT NULL,
mobil_show BOOL NOT NULL,
mobil_requ BOOL NOT NULL,
fax_show BOOL NOT NULL,
fax_requ BOOL NOT NULL,
web_show BOOL NOT NULL,
web_requ BOOL NOT NULL,
userdef1_show BOOL NOT NULL,
userdef1_requ BOOL NOT NULL,
userdef2_show BOOL NOT NULL,
userdef2_requ BOOL NOT NULL,
userdef3_show BOOL NOT NULL,
userdef3_requ BOOL NOT NULL,
userdef4_show BOOL NOT NULL,
userdef4_requ BOOL NOT NULL,
version varchar(20) NOT NULL,
PRIMARY KEY  (id)
)ENGINE=MyISAM;";

$inf_droptable[1] = DB_GSC_CONTACT;
$inf_droptable[2] = DB_GSC_SUBJECT;
$inf_droptable[3] = DB_GSC_FIELDS;
$inf_droptable[4] = DB_GSC_SETTINGS;

$inf_insertdbrow[1] = DB_GSC_FIELDS. " VALUES ('1','','','')";
$inf_insertdbrow[2] = DB_GSC_FIELDS. " VALUES ('2','','','')";
$inf_insertdbrow[3] = DB_GSC_FIELDS. " VALUES ('3','','','')";
$inf_insertdbrow[4] = DB_GSC_FIELDS. " VALUES ('4','','','')";

$inf_insertdbrow[5] = DB_GSC_SETTINGS . " SET form_header='".$locale['gsc020']."', geb_show='0', geb_requ='0', firma_show='0', firma_requ='0', position_show='0', position_requ='0', adress_show='0', adress_requ='0', plzort_show='0', plzort_requ='0', tel_show='0', tel_requ='0', mobil_show='0', mobil_requ='0', fax_show='0', fax_requ='0', web_show='0', web_requ='0', userdef1_show='0', userdef1_requ='0', userdef2_show='0', userdef2_requ='0', userdef3_show='0', userdef3_requ='0', userdef4_show='0', userdef4_requ='0',  version='" . $locale['gsc001'] . "'";

$inf_adminpanel[1] = array(
    "title" => $locale['gsc000'],
    "image" => "../infusions/gs_contactform/images/contact.png",
    "panel" => "gsc_settings_panel.php",
    "rights" => "GSC"
);

$inf_sitelink[1] = array(
	"title" => $locale['gsc000'],
	"url" => "../../contactform.php",
	"visibility" => "0"
);
?>