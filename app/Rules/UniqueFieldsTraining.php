<?php

namespace App\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class UniqueFieldsTraining implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $trainingName;
    protected $field;

    public function __construct($trainingName, $field)
    {
        $this->trainingName = $trainingName;
        $this->field = $field;
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
        // Check if the field value is unique for the given training name
        $exists = DB::table('short_trainings')
            ->where('training_name', $this->trainingName)
            ->where($this->field, $value)
            ->exists();

        return !$exists;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute already registed for this training.';
    }
}
