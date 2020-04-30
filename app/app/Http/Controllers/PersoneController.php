<?php

namespace App\Http\Controllers;


use App\Exports\PersoneExport;
use App\Persone;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class PersoneController extends Controller
{
    public function export(Request $r) 
    {
        $filename = $r->filename ?? date("Y-m-d");
        $n = 1;
        $n++;
        $n2 =  str_pad($n+1,5,"0",STR_PAD_LEFT);
        $counter = 0;
        if($r->session()->has('counter')){
            $counter = $r->session()->get('counter');
            $r->session()->put('counter',$counter++);
            $r->session()->put('counter',$r->session()->get('counter'));
        }

        
        //expot the selected items
        $persones = Persone::where('ADRESSE_1', '!=' , 'NULL')->where('DATE_NAISSANCE', '!=' , ' ')->Paginate(10);
        return Excel::download(new PersoneExport($persones),$r->session()->get('counter',1).'.csv');
        //return Excel::download(new PersoneExport($persones),'LOT'. $n2 .'_PROVENANCE_'.$filename.'.csv');
    }    /* $r->page */
}
