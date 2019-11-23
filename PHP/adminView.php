<?php
	include 'permissions.php';
	include 'htmlTableGenerator.php';
	if (!validAccess()) {
		return;
	}
	include 'standardPage.php';
	loadStandardPage('standardHeaderFactory', 'contentFactory');

	function contentFactory() {
		$tableName = 'SECURITYSTATUS';
		$fields = array();
		if (isset($_POST['tableSelector'])) {
			$tableName = $_POST['tableSelector'];
		} 
		$tableHeaders = getTableHeaders($tableName);
		
		$selectorString = "
			<div>
				<p>Welcome to the admin view you magnificent bastard</p>
				<form name='selectionForm' id='selectionForm' method=post action=adminView.php>
					<select name='tableSelector' onchange='selectionForm.submit();'>
						<option type='submit' name='selectionOption' value='SECURITYSTATUS'>Security Status</option>
						<option type='submit' name='selectionOption' value='SHIPATTRIBUTES'>Ship Attributes</option>
						<option type='submit' name='selectionOption' value='LOCATION'>Location</option>
						<option type='submit' name='selectionOption' value='CORPORATION'>Corporation</option>
						<option type='submit' name='selectionOption' value='PILOT'>Pilot</option>
						<option type='submit' name='selectionOption' value='SHIP'>Ship</option>
						<option type='submit' name='selectionOption' value='PILOTS'>Pilots</option>
						<option type='submit' name='selectionOption' value='FIGHTSIN'>Fights In</option>
						<option type='submit' name='selectionOption' value='SPACESTATION'>Space Station</option>
						<option type='submit' name='selectionOption' value='WARS'>Wars</option>
						<option type='submit' name='selectionOption' value='BATTLE'>Battle</option>
					</select>
				</form>
			</div>
		";
		$selectorString = str_replace("value='$tableName'","value='$tableName' selected", $selectorString);
		echo $selectorString;
		echo "
			<div class='insertionForm' id='$tableName'> 
				<form method=post action=adminView.php>
					<input type='hidden' name='tableName' value='$tableName'>";
		for ($i = 0; $i < count($tableHeaders); $i++) {
			$tableHeader = $tableHeaders[$i];
					echo
					"<label>$tableHeader</label><br>
					<input type='text' name='field$i' value=''><br>";
		}
		echo
					"
					<input type='submit' name='submitButton' value='Submit'><br>
				</form>
			</div>
		";
	}
?>
