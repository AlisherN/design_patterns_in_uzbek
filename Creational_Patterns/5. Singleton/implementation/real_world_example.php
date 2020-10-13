<?php
class Singleton
{
    private static $instances = [];

    protected function __construct() {}

    protected function __clone() {}

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }
}

class Logger extends Singleton
{
    private $fileHandle;

    protected function __construct()
    {
        $this->fileHandle = fopen('php://stdout', 'w');
    }

    public function writeLog(string $message): void
    {
        $date = date('Y-m-d');
        fwrite($this->fileHandle, "$date: $message\n");
    }

    public static function log(string $message): void
    {
        $logger = static::getInstance();
        $logger->writeLog($message);
    }
}

class Config extends Singleton
{
    private $hashMap = [];

    public function getValue(string $key): string
    {
        return $this->hashMap[$key];
    }

    public function setValue(string $key, string $value): void
    {
        $this->hashMap[$key] = $value;
    }
}


// Client code
Logger::log("Started");

$l1 = Logger::getInstance();
$l2 = Logger::getInstance();

if ($l1 === $l2) {
    Logger::log("Logger has a single instance");
} else {
    Logger::log("Loggers are different");
}

// Check how Config singleton saves data ...

$config1 = Config::getInstance();
$login = 'test_login';
$password = 'test_password';

$config1->setValue('login', $login);
$config1->setValue('password', $password);
// ... and restores it

$config2 = Config::getInstance();
if ($login == $config2->getValue('login') && $password == $config2->getValue('password')) {
    Logger::log("Config singleton also works fine");
}

Logger::log("Finished");

// !!! run the code in a console in order to see the result !!!
