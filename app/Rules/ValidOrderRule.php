<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidOrderRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $orders = collect($value)->sortBy('order')->pluck('order');
        foreach ($orders as $key => $order){
            if( $key < count($orders) - 1 ){
                if( (int) $order + 1 != (int) $orders[$key + 1]) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Please provide a right order for optional courses');
    }
}
