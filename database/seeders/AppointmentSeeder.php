<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $doctors = User::where("type", "doctor")->get();

        foreach ($doctors as $doctor) {
            $date[] = Carbon::today();
            $date[] = Carbon::today()->addDays(1);
            $date[] = Carbon::today()->addDays(2);
            $date[] = Carbon::today()->addDays(2);

            Appointment::factory()->createMany([
                ["doctor_id"=>$doctor->id, "start"=>$date[0], "time"=>Appointment::$times[0]],
                ["doctor_id"=>$doctor->id, "start"=>$date[1], "time"=>Appointment::$times[1]],
                ["doctor_id"=>$doctor->id, "start"=>$date[2], "time"=>Appointment::$times[8]],
                ["doctor_id"=>$doctor->id, "start"=>$date[3], "time"=>Appointment::$times[9]]
            ]);
        }

    }
}
