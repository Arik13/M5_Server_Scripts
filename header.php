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
				<input class='navBarButton' type='submit' name='NavButton' value='Security Status'>
				<input class='navBarButton' type='submit' name='NavButton' value='Ship Attributes'>
				<input class='navBarButton' type='submit' name='NavButton' value='Location'>
				<input class='navBarButton' type='submit' name='NavButton' value='Corporation'>
				<input class='navBarButton' type='submit' name='NavButton' value='Pilot'>
				<input class='navBarButton' type='submit' name='NavButton' value='Ship'>
				<input class='navBarButton' type='submit' name='NavButton' value='Pilots'>
				<input class='navBarButton' type='submit' name='NavButton' value='Fights In'>
				<input class='navBarButton' type='submit' name='NavButton' value='Space Station'>
				<input class='navBarButton' type='submit' name='NavButton' value='Wars'>
				<input class='navBarButton' type='submit' name='NavButton' value='Battle'>
			</form>
		</div>
	";
}
?>