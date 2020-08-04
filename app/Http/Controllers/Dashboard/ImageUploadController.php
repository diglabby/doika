<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class ImageUploadController extends Controller
{
    /** Uploads a file as is and returns an URL to it */
    public function store(Request $request): string
    {
        $this->validate($request, [
            'image' => ['required', 'image'],
        ]);

        $image = $request->file('image');
        \Storage::disk('public')->putFileAs('uploads', $image, $image->getClientOriginalName());

        return \Storage::disk('public')->url("uploads/{$image->getClientOriginalName()}");
    }
}
