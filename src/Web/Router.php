<?php

namespace App\Web;

class Router {
	private array $routes = [];

	public function addRoute(string $method, string $path, callable $callback) {
		$this->routes[] = [
			'method' => $method,
			'path' => $path,
			'callback' => $callback
		];
	}

	public function get(string $path, callable $callback) {
		$this->addRoute('GET', $path, $callback);
	}

	public function post(string $path, callable $callback) {
		$this->addRoute('POST', $path, $callback);
	}

	public function handleRequest() {
		header('Content-Type: text/html; charset=utf-8');

        try {
			$method = $_SERVER['REQUEST_METHOD'];
			$path = $_SERVER['REQUEST_URI'];

			foreach ($this->routes as $route) {
				if ($route['method'] === $method && $route['path'] === $path) {
					$route['callback']();
					return;
				}
			}

			http_response_code(404);
			echo 'Page not found';
		} catch (\Exception $e) {
			http_response_code(500);
			echo 'Internal server error';
		}
		
    }

}
