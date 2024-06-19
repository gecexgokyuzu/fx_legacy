<?php

//---response
function RE($element, $httpResponseCode = 200)
{

    $element = json_encode($element, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_PRETTY_PRINT);

    if (!headers_sent()) {
        header('Content-Type: text/html; charset=utf-8', true);
    }

    switch ($httpResponseCode) {
        case 401:
            header("HTTP/1.1 401 Unauthorized");
            break;
        case 403:
            header("HTTP/1.1 403 Forbidden");
            break;
        case 404:
            header("HTTP/1.1 404 Not Found");
            break;
        case 406:
            header("HTTP/1.1 406 Not Acceptable");
            break;
        case 500:
            header("HTTP/1.1 500 Internal Server Error");
            break;
    }

    http_response_code($httpResponseCode);

    if (is_array($element)) {
        echo "<pre>" . print_r($element, true) . "</pre>";
    } else {
        echo $element;
    }

    exit();
}