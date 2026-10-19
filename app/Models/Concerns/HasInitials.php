<?php

namespace App\Models\Concerns;

use App\Support\Initials;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Adds an $model->initials attribute built from the model's name.
 * Override initialsSource() if the name lives in a different column.
 */
trait HasInitials
{
    /**
     * @return Attribute<string, never>
     */
    protected function initials(): Attribute
    {
        return Attribute::get(fn () => Initials::from($this->initialsSource()));
    }

    protected function initialsSource(): ?string
    {
        return $this->name;
    }
}
