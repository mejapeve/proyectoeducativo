<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdvanceLine
 * @package App\Models
 */
class AdvanceLine extends Model
{
    //
    /**
     * @var string
     */
    protected $table = "advance_lines";
    /**
     * @var array
     */
    protected $fillable = [
        'affiliated_account_service_id',
        'affiliated_company_id',
        'sequence_id',
        'moment_order',
        'moment_section_id',
        'created_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function affiliated_account_service()
    {

        return $this->belongsTo(AffiliatedAccountService::class, 'affiliated_account_service_id', 'id');

    }

    public function sequence_moment(){

        return $this->belongsTo(SequenceMoment::class, 'sequence_id', 'id');

    }
}
