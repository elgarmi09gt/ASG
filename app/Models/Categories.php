<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $categorie
 * @property string $created_at
 * @property string $updated_at
 * @property Fichier[] $fichiers
 */
class Categories extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['categorie'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fichiers()
    {
        return $this->hasMany('App\Models\Fichier', 'categorie_id');
    }
}
