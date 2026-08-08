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
}
