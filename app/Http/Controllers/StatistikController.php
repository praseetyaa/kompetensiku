<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Aktivitas;
use App\FileReader;
use App\User;
use App\Visitor;

class StatistikController extends Controller
{
    /**
     * Menampilkan data visitor
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function visitor(Request $request)
    {
        if(Auth::user()->is_admin == 1){
            if(Auth::user()->role == role_it()){
                // Data visitor
                if($request->query('filter') == 'admin'){
                    $visitor = Visitor::join('users','visitor.id_user','=','users.id_user')->where('is_admin','=',1)->orderBy('visit_at','desc')->get();
                }
                elseif($request->query('filter') == 'member'){
                    $visitor = Visitor::join('users','visitor.id_user','=','users.id_user')->where('is_admin','=',0)->orderBy('visit_at','desc')->get();
                }
                else{
                    $visitor = Visitor::join('users','visitor.id_user','=','users.id_user')->orderBy('visit_at','desc')->get();
                }
    			
                // View
                return view('statistik/admin/visitor', [
                    'filter' => $request->query('filter'),
                    'visitor' => $visitor,
                ]);
            }
            else{
                // View
                return view('error/forbidden');
            }
        }
    }

    /**
     * Menampilkan data top visitor
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function topVisitor(Request $request)
    {
        if(Auth::user()->is_admin == 1){
            if(Auth::user()->role == role_it()){
                // Data visitor
                if($request->query('filter') == 'admin'){
                    $visitor_group = Visitor::join('users','visitor.id_user','=','users.id_user')->where('is_admin','=',1)->groupBy('visitor.id_user')->orderBy('visit_at','desc')->get();
                }
                elseif($request->query('filter') == 'member'){
                    $visitor_group = Visitor::join('users','visitor.id_user','=','users.id_user')->where('is_admin','=',0)->groupBy('visitor.id_user')->orderBy('visit_at','desc')->get();
                }
                else{
                    $visitor_group = Visitor::join('users','visitor.id_user','=','users.id_user')->groupBy('visitor.id_user')->orderBy('visit_at','desc')->get();
                }
    			
                // View
                return view('statistik/admin/top-visitor', [
                    'filter' => $request->query('filter'),
                    'visitor_group' => $visitor_group,
                ]);
            }
            else{
                // View
                return view('error/forbidden');
            }
        }
    }

    /**
     * Menampilkan data file reader
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileReader(Request $request)
    {
        if(Auth::user()->is_admin == 1){
            if(Auth::user()->role == role_it()){
                $file_reader = FileReader::join('users','file_reader.id_user','=','users.id_user')->join('file','file_reader.id_file','=','file.id_file')->join('kategori_materi','file.jenis_file','=','kategori_materi.id_km')->orderBy('read_at','desc')->get();
                $by_reader = FileReader::join('users','file_reader.id_user','=','users.id_user')->join('file','file_reader.id_file','=','file.id_file')->join('kategori_materi','file.jenis_file','=','kategori_materi.id_km')->groupBy('file_reader.id_user')->orderBy('read_at','desc')->get();
                $by_file = FileReader::join('users','file_reader.id_user','=','users.id_user')->join('file','file_reader.id_file','=','file.id_file')->join('kategori_materi','file.jenis_file','=','kategori_materi.id_km')->groupBy('file_reader.id_file')->orderBy('read_at','desc')->get();
    			
                // View
                return view('statistik/admin/file-reader', [
                    'file_reader' => $file_reader,
                    'by_reader' => $by_reader,
                    'by_file' => $by_file,
                ]);
            }
            else{
                // View
                return view('error/forbidden');
            }
        }
    }

    /**
     * Menampilkan data aktivitas
     *
     * int $id
     * @return \Illuminate\Http\Response
     */
    public function detailAktivitas($id)
    {
        if(Auth::user()->is_admin == 1){
            if(Auth::user()->role == role_it()){
                // Get data user
                $user = User::find($id);

                if(!$user){
                    abort(404);
                }

                // Get data aktivitas
                $aktivitas = Aktivitas::where('id_user','=',$id)->get();
                if(count($aktivitas)>0){
                    foreach($aktivitas as $data){
                        $data->aktivitas = json_decode($data->aktivitas, true);
                    }
                }

                // View
                return view('statistik/admin/detail-aktivitas', [
                    'user' => $user,
                    'aktivitas' => $aktivitas,
                ]);
            }
            else{
                // View
                return view('error/forbidden');
            }
        }
    }
}
