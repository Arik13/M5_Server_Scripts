<?php
/*

*/
	include 'permissions.php';
	include 'QueryMap.php';
		if (!validAccess()) {
			return;
		}
	include 'standardPage.php';
	loadStandardPage('standardHeaderFactory', 'contentFactory');

	function contentFactory() {
		echo "
			<p>Welcome to the admin view you magnificent bastard</p>
			<select>
		";
		$tables = getTables();
		for ($i = 0; $i < count($tables); $i++) {
			$tableName	= $tables[$i][0];
			$tableHeader = $tables[$i][1];
			echo "<option value='{$tables}'>Security Status</option>";
		}
		echo "
				<option value='SECURITYSTATUS'>Security Status</option>
				<option value='SHIPATTRIBUTES'>Ship Attributes</option>
				<option value='LOCATION'></option>
				<option value='CORPORATION'></option>
				<option value='PILOT'></option>
				<option value='SHIP'></option>
				<option value='PILOTS'></option>
				<option value='FIGHTSIN'></option>
				<option value='SPACESTATION'></option>
				<option value='WARS'></option>
				<option value='BATTLE'></option>
				<option value='Q1'></option>
			</select>
		";
	}
?>
