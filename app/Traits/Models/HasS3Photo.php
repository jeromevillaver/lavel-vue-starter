<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

trait HasS3Photo
{
    /**
     * The "booting" method of the model.
     */
    public static function bootHasS3Photo()
    {
        $instance = new self();

        if (! method_exists($instance, 'photoPrefix')) {
            throw new RuntimeException("The 'photoPrefix' method must be declared in " . get_class($instance) . ".");
        }

        if (! method_exists($instance, 'photoDirectory')) {
            throw new RuntimeException("The 'photoDirectory' method must be declared in " . get_class($instance) . ".");
        }
    }

    /**
     * Update the model's photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     */
    public function updatePhoto(UploadedFile $photo): void
    {
        tap($this->photo_path, function ($previous) use ($photo) {
            $this->forceFill([
                'photo_path' => $photo->storePublicly(
                    $this->photoPrefix() . $this->photoDirectory(),
                    ['disk' => $this->photoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->photoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the model's photo.
     */
    public function deletePhoto(): void
    {
        if (is_null($this->photo_path)) {
            return;
        }

        Storage::disk($this->photoDisk())->delete($this->photo_path);

        $this->forceFill([
            'photo_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the model's photo.
     */
    public function photoUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->photo_path
                    ? Storage::disk($this->photoDisk())->url($this->photo_path)
                    : null;
            }
        );
    }

    /**
     * Get the default photo URL if no photo has been uploaded.
     */
    protected function defaultPhotoUrl(): string
    {
        return 'https://placehold.co/400x400/orange/white';
    }

    /**
     * Get the disk that photos should be stored on.
     */
    public function photoDisk(): string
    {
        return 's3';
    }
}
