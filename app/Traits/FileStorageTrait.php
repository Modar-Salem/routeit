<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileStorageTrait {


    public function storefile(UploadedFile $file, string $path): ?string {
        try{
            // Ensure the file is an file
            if (!$file->isValid() ) {
                throw new \Exception('Invalid file');
            }

            // Store the file and return the path
            return $file->store($path, 'public');
        } catch (\Exception $e) {
            // Handle exceptions (log, notify, etc.)
            \Log::error('file Storage Error: ' . $e->getMessage());
            return null;
        }
    }

    protected function handleFiles($files, $folder)
    {
        $paths = [];
        foreach ($files as $file) {
            $paths[] = $this->storefile($file, $folder);
        }
        return $paths;
    }
}
