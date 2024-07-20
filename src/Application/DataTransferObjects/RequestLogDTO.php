<?php

declare(strict_types=1);

namespace Application\DataTransferObjects;

use Application\Common\Traits\ObjectToArrayTrait;

class RequestLogDTO {
    use ObjectToArrayTrait;

    protected string $method;
    protected string $path;
    protected string $query;
    protected array $body;

    public function __construct(string $method, string $path, string $query, array $body) {
        $this->method = $method;
        $this->path = $path;
        $this->query = $query;
        $this->body = $body;
    }

    public function getMethod(): string {
        return $this->method;
    }

    public function getPath(): string {
        return $this->path;
    }

    public function getQuery(): string {
        return $this->query;
    }

    public function getBody(): array {
        return $this->body;
    }
}
