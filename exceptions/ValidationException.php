<?php

namespace app\exceptions;

use Exception; 

class ValidationExceptions extends Exception {
    public function __construct($message) {
        parent::__construct($message);
    }
}