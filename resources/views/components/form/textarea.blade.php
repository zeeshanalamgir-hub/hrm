@props([
    'name',
    'label',
    'value' => null,
    'required' => false,
    'hint' => null,
])

<x-form.field :$name :$label :$required :$hint :class="$attributes->get('class')">
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="4"
        @required($required)
        {{ $attributes->except('class')->class([
            'form-control',
            'is-invalid' => $errors->has($name),
        ]) }}
    >{{ old($name, $value) }}</textarea>
</x-form.field>
