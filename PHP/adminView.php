<?php

include 'permissions.php';
include 'htmlTableGenerator.php';
if (!validAccess()) {
	return;
}
include 'standardPage.php';
loadStandardPage('standardHeaderFactory', 'contentFactory');

function contentFactory() {
	// 
	$tableName = 'SECURITYSTATUS';
	$fields = array();
	if (isset($_POST['tableSelector'])) {
		$tableName = $_POST['tableSelector'];
	} 
	$tableHeaders = getTableHeaders($tableName);

	$fieldSubmissions = array();
	if (isset($_POST[('insertionTracker')]) && $_POST[('insertionTracker')] == '1') {
		for ($i = 0; isset($_POST[('field'.$i)]); $i++) {
			array_push($fieldSubmissions, $_POST[('field'.$i)]);
		}
		insertInputToDB($tableName, $fieldSubmissions, $tableHeaders);
	}
	
	
	// Generates the selector box with the given table selected
	$selectorString = "
		<div>
		<h2>Data Insertion</h2>
			<form name='insertionForm' id='insertionForm' method=post action=adminView.php>
				<select name='tableSelector' onchange='handleAdminSelection()'>
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
				</select><br><br>";
	$selectorString = str_replace("value='$tableName'","value='$tableName' selected", $selectorString);
	echo $selectorString;

	// Generates a set of input fields and labels for each header in the table
	echo "
				<input type='hidden' id='insertionTracker' name='insertionTracker' value='1'>";
	for ($i = 0; $i < count($tableHeaders); $i++) {
		$tableHeader = $tableHeaders[$i];
				echo
				"<label>$tableHeader</label><br>
				<input class='field' type='text' name='field$i' value=''><br>";
	}
	echo
				"
				<input type='submit' name='submitButton' value='Submit'><br>
			</form>
		</div>
	";
}
function insertInputToDB($tableName, $values, $tableHeaders) {
	$connection = openConnection();

	// Get valid data types, nullability and max length of all columns
	$query = 
		"SELECT DATA_TYPE, IS_NULLABLE, CHARACTER_MAXIMUM_LENGTH
		FROM INFORMATION_SCHEMA.COLUMNS
		WHERE TABLE_NAME = '$tableName'";
	$queryResult = $connection->query($query);
	if (!validate($queryResult)) return;

	$data = ($queryResult->fetch_all(MYSQLI_ASSOC));
	$areNullable = $data[0];
	$types = array();

	$valueArray = array();
	foreach ($values as $value) {
		array_push($valueArray, $value);
	}
	$insertQuery = 
	"INSERT INTO $tableName VALUES(";
	for ($i = 0; $i < count($valueArray); $i++) {
		$columnData = $data[$i];
		$isNullable = $columnData["IS_NULLABLE"] == "YES";
		$dataType = $columnData["DATA_TYPE"];
		$maxLength = $columnData["CHARACTER_MAXIMUM_LENGTH"];

		$value = $valueArray[$i];
		$valid = validateInput($dataType, $value, $maxLength, $isNullable, $tableHeaders[$i]);
		if($valid) {
			echo $valid;
			return;
		}
		$comma = ($i == count($data)-1)? ")" : ",";
		$insertQuery = $insertQuery."'$value'".$comma;
	}
	$queryResult = $connection->query($insertQuery);
	if (!$queryResult) {
		$error = "Error: ".($connection->error)."\n";
		echo $error;
		return;
	} 
	echo "Insertion completed!";

	$connection->close();
}

function validateInput($typeString, $var, $maxLength, $isNullable, $columnName) {
	if (!$isNullable) {
		if (strlen(trim($var)) == 0) {
			return "Error: $columnName can not be empty!"; 
		}
	}/*
	echo $columnName."<br>";
	echo $typeString."<br>";
	echo $var."<br>";
	echo $maxLength."<br>";
	echo $isNullable."<br><br>";
	*/
	switch($typeString) {
		case "int":
			if (is_numeric($var)) return false; 
		case "double":
			if (is_numeric($var)) return false;
		case "boolean":
			if (is_bool($var)) return false;
		case "varchar":
			if (strlen($var) < $maxLength) {
				return false;
			}
			return "Error: ".$var." needs to be $maxLength characters or less!";
		default: 
			$article = (isVowel($typeString[0]))? 'an' : 'a'; 
			return "Error: ".$var." is not $article $typeString!";
	}
}
function isVowel($str) {
	$vowels = array('a', 'e', 'i', 'o', 'u');
	for ($i = 0; $i < count($vowels); $i++) {
		if ($str == $vowels[$i]) return true;
	}
	return false;
}
?>
