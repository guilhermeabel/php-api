<?php

declare(strict_types=1);

namespace Api;

class TestController extends BaseController {
    public function index(): void {
        $a = 1;
        echo $a;
    }
}
