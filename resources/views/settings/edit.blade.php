@extends('layouts.app')

@section('title', 'Settings')
@section('breadcrumb', 'Settings')

@section('content')
    <x-page-header title="Account settings" subtitle="Update your profile, email and password." eyebrow="System" />

    <div class="grid grid-cols-1 items-start gap-5 xl:grid-cols-2">
        {{-- Profile --}}
        <x-panel>
            <x-panel-heading title="Profile" subtitle="Your name, email and profile picture." />

            <form method="POST" action="{{ route('settings.profile.update') }}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-6 flex flex-wrap items-center gap-4">
                    <div id="avatarPreview" class="relative">
                        <x-avatar :initials="$user->initials" :src="$user->avatar_url" size="lg" data-avatar-current />
                        <img src="" alt="" class="hidden size-20 rounded-2xl object-cover" data-avatar-new>
                    </div>

                    <div>
                        <div class="flex flex-wrap items-center gap-2">
                            <label for="avatar" class="inline-flex h-[34px] cursor-pointer items-center gap-2 rounded-[10px] border border-primary-soft bg-primary-soft px-[13px] text-2xs font-semibold text-primary-strong transition hover:border-primary-light hover:bg-primary-light focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-primary">
                                <i data-lucide="upload" class="size-[15px]"></i> Upload picture
                            </label>
                            <input id="avatar" name="avatar" type="file" accept="image/png,image/jpeg,image/webp" class="sr-only" data-image-preview="#avatarPreview">

                            @if ($user->avatar)
                                <button type="button" class="h-[34px] px-2 text-2xs font-semibold text-danger hover:underline"
                                        data-confirm-delete="{{ route('settings.avatar.destroy') }}" data-name="your profile picture">
                                    Remove
                                </button>
                            @endif
                        </div>
                        <p class="mt-2 text-2xs text-faint" data-image-name>JPG, PNG or WebP, up to 2 MB.</p>
                        @error('avatar')
                            <p class="mt-1.5 text-2xs text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-[18px]">
                    <x-form.input name="name" label="Username" :value="$user->name" required autocomplete="name" />
                    <x-form.input name="email" label="Email" type="email" :value="$user->email" required autocomplete="email" />
                </div>

                <div class="mt-6 flex justify-end border-t border-line-soft pt-5">
                    <x-button type="submit"><i data-lucide="check"></i> Save profile</x-button>
                </div>
            </form>
        </x-panel>

        {{-- Password --}}
        <x-panel>
            <x-panel-heading title="Password" subtitle="Use a long password you don’t use anywhere else." />

            <form method="POST" action="{{ route('settings.password.update') }}" novalidate>
                @csrf
                @method('PUT')

                {{-- Lets password managers know which account this password belongs to. --}}
                <input type="text" name="username" value="{{ $user->email }}" autocomplete="username" class="hidden" aria-hidden="true" tabindex="-1">

                <div class="grid grid-cols-1 gap-[18px]">
                    <x-form.input name="current_password" label="Current password" type="password" required autocomplete="current-password" />
                    <x-form.input name="password" label="New password" type="password" required autocomplete="new-password" />
                    <x-form.input name="password_confirmation" label="Confirm new password" type="password" required autocomplete="new-password" />
                </div>

                <div class="mt-6 flex justify-end border-t border-line-soft pt-5">
                    <x-button type="submit"><i data-lucide="lock-keyhole"></i> Update password</x-button>
                </div>
            </form>
        </x-panel>
    </div>
@endsection
