<?php

namespace App\Http\Traits;

/**
 * upload files on server and return path
 */
trait FileMoverTrait
{

    public static function move($file, $addition = null)
    {

        $ext = $file->getClientOriginalExtension();

        $filename = time() . $addition . '.' . $ext;

        $path = env('APP_URL') . '/' . $file->move('upload/', $filename);

        return $path;
    }
}
