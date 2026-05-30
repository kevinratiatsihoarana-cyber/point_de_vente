<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitModels extends Model
{
    use HasFactory;
    protected $table="produit";
    public function get_categorie(){
        return $this->hasOne(CategorieModels::class,'id','categorie_id');
    }
}
