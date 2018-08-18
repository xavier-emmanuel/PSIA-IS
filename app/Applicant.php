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

    public function personalInfos()
    {
        return $this->hasOne('App\PersonalInfo', 'account_id', 'id');
    }

    public function educationalBackground()
    {
        return $this->hasOne('App\EducationalBackground', 'account_id', 'id');
    }

    public function governmentExams()
    {
        return $this->hasOne('App\GovernmentExams', 'account_id', 'id');
    }

    public function organizations()
    {
        return $this->hasOne('App\Organizations', 'account_id', 'id');
    }

    public function employmentRecord()
    {
        return $this->hasOne('App\EmploymentRecord', 'account_id', 'id');
    }

    public function questions()
    {
        return $this->hasOne('App\Questions', 'account_id', 'id');
    }

    public function personalPreference()
    {
        return $this->hasOne('App\PersonalPreference', 'account_id', 'id');
    }
}
