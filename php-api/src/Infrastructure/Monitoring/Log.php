<?php

declare(strict_types=1);

namespace Infrastructure\Monitoring;

use Application\DataTransferObjects\RequestLogDTO;

class Log {
    private LogInterface $log;

    public function __construct() {
        $this->log = new FileLog();
    }

    public function logRequest(RequestLogDTO $requestLogDTO): void {
        $this->log->store($requestLogDTO->toArray());
    }
}
