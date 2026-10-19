@props([
    'name',
    'label',
    'options' => [],
    'value' => null,
    'required' => false,
    'hint' => null,
    'searchable' => true,
    'placeholder' => null,
])

@php($invalid = $errors->has($name))

{{-- Searchable selects are enhanced by Tom Select, which copies the select's classes onto its wrapper. --}}

<x-form.field :$name :$label :$required :$hint :class="$attributes->get('class')">
    <select
        id="{{ $name }}"
        name="{{ $name }}"
        @required($required)
        @if ($searchable) data-searchable @endif
        @if ($placeholder) data-placeholder="{{ $placeholder }}" @endif
        {{ $attributes->except('class')->class(
            $searchable
                ? ['w-full', 'is-invalid' => $invalid]
                : [
                    'form-control',
                    'is-invalid' => $invalid,
                ]
        ) }}
    >
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @selected((string) old($name, $value) === (string) $optionValue)>{{ $optionLabel }}</option>
        @endforeach
    </select>
</x-form.field>
