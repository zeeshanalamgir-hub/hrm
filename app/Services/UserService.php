<?php

namespace App\Services;

use App\Models\User;
use App\Traits\UploadsImages;
use Illuminate\Http\UploadedFile;

class UserService
{
    use UploadsImages;

    private const AVATAR_DIRECTORY = 'avatars';

    /**
     * Update the user's name, email and (optionally) profile picture.
     *
     * @param  array{name: string, email: string}  $data
     */
    public function updateProfile(User $user, array $data, ?UploadedFile $avatar = null): User
    {
        $user->fill([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($avatar) {
            $user->avatar = $this->uploadImage($avatar, self::AVATAR_DIRECTORY, $user->avatar);
        }

        $user->save();

        return $user;
    }

    /**
     * Remove the user's profile picture.
     */
    public function removeAvatar(User $user): User
    {
        $this->deleteImage($user->avatar);

        $user->update(['avatar' => null]);

        return $user;
    }

    /**
     * Set a new password for the user.
     */
    public function updatePassword(User $user, string $password): User
    {
        $user->update(['password' => $password]);

        return $user;
    }
}
