<?php
require_once '../core/RequestValidator.php';
require_once '../utils/Logger.php';

class CSRFProtection extends RequestValidator {
    private $logger;

    public function __construct($logger) {
        $this->logger = $logger;
    }

    public function check($data) {
        if (!isset($data['csrf_token']) || $_SESSION['csrf_token'] !== $data['csrf_token']) {
            $this->logger->log("CSRF attack attempt detected.");
            header('HTTP/1.1 403 Forbidden');
            exit('CSRF attack attempt detected and blocked.');
        }
    }
}