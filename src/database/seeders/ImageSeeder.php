<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $public_images = public_path('images');

        if (!Storage::exists('public/images')) {
            Storage::makeDirectory('public/images');
        }


        $files = File::allFiles($public_images);
        foreach ($files as $file) {
            $fileName = $file->getFilename();
            $new_path = 'public/images/' . $fileName;
            Storage::put($new_path, file_get_contents($file));
        }
    }
}
