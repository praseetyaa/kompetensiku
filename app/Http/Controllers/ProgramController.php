<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Program;
use App\User;

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
            $program = Program::join('users','program.author','=','users.id_user')->orderBy('program_at','desc')->get();
			
			foreach($program as $data){
				switch($data->program_kategori){
					case 1:
						$data->program_kategori = 'Online Class';
					break;
					case 2:
						$data->program_kategori = 'Online Course';
					break;
					case 3:
						$data->program_kategori = 'Workshop';
					break;
					case 4:
						$data->program_kategori = 'Sertifikasi';
					break;
				}
			}
			
            // View
            return view('program/admin/index', [
                'program' => $program,
            ]);
        }
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
        // View
        return view('program/admin/create');
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
        return view('front/'.template_app().'/program-posts', [
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
        return view('front/'.template_app().'/program-posts', [
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
        return view('front/'.template_app().'/program-posts', [
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
        return view('front/'.template_app().'/program-posts', [
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
        $program = Program::join('users','program.author','=','users.id_user')->where('program_permalink','=',$permalink)->first();

        if(!$program){
            abort(404);
        }

        // View
        return view('front/'.template_app().'/program-post', [
            'program' => $program
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

        // View
        return view('program/admin/edit', [
        	'program' => $program
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
