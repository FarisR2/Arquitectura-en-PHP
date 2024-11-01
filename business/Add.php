<?php

namespace app\business;

use app\exceptions\ValidationExceptions;
use app\interfaces\ValidationInterface;
use app\interfaces\RepositoryInterface;

class Add {
    private RepositoryInterface $repository;
    private ValidationInterface $validation;

    public function add($data) { 
        if(!$this->validation->validateAdd($data)){
            throw new ValidationExceptions($this->validation->getError($data));
        }

        $this->repository->create($data);
    }
}