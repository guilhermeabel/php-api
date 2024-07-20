<?php

declare(strict_types=1);

namespace Infrastructure\Monitoring;

interface LogInterface {
    public function store($content): void;
}
