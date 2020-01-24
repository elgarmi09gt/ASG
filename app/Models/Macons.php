<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $Prenom
 * @property string $Nom
 * @property string $Telephone
 * @property string $created_at
 * @property string $updated_at
 * @property Construction[] $constructions
 */
class Macons extends Model
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
    protected $fillable = ['Prenom', 'Nom', 'Telephone', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function constructions()
    {
        return $this->hasMany('App\Models\Construction');
    }
}
