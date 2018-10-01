<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha'
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'd-m-Y';

    /**
     * Returns the day of the week in the selected locale
     * @param string $locale
     * @return string
     */
    public function dayOfTheWeek($locale = 'en')
    {
        setlocale(LC_TIME, $locale);
        $date = Carbon::parse($this->fecha)->localeDayOfWeek;
        setlocale(LC_TIME, '');
        return utf8_encode($date);
    }

}
