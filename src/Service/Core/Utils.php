<?php

namespace Service\Core;

class Utils {

    public static function getUrlWithoutParams(string $url): ?string {
        $urlParts = explode('?', $url);
        return $urlParts[0] ?? null;
    }

    public static function extractField(array $objects, string $field): array {
        $result = [];
        foreach ($objects as $object) {
            $result[] = $object->$field();
        }
        return $result;
    }
}