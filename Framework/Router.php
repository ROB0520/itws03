<?php

namespace Framework;

use App\Controllers\ErrorController;

class Router
{
	protected $routes = [];

	/**
	 * Register a route
	 * @param string $method
	 * @param string $uri
	 * @param $action
	 * return void
	 */
	public function registerRoute($method, $uri, $action)
	{
		list($controller, $controllerMethod) = explode('@', $action);

		$this->routes[] = [
			'method' => $method,
			'uri' => $uri,
			'controller' => $controller,
			'controllerMethod' => $controllerMethod
		];
	}

	/**
	 * Add a GET route
	 * @param string $uri
	 * @param $controller
	 * return void
	 */
	public function get($uri, $controller)
	{
		$this->registerRoute('GET', $uri, $controller);
	}

	/**
	 * Add a POST route
	 * @param string $uri
	 * @param $controller
	 * return void
	 */
	public function post($uri, $controller)
	{
		$this->registerRoute('POST', $uri, $controller);
	}

	/**
	 * Add a PUT route
	 * @param string $uri
	 * @param $controller
	 * return void
	 */
	public function put($uri, $controller)
	{
		$this->registerRoute('PUT', $uri, $controller);
	}

	/**
	 * Add a DELETE route
	 * @param string $uri
	 * @param $controller
	 * return void
	 */
	public function delete($uri, $controller)
	{
		$this->registerRoute('DELETE', $uri, $controller);
	}

	/**
	 * Route the request
	 * @param string $uri
	 * @param string $method
	 * return void
	 */
	public function route($uri, $method)
	{
		foreach ($this->routes as $route) {
			if ($route['uri'] === $uri && $route['method'] === $method) {
				// Extract controller and its method
				$controller = 'App\\controllers\\' . $route['controller'];
				$controllerMethod = $route['controllerMethod'];

				$controllerInstance = new $controller();
				$controllerInstance->$controllerMethod(); // Call the controller method
				return;
			}
		}

		ErrorController::notFound("The page you are looking for could not be found.");
	}
}
