<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait FileStorageTrait {

    public function storefile(UploadedFile $file, string $path): ?string {
        try{
            // Ensure the file is valid
            if (!$file->isValid()) {
                throw new \Exception('Invalid file');
            }

            // Check if file is an image and compress it if so
            if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                $image = Image::make($file->getRealPath());
                $image->resize(1200, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('jpg', 75); // Adjust format and compression quality as needed

                $filename = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put($path . '/' . $filename, $image->stream());
                return Storage::disk('public')->url($path . '/' . $filename);
            } else {
                // Store non-image files as before
                return $file->store($path, 'public');
            }
        } catch (\Exception $e) {
            // Handle exceptions (log, notify, etc.)
            \Log::error('File storage error: ' . $e->getMessage());
            return null;
        }
    }

    protected function handleFiles($files, $folder)
    {
        $paths = [];
        foreach ($files as $file) {
            $path = $this->storefile($file, $folder);
            if (in_array($file->getClientOriginalExtension(),['mp4', 'avi', 'mov', 'mkv', 'flv', 'wmv']))
            {
                $path = $this->processVideoForHLS($path, $folder);
            }
            $paths[] = $path ;
        }
        return $paths;
    }
    protected function processVideoForHLS($videoPath, $folder)
    {
        $publicPath = storage_path('app/public/' . $folder);
        $videoNameWithoutExt = basename($videoPath, '.mp4');
        $hlsOutputPath = $publicPath . '/' . $videoNameWithoutExt . '_hls';

        // Ensure the output directory exists
        if (!file_exists($hlsOutputPath)) {
            mkdir($hlsOutputPath, 0777, true);
        }

        // Path to the stored video
        $storedVideoPath = $publicPath . '/' . basename($videoPath);

        // FFmpeg commands for converting video to HLS format at 360p and 720p while maintaining aspect ratio
        $ffmpegCommand360p = "ffmpeg -i {$storedVideoPath} -profile:v baseline -level 3.0 -vf \"scale='min(640,iw):-2'\" -start_number 0 -hls_time 10 -hls_list_size 0 -f hls {$hlsOutputPath}/360p.m3u8";
        $ffmpegCommand720p = "ffmpeg -i {$storedVideoPath} -profile:v baseline -level 3.0 -vf \"scale='min(1280,iw):-2'\" -start_number 0 -hls_time 10 -hls_list_size 0 -f hls {$hlsOutputPath}/720p.m3u8";

        // Execute the commands
        shell_exec($ffmpegCommand360p);
        shell_exec($ffmpegCommand720p);

        // Construct a web-accessible URL pointing to the main playlist file
        // Assuming you have set up a symlink from public/storage to storage/app/public
        // and the $folder variable correctly points to a directory under storage/app/public
        $webAccessibleUrl = asset("storage/$folder/$videoNameWithoutExt" . "_hls/360p.m3u8");

        // Return the web-accessible URL
        return $webAccessibleUrl;
    }

}
