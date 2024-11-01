<?php

namespace app\interfaces;

interface ValidationInterface {
    public function getError(): string;
    public function validateAdd($data): bool;
    public function validateUpdate($data): bool;
}