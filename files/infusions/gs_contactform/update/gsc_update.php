<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Infusion: gs_contactform                            			|
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
 
 if (!iADMIN) redirect("../../index.php");

switch ($gsc_version): 

	case "1.0":
	$ausgabe= "
	<table cellpadding='0' cellspacing='1'>
	<tr>
	<td style='background-color:green'><a href='".INFUSIONS."gs_contactform/update/update_from_v1.0.php".$aidlink."'><strong><font color='white'>".$locale['gsc306'].": 1.0 => 1.0.1</font></strong></a></td>
	</tr>
	</table>";
	break;
	
	case "1.0.1":
	$ausgabe= "
	<table cellpadding='0' cellspacing='1'>
	<tr>
	<td style='background-color:green'><a href='".INFUSIONS."gs_contactform/update/update_from_v1.0.1.php".$aidlink."'><strong><font color='white'>".$locale['gsc306'].": 1.0.1 => 1.1</font></strong></a></td>
	</tr>
	</table>";
	break;
	
	case "1.1":
	$ausgabe= "
	<table cellpadding='0' cellspacing='1'>
	<tr>
	<td style='background-color:green'><a href='".INFUSIONS."gs_contactform/update/update_from_v1.1.php".$aidlink."'><strong><font color='white'>".$locale['gsc306'].": 1.1 => 1.2</font></strong></a></td>
	</tr>
	<tr>
	<td>".$locale['gsc313']."</td>
	</tr>
	</table>";
	break;
	
	case "1.2":
	$ausgabe= "
	<table cellpadding='0' cellspacing='1'>
	<tr>
	<td style='background-color:green'><a href='".INFUSIONS."gs_contactform/update/update_from_v1.2.php".$aidlink."'><strong><font color='white'>".$locale['gsc306'].": 1.2 => 1.21</font></strong></a></td>
	</tr>
	</table>";
	break;
	
	case "1.21":
	$ausgabe= "
	<table cellpadding='0' cellspacing='1'>
	<tr>
	<td style='background-color:green'><a href='".INFUSIONS."gs_contactform/update/update_from_v1.21.php".$aidlink."'><strong><font color='white'>".$locale['gsc306'].": 1.21 => 1.22</font></strong></a></td>
	</tr>
	</table>";
	break;
	
	case "1.22":
	$ausgabe= "
	<table cellpadding='0' cellspacing='1'>
	<tr>
	<td style='background-color:green'><a href='".INFUSIONS."gs_contactform/update/update_from_v1.22.php".$aidlink."'><strong><font color='white'>".$locale['gsc306'].": 1.22 => 1.23</font></strong></a></td>
	</tr>
	</table>";
	break;
	
	case "1.23":
	$ausgabe= "
	<table cellpadding='0' cellspacing='1'>
	<tr>
	<td style='background-color:green'><a href='".INFUSIONS."gs_contactform/update/update_from_v1.23.php".$aidlink."'><strong><font color='white'>".$locale['gsc306'].": 1.23 => 1.24</font></strong></a></td>
	</tr>
	</table>";
	break;
	
	default :
	$uptodate = 1;
	
endswitch;

?>