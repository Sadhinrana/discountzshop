<?php

namespace App\Http\Controllers\Product;

use App\Model\Product\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['Auth:admin', 'admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        // Delete image from the directory
        Storage::delete('public/images/product/'.$image->image);
        $image->delete();

        return response()->json();
    }
}
