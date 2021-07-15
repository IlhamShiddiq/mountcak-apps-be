<?php

namespace App\Helpers;

class ResponseGenerator {
    public static function createApiResponse($is_error, $status_code, $message, $content) {
        $result = [];

        if($is_error) {
            $result['success'] = false;
            $result['status'] = $status_code;
            $result['message'] = $message;
        } else {
            $result['success'] = true;
            $result['status'] = $status_code;
            if($message) $result['message'] = $message;
            if($content) $result['result'] = $content;
        }

        return $result;
    }
}