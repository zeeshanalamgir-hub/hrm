<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Store and replace uploaded images on a filesystem disk.
 */
trait UploadsImages
{
    /**
     * Store an uploaded image and delete the image it replaces.
     *
     * @return string The stored path, relative to the disk root.
     */
    protected function uploadImage(UploadedFile $file, string $directory, ?string $oldPath = null, string $disk = 'public'): string
    {
        $path = $file->store($directory, $disk);

        $this->deleteImage($oldPath, $disk);

        return $path;
    }

    /**
     * Delete a stored image if it exists.
     */
    protected function deleteImage(?string $path, string $disk = 'public'): void
    {
        if ($path && Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }
}
