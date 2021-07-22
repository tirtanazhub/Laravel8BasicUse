<?php

namespace App\Http\Controllers;
use PDF;
use File;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;

class EmployeeController extends Controller
{
    public function caricari(Request $request) {
        $cari = $request->search;
        $data = Employee::where('nama','LIKE','%'.$cari.'%');
        return view ('searchpegawai',compact('data'));
    }

    public function index(Request $request) {
        $lines = Employee::all();
        $counts = $lines->count();
        if($request->has('search'))
            {   
                $data = Employee::where('nama','LIKE','%'.$request->search.'%')->paginate(3);
            } else 
            {
                $data = Employee::paginate(3);
            }
        return view ('datapegawai',compact('data','counts'));
    }

    public function pegawaisortbynama() {
        $no = 0; 
        $lines = Employee::all();
        $counts = $lines->count();
        $data = Employee::orderBy('nama', 'desc')->get();
        return view ('datapegawai-sortbyname',compact('data','no','counts'));
    }

    public function pegawaisortbyregister() {
        $no = 0; 
        $lines = Employee::all();
        $counts = $lines->count();
        $data = Employee::orderBy('created_at', 'desc')->get();
        return view ('datapegawai-sortbyregister',compact('data','no','counts'));
    }

    public function tambahpegawai() {
        return view ('tambahpegawai');
    }

    public function tambahkan(Request $request) {
        $data = Employee::create($request->all());
        if($request->hasFile('img'))
        {
            $request->file('img')->move('imgpegawai/',$request->file('img')->getClientOriginalName());
            $data->img = $request->file('img')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data baru sukses ditambah.'); 
    }
    
    public function showpegawai($id) {
        $data = Employee::findOrfail($id);
        return view ('showpegawai', compact('data'));
    }

    public function editpegawai(Request $request, $id) {
        $data = Employee::findOrfail($id);
        return view ('editpegawai', compact('data'));
    }

    public function doeditpegawai(Request $request, $id) {
        $data = Employee::findOrfail($id);
        $oldimg = $data->img;
        $imgpath = public_path('imgpegawai/'.$oldimg);

            if(File::exists($imgpath)) {
                File::delete($imgpath);
            }
            
        $file = $request->file('img');
        $nameimg = time().'-'.$file->getClientOriginalName();
            $datas = [
                'img' => $nameimg,
                'nama' => $request['nama'],
                'kelamin'=> $request['kelamin'],
                'hp'=> $request['hp'],
            ];
        $request->img->move('imgpegawai/',$nameimg);
        //$data->update($request->all());
        $data->update($datas);
        return redirect()->route('pegawai')->with('success', 'Data sukses diedit.');
    }

    public function deletepegawai($id) {
        $data = Employee::findOrfail($id);
        $imgpath = public_path('imgpegawai/'.$data['img']);
            if(File::exists($imgpath)) {
                File::delete($imgpath);
            }
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data sukses dihapus.');
    }

    public function expdf() {
        $data = Employee::all();

        view()->share('data',$data);
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadview('datapegawaipdf');
        return $pdf->download('dapeg.pdf');
    }

    public function exexcel() {
        return Excel::download(new EmployeeExport,'datapegawai.xlsx');
    }

    public function importexcel(Request $request) {
        $data =  $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('EmployeeData',$namafile);

        Excel::import(new EmployeeImport, public_path('/EmployeeData/'.$namafile));
        return redirect()->back();
    }
}
