<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Karir;
use App\User;

class KarirController extends Controller
{
    /**
     * Menampilkan data karir
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin == 1){
            // Data karir
            $karir = Karir::join('users','karir.author','=','users.id_user')->orderBy('karir_at','desc')->get();
			
            // View
            return view('karir/admin/index', [
                'karir' => $karir,
            ]);
        }
    }
	
    /**
     * Mengambil data karir
     *
     * @return \Illuminate\Http\Response
     */
    public function getCareer()
    {
		// Data karir
        $karir = Karir::orderBy('karir_at','desc')->limit(5)->get();
		
		foreach($karir as $data){
			$data->karir_gambar = $data->karir_gambar != '' ? '/assets/images/cover-karir/'.$data->karir_gambar : '';
			$data->konten = substr(strip_tags(html_entity_decode($data->konten)),0,100).'...';
		}

		echo json_encode($karir);
    }

    /**
     * Menampilkan form tambah karir
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // View
        return view('karir/admin/create');
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
            'judul_karir' => 'required|max:255',
            'url' => 'required',
        ], validation_messages());
        
        // Mengecek jika ada error
        if($validator->fails()){
            // Kembali ke halaman sebelumnya dan menampilkan pesan error
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // Jika tidak ada error
        else{	
            // Upload gambar
            $image_name = $request->gambar != '' ? upload_file_content($request->gambar, "assets/images/cover-karir/") : '';
			
            // Upload gambar dari quill
            $html = quill_image_upload($request->konten, 'assets/images/konten-karir/');

            // Menambah data
            $karir = new Karir;
            $karir->karir_title = $request->judul_karir;
            $karir->karir_gambar = $image_name;
            $karir->karir_url = $request->url;
            $karir->karir_permalink = generate_permalink($request->judul_karir);
            $karir->konten = htmlentities($html);
            $karir->author = Auth::user()->id_user;
            $karir->karir_at = date('Y-m-d H:i:s');
            $karir->save();
        }

        // Redirect
        return redirect('/admin/karir')->with(['message' => 'Berhasil menambah data.']);
    }

    /**
     * Menampilkan semua karir
     *
     * @return \Illuminate\Http\Response
     */
    public function karirs(Request $request)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
        	$request->session()->put('ref', get_referral_code()->username);
        	return redirect('/karir?ref='.get_referral_code()->username);
        }
        else{
	        $user = User::where('username',$referral)->where('status','=',1)->first();
	        if(!$user){
	        	$request->session()->put('ref', get_referral_code()->username);
	        	return redirect('/karir?ref='.get_referral_code()->username);
	        }
	        else{
	        	$request->session()->put('ref', $referral);
	        }
	    }
        // End get referral
		
        // Data karir
        $karirs = Karir::join('users','karir.author','=','users.id_user')->orderBy('karir_at','desc')->paginate(12);

        // View
        return view('front/'.template_app().'/karir-posts', [
            'karirs' => $karirs
        ]);
    }


    /**
     * Menampilkan konten
     *
     * string $permalink
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function karirpost(Request $request, $permalink)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
        	$request->session()->put('ref', get_referral_code()->username);
        	return redirect('/karir/'.$permalink.'?ref='.get_referral_code()->username);
        }
        else{
	        $user = User::where('username',$referral)->where('status','=',1)->first();
	        if(!$user){
	        	$request->session()->put('ref', get_referral_code()->username);
	        	return redirect('/karir/'.$permalink.'?ref='.get_referral_code()->username);
	        }
	        else{
	        	$request->session()->put('ref', $referral);
	        }
	    }
        // End get referral
		
        // Data karir
        $karir = Karir::join('users','karir.author','=','users.id_user')->where('karir_permalink','=',$permalink)->first();

        if(!$karir){
            abort(404);
        }

        // View
        return view('front/'.template_app().'/karir-post', [
            'karir' => $karir
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
    	// Data karir
    	$karir = Karir::find($id);

        if(!$karir){
            abort(404);
        }

        // View
        return view('karir/admin/edit', [
        	'karir' => $karir
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
            'judul_karir' => 'required|max:255',
            'url' => 'required',
        ], validation_messages());
        
        // Mengecek jika ada error
        if($validator->fails()){
            // Kembali ke halaman sebelumnya dan menampilkan pesan error
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // Jika tidak ada error
        else{	
            // Upload gambar
            $image_name = $request->gambar != '' ? upload_file_content($request->gambar, "assets/images/cover-karir/") : '';
			
            // Upload gambar dari quill
            $html = quill_image_upload($request->konten, 'assets/images/konten-karir/');

            // Mengupdate data
            $karir = Karir::find($request->id);
            $karir->karir_title = $request->judul_karir;
            $karir->karir_gambar = $request->gambar != '' ? $image_name : $karir->karir_gambar;
            $karir->karir_url = $request->url;
            $karir->karir_permalink = generate_permalink($request->judul_karir);
            $karir->konten = htmlentities($html);
            $karir->save();
        }

        // Redirect
        return redirect('/admin/karir/edit/'.$request->id)->with(['message' => 'Berhasil mengupdate data.']);
    }

    /**
     * Menghapus karir...
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
    	// Menghapus data
        $karir = Karir::find($request->id);
        $karir->delete();

        // Redirect
        return redirect('/admin/karir')->with(['message' => 'Berhasil menghapus data.']);
    }
}
