<?php
	function generate_html_page($h1, $title){
		$html; // va contenir le code HTML de la page
		$html = 
		"<!DOCTYPE html>
		<html>
		<head>
			<title>" . $title . "</title>
		</head>

		<body>
		<h1>" . $h1 . " </h1>
		</body>
		</html>";
		echo $html;
	}
?>
