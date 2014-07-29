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
 
 require_once "../../../maincore.php";

// Check: iAUTH and $aid
if (!defined("iAUTH") || $_GET['aid'] != iAUTH) redirect("../../index.php");

// Includes
require_once INFUSIONS."gs_contactform/infusion_db.php";

// Check: Admin Rights
if (!iADMIN) redirect("index.php");

// Header
	require_once THEMES."templates/header.php";

// Language Files
if (file_exists(INFUSIONS."gs_contactform/locale/".$settings['locale'].".php")) {
	include INFUSIONS."gs_contactform/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."gs_contactform/locale/German.php";
}

// MySQL database functions
function dbquery_gsc_update($query) {
	$result = @mysql_query($query);
	if (!$result) {
		//echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

opentable($locale['gsc306'].": v1.1 => v1.2");

$mysql[] = "UPDATE ".DB_GSC_SETTINGS." SET version='1.2'";

$mysql[] = "UPDATE ".DB_INFUSIONS." SET inf_version='1.2' WHERE inf_folder='gs_contactform'";

$mysql[] = "CREATE TABLE ".DB_GSC_ABOUT . " (
id int(11) NOT NULL auto_increment,
title varchar(100) NOT NULL,
about Text NOT NULL,
PRIMARY KEY  (id)
) ENGINE=MyISAM;";

$mysql[] = "CREATE TABLE ".DB_GSC_IMPRESSUM . " (
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
) ENGINE=MyISAM;";

$mysql[] = "INSERT ".DB_GSC_ABOUT." (id, title, about) VALUES ('1','".$locale['gsc320']."', '')";

$mysql[] = "INSERT ".DB_GSC_IMPRESSUM. " SET id='1', firm_firma='" . $settings['sitename'] . "', impr_head='" . $locale['gsc341'] . "', impr_name='" . $settings['siteusername'] . "', impr_email='" . $settings['siteemail'] . "', impr_disclaimer_agb='2', impr_disclaimer='
<p style=\"text-align:justify\"><strong>1. Haftungsbeschr&auml;nkung</strong><br />
Die Inhalte dieser Website werden mit gr&ouml;&szlig;tm&ouml;glicher Sorgfalt erstellt. Der Anbieter &uuml;bernimmt jedoch keine Gew&auml;hr f&uuml;r die Richtigkeit, Vollst&auml;ndigkeit und Aktualit&auml;t der bereitgestellten Inhalte. Die Nutzung der Inhalte der Website erfolgt auf eigene Gefahr des Nutzers. Namentlich gekennzeichnete Beitr&auml;ge geben die Meinung des jeweiligen Autors und nicht immer die Meinung des Anbieters wieder. Mit der reinen Nutzung der Website des Anbieters kommt keinerlei Vertragsverh&auml;ltnis zwischen dem Nutzer und dem Anbieter zustande.</p>

<p style=\"text-align:justify\"><strong>2. Externe Links</strong><br />
Diese Website enth&auml;lt Verkn&uuml;pfungen zu Websites Dritter (&#39;externe Links&#39;). Diese Websites unterliegen der Haftung der jeweiligen Betreiber. Der Anbieter hat bei der erstmaligen Verkn&uuml;pfung der externen Links die fremden Inhalte daraufhin &uuml;berpr&uuml;ft, ob etwaige Rechtsverst&ouml;&szlig;e bestehen. Zu dem Zeitpunkt waren keine Rechtsverst&ouml;&szlig;e ersichtlich. Der Anbieter hat keinerlei Einfluss auf die aktuelle und zuk&uuml;nftige Gestaltung und auf die Inhalte der verkn&uuml;pften Seiten. Das Setzen von externen Links bedeutet nicht, dass sich der Anbieter die hinter dem Verweis oder Link liegenden Inhalte zu Eigen macht. Eine st&auml;ndige Kontrolle der externen Links ist f&uuml;r den Anbieter ohne konkrete Hinweise auf Rechtsverst&ouml;&szlig;e nicht zumutbar. Bei Kenntnis von Rechtsverst&ouml;&szlig;en werden jedoch derartige externe Links unverz&uuml;glich gel&ouml;scht.</p>

<p style=\"text-align:justify\"><strong>3. Urheber- und Leistungsschutzrechte</strong><br />
Die auf dieser Website ver&ouml;ffentlichten Inhalte unterliegen dem deutschen Urheber- und Leistungsschutzrecht. Jede vom deutschen Urheber- und Leistungsschutzrecht nicht zugelassene Verwertung bedarf der vorherigen schriftlichen Zustimmung des Anbieters oder jeweiligen Rechteinhabers. Dies gilt insbesondere f&uuml;r Vervielf&auml;ltigung, Bearbeitung, &Uuml;bersetzung, Einspeicherung, Verarbeitung bzw. Wiedergabe von Inhalten in Datenbanken oder anderen elektronischen Medien und Systemen. Inhalte und Rechte Dritter sind dabei als solche gekennzeichnet. Die unerlaubte Vervielf&auml;ltigung oder Weitergabe einzelner Inhalte oder kompletter Seiten ist nicht gestattet und strafbar. Lediglich die Herstellung von Kopien und Downloads f&uuml;r den pers&ouml;nlichen, privaten und nicht kommerziellen Gebrauch ist erlaubt.<br />
Die Darstellung dieser Website in fremden Frames ist nur mit schriftlicher Erlaubnis zul&auml;ssig.</p>

<p style=\"text-align:justify\"><strong>4. Datenschutz</strong><br />
Durch den Besuch der Website des Anbieters k&ouml;nnen Informationen &uuml;ber den Zugriff (Datum, Uhrzeit, betrachtete Seite) gespeichert werden. Diese Daten geh&ouml;ren nicht zu den personenbezogenen Daten, sondern sind anonymisiert. Sie werden ausschlie&szlig;lich zu statistischen Zwecken ausgewertet. Eine Weitergabe an Dritte, zu kommerziellen oder nichtkommerziellen Zwecken, findet nicht statt.<br />
Der Anbieter weist ausdr&uuml;cklich darauf hin, dass die Daten&uuml;bertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitsl&uuml;cken aufweisen und nicht l&uuml;ckenlos vor dem Zugriff durch Dritte gesch&uuml;tzt werden kann.<br />
Die Verwendung der Kontaktdaten des Impressums zur gewerblichen Werbung ist ausdr&uuml;cklich nicht erw&uuml;nscht, es sei denn der Anbieter hatte zuvor seine schriftliche Einwilligung erteilt oder es besteht bereits eine Gesch&auml;ftsbeziehung. Der Anbieter und alle auf dieser Website genannten Personen widersprechen hiermit jeder kommerziellen Verwendung und Weitergabe ihrer Daten.</p>

<p style=\"text-align:justify\"><strong>5. AGB&#39;s / Nutzungsbedingungen</strong><br />
Die Nutzung unserer Community und der integrierten Foren, setzt die vorherige Registration auf unserer Seite und die Einverst&auml;ndniserkl&auml;rung / Akzeptanz unserer <a href=\"".$settings['siteurl']."infusions/gs_contactform/agb.php\">AGB&#39;s / Nutzungsbedingungen</a> voraus.</p>

<p>Quelle: Disclaimer von <a href=\"http://www.juraforum.de\" target=\"_blank\" title=\"JuraForum.de\">JuraForum.de</a> &amp; <a href=\"http://www.experten-branchenbuch.de\" target=\"_blank\" title=\"Experten-Branchenbuch.de\">Experten-Branchenbuch.de</a></p>', impr_timestamp='" . time(). "'";

$errors = 0;
foreach($mysql as $query) {

		if(dbquery_gsc_update($query)) {
			$res = "<b>".$locale['gsc307']."</b>";
		} else {
			$errors++;
			$res = "<b>".$locale['gsc308'].":</b>&nbsp;";
			$res .= mysql_error();
		}

	echo "<br /><code>".htmlentities($query)."</code>";

	echo "<br />".$res."<br />";

}

if($errors) {
	echo "<p><font color='red'><b>".$locale['gsc309'].": ".$errors."</b></font></p>";
} else {
	echo "<p><p>&nbsp;</p>";
	echo "<p align='center'><font color='green'><b>".$locale['gsc310']."</b></font></p>";
	echo "<p><p>&nbsp;</p>";
}
echo "<br /><a href='".INFUSIONS."gs_contactform/gsc_settings_panel.php".$aidlink."'>".$locale['gsc311']."</a><br /><br />";

closetable();

// Footer
	require_once THEMES."templates/footer.php";
?>