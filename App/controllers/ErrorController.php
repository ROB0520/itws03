<?php

namespace App\Controllers;

class ErrorController
{
	/**
	 * Handle 404 Not Found errors
	 * @param string $message
	 * return void
	 */
	public static function notFound($message = 'Page Not Found')
	{
		http_response_code(404);
		loadView('errors', [
			'status' => '404',
			'message' => $message
		]);
	}

	/**
	 * Handle 403 Unauthorized errors
	 * @param string $message
	 * return void
	 */
	public static function unauthorized($message = 'You are not authorized to access this page')
	{
		http_response_code(403);
		loadView('errors', [
			'status' => '403',
			'message' => $message
		]);
	}
}
