<?php

namespace app\business;

use app\exceptions\ValidationExceptions;
use app\interfaces\RepositoryInterface;
use app\interfaces\ValidationInterface;

class Update {
    private RepositoryInterface $repository;
    private ValidationInterface $validation;

    public function __construct(RepositoryInterface $repository, ValidationInterface $validation) {
        $this->repository = $repository;
        $this->validation = $validation;
    }

    public function update($data) {
        if(!$this->validation->validateUpdate($data)) {
            throw new ValidationExceptions($this->validation->getError($data));
        }
        if(!$this->repository->exists((int)$data["id"])) {
            throw new ValidationExceptions("No existe este ID");
        }

        $this->repository->update($data);
    }

}