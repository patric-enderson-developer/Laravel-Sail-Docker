<?php

namespace App\Services;

use App\Repositories\SubscriberRepository;
use Illuminate\Database\Eloquent\Collection;

class SubscriberService
{
    public function __construct(
        private SubscriberRepository $repository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
}
