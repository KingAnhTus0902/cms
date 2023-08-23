<?php

namespace App\Services\FileService;

use DOMDocument;
use DOMXPath;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Throwable;

class FileService implements FileServiceInterface
{
    /** @var mixed */
    protected mixed $defaultDisk;

    /** @var Filesystem */
    protected Filesystem $storage;

    /**
     * Base construction
     *
     */
    public function __construct()
    {
        $this->defaultDisk = env('FILESYSTEM_DISK', 'public');
        $this->storage = Storage::disk($this->defaultDisk);
    }

    /**
     * Upload file.
     *
     * @param $file
     * @param string $path
     * @param null $oldStoragePath
     * @return array
     */
    public function upload($file, string $path = 'files', $oldStoragePath = null): array
    {
        $data = [];
        try {
            if (isset($oldStoragePath)) {
                $this->delete((array)$oldStoragePath);
            }

            foreach ($file as $value) {
                $fileName = rand(1111, 9999) . time() . $value->getClientOriginalName();
                $location = $path . DIRECTORY_SEPARATOR . $fileName;
                $data[] = [
                    'fileName' => $fileName,
                    'location' => request()->getSchemeAndHttpHost() . DIRECTORY_SEPARATOR . 'storage' . $location
                ];
                $this->storage->put($location, file_get_contents($value));
            }
        } catch (Throwable $e) {
            report($e);
        }

        return $data;
    }

    /**
     * Delete file exists
     *
     * @param array $path
     * @return bool
     */
    public function delete(array $path): bool
    {
        try {
            foreach ($path as $value) {
                if (preg_match(REGEX_DELETE_FILE_USER, $value, $matches) ||
                    preg_match(REGEX_DELETE_FILE_MEDICAL_TEST, $value, $matches) ||
                    preg_match(REGEX_DELETE_FILE_SETTING, $value, $matches)
                ) {
                    if ($this->storage->exists($matches[0])) {
                        $this->storage->delete($matches[0]);
                    }
                }
            }
            return true;
        } catch (Throwable $e) {
            report($e);
        }

        return false;
    }

    /**
     * Get file from the text editor
     *
     * @param $html
     * @return array
     */
    public function fileFromTextEditor($html): array
    {
        if (empty($html)) {
            return [];
        }

        // Create a new DOMDocument
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $image = [];
        $imgNodes = $xpath->query("//img");

        foreach ($imgNodes as $imgNode) {
            $src = $imgNode->getAttribute('src');
            if (preg_match(REGEX_PATH_FILE_MEDICAL_TEST, $src, $matches)) {
                $image[] = $matches[0];
            }
        }

        return $image;
    }
}
