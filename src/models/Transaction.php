<?php

namespace Nikolag\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "nikolag_transactions";

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
    	'status', 'amount'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'reference_id',
        'reference_type'
    ];
}