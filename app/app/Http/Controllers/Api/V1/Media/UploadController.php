<?php

namespace App\Http\Controllers\Api\V1\Media;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends ApiController
{
    public function __construct()
    {}

    public function upload(Request $request)
    {
        try {

            $url = null;
            if(isset($request['image'])){
                /** @var $file UploadedFile */
                $file = $request['image'];

                $basename = Str::random(10);

                $url = Storage::disk('public')
                    ->putFileAs('image', $file, $basename. '.' . $file->extension());

                $url = env('APP_URL') .'/storage/'. $url;
            }

            return $this->successJsonMessage($url);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}

