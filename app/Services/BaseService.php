<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Base Service Class
 * 
 * Provides common functionality for all service classes
 * including transaction handling and error logging
 */
abstract class BaseService
{
    /**
     * Execute a database transaction
     * 
     * @param callable $callback
     * @return mixed
     * @throws \Exception
     */
    protected function executeInTransaction(callable $callback)
    {
        try {
            return DB::transaction($callback);
        } catch (\Exception $e) {
            Log::error('Transaction failed: ' . $e->getMessage(), [
                'service' => static::class,
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    /**
     * Log an error
     * 
     * @param string $message
     * @param array $context
     * @return void
     */
    protected function logError(string $message, array $context = []): void
    {
        Log::error($message, array_merge([
            'service' => static::class,
        ], $context));
    }

    /**
     * Log an info message
     * 
     * @param string $message
     * @param array $context
     * @return void
     */
    protected function logInfo(string $message, array $context = []): void
    {
        Log::info($message, array_merge([
            'service' => static::class,
        ], $context));
    }
}
