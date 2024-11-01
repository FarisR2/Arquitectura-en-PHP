<?php

namespace app\validators;

use app\interfaces\ValidationInterface;

class Validator implements ValidationInterface {
    private string $error;

    public function getError(): string {
        return $this->error;
    }

    public function validateAdd($data): bool {
        if(empty($data["name"])) {
            $this->error = "El campo nombre no puede estar vacio";
            return false;
        }
        return true;
    }

    public function validateUpdate($data): bool {
        if(empty($data["id"])) {
            $this->error = "El campo id no puede estar vacio";
            return false;
        }
        return true;

        if(empty($data["name"])) {
            $this->error = "El campo nombre no puede estar vacio";
            return false;
        }
        return true;
    }
}