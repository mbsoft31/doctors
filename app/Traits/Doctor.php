<?php


namespace App\Traits;


use App\Models\Appointment;
use App\Models\Speciality;
use App\Models\User;
use Carbon\Carbon;

trait Doctor
{

    function isDoctor()
    {
        return $this->type == "doctor";
    }

    function isOccupied($start, $time)
    {
        $day = $this->getDoctorDay($this, $start);

        $date = Carbon::make($start)->format('y-m-d');

        foreach ($day as $key => $d) {
            if ($key == $date)
            {
                foreach ($d as $t => $arr) {
                    if ($t == $time)
                        return true;
                }
            }
        }

        return false;
    }

    function getDoctorDay(User $doctor, $date)
    {
        $all_doctor_appointments = Appointment::where("doctor_id", $doctor->id)
            ->where("start", Carbon::make($date))
            ->get();

        $test = [];
        foreach ($all_doctor_appointments as $appointment) {
            $test = $this->createDate($test, $appointment->start, $appointment->time, $appointment->patient_id);
        }

        return $test;
    }

    function getDoctorCalendar(User $doctor)
    {
        $all_doctor_appointments = Appointment::where("doctor_id", $doctor->id)->get();

        $test = [];
        foreach ($all_doctor_appointments as $appointment) {
            $test = $this->createDate($test, $appointment->start, $appointment->time, $appointment->patient_id);
        }

        return $test;
    }

    function createDate($input, $start, $time, $patient)
    {
        $output = $input;

        $date = Carbon::make($start)->format('y-m-d');

        if ( isset($output[$date]) ) {
            $output[$date] = array_merge(
                $output[$date], [
                    $time => [
                        "patient_id" => $patient,
                    ],
                ]
            );
        }else {
            $output[$date] = [
                $time => [
                    "patient_id" => $patient,
                ],
            ];
        }

        return $output;
    }

    public static function allDoctors()
    {
        $users = User::with('roles')->get();
        return ($users->filter(function ($user) {
            return $user->hasRole('doctor');
        }));
    }

    public function doctor_profile()
    {
        return route("doctor.profile", $this);
    }

    public function speciality()
    {
        if ( ! $this->isDoctor() ) return null;

        if ( ! isset($this->meta['speciality_id']) ) return null;

        return Speciality::findOrFail($this->meta['speciality_id']);
    }

    public function getSpecialityAttribute()
    {
        return $this->speciality()->name ?? "";
    }

    public function setSpeciality($speciality)
    {
        if ( is_null($this->meta) ) {
            $this->meta = [];
            $this->save();
        }

        $meta = $this->meta;

        if ($speciality instanceof Speciality)
        {
            $meta['speciality_id'] = $speciality->id;
        }

        if ( is_int($speciality) )
        {
            $meta['speciality_id'] = $speciality;
        }

        $this->meta = $meta;
        return $this->save();
    }

}
