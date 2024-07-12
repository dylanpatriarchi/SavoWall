<?php
require_once 'RequestValidator.php';
require_once '../rules/SQLInjectionRules.php';
require_once '../rules/XSSRules.php';
require_once '../rules/CSRFProtection.php';
require_once '../rules/DirectoryTraversalRules.php';
require_once '../utils/Logger.php';

class WAF {
    private $validators;
    private $logger;

    public function __construct() {
        $this->logger = new Logger();
        $this->validators = [
            new SQLInjectionRules($this->logger),
            new XSSRules($this->logger),
            new CSRFProtection($this->logger),
            new DirectoryTraversalRules($this->logger)
        ];
    }

    public function initialize() {
        foreach ($this->validators as $validator) {
            $validator->check($_REQUEST);
        }
    }
}
$waf = new WAF();
$waf->initialize();