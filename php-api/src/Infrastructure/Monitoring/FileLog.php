<?php

declare(strict_types=1);

namespace Infrastructure\Monitoring;

class FileLog implements LogInterface {
    public function store($content): void {
        file_put_contents(
            __DIR__ . '/../../../logs/app.requests.log',
            json_encode($content) . PHP_EOL,
            FILE_APPEND
        );
    }
}
