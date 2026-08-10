<?php

namespace App\Services;

use App\Models\Subscriber;
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

    public function create(array $data): Subscriber
    {
        $existing = $this->repository->findByEmail($data['email']);

        if ($existing) {
            throw new \InvalidArgumentException(
                'Este e-mail já está cadastrado na newsletter.'
            );
        }

        return $this->repository->create($data);
    }

}
