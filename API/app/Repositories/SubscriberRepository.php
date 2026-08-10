<?php

namespace App\Repositories;

use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Collection;

class SubscriberRepository
{

       public function getAll(): Collection
    {
        return Subscriber::all();
    }

  public function create(array $data): Subscriber
    {
        return Subscriber::create($data);
    }
    public function findByEmail(string $email): ?Subscriber
        {
            return Subscriber::where('email', $email)->first();
        }
}
