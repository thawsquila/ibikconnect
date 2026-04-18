<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * File Upload Service
 * 
 * Handles file uploads, image optimization, and file deletion
 * Provides consistent file handling across the application
 */
class FileUploadService extends BaseService
{
    private function normalizePath(string $path): string
    {
        $path = ltrim($path, '/\\');
        $path = str_replace('\\', '/', $path);

        if (str_starts_with($path, 'public/')) {
            $path = substr($path, strlen('public/'));
        }

        if (str_starts_with($path, 'storage/')) {
            $path = substr($path, strlen('storage/'));
        }

        return $path;
    }

    private function shouldUsePublicUploads(): bool
    {
        return (bool) config('filesystems.use_public_uploads', false);
    }

    private function ensureDirectoryExists(string $absolutePath): void
    {
        if (!file_exists($absolutePath)) {
            mkdir($absolutePath, 0755, true);
        }
    }

    /**
     * Upload a file to storage
     * 
     * @param UploadedFile $file
     * @param string $path Directory path in storage
     * @param string|null $filename Custom filename (optional)
     * @return string Stored file path
     */
    public function upload(UploadedFile $file, string $path, ?string $filename = null): string
    {
        try {
            // Generate unique filename if not provided
            if (!$filename) {
                $filename = $this->generateUniqueFilename($file);
            }

            if ($this->shouldUsePublicUploads()) {
                $fullPath = public_path($path);
                $this->ensureDirectoryExists($fullPath);
                $file->move($fullPath, $filename);
                $storedPath = $path . '/' . $filename;
            } else {
                $storedPath = $file->storeAs($path, $filename, 'public');
            }

            $this->logInfo('File uploaded successfully', [
                'path' => $storedPath,
                'original_name' => $file->getClientOriginalName(),
            ]);

            return $storedPath;
        } catch (\Exception $e) {
            $this->logError('File upload failed', [
                'error' => $e->getMessage(),
                'path' => $path,
            ]);
            throw $e;
        }
    }

    /**
     * Upload and optimize an image
     * 
     * @param UploadedFile $file
     * @param string $path
     * @param int $maxWidth Maximum width in pixels
     * @param int $quality Image quality (1-100)
     * @return string Stored file path
     */
    public function uploadImage(
        UploadedFile $file,
        string $path,
        int $maxWidth = 1920,
        int $quality = 85
    ): string {
        try {
            $filename = $this->generateUniqueFilename($file);
            if ($this->shouldUsePublicUploads()) {
                $fullPath = public_path($path);
                $this->ensureDirectoryExists($fullPath);
                $file->move($fullPath, $filename);
            } else {
                $fullPath = storage_path('app/public/' . $path);
                $this->ensureDirectoryExists($fullPath);
                $file->storeAs($path, $filename, 'public');
            }

            $this->logInfo('Image uploaded successfully', [
                'path' => $path . '/' . $filename,
            ]);

            return $path . '/' . $filename;
        } catch (\Exception $e) {
            $this->logError('Image upload failed', [
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Delete a file from storage
     * 
     * @param string|null $path
     * @return bool
     */
    public function delete(?string $path): bool
    {
        if (!$path) {
            return false;
        }

        $path = $this->normalizePath($path);

        try {
            $deleted = false;
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
                $this->logInfo('File deleted successfully', ['path' => $path]);
                $deleted = true;
            }

            $publicAbsolutePath = public_path($path);
            if (file_exists($publicAbsolutePath)) {
                @unlink($publicAbsolutePath);
                $this->logInfo('File deleted successfully', ['path' => $path]);
                $deleted = true;
            }

            return $deleted;
        } catch (\Exception $e) {
            $this->logError('File deletion failed', [
                'error' => $e->getMessage(),
                'path' => $path,
            ]);
            return false;
        }
    }

    /**
     * Generate unique filename
     * 
     * @param UploadedFile $file
     * @return string
     */
    private function generateUniqueFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $basename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $timestamp = now()->format('YmdHis');
        $random = Str::random(6);

        return "{$basename}-{$timestamp}-{$random}.{$extension}";
    }

    /**
     * Get file URL
     * 
     * @param string|null $path
     * @return string|null
     */
    public function getUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        $path = $this->normalizePath($path);

        $publicAbsolutePath = public_path($path);
        if (file_exists($publicAbsolutePath)) {
            return asset($path);
        }

        return Storage::disk('public')->url($path);
    }
}
