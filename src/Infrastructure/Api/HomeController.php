<?php

declare(strict_types=1);

namespace Infrastructure\Api;

class HomeController extends Controller {
    public function index() {
        return $this->view('home/index');
    }
}
