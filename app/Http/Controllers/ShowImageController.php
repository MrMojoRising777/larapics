<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ShowImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Image $image, Request $request)
    {
        $image->load(['comments' => function ($query) {
            $query->approved();
        }, 'comments.user']);
        
        return view('image-show', compact('image'));
    }
}
