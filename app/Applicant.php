<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    protected $table = 'accounts';

    public function jobVacancies()
    {
        return $this->hasOne('App\JobVacancy', 'id', 'job_vacancy_id');
    }
}
