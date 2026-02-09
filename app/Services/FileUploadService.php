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

            // Store file
            $storedPath = $file->storeAs($path, $filename, 'public');

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
            $fullPath = storage_path('app/public/' . $path);

            // Create directory if not exists
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0755, true);
            }

            $filePath = $fullPath . '/' . $filename;

            // For now, just store the file directly
            // TODO: Add image optimization with Intervention Image
            $file->storeAs($path, $filename, 'public');

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

        try {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
                $this->logInfo('File deleted successfully', ['path' => $path]);
                return true;
            }
            return false;
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

        return Storage::disk('public')->url($path);
    }
}
