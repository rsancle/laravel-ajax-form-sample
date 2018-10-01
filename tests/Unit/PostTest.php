<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;


class PostTest extends TestCase
{
    use WithFaker;

    /**
     * Check Leap Year checker
     * @test
     */
    public function isLeapYear()
    {
        $post = factory('App\Post')->make(['fecha' => $this->createLeapYear()]);
        $this->assertTrue($post->fecha->isLeapYear());
    }

    /**
     * Check normal Year checker
     * @test
     */
    public function isNotLeapYear()
    {
        $post = factory('App\Post')->make(['fecha' => $this->createLeapYear(false)]);
        $this->assertFalse($post->fecha->isLeapYear());
    }

    /**
     * Check dayOfTheWeek returns a string
     * @test
     */
    public function returnDayOfTheWeekProperly()
    {
        $post = factory('App\Post')->make();
        $this->assertTrue(is_string($post->dayOfTheWeek('es')));
    }


    /**
     * Return a Leap Year or a normal Year
     * @param bool $option
     * @return string
     */
    public function createLeapYear($option = true)
    {
        $date = $this->createDate();
        if($option){
            while (!$date->isLeapYear()){
                $date = $this->createDate();
            }
        }else{
            while ($date->isLeapYear()){
                $date = $this->createDate();
            }
        }
        return $date->format('d-m-Y');
    }

    /**
     * Create a Carbon Date
     * @return Carbon
     */
    public function createDate()
    {
        return  new Carbon($this->faker->date());
    }
}
