<?php

function generateTable($tableModel) {
	$tableName = $tableModel->getTableName();
	$tableHeaders = $tableModel->getTableHeaders();
	$tableData = $tableModel->getTableData();
	$columnStyles = $tableModel->getColumnStyles();
	$relatedQueries = $tableModel->getRelatedQueries();
	
	// Format the table name and return it as an html header
	$formattedTableName = camelCaseToUpperCaseSpaces($tableName);
	echo "<h1 class=\"tableTitle\">{$formattedTableName}</h1>";
	
	// Format the headers and return them in an html table row
	echo "<table>";
	echo "<tr class=\"tableRow\">";
	for ($i = 0; $i < count($tableHeaders); $i++) {
		$tableHeaderItem = $tableHeaders[$i];
		$formattedHeader = camelCaseToUpperCaseSpaces($tableHeaderItem);
		echo "<th>{$formattedHeader}</th>";
	}
	echo "</tr>";

	// Place the data in an html table and return it
	for ($i = 0; $i < count($tableData); $i++) {
		echo "<tr>";
		for ($j = 0; $j < count($tableHeaders); $j++) {
			$dataElement = $tableData[$i][$tableHeaders[$j]];
			$styledDataElement = styleData($dataElement, $columnStyles[$j], $relatedQueries[$j]);
			echo $styledDataElement;
		}
		echo "</tr>";
	}
}

// Credit for this algorithm goes to "ridgerunner" as seen at:
// https://stackoverflow.com/questions/4519739/split-camelcase-word-into-words-with-php-preg-match-regular-expression
function camelCaseToUpperCaseSpaces($str) {
	$ccWord = $str;
	$re = '/(?#! splitCamelCase Rev:20140412)
	    # Split camelCase "words". Two global alternatives. Either g1of2:
	      (?<=[a-z])      # Position is after a lowercase,
	      (?=[A-Z])       # and before an uppercase letter.
	    | (?<=[A-Z])      # Or g2of2; Position is after uppercase,
	      (?=[A-Z][a-z])  # and before upper-then-lower case.
	    /x';
	$arr = preg_split($re, $ccWord);
	$formattedString = "";
	for ($j = 0; $j < count($arr); ++$j) {
		$formattedString = ($formattedString.(ucwords($arr[$j]))).(" ");
	}
	return $formattedString;
}
function styleData($dataElement, $columnFormats, $relatedQuery) {
	if ($columnFormats == 'link') {
		return "
		<td>
		<form method='post' action='index.php'>
			<input type='hidden' name='queryID' value='$relatedQuery'>
			<input class='tableLink' type='submit' name='header' value='$dataElement'>
		</form>
		</td>
		";
	}
	else {
		return "<td>{$dataElement}</td>";
	}
}

?>