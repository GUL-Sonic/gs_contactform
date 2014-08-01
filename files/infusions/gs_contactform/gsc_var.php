<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Infusion: gs_contactform                                		|
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

if (!defined("IN_FUSION") || !IN_FUSION)
   die("Access denied!");
   
 if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}
 
// Variablendefinition contactform.php//
$gsc_ip = getenv("REMOTE_ADDR");
$gsc_name = (isset($_POST['gsc_name'])) ? $_POST['gsc_name'] : "";
$geb = (isset($_POST['geb'])) ? $_POST['geb'] : "";
$firma = (isset($_POST['firma'])) ? $_POST['firma'] : "";
$position = (isset($_POST['position'])) ? $_POST['position'] : "";
$adress = (isset($_POST['adress'])) ? $_POST['adress'] : "";
$plzort = (isset($_POST['plzort'])) ? $_POST['plzort'] : "";
$tel = (isset($_POST['tel'])) ? $_POST['tel'] : "";
$mobil = (isset($_POST['mobil'])) ? $_POST['mobil'] : "";
$fax = (isset($_POST['fax'])) ? $_POST['fax'] : "";

$web = (isset($_POST['web'])) ? $_POST['web'] : "";
$userdef1 = (isset($_POST['userdef1'])) ? $_POST['userdef1'] : "";
$userdef2 = (isset($_POST['userdef2'])) ? $_POST['userdef2'] : "";
$userdef3 = (isset($_POST['userdef3'])) ? $_POST['userdef3'] : "";
$userdef4 = (isset($_POST['userdef4'])) ? $_POST['userdef4'] : "";

$email_kopie = (isset($_POST['email_kopie'])) ? 1 : 0; 

$gsc_geb_tag = (isset($_POST['gsc_geb_tag'])) ? $_POST['gsc_geb_tag'] : "";
$gsc_geb_mon = (isset($_POST['gsc_geb_mon'])) ? $_POST['gsc_geb_mon'] : "";
$gsc_geb_jahr = (isset($_POST['gsc_geb_jahr'])) ? $_POST['gsc_geb_jahr'] : "";

$gsc_firma = (isset($_POST['gsc_firma'])) ? $_POST['gsc_firma'] : "";
$gsc_position = (isset($_POST['gsc_position'])) ? $_POST['gsc_position'] : "";
$gsc_str = (isset($_POST['gsc_str'])) ? $_POST['gsc_str'] : "";
$gsc_hnr = (isset($_POST['gsc_hnr'])) ? $_POST['gsc_hnr'] : "";
$gsc_plz = (isset($_POST['gsc_plz'])) ? $_POST['gsc_plz'] : "";
$gsc_ort = (isset($_POST['gsc_ort'])) ? $_POST['gsc_ort'] : "";

$gsc_tel_vor = (isset($_POST['gsc_tel_vor'])) ? $_POST['gsc_tel_vor'] : "";
$gsc_tel_nr = (isset($_POST['gsc_tel_nr'])) ? $_POST['gsc_tel_nr'] : "";

$gsc_mobil_vor = (isset($_POST['gsc_mobil_vor'])) ? $_POST['gsc_mobil_vor'] : "";
$gsc_mobil_nr = (isset($_POST['gsc_mobil_nr'])) ? $_POST['gsc_mobil_nr'] : "";

$gsc_fax_vor = (isset($_POST['gsc_fax_vor'])) ? $_POST['gsc_fax_vor'] : "";
$gsc_fax_nr = (isset($_POST['gsc_fax_nr'])) ? $_POST['gsc_fax_nr'] : "";

$gsc_email = (isset($_POST['gsc_email'])) ? $_POST['gsc_email'] : "";

$gsc_web = (isset($_POST['gsc_web'])) ? $_POST['gsc_web'] : "";
$gsc_userdef1 = (isset($_POST['gsc_userdef1'])) ? $_POST['gsc_userdef1'] : "";
$gsc_userdef2 = (isset($_POST['gsc_userdef2'])) ? $_POST['gsc_userdef2'] : "";
$gsc_userdef3 = (isset($_POST['gsc_userdef3'])) ? $_POST['gsc_userdef3'] : "";
$gsc_userdef4 = (isset($_POST['gsc_userdef4'])) ? $_POST['gsc_userdef4'] : "";

$gsc_text = (isset($_POST['gsc_text'])) ? $_POST['gsc_text'] : "";
$gsc_senden = (isset($_POST['gsc_senden'])) ? $_POST['gsc_senden'] : "";
$gsc_betreff = (isset($_POST['gsc_betreff'])) ? $_POST['gsc_betreff'] : "";

$geb_show = (isset($_POST['geb_show'])) ? $_POST['geb_show'] : "";
$geb_requ = (isset($_POST['geb_requ'])) ? $_POST['geb_requ'] : "";

$field_name = (isset($_POST['field_name'])) ? $_POST['field_name'] : "";
$field_place = (isset($_POST['field_place'])) ? $_POST['field_place'] : "";
$field_err = (isset($_POST['field_err'])) ? $_POST['field_err'] : "";

$sub_name = (isset($_POST['sub_name'])) ? $_POST['sub_name'] : "";

$edit = (isset($_POST['edit'])) ? $_POST['edit'] : "";
$del = (isset($_POST['del'])) ? $_POST['del'] : "";

$err_ip = (isset($_POST['err_ip'])) ? $_POST['err_ip'] : "";
$err_name = (isset($_POST['err_name'])) ? $_POST['err_name'] : "";
$err_geb = (isset($_POST['err_geb'])) ? $_POST['err_geb'] : "";
$err_firma = (isset($_POST['err_firma'])) ? $_POST['err_firma'] : "";
$err_position = (isset($_POST['err_position'])) ? $_POST['err_position'] : "";
$err_adress = (isset($_POST['err_adress'])) ? $_POST['err_adress'] : "";
$err_plzort = (isset($_POST['err_plzort'])) ? $_POST['err_plzort'] : "";
$err_tel = (isset($_POST['err_tel'])) ? $_POST['err_tel'] : "";
$err_mobil = (isset($_POST['err_mobil'])) ? $_POST['err_mobil'] : "";
$err_fax = (isset($_POST['err_fax'])) ? $_POST['err_fax'] : "";
$err_email = (isset($_POST['err_email'])) ? $_POST['err_email'] : "";
$err_web = (isset($_POST['err_web'])) ? $_POST['err_web'] : "";
$err_url = (isset($_POST['err_url'])) ? $_POST['err_url'] : "";
$err_userdef1 = (isset($_POST['err_userdef1'])) ? $_POST['err_userdef1'] : "";
$err_userdef2 = (isset($_POST['err_userdef2'])) ? $_POST['err_userdef2'] : "";
$err_userdef3 = (isset($_POST['err_userdef3'])) ? $_POST['err_userdef3'] : "";
$err_userdef4 = (isset($_POST['err_userdef4'])) ? $_POST['err_userdef4'] : "";
$err_betreff = (isset($_POST['err_betreff'])) ? $_POST['err_betreff'] : "";
$err_text = (isset($_POST['err_text'])) ? $_POST['err_text'] : "";
$err_captcha = (isset($_POST['err_captcha'])) ? $_POST['err_captcha'] : "";

$err_head = (isset($_POST['err_head'])) ? $_POST['err_head'] : "";

// Variablendefinition gsc_settings_panel.php
$email_to = (isset($_POST['email_to'])) ? $_POST['email_to'] : "";
$email_answer = (isset($_POST['email_answer'])) ? $_POST['email_answer'] : "";
$pm_to = (isset($_POST['pm_to'])) ? $_POST['pm_to'] : "";

// Variablendefinition gsc_ueber_mich.php
$title = (isset($_POST['title'])) ? $_POST['title'] : "";
$about = (isset($_POST['about'])) ? $_POST['about'] : "";

// Variablendefinition gsc_impressum.php

$firm_firma = (isset($_POST['firm_firma'])) ? $_POST['firm_firma'] : "";
$firm_name = (isset($_POST['firm_name'])) ? $_POST['firm_name'] : "";
$firm_str = (isset($_POST['firm_str'])) ? $_POST['firm_str'] : "";
$firm_hnr = (isset($_POST['firm_hnr'])) ? $_POST['firm_hnr'] : "";
$firm_plz = (isset($_POST['firm_plz'])) ? $_POST['firm_plz'] : "";
$firm_ort = (isset($_POST['firm_ort'])) ? $_POST['firm_ort'] : "";
$firm_tel_vor = (isset($_POST['firm_tel_vor'])) ? $_POST['firm_tel_vor'] : "";
$firm_tel_nr = (isset($_POST['firm_tel_nr'])) ? $_POST['firm_tel_nr'] : "";
$firm_mobil_vor = (isset($_POST['firm_mobil_vor'])) ? $_POST['firm_mobil_vor'] : "";
$firm_mobil_nr = (isset($_POST['firm_mobil_nr'])) ? $_POST['firm_mobil_nr'] : "";
$firm_fax_vor = (isset($_POST['firm_fax_vor'])) ? $_POST['firm_fax_vor'] : "";
$firm_fax_nr = (isset($_POST['firm_fax_nr'])) ? $_POST['firm_fax_nr'] : "";
$firm_email = (isset($_POST['firm_email'])) ? $_POST['firm_email'] : "";
$firm_ustid = (isset($_POST['firm_ustid'])) ? $_POST['firm_ustid'] : "";
$firm_title_1= (isset($_POST['firm_title_1'])) ? $_POST['firm_title_1'] : "";
$firm_field_1= (isset($_POST['firm_field_1'])) ? $_POST['firm_field_1'] : "";
$firm_title_2= (isset($_POST['firm_title_2'])) ? $_POST['firm_title_2'] : "";
$firm_field_2= (isset($_POST['firm_field_2'])) ? $_POST['firm_field_2'] : "";
$firm_title_3= (isset($_POST['firm_title_3'])) ? $_POST['firm_title_3'] : "";
$firm_field_3= (isset($_POST['firm_field_3'])) ? $_POST['firm_field_3'] : "";
$firm_title_4= (isset($_POST['firm_title_4'])) ? $_POST['firm_title_4'] : "";
$firm_field_4= (isset($_POST['firm_field_4'])) ? $_POST['firm_field_4'] : "";
$impr_head = (isset($_POST['impr_head'])) ? $_POST['impr_head'] : "";
$impr_name = (isset($_POST['impr_name'])) ? $_POST['impr_name'] : "";
$impr_str = (isset($_POST['impr_str'])) ? $_POST['impr_str'] : "";
$impr_hnr = (isset($_POST['impr_hnr'])) ? $_POST['impr_hnr'] : "";
$impr_plz = (isset($_POST['impr_plz'])) ? $_POST['impr_plz'] : "";
$impr_ort = (isset($_POST['impr_ort'])) ? $_POST['impr_ort'] : "";
$impr_tel_vor = (isset($_POST['impr_tel_vor'])) ? $_POST['impr_tel_vor'] : "";
$impr_tel_nr = (isset($_POST['impr_tel_nr'])) ? $_POST['impr_tel_nr'] : "";
$impr_mobil_vor = (isset($_POST['impr_mobil_vor'])) ? $_POST['impr_mobil_vor'] : "";
$impr_mobil_nr = (isset($_POST['impr_mobil_nr'])) ? $_POST['impr_mobil_nr'] : "";
$impr_fax_vor = (isset($_POST['impr_fax_vor'])) ? $_POST['impr_fax_vor'] : "";
$impr_fax_nr = (isset($_POST['impr_fax_nr'])) ? $_POST['impr_fax_nr'] : "";
$impr_email = (isset($_POST['impr_email'])) ? $_POST['impr_email'] : "";

$impr_disclaimer = (isset($_POST['impr_disclaimer'])) ? $_POST['impr_disclaimer'] : "";

// Variablendefinition gsc_agb.php
$license_agreement = (isset($_POST['license_agreement'])) ? $_POST['license_agreement'] : "";

// Variablendefinition spezieller Funktionen //
$gespeichert = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_positive'>" . $locale['gsc142'] . "</span></td></tr>\n</table>\n";
$ngespeichert = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_negative'>" . $locale['gsc149'] . "</span></td></tr>\n</table>\n";
$geloescht = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_positive'>" . $locale['gsc145'] . "</span></td></tr>\n</table>\n";
$ngeloescht = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_negative'>" . $locale['gsc146'] . "</span></td></tr>\n</table>\n";
$keintrag = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'><tr><td class='tbl2'><span class='gsc_negative'>" . $locale['gsc147'] . "</span></td></tr></table>\n";
$doppelt = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_negative'>" . $locale['gsc150'] . "</span></td></tr>\n</table>\n";
$required = "<span class='gsc_require'>*</span>";
 
 ?>