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
email_to varchar(250) NOT NULL,
email_answer varchar(250) NOT NULL,
pm_to varchar(10) NOT NULL,
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

$inf_newtable[5] = DB_GSC_ABOUT . " (
id int(11) NOT NULL auto_increment,
title varchar(100) NOT NULL,
about Text NOT NULL,
PRIMARY KEY  (id)
)ENGINE=MyISAM;";

$inf_newtable[6] = DB_GSC_IMPRESSUM . " (
id int(11) NOT NULL auto_increment,
firm_firma varchar(250) NOT NULL,
firm_logo varchar(100) NOT NULL,
firm_name varchar(100) NOT NULL,
firm_str varchar(100) NOT NULL,
firm_hnr varchar(10) NOT NULL,
firm_plz varchar(10) NOT NULL,
firm_ort varchar(100) NOT NULL,
firm_tel_vor varchar(10) NOT NULL,
firm_tel_nr varchar(10) NOT NULL,
firm_mobil_vor varchar(10) NOT NULL,
firm_mobil_nr varchar(10) NOT NULL,
firm_fax_vor varchar(10) NOT NULL,
firm_fax_nr varchar(10) NOT NULL,
firm_email varchar(100) NOT NULL,
firm_ustid varchar(100) NOT NULL,
firm_title_1 varchar(100) NOT NULL,
firm_field_1 varchar(100) NOT NULL,
firm_title_2 varchar(100) NOT NULL,
firm_field_2 varchar(100) NOT NULL,
firm_title_3 varchar(100) NOT NULL,
firm_field_3 varchar(100) NOT NULL,
firm_title_4 varchar(100) NOT NULL,
firm_field_4 varchar(100) NOT NULL,
firm_title_5 varchar(100) NOT NULL,
firm_field_5 varchar(500) NOT NULL,
impr_head varchar(250) NOT NULL,
impr_name varchar(100) NOT NULL,
impr_str varchar(100) NOT NULL,
impr_hnr varchar(10) NOT NULL,
impr_plz varchar(10) NOT NULL,
impr_ort varchar(100) NOT NULL,
impr_tel_vor varchar(10) NOT NULL,
impr_tel_nr varchar(10) NOT NULL,
impr_mobil_vor varchar(10) NOT NULL,
impr_mobil_nr varchar(10) NOT NULL,
impr_fax_vor varchar(10) NOT NULL,
impr_fax_nr varchar(10) NOT NULL,
impr_email varchar(100) NOT NULL,
impr_disclaimer_agb int(1) NOT NULL,
impr_disclaimer TEXT NOT NULL,
impr_timestamp INT(10) UNSIGNED NOT NULL DEFAULT '0',
PRIMARY KEY  (id)
)ENGINE=MyISAM;";

$inf_droptable[1] = DB_GSC_CONTACT;
$inf_droptable[2] = DB_GSC_SUBJECT;
$inf_droptable[3] = DB_GSC_FIELDS;
$inf_droptable[4] = DB_GSC_SETTINGS;
$inf_droptable[5] = DB_GSC_ABOUT;
$inf_droptable[6] = DB_GSC_IMPRESSUM;

$inf_insertdbrow[1] = DB_GSC_FIELDS. " VALUES ('1','','','')";
$inf_insertdbrow[2] = DB_GSC_FIELDS. " VALUES ('2','','','')";
$inf_insertdbrow[3] = DB_GSC_FIELDS. " VALUES ('3','','','')";
$inf_insertdbrow[4] = DB_GSC_FIELDS. " VALUES ('4','','','')";

$inf_insertdbrow[5] = DB_GSC_SETTINGS . " SET form_header='" . $locale['gsc020'] . "', email_to='" . $settings['siteemail'] . "', email_answer='" . $settings['siteemail']."', pm_to='1', geb_show='0', geb_requ='0', firma_show='0', firma_requ='0', position_show='0', position_requ='0', adress_show='0', adress_requ='0', plzort_show='0', plzort_requ='0', tel_show='0', tel_requ='0', mobil_show='0', mobil_requ='0', fax_show='0', fax_requ='0', web_show='0', web_requ='0', userdef1_show='0', userdef1_requ='0', userdef2_show='0', userdef2_requ='0', userdef3_show='0', userdef3_requ='0', userdef4_show='0', userdef4_requ='0',  version='" . $locale['gsc001'] . "'";

$inf_insertdbrow[6] = DB_GSC_ABOUT. " VALUES ('1','" . $locale['gsc320'] . "','')";

$inf_insertdbrow[7] = DB_GSC_IMPRESSUM. " SET id='1', firm_firma='" . $settings['sitename'] . "', impr_head='" . $locale['gsc341'] . "', impr_name='" . $settings['siteusername'] . "', impr_email='" . $settings['siteemail'] . "', impr_disclaimer_agb='2', impr_disclaimer='
<p style=\"text-align:justify\"><strong>1. Haftungsbeschr&auml;nkung</strong><br />
Die Inhalte dieser Website werden mit gr&ouml;&szlig;tm&ouml;glicher Sorgfalt erstellt. Der Anbieter &uuml;bernimmt jedoch keine Gew&auml;hr f&uuml;r die Richtigkeit, Vollst&auml;ndigkeit und Aktualit&auml;t der bereitgestellten Inhalte. Die Nutzung der Inhalte der Website erfolgt auf eigene Gefahr des Nutzers. Namentlich gekennzeichnete Beitr&auml;ge geben die Meinung des jeweiligen Autors und nicht immer die Meinung des Anbieters wieder. Mit der reinen Nutzung der Website des Anbieters kommt keinerlei Vertragsverh&auml;ltnis zwischen dem Nutzer und dem Anbieter zustande.</p>
<p>&nbsp;</p>
<p style=\"text-align:justify\"><strong>2. Externe Links</strong><br />
Diese Website enth&auml;lt Verkn&uuml;pfungen zu Websites Dritter (&#39;externe Links&#39;). Diese Websites unterliegen der Haftung der jeweiligen Betreiber. Der Anbieter hat bei der erstmaligen Verkn&uuml;pfung der externen Links die fremden Inhalte daraufhin &uuml;berpr&uuml;ft, ob etwaige Rechtsverst&ouml;&szlig;e bestehen. Zu dem Zeitpunkt waren keine Rechtsverst&ouml;&szlig;e ersichtlich. Der Anbieter hat keinerlei Einfluss auf die aktuelle und zuk&uuml;nftige Gestaltung und auf die Inhalte der verkn&uuml;pften Seiten. Das Setzen von externen Links bedeutet nicht, dass sich der Anbieter die hinter dem Verweis oder Link liegenden Inhalte zu Eigen macht. Eine st&auml;ndige Kontrolle der externen Links ist f&uuml;r den Anbieter ohne konkrete Hinweise auf Rechtsverst&ouml;&szlig;e nicht zumutbar. Bei Kenntnis von Rechtsverst&ouml;&szlig;en werden jedoch derartige externe Links unverz&uuml;glich gel&ouml;scht.</p>
<p>&nbsp;</p>
<p style=\"text-align:justify\"><strong>3. Urheber- und Leistungsschutzrechte</strong><br />
Die auf dieser Website ver&ouml;ffentlichten Inhalte unterliegen dem deutschen Urheber- und Leistungsschutzrecht. Jede vom deutschen Urheber- und Leistungsschutzrecht nicht zugelassene Verwertung bedarf der vorherigen schriftlichen Zustimmung des Anbieters oder jeweiligen Rechteinhabers. Dies gilt insbesondere f&uuml;r Vervielf&auml;ltigung, Bearbeitung, &Uuml;bersetzung, Einspeicherung, Verarbeitung bzw. Wiedergabe von Inhalten in Datenbanken oder anderen elektronischen Medien und Systemen. Inhalte und Rechte Dritter sind dabei als solche gekennzeichnet. Die unerlaubte Vervielf&auml;ltigung oder Weitergabe einzelner Inhalte oder kompletter Seiten ist nicht gestattet und strafbar. Lediglich die Herstellung von Kopien und Downloads f&uuml;r den pers&ouml;nlichen, privaten und nicht kommerziellen Gebrauch ist erlaubt.<br />
Die Darstellung dieser Website in fremden Frames ist nur mit schriftlicher Erlaubnis zul&auml;ssig.</p>
<p>&nbsp;</p>
<p style=\"text-align:justify\"><strong>4. Datenschutz</strong><br />
Durch den Besuch der Website des Anbieters k&ouml;nnen Informationen &uuml;ber den Zugriff (Datum, Uhrzeit, betrachtete Seite) gespeichert werden. Diese Daten geh&ouml;ren nicht zu den personenbezogenen Daten, sondern sind anonymisiert. Sie werden ausschlie&szlig;lich zu statistischen Zwecken ausgewertet. Eine Weitergabe an Dritte, zu kommerziellen oder nichtkommerziellen Zwecken, findet nicht statt.<br />
Der Anbieter weist ausdr&uuml;cklich darauf hin, dass die Daten&uuml;bertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitsl&uuml;cken aufweisen und nicht l&uuml;ckenlos vor dem Zugriff durch Dritte gesch&uuml;tzt werden kann.<br />
Die Verwendung der Kontaktdaten des Impressums zur gewerblichen Werbung ist ausdr&uuml;cklich nicht erw&uuml;nscht, es sei denn der Anbieter hatte zuvor seine schriftliche Einwilligung erteilt oder es besteht bereits eine Gesch&auml;ftsbeziehung. Der Anbieter und alle auf dieser Website genannten Personen widersprechen hiermit jeder kommerziellen Verwendung und Weitergabe ihrer Daten.</p>
<p>&nbsp;</p>
<p style=\"text-align:justify\"><strong>5. AGB&#39;s / Nutzungsbedingungen</strong><br />
Die Nutzung unserer Community und der integrierten Foren, setzt die vorherige Registration auf unserer Seite und die Einverst&auml;ndniserkl&auml;rung / Akzeptanz unserer <a href=\"".$settings['siteurl']."infusions/gs_contactform/agb.php\">AGB&#39;s / Nutzungsbedingungen</a> voraus.</p>
<p>&nbsp;</p>
<p>Quelle: Disclaimer von <a href=\"http://www.juraforum.de\" target=\"_blank\" title=\"JuraForum.de\">JuraForum.de</a> &amp; <a href=\"http://www.experten-branchenbuch.de\" target=\"_blank\" title=\"Experten-Branchenbuch.de\">Experten-Branchenbuch.de</a></p>', impr_timestamp='" . time(). "'";

$inf_adminpanel[1] = array(
    "title" => $locale['gsc000'],
    "image" => INFUSIONS."gs_contactform/images/contact.png",
    "panel" => "gsc_settings_panel.php",
    "rights" => "GSC"
);

$inf_sitelink[1] = array(
	"title" => $locale['gsc000'],
	"url" => "contactform.php",
	"visibility" => "0"
);

?>