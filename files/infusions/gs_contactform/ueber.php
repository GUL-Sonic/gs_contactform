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

include INFUSIONS . "gs_contactform/infusion_db.php";

$data21 = dbarray(dbquery("SELECT * FROM " . DB_GSC_ABOUT . " WHERE id='1'"));

opentable('<center>'.$data21['title'].'</center>');

echo stripslashes($data21['about']);

closetable();

echo "<table align='right' border='0'><tr><td align='right' colspan='0'><a href='mailto:gul-sonic@online.de' title='Copyright by GUL-Sonic'>&copy;</a></td></tr></table>";

require_once THEMES."templates/footer.php";
?>
