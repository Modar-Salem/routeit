<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait FileStorageTrait {

    public function storefile(UploadedFile $file, string $path): ?string {
        if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
            $originalExtension = $file->getClientOriginalExtension();
            $image = Image::make($file->getRealPath());
            $image->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 75);

            $filename = time() . '.' . $originalExtension;
            Storage::disk('public')->put($path . '/' . $filename, $image->stream());
            return $path . '/' . $filename;
        } else {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $path . '/' . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($file->getRealPath()));
            return $filePath;
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
        $publicPath = storage_path('app/public');

        $storedVideoPath = $publicPath . '/' . $videoPath; // Ensure the path is absolute

        if (!file_exists($storedVideoPath)) {
            Log::error("Video file does not exist at path: " . $storedVideoPath);
            return false;
        }

        $videoNameWithoutExt = pathinfo($videoPath, PATHINFO_FILENAME);
        $hlsOutputPath = $publicPath . '/' . $folder . '/' . $videoNameWithoutExt . '_hls';

        if (!file_exists($hlsOutputPath)) {
            mkdir($hlsOutputPath, 0777, true);
        }

        $ffmpegCommand360p = "ffmpeg -i \"{$storedVideoPath}\" -profile:v baseline -level 3.0 -vf \"scale=min(640\\,iw):-2\" -start_number 0 -hls_time 10 -hls_list_size 0 -f hls \"{$hlsOutputPath}/360p.m3u8\" 2>&1";
        $ffmpegCommand720p = "ffmpeg -i \"{$storedVideoPath}\" -profile:v baseline -level 3.0 -vf \"scale=min(1280\\,iw):-2\" -start_number 0 -hls_time 10 -hls_list_size 0 -f hls \"{$hlsOutputPath}/720p.m3u8\" 2>&1";

        $output360p = shell_exec($ffmpegCommand360p);
        $output720p = shell_exec($ffmpegCommand720p);

        Log::info("FFmpeg 360p Output: " . $output360p);
        Log::info("FFmpeg 720p Output: " . $output720p);

        $webAccessibleUrl = asset("storage/$folder/$videoNameWithoutExt" . "_hls/360p.m3u8");
        return $webAccessibleUrl;
    }
}
