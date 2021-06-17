<?php


use Acaronlex\LaravelCalendar\Calendar as CalendarClass;
use Acaronlex\LaravelCalendar\Facades\Calendar;
use App\Actions\Auth\CreateDoctor;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/register-doctor', function () {
    return view("auth.doctor.register");
})->name("register.doctor");

Route::post('/register-doctor', function () {

    $input = request()->all();

    $user = (new CreateDoctor())->create($input);

    Auth::login($user);

    return redirect()->route("dashboard");

})->name("auth.doctor.register");

Route::get("/doctor/profile/{user}", function ($user) {

    $doctor = User::findOrFail($user);

    if ( ! $doctor->hasRole("doctor") ) abort(404);

    return view("doctor.profile", compact("doctor"));

})->middleware(["auth:sanctum"])->name("doctor.profile");

Route::get("/doctor/appointment", function (){

    $appointments = Appointment::where("doctor_id", Auth::id())->get();

    return view("appointment.index", [
        "appointments" => $appointments,
    ]);

})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.index");

Route::get("/doctor/appointment/calendar", function (){

    $events = [];

    $appointments = Appointment::where("doctor_id", Auth::id())->get();

    foreach ($appointments as $appointment)
    {
        $events[] = Calendar::event(
            $appointment->patient->name, //event title
            false, //full day event?
            $appointment->start, //start time (you can also use Carbon instead of DateTime)
            $appointment->end, //end time (you can also use Carbon instead of DateTime)
            $appointment->id //optionally, you can specify an event ID
        );
    }

    $calendar = new CalendarClass();
    $calendar->addEvents($events)
        ->setOptions([
            'locale' => 'fr',
            'firstDay' => 0,
            'displayEventTime' => true,
            'selectable' => true,
            'initialView' => 'timeGridDay',
            'headerToolbar' => [
                'end' => 'today prev,next dayGridMonth timeGridWeek timeGridDay'
            ]
        ]);
    $calendar->setId('1');
    $calendar->setCallbacks([
        'select' => 'function(selectionInfo){console.log("event", selectionInfo)}',
        'eventClick' => 'function(event){console.log("event", event)}'
    ]);

    //return view('hello', compact('calendar'));

    return view("appointment.calendar", [
        "calendar" => $calendar,
    ]);

})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.calendar");

Route::get("/doctor/appointment/{appointment}", function(Appointment $appointment) {})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.show");
