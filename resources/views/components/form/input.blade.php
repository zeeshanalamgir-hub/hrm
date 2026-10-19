@props([
    'name',
    'label',
    'value' => null,
    'type' => 'text',
    'required' => false,
    'hint' => null,
])

<x-form.field :$name :$label :$required :$hint :class="$attributes->get('class')">
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        @required($required)
        {{ $attributes->except('class')->class([
            'form-control',
            'is-invalid' => $errors->has($name),
        ]) }}
    >
</x-form.field>
