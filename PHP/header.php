<?php
function getHeader() {
	// Start the session if necessary
	// If the admin is logged in, show the admin interface
	// Otherwise show the logged out interface
		$tableName = "table name";
		$data = "Test";
	if(!session_id()) session_start();
	$loginComponent = (!$_SESSION['loggedIn'])? 
				// Login button
				"
					<!-- The login button-->
					<form class='headerItem loginButton'method='post' action='login.php'>
						<input type='submit' name='loginButton' value='Login'>
					</form>
				"
						:
				// Admin and logout button
				"
					<!-- The admin button-->
					<form class='headerItem loginButton'method='post' action='adminView.php'>
						<input type='submit' name='adminButton' value='Admin'>
					</form>

					<!-- The logout button-->
					<form class='headerItem loginButton'method='post' action='logout.php'>
						<input type='submit' name='logoutButton' value='Logout'>
					</form>
				";
	// Display the page header and navbar
	echo 
	"
		<!-- Title/Search -->
		<div class='headerBar'>
			<div class='headerContent'>
				<h1 class = 'headerItem pageHeader'><a class = 'pageHeader' href='index.php'>EVE Online Database</a></h1>
				<form method='post' action='index.php'>
					<input class='headerItem searchField' type='text' name='searchField' value='search' onfocus='this.value='''>
				</form>
				{$loginComponent}
			</div>
		</div>
		
		<!-- Navbar -->
		<div class='navBar'> 
			<form method='post' action='index.php'>
				<button class='navBarButton' name='NavButton' value='SECURITYSTATUS' type='submit'>Security Status</button>
				<button class='navBarButton' name='NavButton' value='SHIPATTRIBUTES' type='submit'>Ship Attributes</button>
				<button class='navBarButton' name='NavButton' value='LOCATION' type='submit'>Location</button>
				<button class='navBarButton' name='NavButton' value='CORPORATION' type='submit'>Corporation</button>
				<button class='navBarButton' name='NavButton' value='PILOT' type='submit'>Pilot</button>
				<button class='navBarButton' name='NavButton' value='SHIP' type='submit'>Ship</button>
				<button class='navBarButton' name='NavButton' value='PILOTS' type='submit'>Pilots</button>
				<button class='navBarButton' name='NavButton' value='FIGHTSIN' type='submit'>Fights In</button>
				<button class='navBarButton' name='NavButton' value='SPACESTATION' type='submit'>Space Station</button>
				<button class='navBarButton' name='NavButton' value='WARS' type='submit'>Wars</button>
				<button class='navBarButton' name='NavButton' value='BATTLE' type='submit'>Battle</button>
			</form>
		</div>
	";
}
?>