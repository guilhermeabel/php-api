<?php

declare(strict_types=1);

namespace App\Controllers;

class TestController extends BaseController {
    public function index(): void {
        $a = 1;
        phpinfo();
    }
}
