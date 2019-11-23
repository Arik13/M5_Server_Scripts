<?php
	include 'standardPage.php';
	loadStandardPage('standardHeaderFactory', 'contentFactory');

	function contentFactory() {
		echo "
			<div class = 'loginForm'> 
				<form method=post action=loginAttempt.php>
					<label>Username:</label><br>
					<input type='text' name='login' value='admin'><br>
					<label>Password:</label><br>
					<input type='password' name='password' value='password' onfocus='this.value='''><br>
					<input type='submit' name='submitButton' value='Submit'><br>
				</form>
			</div>
		";
	}
?>
