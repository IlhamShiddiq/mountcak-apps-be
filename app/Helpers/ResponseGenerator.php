<?php

namespace App\Helpers;

class ResponseGenerator {
    public static function createApiResponse($is_error, $status_code, $message, $content) {
        $result = [];

        if($is_error) {
            $result['success'] = false;
            $result['code'] = $status_code;
            $result['message'] = $message;
        } else {
            $result['success'] = true;
            $result['code'] = $status_code;
            if($message) $result['message'] = $message;
            if($content) $result['data'] = $content;
        }

        return $result;
    }
}