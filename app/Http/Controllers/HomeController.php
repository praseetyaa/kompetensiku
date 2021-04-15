<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Deskripsi;
use App\Layanan;
use App\Mentor;
use App\Mitra;
use App\Setting;
use App\Slider;
use App\Testimoni;
use App\User;

class HomeController extends Controller
{		
    /**
     * Home Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
		// Get data mentor
		$mentor = Mentor::all();
		
		// Get data mitra
		$mitra = Mitra::all();
		
		// Get data slider
		$slider = Slider::where('status_slider','=',1)->get();

        // Deskripsi
        $deskripsi = Deskripsi::first();

        // Layanan
        $layanan = Layanan::all();

        // Testimoni
        $testimoni = Testimoni::orderBy('id_testimoni','desc')->get();

        // Artikel terbaru
        $artikel = Blog::join('users','blog.author','=','users.id_user')->orderBy('blog_at','desc')->limit(3)->get();
		
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
        	$request->session()->put('ref', get_referral_code()->username);
        	return redirect('/?ref='.get_referral_code()->username);
        }
        else{
	        $user = User::where('username',$referral)->where('status','=',1)->first();
	        if(!$user){
	        	$request->session()->put('ref', get_referral_code()->username);
	        	return redirect('/?ref='.get_referral_code()->username);
	        }
	        else{
	        	$request->session()->put('ref', $referral);
	        }
	    }
        // End get referral

        return view('front/home', [
            'artikel' => $artikel,
            'deskripsi' => $deskripsi,
			'mentor' => $mentor,
			'mitra' => $mitra,
			'slider' => $slider,
            'testimoni' => $testimoni,
		]);

    }	
	
    /**
     * Beasiswa Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function beasiswa(Request $request)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
        	$request->session()->put('ref', get_referral_code()->username);
        	return redirect('/beasiswa?ref='.get_referral_code()->username);
        }
        else{
	        $user = User::where('username',$referral)->where('status','=',1)->first();
	        if(!$user){
	        	$request->session()->put('ref', get_referral_code()->username);
	        	return redirect('/beasiswa?ref='.get_referral_code()->username);
	        }
	        else{
	        	$request->session()->put('ref', $referral);
	        }
	    }
        // End get referral

        return view('front/beasiswa');
    }	
	
    /**
     * Afiliasi Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function afiliasi(Request $request)
    {
        // Get referral
        $referral = $request->query('ref');
        if($referral == null){
        	$request->session()->put('ref', get_referral_code()->username);
        	return redirect('/afiliasi?ref='.get_referral_code()->username);
        }
        else{
	        $user = User::where('username',$referral)->where('status','=',1)->first();
	        if(!$user){
	        	$request->session()->put('ref', get_referral_code()->username);
	        	return redirect('/afiliasi?ref='.get_referral_code()->username);
	        }
	        else{
	        	$request->session()->put('ref', $referral);
	        }
	    }
        // End get referral

        return view('front/afiliasi');
    }
	
    /**
     * Tentang Kami Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function tentangKami(Request $request)
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
}
