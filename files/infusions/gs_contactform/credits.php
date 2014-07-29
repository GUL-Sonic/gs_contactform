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
require_once "../../maincore.php";
require_once THEMES . "templates/admin_header_mce.php";

if (!iADMIN)
    redirect("../../index.php");

if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}

include INFUSIONS . "gs_contactform/infusion_db.php";
include_once INFUSIONS . "gs_contactform/gsc_functions.php";
include_once INFUSIONS . "gs_contactform/gsc_var.php";

opentable('<center>'.$locale['gsc160'].'</center>');

require_once "gsc_navigation.php";

closetable();

opentable("<center>".$locale['gsc169']."</center>");

echo "
<h1>GUL-Sonic's Erweitertes Kontaktformular <br>
...jetzt auch mit Impressum / Disclaimer / AGB / pers&ouml;nlicher Vorstellungsseite (&uuml;ber...)</h1>

<h2>Rechtliche Hinweise</h2>

<p><strong>Diese Infusion wurde 2014 von Ingo Wehrstedt (GUL-Sonic) f&uuml;r php-fusion 7.02.XX entwickelt<br>
und unterliegt als kostenloses php-fusion Add-on den <a href='http://www.gnu.de/documents/gpl.de.html'>AGPL v3 Lizenzbestimmungen</a>. Zus&auml;tzlich gelten jedoch folgende Bestimmungen:

<ul>
<li>Sie sind nicht berechtigt das Copyright dieser Infusion zu bearbeite oder zu entfernen!</li>

<li>Sie sind nicht berechtigt diese Infusion als Ihre eigene auszugeben!</li>

<li>Sie sind nicht berechtigt die Credits oder diese readme zu bearbeiten oder zu entfernen!</li></ul></p>

<p>&nbsp;</p>

<h2>Features / Installationsanleitung / Updateanleitung / Changelog</h2>

<p><strong>Automatisch ausgef&uuml;llte Felder:</strong>
<ul>IP</ul></p>

<p><strong>Standard Ausf&uuml;llfelder:</strong>
<ul>Name<br>
	Email<br>
	Betreff<br>
	Nachricht<br>
	Captcha<br>
	* Diese Felder sind immer aktiv und als Pflichtfelder deklariert.</ul></p>

<p><strong>Optionale Ausf&uuml;llfelder:</strong>

<ul>Geburtsdatum<br>
    Firma / Organisation<br>
    Funktion / Position<br>
    Strasse und Hausnummer (Adresse)<br>
    Postleitzahl / Ort<br>
    Telefon<br>
    Mobil<br>
    Fax<br>
    Webadresse<br>
	* Diese Ausf&uuml;llfelder k&ouml;nnen aktiv gesetzt werden und auch zum Pflichtfeld gemacht werden.</ul></p>

<p><strong>4 Benutzer definierte Ausf&uuml;llfelder:</strong>

<ul>Feld 1<br>
    Feld 2<br>
    Feld 3<br>
    Feld 4<br>
	* Diese Felder k&ouml;nnen vom Benutzer selbst benannt, aktiviert und zum Pflichtfeld gemacht werden.</ul></p>

<p><strong>Eigene Betreffs eingeben:</strong>

<ul>Anstatt dem Standardausf&uuml;llfeld, k&ouml;nnen x-beliebige Betreffs erstellt und dann im Contactformular ausgef&uuml;llt werden.</ul></p>

<p><strong>Weitere Features:</strong>

<ul>Die Kontaktformular&uuml;berschrift ist frei w&auml;hlbar.<br>
    Bei fehlerhafter Eingabe wird der Benutzer via Fehlermeldung darauf hingewiesen.<br>
    Alle bis dato gemachten Eingaben bleiben erhalten.<br>
    Versandt per Email, gleichzeitig PN an Superadmin.<br>
    Die Kontaktanfragen werden zus&auml;tzlich in einer Datenbank gespeichert und k&ouml;nnen, dort jederzeit angesehen oder gel&ouml;scht werden.</ul></p>

<p><strong>Installation:</strong>

<ul>Lade die contactform.php und den Ordner infusions/gs_contactform in Dein root Verzeichnis.<br>
    Die Installation l&auml;uft wie bei php-fusion &uuml;blich &uuml;ber den Adminbereich System Infusions.<br>
    W&auml;hle dort das Gs Contactform aus und infundiere dies.<br>
    Bei Nutzung des Standard Navigationsplanels wird automatisch ein Link auf die contactform.php gesetzt.</ul></p>

<p><strong>Update:</strong>

<ul>Ersetze die contactform.php und den Ordner infusions/gs_contactform in Deinem root Verzeichnis.<br>
    Sobald Du nun die Einstellungsseite der gs_contactform - Infusion aufrufst wirst Du &uuml;ber ein Datenbankupdate informiert<br>
    F&uuml;hre das Datenbankupdate aus<br> 
	Wenn dieses erfolgreich abgeschlossen ist, klicke auf \"zur&uuml;ck\"<br>
	Fertig!</ul></p>

<p><strong>Changelog V1.0.1</strong>

<ul> Variablendefinitionen verursachten vereinzelte Notice-Meldungen (gefixt)<br>
    Optische Verbesserungen (Grafiken)<br>
    Index.php in Ordnern fehlten (gefixt)<br>
    Zugriff auf .php Dateien die includiert sind wurde ohne vorherigen Aufruf des entsprechenden Formulares nicht verweigert (gefixt)<br>
    Neue Versionsnummer 1.0.1</ul></p>

<p><strong>Changelog V1.1</strong>

<ul>Kleinere Variablenfixes<br>
    Emailadresse an die die Kontaktanfrage gesendet werden soll ist nun frei w&auml;hlbar (Seitenemail als Standard)<br>
    PM bei Kontaktanfrage Auswahl wer die PM erhalten soll oder ob keine gesendet werden soll<br>
    Der Fragesteller kann nun eine Kopie der Email erhalten wenn er das im contactform ausw&auml;hlt<br>
    Absenderemail der Kopie ist nun frei w&auml;hlbar (Seitenemail als Standard)<br>
    Versionspr&uuml;fung nun &uuml;ber cURL und falls das fehlschl&auml;gt (Strato ^.^) dann erfolgt die Versionspr&uuml;fung &uuml;ber fsockopen.<br>
    Updatescript wurde erweitert<br>
    Neue Versionsnummer 1.1</ul></p>

<p><strong>Changelog V1.2</strong>

	<ul><strong>Hinweis:</strong> contactform.php wurde nun vom root in den infusions/gs_contactform Ordner verschoben<br>
	Noticemeldung bei fehlgeschlagener cURL Verbindung (gefixt)<br>
    Kleinere Tabellenfixes<br>
	Impressum mit erweiterten Features hinzugef&uuml;gt<br>
    Disclaimer hinzugef&uuml;gt<br>
    Standard AGB integriert<br>
	Informationsseite \"&uuml;ber..\" hinzugef&uuml;gt<br>
    Bearbeitung von Disclaimer / Standard AGB / &uuml;ber... via TinyMCE bzw. CKEditor m&ouml;glich<br>
	Bei deaktiviertem TinyMCE Bearbeitung mittels html Button m&ouml;glich<br>
	Navigationslinks k&ouml;nnen per Klick erstellt, bearbeitet oder deinstalliert werden<br>
	Dezentes &copy; Symbol auf allen &ouml;ffentlich zug&auml;nglichen Seiten ersetzt den bisherigen Text<br>
	Credits hinzugef&uuml;gt<br>
    Updatescript wurde erweitert<br>
    Neue Versionsnummer 1.2</ul></p>";
	
closetable();

include_once INFUSIONS . "gs_contactform/gsc_versionschecker.php";

include INFUSIONS . "gs_contactform/gsc_copyright.php";

require_once THEMES."templates/footer.php";
?>
