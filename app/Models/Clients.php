<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $Prenom
 * @property string $Nom
 * @property string $CNI
 * @property string $NumCentre
 * @property int $EtatDedomagement
 * @property float $MontantDemande
 * @property float $MontantRecu
 * @property string $created_at
 * @property string $updated_at
 * @property Construction[] $constructions
 * @property Facture[] $factures
 * @property Parcelle[] $parcelles
 */
class Clients extends Model
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
    protected $fillable = ['Prenom', 'Nom', 'CNI', 'NumCentre', 'EtatDedomagement', 'MontantDemande', 'MontantRecu', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function constructions()
    {
        return $this->hasMany('App\Models\Construction');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factures()
    {
        return $this->hasMany('App\Models\Facture');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parcelles()
    {
        return $this->hasMany('App\Models\Parcelle');
    }
}
