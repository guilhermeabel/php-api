<?php

declare(strict_types=1);

namespace Infrastructure\Api;

abstract class Controller {
    public static function new() {
        return new static();
    }

    protected function view(string $page, array $data = []) {
        extract($data);
        return require_once __DIR__ . "/../Views/{$page}.php";
    }

    protected function redirect(string $url): void {
        header("Location: {$url}");
    }

    protected function validate(array $data, array $rules): array {
        $errors = [];

        foreach ($rules as $field => $rule) {
            $rules = explode('|', $rule);

            foreach ($rules as $rule) {
                if ('required' === $rule && empty($data[$field])) {
                    $errors[$field] = 'The ' . $field . ' field is required';
                }

                if ('email' === $rule && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field] = 'The ' . $field . ' field must be a valid email address';
                }
            }
        }

        return $errors;
    }
}
