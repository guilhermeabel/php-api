<?php

declare(strict_types=1);

namespace Application\Common\Traits;

trait ObjectToArrayTrait {
    public function toArray(): array {
        $array = [];

        foreach ($this as $key => $value) {
            $array[$key] = $value;
        }

        return $array;
    }
}
