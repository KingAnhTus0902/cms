<?php

namespace App\Services\FileService;

interface FileServiceInterface
{
    /**
     * Upload file.
     *
     * @param $file
     * @param string $path
     * @param null $oldStoragePath
     * @return array
     */
    public function upload($file, string $path = 'files', $oldStoragePath = null): array;

    /**
     * Delete file exists
     *
     * @param array $path
     * @return bool
     */
    public function delete(array $path): bool;

    /**
     * Get file from the text editor
     *
     * @param $html
     * @return array
     */
    public function fileFromTextEditor($html): array;
}
