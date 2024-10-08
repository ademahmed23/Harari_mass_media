<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use File;

class AboutUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'max:3000'],
            'video_url' => ['required', 'url'],
            'description' => ['required'],
            'button_url' => ['nullable', 'url']
        ];
    }

    function uploadImage(Request $request, string $inputName, ?string $oldPath = null, string $path = '/uploads') : ?string
    {
        if($request->hasFile($inputName)){
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid(). '.' . $ext;

            $image->move(public_path($path), $imageName);

            // Delete previous image from storage
            $exculudedFolder = '/default';

            if($oldPath && File::exists(public_path($oldPath)) && strpos($oldPath, $exculudedFolder) !== 0){
                File::delete(public_path($oldPath));
            }

            return $path . '/' . $imageName;
        }

        return null;
    }

    function uploadMultipleImage(Request $request, string $inputName, string $path = '/uploads') : ?array
    {
        if($request->hasFile($inputName)){

            $images = $request->{$inputName};

            $paths = [];

            foreach($images as $image){

                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_' . uniqid(). '.' . $ext;

                $image->move(public_path($path), $imageName);
                $paths[] = $path . '/' . $imageName;
            }

            return $paths;
        }

        return null;
    }
}
