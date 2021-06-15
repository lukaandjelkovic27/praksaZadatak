<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataRequest;
use App\Imports\ImportCsv;
use App\Models\ImportData;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataController extends Controller
{
    public function store(StoreDataRequest $request)
    {
        try {
            if ($request->file('file')->getClientOriginalExtension() !== 'csv' && $request->file('file')->getClientOriginalExtension() !== 'xlsx') {
                return back()->with('error' ,'Invalid file extension');
            }
            Excel::import(new ImportCsv, $request->file('file'));
            return back()->with('message', 'File Imported');
        } catch (\Exception $e) {
            return back()->with('error', 'Invalid Format');
        }
    }

    public function indexApi() {
        $data = ImportData::where('date_of_birth', '<', Carbon::now()->subYears(18))->get()->groupBy('gender');
        return response()->json(['message' => 'Successful!', 'data' => $data], 200);
    }
}
