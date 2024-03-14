<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Http\ResponseTrait;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class GoogleServiceController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    // retrieve the data from google sheet
    public function getGoogleSheetValues(Request $request)
    {
        $branch = 'BJ';
        // dd($branch);
        $branch = $request->selectedBranch;
        $getrange1 = 'BESTARI JAYA!A:E';
        $getrange2 = 'SHAH ALAM!A:E';


        $values1 = Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheetById(config('google.post_sheet_id'))
            ->range($getrange1)
            ->all();

        $values2 = Sheets::spreadsheet(config('google.post_spreadsheet_id'))
            ->sheetById(config('google.post_sheet_id2'))
            ->range($getrange2)
            ->all();

        $header = array_shift($values1);
        $header2 = array_shift($values2);

        $data = [];
        foreach ($values1 as $row) {
            // Check if the row is not empty before adding it to the data array
            if (!empty($row)) {
                $data[] = $row;
            }
        }

        $data2 = [];
        foreach ($values2 as $row2) {
            // Check if the row is not empty before adding it to the data array
            if (!empty($row2)) {
                $data2[] = $row2;
            }
        }

        // Now, $data contains non-empty arrays only


        // dd($data, $data2);
        //  dd($values);

        return view('googleservice', compact('data', 'data2','branch'));
    }

    public function GetBranch(Request $request)
    {

        $branch = '';
        $branch = $request->selectedBranch;

        // dd($branch);




    }


    // append new row to google sheet
    // public function appendValuesToGoggleSheet()
    // {
    //      $append = [
    //        'title' =>'Test Title',
    //        'description' => 'This is dummy title'
    //      ];
    //       $appendSheet =Sheets::spreadsheet(config('google.post_spreadsheet_id'))
    // ->sheet(config('google.post_sheet_id'))
    // ->append([$append]);
    //  }
}
