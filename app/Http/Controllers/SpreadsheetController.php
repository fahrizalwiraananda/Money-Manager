<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\reader\Xlsx as XLsxReader;

class SpreadsheetController extends Controller
{
    public function get(Request $request) {

        //mengambil id dan nama user
        $userId = Auth::id();
        $userName = Auth::user()->name;
        

        //buat konfig tempat simpan file excell
        $fileName = "$userId-$userName.xlsx";
        $path = public_path() . "/storage/" . $fileName;


        //ambil semua activity dari db menurut id
        $activity = new Activity();
        $activities = $activity->where('userId', $userId)->get();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue("A1", "Aktifitas");
        $sheet->setCellValue("B1", "Nominal");
        $sheet->setCellValue("C1", "Jenis");


        foreach($activities as $index => $value) {

            $row = 2 + $index;
            $jenis = "";


            if($value->nominal > 0) {
                $jenis = "Pemasukan";
            }else {
                $jenis = "Pengeluaran";
            }

            $sheet->setCellValue("A$row", $value->description);
            $sheet->setCellValue("B$row",  $value->nominal);
            $sheet->setCellValue("C$row", $jenis);
        }


        $writter = new XlsxWriter($spreadsheet);
        $writter->save("./storage/" . $fileName);


        //return redirect('/');

        return response()->download($path, $fileName, [

            "Content-Type" => "application/octet-stream"

        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'file' => [ 'required', 'mimes:xlsx', 'file']
        ]);
    //
        $file = $request->file('file');

        dd($file);

        //return redirect('/');
    //    $validateData = $request->validate([
            //'file' => [ 'required', 'mimes:xlsx', 'file']
   //     ]);
    
    //    $file = $request->file('file');

     //   $fileName = uniqid() . '_' . $file->getClientOriginalName();

        //$file->move('temp', $fileName);


       //baca ffile
        //$reader = new XLsxReader();

        //$spreadsheet = $reader->load('./temp/' . $fileName);

        //$activities = $spreadsheet->getActiveSheet()->toArray();

        //array_shift($activities);

        //dd($activities);
        
        //menampilkan error jika array tidak ada -- count berfungsi menghitung jumlah data dalam array
        //if(count($activities) < 1){
        //    return back()->withErrors([
        //        'file' => 'Activity not fourn'
        //    ]);
        //}
        
        //$userId = Auth::id();
        //$data = [];

        //foreach($activities as $activity) {
         //   array_push($data, [
          //      'description' => $activity[0],
          //      'nominal' => $activity[1],
           //     'userId' => $userId,
           // ]);
       // }

        //simpan data ke DB
        //$activity = new Activity();
        //$activity->insert($data);


        return redirect('/');
    }


}
