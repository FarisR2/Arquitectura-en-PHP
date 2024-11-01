<?php

namespace app\business;

use app\interfaces\RepositoryInterface;
use app\interfaces\ValidationInterface;
use app\exceptions\ValidationException;

class Get {
    private RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function get(): array {
        return $this->repository->get();
    }
}
