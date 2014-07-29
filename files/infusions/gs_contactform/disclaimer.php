<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: contact.php
| Author: Nick Jones (Digitanium)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
require_once "../../maincore.php";
require_once THEMES."templates/header.php";

if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}

include INFUSIONS . "gs_contactform/infusion_db.php";

opentable("<center>" . $locale['gsc167'] . "</center>");

$data24 = dbarray(dbquery("SELECT * FROM " . DB_GSC_IMPRESSUM . " WHERE id='1'"));

echo "<center>" . $locale['gsc344'] . " " . ucfirst(showdate("longdate", $data24['impr_timestamp']))."</center><br>";

echo stripslashes($data24['impr_disclaimer']);

closetable();

echo "<table align='right' border='0'><tr><td align='right' colspan='0'><a href='mailto:gul-sonic@online.de' title='Copyright by GUL-Sonic'>&copy;</a></td></tr></table>";

require_once THEMES."templates/footer.php";
?>