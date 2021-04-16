<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\KategoriProgram;
use App\Program;
use App\User;
use App\Layanan;

class ProgramController extends Controller
{
    /**
     * Menampilkan data program
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin == 1){
            // Data program
            $program = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->orderBy('program_at','desc')->get();
            
            // View
            return view('program/admin/index', [
                'program' => $program,
            ]);
        }
    }

    // EDIT IKI COK ============================================================================================================== 
    public function index4()
    {
        return view('front/acara');
    }
    public function index6(Request $request)
    {
        // Layanan
        $layanan = Layanan::all();
        
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
            $request->session()->put('ref', get_referral_code()->username);
            return redirect('/tentang-kami?ref='.get_referral_code()->username);
        }
        else{
            $user = User::where('username',$referral)->where('status','=',1)->first();
            if(!$user){
                $request->session()->put('ref', get_referral_code()->username);
                return redirect('/tentang-kami?ref='.get_referral_code()->username);
            }
            else{
                $request->session()->put('ref', $referral);
            }
        }
        // End get referral

        return view('front/tentang-kami', [
            'layanan' => $layanan
        ]);

    }   

    /**
     * Mengambil data program
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgram($kategori)
    {
        // Data program
        $program = Program::where('program_kategori',$kategori)->orderBy('program_at','asc')->get();
        
        foreach($program as $data){
            $data->program_gambar = $data->program_gambar != '' ? '/assets/images/cover-program/'.$data->program_gambar : '';
            $data->konten = substr(strip_tags(html_entity_decode($data->konten)),0,100).'...';
        }

        echo json_encode($program);
    }

    /**
     * Menampilkan form tambah program
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriProgram::all();
        
        // View
        return view('program/admin/create', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Menambah role...
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'judul_program' => 'required|max:255',
            'kategori' => 'required',
        ], validation_messages());
        
        // Mengecek jika ada error
        if($validator->fails()){
            // Kembali ke halaman sebelumnya dan menampilkan pesan error
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // Jika tidak ada error
        else{   
            // Upload gambar
            $image_name = $request->gambar != '' ? upload_file_content($request->gambar, "assets/images/cover-program/") : '';
            
            // Upload gambar dari quill
            $html = quill_image_upload($request->konten, 'assets/images/konten-program/');

            // Menambah data
            $program = new Program;
            $program->program_title = $request->judul_program;
            $program->program_gambar = $image_name;
            $program->program_kategori = $request->kategori;
            $program->program_permalink = generate_permalink($request->judul_program);
            $program->konten = htmlentities($html);
            $program->author = Auth::user()->id_user;
            $program->program_at = date('Y-m-d H:i:s');
            $program->save();
        }

        // Redirect
        return redirect('/admin/program')->with(['message' => 'Berhasil menambah data.']);
    }

    /**
     * Menampilkan program berdasarkan kategori
     *
     * @return \Illuminate\Http\Response
     */
    public function program(Request $request, $category)
    {
        // Data kategori
        $kategori = KategoriProgram::where('slug','=',$category)->firstOrFail();
        
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
            $request->session()->put('ref', get_referral_code()->username);
            return redirect('/kategori/'.$category.'?ref='.get_referral_code()->username);
        }
        else{
            $user = User::where('username',$referral)->where('status','=',1)->first();
            if(!$user){
                $request->session()->put('ref', get_referral_code()->username);
                return redirect('/kategori/'.$category.'?ref='.get_referral_code()->username);
            }
            else{
                $request->session()->put('ref', $referral);
            }
        }
        // End get referral
        
        // Data program
        $programs = Program::join('users','program.author','=','users.id_user')->where('program_kategori',$kategori->id_kp)->orderBy('program_at','asc')->paginate(12);

        // View
        return view('front/program-posts', [
            'kategori' => $kategori->kategori,
            'programs' => $programs
        ]);
    }

    /**
     * Menampilkan program online class
     *
     * @return \Illuminate\Http\Response
     */
    public function onlineClass(Request $request)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
            $request->session()->put('ref', get_referral_code()->username);
            return redirect('/online-class?ref='.get_referral_code()->username);
        }
        else{
            $user = User::where('username',$referral)->where('status','=',1)->first();
            if(!$user){
                $request->session()->put('ref', get_referral_code()->username);
                return redirect('/online-class?ref='.get_referral_code()->username);
            }
            else{
                $request->session()->put('ref', $referral);
            }
        }
        // End get referral
        
        // Data program
        $programs = Program::join('users','program.author','=','users.id_user')->where('program_kategori',1)->orderBy('program_at','asc')->paginate(12);

        // View
        return view('front/program-posts', [
            'kategori' => 'Online Class',
            'programs' => $programs
        ]);
    }

    /**
     * Menampilkan program online course
     *
     * @return \Illuminate\Http\Response
     */
    public function onlineCourse(Request $request)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
            $request->session()->put('ref', get_referral_code()->username);
            return redirect('/online-course?ref='.get_referral_code()->username);
        }
        else{
            $user = User::where('username',$referral)->where('status','=',1)->first();
            if(!$user){
                $request->session()->put('ref', get_referral_code()->username);
                return redirect('/online-course?ref='.get_referral_code()->username);
            }
            else{
                $request->session()->put('ref', $referral);
            }
        }
        // End get referral
        
        // Data program
        $programs = Program::join('users','program.author','=','users.id_user')->where('program_kategori',2)->orderBy('program_at','asc')->paginate(12);

        // View
        return view('front/program-posts', [
            'kategori' => 'Online Course',
            'programs' => $programs
        ]);
    }

    /**
     * Menampilkan program workshop
     *
     * @return \Illuminate\Http\Response
     */
    public function workshop(Request $request)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
            $request->session()->put('ref', get_referral_code()->username);
            return redirect('/workshop?ref='.get_referral_code()->username);
        }
        else{
            $user = User::where('username',$referral)->where('status','=',1)->first();
            if(!$user){
                $request->session()->put('ref', get_referral_code()->username);
                return redirect('/workshop?ref='.get_referral_code()->username);
            }
            else{
                $request->session()->put('ref', $referral);
            }
        }
        // End get referral
        
        // Data program
        $programs = Program::join('users','program.author','=','users.id_user')->where('program_kategori',3)->orderBy('program_at','asc')->paginate(12);

        // View
        return view('front/program-posts', [
            'kategori' => 'Workshop',
            'programs' => $programs
        ]);
    }

    /**
     * Menampilkan program sertifikasi
     *
     * @return \Illuminate\Http\Response
     */
    public function sertifikasi(Request $request)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
            $request->session()->put('ref', get_referral_code()->username);
            return redirect('/sertifikasi?ref='.get_referral_code()->username);
        }
        else{
            $user = User::where('username',$referral)->where('status','=',1)->first();
            if(!$user){
                $request->session()->put('ref', get_referral_code()->username);
                return redirect('/sertifikasi?ref='.get_referral_code()->username);
            }
            else{
                $request->session()->put('ref', $referral);
            }
        }
        // End get referral
        
        // Data program
        $programs = Program::join('users','program.author','=','users.id_user')->where('program_kategori',4)->orderBy('program_at','asc')->paginate(12);

        // View
        return view('front/program-posts', [
            'kategori' => 'Sertifikasi',
            'programs' => $programs
        ]);
    }

    /**
     * Menampilkan konten
     *
     * string $permalink
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function programpost(Request $request, $permalink)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
            $request->session()->put('ref', get_referral_code()->username);
            return redirect('/program/'.$permalink.'?ref='.get_referral_code()->username);
        }
        else{
            $user = User::where('username',$referral)->where('status','=',1)->first();
            if(!$user){
                $request->session()->put('ref', get_referral_code()->username);
                return redirect('/program/'.$permalink.'?ref='.get_referral_code()->username);
            }
            else{
                $request->session()->put('ref', $referral);
            }
        }
        // End get referral
        
        // Data program
        $program = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('program_permalink','=',$permalink)->first();

        if(!$program){
            abort(404);
        }

        $program_lainya = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->orderBy('program_at', 'desc')->limit(5)->get();

        // View
        return view('front/single-program', [
            'program' => $program,
            'program_lainya' => $program_lainya
        ]);
    }


    public function program_all(Request $request)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
            $request->session()->put('ref', get_referral_code()->username);
            return redirect('/program?ref='.get_referral_code()->username);
        }
        else{
            $user = User::where('username',$referral)->where('status','=',1)->first();
            if(!$user){
                $request->session()->put('ref', get_referral_code()->username);
                return redirect('/program?ref='.get_referral_code()->username);
            }
            else{
                $request->session()->put('ref', $referral);
            }
        }

        $program_semua = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->orderBy('program_at', 'desc')->get();
        $program_bnsp = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('program_kategori','=','1')->orderBy('program_at', 'desc')->get();
        $program_nonbnsp = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('program_kategori','=','2')->orderBy('program_at', 'desc')->get();
        $program_prakerja = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('program_kategori','=','3')->orderBy('program_at', 'desc')->get();

        // View
        return view('front/programs', [
            'program_semua' => $program_semua,
            'program_bnsp' => $program_bnsp,
            'program_nonbnsp' => $program_nonbnsp,
            'program_prakerja' => $program_prakerja,
        ]);

    }
    /**
     * Menampilkan form edit role
     *
     * int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Data program
        $program = Program::find($id);

        if(!$program){
            abort(404);
        }
        
        // Data kategori
        $kategori = KategoriProgram::all();

        // View
        return view('program/admin/edit', [
            'program' => $program,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Mengupdate role...
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'judul_program' => 'required|max:255',
            'kategori' => 'required',
        ], validation_messages());
        
        // Mengecek jika ada error
        if($validator->fails()){
            // Kembali ke halaman sebelumnya dan menampilkan pesan error
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // Jika tidak ada error
        else{   
            // Upload gambar
            $image_name = $request->gambar != '' ? upload_file_content($request->gambar, "assets/images/cover-program/") : '';
            
            // Upload gambar dari quill
            $html = quill_image_upload($request->konten, 'assets/images/konten-program/');

            // Mengupdate data
            $program = Program::find($request->id);
            $program->program_title = $request->judul_program;
            $program->program_gambar = $request->gambar != '' ? $image_name : $program->program_gambar;
            $program->program_kategori = $request->kategori;
            $program->program_permalink = generate_permalink($request->judul_program);
            $program->konten = htmlentities($html);
            $program->save();
        }

        // Redirect
        return redirect('/admin/program/edit/'.$request->id)->with(['message' => 'Berhasil mengupdate data.']);
    }

    /**
     * Menghapus program...
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // Menghapus data
        $program = Program::find($request->id);
        $program->delete();

        // Redirect
        return redirect('/admin/program')->with(['message' => 'Berhasil menghapus data.']);
    }
}
