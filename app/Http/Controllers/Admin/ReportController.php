<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:report index'])->only(['index']);
        $this->middleware(['permission:report delete'])->only(['destroy']);
    }
    public function index()
    {
        $reports = Report::all();
        return view('admin.report.index' , compact('reports'));
    }

    public static function destroy(Report $report)
    {
        $report->delete();

        toastr()->success('Report Deleted Successfully');
        return redirect()->back();
    }
}
