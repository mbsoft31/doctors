<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, int|string|null $id)
 */
class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $times = [
        "08:00",
        "08:30",
        "09:00",
        "09:30",
        "10:00",
        "10:30",
        "11:00",
        "11:30",

        "13:00",
        "13:30",
        "14:00",
        "14:30",
        "15:00",
        "15:30",
        "16:00",
        "16:30",
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, "patient_id");
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, "doctor_id");
    }

    public function accept()
    {
        $this->status = "accepted";
        return $this->save();
    }

    public function delay(Carbon $carbon)
    {
        $this->appointment_at = $carbon;
        return $this->save();
    }
}
