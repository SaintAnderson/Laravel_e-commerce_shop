<?php

namespace App\Services;

use App\Models\Advantage;
use Illuminate\Database\Eloquent\Collection;

class AdvantageService
{
    public function getAll(): Collection
    {
        return Advantage::all();
    }
}
