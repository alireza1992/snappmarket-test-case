<?php
/**
 * Created by PhpStorm.
 * User: alireza
 * Date: 6/14/20
 * Time: 12:55 AM
 */

namespace App\Http\Controllers;


use App\Http\Requests\CsvRequest;
use App\Models\Product;

class CsvController
{

    public function __construct()
    {

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
     */
    public function storeCsv(CsvRequest $request)
    {
        $path = $request->file('csv')->getRealPath();

        $file=\PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        $sheet = $file->getActiveSheet()->toArray();
        $header = $sheet[0];

        $headerRow = true;
        $arrayData = [];

        foreach ($sheet as $index => $row) {
            if ($headerRow) {
                $arrayData[] = $row;
                $headerRow = false;
                continue;
            }

            $array = array_combine($header, $row);
            Product::create($array);
        }
    echo "success";

    }
}