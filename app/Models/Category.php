<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $id;
    public $name;

    public function __construct(array $data = [])
    {

        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
    }


    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
