<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliatedContentAccountService extends Model
{
    //
    protected $table = "affiliated_content_account_services";

    public function sequence()
    {

        return $this->hasOne(CompanySequence::class, 'id', 'sequence_id');

    }

    public function affiliated_account_services()
    {

        return $this->hasOne(AffiliatedAccountService::class, 'id', 'affiliated_account_service_id');

    }
}
