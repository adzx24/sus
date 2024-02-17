<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;

class ownercontroller extends Controller
{
    public function reportowner (transaksi $transaksi) {
        $data = transaksi::all();
        return view('owner.report',compact('data'));
    }
    public function cetakpdfo (transaksi $transaksi) {

        $pdf = Pdf::loadview('owner.pdf',compact('transaksi'));
        return $pdf->download('transaksipembayaran.pdf');
    }
    public function cetakpdfow () {
        $transaksi = transaksi::all();
        $pdf = Pdf::loadView('cetakpdf', compact('transaksi'));
        return $pdf->download('laporantransaksi.pdf');
        // $transaksi = transaksi::all();
        // $pdf = Pdf::loadview('cetakpdf',compact('transaksi'));
    }
    public function clear()
    {
        try {
            transaksi::where('user_id', auth()->id())->delete();
            return redirect()->route('reportowner')->with('m', 'Berhasil clear data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function cari (Request $request) {
        $startdate = $request->input('stardate');
        $enddate = $request->input('enddate');

        $startdate = \Carbon\Carbon::parse($startdate)->startOfDay();
        $enddate = \Carbon\Carbon::parse($enddate)->endOfDay();

        $data = transaksi::whereBetween('created_at', [$startdate,$enddate])->get();

        return view('owner.report',compact('data'));
    }
    public function pdfDate (Request $request) {
        $startdate = $request->input('stardate');
        $enddate = $request->input('enddate');

        $startdate = \Carbon\Carbon::parse($startdate)->startOfDay();
        $enddate = \Carbon\Carbon::parse($enddate)->endOfDay();

        $transaksi = transaksi::whereBetween('created_at', [$startdate,$enddate])->get();

        $pdf = Pdf::loadView('cetakpdf',compact('transaksi'));
        return $pdf->download('laporantransaksi.pdf');
    }
}
