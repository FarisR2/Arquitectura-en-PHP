<?php

namespace app\business;

use app\exceptions\ValidationExceptions;
use app\interfaces\ValidationInterface;
use app\interfaces\RepositoryInterface;

class Delete {
    private RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function delete(int $id) {
        if(!$this->repository->exists($id)) {
            throw new ValidationExceptions("El registro no existe");
        }
        $this->repository->delete($id);
    }
}
