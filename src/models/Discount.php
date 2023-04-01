<?php

namespace Nikolag\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nikolag_discounts';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'amount', 'percentage', 'reference_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'amount'     => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'reference_id',
    ];
}
