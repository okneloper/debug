<?php

namespace Okneloper\Debug;

/**
 * Class Debug
 */
class Debug
{
    public static function registerFirePhpHandler()
    {
        $debug = new static();

        if (PHP_SAPI !== 'cli') {
            set_error_handler([$debug, 'handlePhpError']);
        }

        return $debug;
    }

    protected $rootPath;

    /**
     * @return mixed
     */
    public function getRootPath()
    {
        return $this->rootPath;
    }

    /**
     * @param mixed $rootPath
     */
    public function setRootPath($rootPath)
    {
        $this->rootPath = $rootPath;
    }

    public function handlePhpError($errno, $errstr, $errfile, $errline)
    {
        switch ($errno) {
            case E_NOTICE:
                $errorType = 'Notice';
                break;
            case E_WARNING:
                $errorType = 'Warning';
                break;
            case E_STRICT:
                $errorType = 'Strict';
                break;
            case E_DEPRECATED:
                $errorType = 'Deprecated';
                break;
            default:
                $errorType = 'Error';
                break;
        }

        if ($this->rootPath && strpos($errfile, $this->rootPath) === 0) {
            $errfile = str_replace($this->rootPath . '/', '', $errfile);
        }

        $br = "\n";
        $message = "$errorType: $errstr {$br}in $errfile on line $errline";
        \FirePHP::getInstance(true)->error($message);
    }
}
