{{--
    Date field with a calendar picker. Submits Y-m-d; shows e.g. "Oct 10, 2026".
    Usage: <x-form.date name="due_date" label="Due date" :value="$invoice->due_date?->format('Y-m-d')" min-date="today" />
--}}
@props([
    'name',
    'label',
    'value' => null,
    'required' => false,
    'hint' => null,
    'minDate' => null,
    'maxDate' => null,
])

<x-form.input
    :$name
    :$label
    :$value
    :$required
    :$hint
    data-datepicker
    :data-min-date="$minDate"
    :data-max-date="$maxDate"
    placeholder="Select a date"
    autocomplete="off"
    {{ $attributes }}
/>
