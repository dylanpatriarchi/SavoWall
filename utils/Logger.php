<?php
class Logger {
    private $logFile;

    public function __construct($filename = "waf_log.txt") {
        $this->logFile = $filename;
    }

    public function log($message) {
        $timeStamp = date('Y-m-d H:i:s');
        $formattedMessage = "[{$timeStamp}] {$message}\n";
        file_put_contents($this->logFile, $formattedMessage, FILE_APPEND);
    }
}