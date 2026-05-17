<?php

/**
 * Get the Path
 * 
 * @param string $path Path to View File
 * @return string Full Path to View File
 */
function basePath($path = "")
{
	return __DIR__ . '/' . $path;
}

/**
 * Load View
 * 
 * @param string $name View File to Load
 * @param array $data Data to Pass to View
 * 
 * @return null Full path when loaded, otherwise null
 */
function loadView($name, $data = [])
{
	if ($name) {
		$viewPath = basePath("views/{$name}.view.php");

		if (file_exists($viewPath)) {
			extract($data);
			require $viewPath;
		} else {
			echo "<p>View '{$name}' not found.</p>";
		}
	} else {
		echo "<p>No view name provided.</p>";
	}
	return null;
}

/**
 * Load Partial
 * 
 * @param string $name Partial File to Load
 * @return null Full path when loaded, otherwise null
 */
function loadPartial($name)
{
	if ($name) {
		$partialPath = basePath("views/partials/{$name}.php");

		if (file_exists($partialPath)) {
			require $partialPath;
		} else {
			echo "<p>Partial '{$name}' not found.</p>";
		}
	} else {
		echo "<p>No partial name provided.</p>";
	}
	return null;
}

/**
 * Inspect Variable
 * 
 * @param mixed $value
 * @return void
 */
function inspect($value)
{
	echo '<pre>';
	print_r($value);
	echo '</pre>';
}

/**
 * Format Salary
 *
 * @param mixed $salary The salary value to format
 * @return string The formatted salary string with a dollar sign and two decimal places
 */
function formatSalary($salary)
{
	return '$' . number_format($salary, 2);
}
