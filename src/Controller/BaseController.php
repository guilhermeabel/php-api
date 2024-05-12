<?php

declare(strict_types=1);

namespace App\Controller;

abstract class BaseController {
    protected function view(string $page, array $data = []) {
        extract($data);
        return require_once __DIR__ . "/../Views/{$page}.php";
    }
}
