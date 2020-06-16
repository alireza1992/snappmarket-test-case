<?php
/**
 * Created by PhpStorm.
 * User: alireza
 * Date: 6/14/20
 * Time: 12:55 AM
 */

namespace App\Http\Controllers;


use App\Http\Requests\CsvRequest;
use App\Services\CsvServices;

/**
 * @property CsvServices csvServices
 */
class CsvController
{

    /**
     * CsvController constructor.
     * @param CsvServices $csvServices
     */
    public function __construct(CsvServices $csvServices)
    {
        $this->csvServices = $csvServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upload()
    {
        return view('upload');
    }

    /**
     * @param CsvRequest $request
     * @return \Exception|\Illuminate\Http\JsonResponse
     */
    public function storeCsv(CsvRequest $request)
    {
        $path = $request->file('csv')->getRealPath();
        return $this->csvServices->saveCsv($path);


    }
}