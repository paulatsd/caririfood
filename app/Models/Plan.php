<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'price', 'description'];

    /**
     * Relacionamento um para muitos: um plano pode ter um ou muitos detalhes
     */
    public function details(){
        return $this->hasMany(DetailPlan::class);
    }

    public function search($filter = null){

       $results = $this->where('name', 'ILIKE', "%{$filter}%")
                       ->orWhere('description', 'ILIKE', "%{$filter}%")
                       ->paginate();

       return $results;
    }
}
