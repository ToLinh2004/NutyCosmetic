<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait {
    public function updateImage(Request $request, $inputName, $path, $oldPath = null) {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }
}
