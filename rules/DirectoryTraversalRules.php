<?php
require_once '../core/RequestValidator.php';
require_once '../utils/Logger.php';

class DirectoryTraversalRules extends RequestValidator {
    private $logger;

    public function __construct($logger) {
        $this->logger = $logger;
    }

    public function check($data) {
        $patterns = ["/\.\.\//i"];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $this->check($value);
            } else {
                foreach ($patterns as $pattern) {
                    if (preg_match($pattern, $value)) {
                        $this->logger->log("Directory traversal attempt detected: {$value}");
                        header('HTTP/1.1 403 Forbidden');
                        exit('Directory traversal attempt detected and blocked.');
                    }
                }
            }
        }
    }
}