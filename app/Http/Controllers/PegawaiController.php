<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Codedge\Fpdf\Fpdf\Fpdf;
// use PDF;

class PegawaiController extends Controller
{
    public function home()
    {
        $hasil = Pegawai::all();
        return view('home', ['data' => $hasil]);
    }
    public function tambah(Request $req)
    {
        // $image = $req->file('file');
        // $imageName = time() . '.' . $image->extension();
        // $image->move(public_path('images'), $imageName);
        $data = new Pegawai();
        $data->plat = $req->plat;
        $data->merk = $req->merk;
        $data->tipe = $req->tipe;
        // $data->profileimage = $imageName;
        $data->save();
        return $this->home();
    }

    public function hapus($req)
    {
        $data = Pegawai::find($req);
        // unlink(public_path('images') . '/' . $data->profileimage);
        $data->delete();

        return $this->home();
    }

    public function formUbah($req)
    {
        $hasil = Pegawai::find($req);
        return view('form-ubah-pegawai', ['data' => $hasil]);
    }
    public function ubah(Request $req)
    {
        // $image = $req->file('file');
        // $imageName = time() . '.' . $image->extension();
        // $image->move(public_path('images'), $imageName);

        $data =  Pegawai::find($req->id);
        $data->plat = $req->plat;
        $data->merk = $req->merk;
        $data->tipe = $req->tipe;
        // $data->profileimage = $imageName;
        $data->save();
        return $this->home();
    }


    public function downloadPDF(Fpdf $pdf)
    {

        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->MultiCell(0, 10, 'Report Data pegawai', 0, 'C');
        $pdf->Ln();
        // header
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 10, 'No', 1, 0, 'C');
        $pdf->Cell(50, 10, 'NIP', 1, 0, 'C');
        $pdf->Cell(50, 10, 'NAMA', 1, 0, 'C');
        $pdf->Cell(50, 10, 'ALAMAT', 1, 0, 'C');
        $pdf->Ln();
        // data
        $data = Pegawai::all();

        $i = 1;
        foreach ($data as $d) {

            $pdf->Cell(20, 10, $i++, 1, 0, 'C');
            $pdf->Cell(50, 10, $d['plat'], 1, 0, 'C');
            $pdf->Cell(50, 10, $d['merk'], 1, 0, 'C');
            $pdf->Cell(50, 10, $d['tipe'], 1, 0, 'C');
            $pdf->Ln();
        }
        $pdf->Output();
        exit;
    }

    // public function downloadPDF(Request $req){
    //     $hasil = pegawai::all();
    //     $pdf = PDF::loadView('home', ['data' => $hasil]);
    //     return $pdf->download('report_laporan.pdf');
    // }
}
