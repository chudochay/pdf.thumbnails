<?php

namespace App\Http\Controllers;

use App\Pdf;
use Illuminate\Http\Request;
use Imagick;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index', [
            'pdfs' => Pdf::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Create thumbnail of uploaded pdf and store it
     *
     * @return void
     */

    public function makeThumbnail(string $location, string $pdfName): void
    {
        $thumbnail = new Imagick($location . $pdfName . ".pdf");
        $thumbnail->setIteratorIndex(0);
        $thumbnail->setCompression(Imagick::COMPRESSION_JPEG);
        $thumbnail->setCompressionQuality(100);
        $thumbnail->setImageFormat("jpeg");
        $thumbnail->writeImage($location . "thumbnails/" . $pdfName . ".jpg");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('pdf')) {

            /* ----Creating Unique name for each uploaded file---- */
            $pdfName = time() . '_' . $request->file('pdf')
                    ->getClientOriginalName();
            $pdfNameWithoutExt = explode('.', $pdfName)[0];
            $pdfSize = $request->file('pdf')->getSize();
            /* ---- Saving file to folder---- */
            $request->file('pdf')
                ->storeAs('public/uploads/', $pdfName);
            $location = 'storage/uploads/';
            /* ---- Saving file to database---- */
            $pdf = new Pdf;
            $pdf->name = $pdfName;
            $pdf->size = $pdfSize;
            $pdf->pdf_location = $location . $pdfName;
            $pdf->thumbnail_location = $location . "thumbnails/" . $pdfNameWithoutExt . ".jpg";
            $pdf->save();

            $this->makeThumbnail($location, $pdfNameWithoutExt);

            return redirect()->route('index')
                ->with('success', 'Document Added Successfully.');

        } else {
            return redirect()->route('create')
                ->with('error', 'Please choose the document you wish to upload.');
        }
    }
}
