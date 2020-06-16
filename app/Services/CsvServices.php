<?php
/**
 * Created by PhpStorm.
 * User: alireza
 * Date: 6/16/20
 * Time: 1:42 PM
 */

namespace App\Services;


use App\Models\Product;

class CsvServices
{
    /**
     * @param $path
     * @return \Exception|\Illuminate\Http\JsonResponse
     */
    public function saveCsv($path)
    {
        try {
            $file = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
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
        }catch (\Exception $exception)
        {
            return $exception;
        }
        return response()->json(['data'=>'Csv has been successfully uploaded',
            'status'=>201
        ]);
    }
}