<?php

function debug($variableToDebug)
{
	echo "<pre>";
	var_dump($variableToDebug);
	echo "</pre>";

	exit;
}

/**
 * A function that is used to sanitize the html code.
 *
 * @param html The HTML to be escaped.
 *
 * @return string the htmlspecialchars() function.
 */
function s($html): string
{
	return htmlspecialchars($html, ENT_QUOTES, 'UTF-8');
}

function is_the_current_page($path): bool
{
	return str_contains($_SERVER['PATH_INFO'] ?? '/', $path);
}

function is_authenticated(): bool
{
	if (!isset($_SESSION)) session_start();
	return isset($_SESSION['userId']) && !empty($_SESSION);
}

function is_admin(): bool
{
	if (!isset($_SESSION)) session_start();
	return isset($_SESSION['isAdmin']) && !empty($_SESSION['isAdmin']);
}
