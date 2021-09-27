<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\InviteCode;
class InviteCodeHasQuantity implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $inviteCode;
  
    public function __construct(?InviteCode $inviteCode)
    {
        $this->inviteCode = $inviteCode;
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
        return optional($this->inviteCode)->hasAvailableQuantity();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'That code has reached the maximum usage.';
    }
}
