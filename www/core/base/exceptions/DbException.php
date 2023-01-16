<?php 

namespace core\base\exceptions;

use \core\base\controllers\BaseMethods;

class DbException extends \Exception
{

    protected $messages;

    use BaseMethods;

    public function __construct($message = "test", $code = 0)
    {
        parent::__construct($message, $code);

        $this->messages = include 'msgs.php';

        $error = $this->getMessage() ? : $this->messages[$this->getCode()];

        $error .= "\r\n" . 'file' . $this->getFile() . "\r\n" . 'In line ' . $this->getLine() . "\r\n";

        // if($this->messages[$this->getCode()]){
        //     $this->message = $this->messages[$this->getCode()];
        // }

        $this->writeLog($error, 'db_log.txt');

    }

}