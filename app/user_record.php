<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_record extends Model
{
    protected $fillable=[
        'email','full_name','date_of_joining','exp','date_of_leaving','password','working_status','image','created_by','created_at','updated_by','updated_at'
    ];

//    public function experienceYears()
//    {
//        $from = property_exists($this, 'date_of_joining') ? $this->date_of_joining : null;
//        $to = property_exists($this, 'date_of_leaving') ? $this->date_of_leaving : null;
//        if (is_null($from)) return 0;
//        if (is_null($to)) $to = $from; // or = date('Y'); depending business logic
//        return (int)$to - (int)$from;
//    }
//
//    public static function calcExperienceYearsForUser($user)
//    {
//        $workplaces =
//            self::withCount('experienceYears')
//                ->where('id',$user)
//                ->get(['date_of_joining', 'date_of_leaving']);
//
////        return $this->morphMany(TraderRatings::class, 'rateable')
////            ->select('*', DB::raw('AVG(rating) AS avg_rating'));
//
//        $years = 0;
//        foreach ($workplaces AS $workplace) {
//            $years+= $workplace->experienceYears;
//        }
//        return $years;
//    }
}
