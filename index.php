<!DOCTYPE html>
<html>
<head>
	<title>My Portfolio</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>My Portfolio</h1>
		<nav>
			<ul>
				<li><a href="#about">About</a></li>
				<li><a href="#portfolio">Portfolio</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section id="about">
			<h2>About Me</h2>
			<p>Insert your bio here</p>
		</section>
		<section id="portfolio">
			<h2>My Work</h2>
			<!--Insert your portfolio items here-->
		</section>
		<section id="contact">
			<h2>Contact Me</h2>
			<form action="submit.php" method="post">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name"><br>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email"><br>
				<label for="message">Message:</label>
				<textarea id="message" name="message"></textarea><br>
				<input type="submit" value="Submit">
			</form>
		</section>
	</main>
	<footer>
		<p>&copy; 2023 My Portfolio. All rights reserved.</p>
	</footer>
</body>
</html>
