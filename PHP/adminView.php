<?php
/*

*/
	include 'permissions.php';
		if (!validAccess()) {
			return;
		}
	include 'standardPage.php';
	loadStandardPage('standardHeaderFactory', 'contentFactory');

	function contentFactory() {
		echo "
			<p>Welcome to the admin view you magnificent bastard</p>
			<select>
				<option value='SECURITYSTATUS'>Security Status</option>
				<option value='SHIPATTRIBUTES'>Ship Attributes</option>
				<option value='LOCATION'>Location</option>
				<option value='CORPORATION'>Corporation</option>
				<option value='PILOT'>Pilot</option>
				<option value='SHIP'>Ship</option>
				<option value='PILOTS'>Pilots</option>
				<option value='FIGHTSIN'>Fights In</option>
				<option value='SPACESTATION'>Space Station</option>
				<option value='WARS'>Wars</option>
				<option value='BATTLE'>Battle</option>
			</select>
		";
	}
?>
