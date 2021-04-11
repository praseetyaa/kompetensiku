<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Guest Capabilities...
Route::group(['middleware' => ['guest']], function(){

	// Pages
	Route::get('/', 'HomeController@home');

	// Artikel
	Route::get('/artikel', 'BlogController@posts');
	Route::get('/artikel/{permalink}', 'BlogController@post');
	Route::get('/kategori/{permalink}', 'BlogController@categories');
	Route::get('/tag/{permalink}', 'BlogController@tags');
	Route::post('/search', 'BlogController@search');
	Route::post('/komentar', 'BlogController@comment');
	Route::post('/komentar/delete', 'BlogController@deleteComment');

	// Halaman
	Route::get('/page/{permalink}', 'HalamanController@page');
	
	// Slider
	Route::get('/get-slider', 'SliderController@getSlider');

	// Login dan Recovery Password
	Route::get('/login', 'Auth\LoginController@showLoginForm');
	Route::post('/login', 'Auth\LoginController@login');
	Route::get('/recovery-password', 'Auth\LoginController@showRecoveryPasswordForm');
	Route::post('/recovery-password', 'Auth\LoginController@recoveryPassword');

	// Register
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('/register', 'Auth\RegisterController@register');

	if(lms_app() == 'cd'){
		// Another Pages
		Route::get('/beasiswa', 'HomeController@beasiswa');
		Route::get('/afiliasi', 'HomeController@afiliasi');
		Route::get('/tentang-kami', 'HomeController@tentangKami');
	}
	if(lms_app() == 'pt'){
		// Program
		Route::get('/get-program/{id}', 'ProgramController@getProgram');
		Route::get('/online-class', 'ProgramController@onlineClass');
		Route::get('/online-course', 'ProgramController@onlineCourse');
		Route::get('/workshop', 'ProgramController@workshop');
		Route::get('/sertifikasi', 'ProgramController@sertifikasi');
		Route::get('/program/{permalink}', 'ProgramController@programpost');

		// Karir
		Route::get('/get-career', 'KarirController@getCareer');
		Route::get('/karir', 'KarirController@karirs');
		Route::get('/karir/{permalink}', 'KarirController@karirpost');
	}
});

// Admin Capabilities...
Route::group(['middleware' => ['admin']], function(){
	
	// Logout
	Route::get('/admin/logout', function(){
	    return redirect('/');
	});
	Route::post('/admin/logout', 'Auth\LoginController@logout');

	// Dashboard
	Route::get('/admin', 'DashboardController@admin');
	
	// AJAX
	Route::get('/admin/ajax/count-visitor', 'DashboardController@countVisitor');

	// Menu
	Route::get('/admin/menu', 'MenuController@index');
	Route::post('/admin/menu/store', 'MenuController@store');
	Route::post('/admin/menu/sort', 'MenuController@sort');
	Route::post('/admin/menu/update', 'MenuController@update');
	Route::post('/admin/menu/delete', 'MenuController@delete');

	// Profil
	Route::get('/admin/profil', 'UserController@profile');
	Route::post('/admin/profil/update-profil', 'UserController@updateProfile');
	Route::post('/admin/profil/update-photo', 'UserController@updatePhoto');
	Route::post('/admin/profil/choose-photo', 'UserController@choosePhoto');
	
	// E-Signature
	Route::get('/admin/e-signature', 'SignatureController@index');
	Route::post('/admin/e-signature/update', 'SignatureController@update');

	// User
	Route::get('/admin/user', 'UserController@index');
	Route::get('/admin/user/create', 'UserController@create');
	Route::post('/admin/user/store', 'UserController@store');
	Route::get('/admin/user/detail/{id}', 'UserController@detail');
	Route::get('/admin/user/edit/{id}', 'UserController@edit');
	Route::post('/admin/user/update', 'UserController@update');
	Route::post('/admin/user/update-photo', 'UserController@updatePhoto');
	Route::post('/admin/user/choose-photo', 'UserController@choosePhoto');
	Route::get('/admin/user/export', 'UserController@export');
	Route::post('/admin/user/delete', 'UserController@delete');

	// Update Pengaturan
	Route::post('/admin/pengaturan/update', 'SettingController@update');

	// Pengaturan: Umum
	Route::get('/admin/pengaturan/umum', 'SettingController@umum');

	// Pengaturan: Tampilan
	Route::get('/admin/pengaturan/tampilan', 'SettingController@tampilan');

	// Pengaturan: Role
	Route::get('/admin/pengaturan/role', 'RoleController@index');
	// Route::get('/admin/pengaturan/role/create', 'RoleController@create');
	// Route::post('/admin/pengaturan/role/store', 'RoleController@store');
	Route::get('/admin/pengaturan/role/edit/{id}', 'RoleController@edit');
	Route::post('/admin/pengaturan/role/update', 'RoleController@update');
	// Route::post('/admin/pengaturan/role/delete', 'RoleController@delete');

	// Pengaturan: Platform Pembayaran
	Route::get('/admin/pengaturan/platform', 'PlatformController@index');	
	Route::get('/admin/pengaturan/platform/create', 'PlatformController@create');
	Route::post('/admin/pengaturan/platform/store', 'PlatformController@store');	
	Route::get('/admin/pengaturan/platform/edit/{id}', 'PlatformController@edit');	
	Route::post('/admin/pengaturan/platform/update', 'PlatformController@update');	
	Route::post('/admin/pengaturan/platform/delete', 'PlatformController@delete');

	// Pengaturan: Rekening
	Route::get('/admin/pengaturan/rekening', 'RekeningController@indexDefault');
	Route::get('/admin/pengaturan/rekening/create', 'RekeningController@createDefault');
	Route::post('/admin/pengaturan/rekening/store', 'RekeningController@storeDefault');
	Route::get('/admin/pengaturan/rekening/edit/{id}', 'RekeningController@editDefault');
	Route::post('/admin/pengaturan/rekening/update', 'RekeningController@updateDefault');
	Route::post('/admin/pengaturan/rekening/delete', 'RekeningController@deleteDefault');

	// Pengaturan: Harga
	Route::get('/admin/pengaturan/harga', 'SettingController@harga');

	// Pengaturan: E-Sertifikat
	Route::get('/admin/pengaturan/e-sertifikat', 'SettingController@e_sertifikat');

	// Pengaturan: E-Mail
	Route::get('/admin/pengaturan/e-mail', 'SettingController@e_mail');

	// Pengaturan: Kategori Materi
	Route::get('/admin/pengaturan/kategori-materi', 'KategoriMateriController@index');
	Route::get('/admin/pengaturan/kategori-materi/create', 'KategoriMateriController@create');
	Route::post('/admin/pengaturan/kategori-materi/store', 'KategoriMateriController@store');
	Route::get('/admin/pengaturan/kategori-materi/edit/{id}', 'KategoriMateriController@edit');
	Route::post('/admin/pengaturan/kategori-materi/update', 'KategoriMateriController@update');
	Route::post('/admin/pengaturan/kategori-materi/delete', 'KategoriMateriController@delete');

	// Pengaturan: Kategori Pelatihan
	Route::get('/admin/pengaturan/kategori-pelatihan', 'KategoriPelatihanController@index');
	Route::get('/admin/pengaturan/kategori-pelatihan/create', 'KategoriPelatihanController@create');
	Route::post('/admin/pengaturan/kategori-pelatihan/store', 'KategoriPelatihanController@store');
	Route::get('/admin/pengaturan/kategori-pelatihan/edit/{id}', 'KategoriPelatihanController@edit');
	Route::post('/admin/pengaturan/kategori-pelatihan/update', 'KategoriPelatihanController@update');
	Route::post('/admin/pengaturan/kategori-pelatihan/delete', 'KategoriPelatihanController@delete');

	// Rekening
	Route::get('/admin/rekening', 'RekeningController@index');
	Route::post('/admin/rekening/delete', 'RekeningController@delete');

	// Transaksi: Komisi
	Route::get('/admin/transaksi/komisi', 'KomisiController@index');
	Route::get('/admin/transaksi/komisi/json', 'KomisiController@json');
	Route::post('/admin/transaksi/komisi/verify', 'KomisiController@verify');
	Route::post('/admin/transaksi/komisi/konfirmasi', 'KomisiController@confirmation');

	// Transaksi: Withdrawal
	Route::get('/admin/transaksi/withdrawal', 'WithdrawalController@index');
	Route::post('/admin/transaksi/withdrawal/send', 'WithdrawalController@send');

	// Transaksi: Pelatihan
	Route::get('/admin/transaksi/pelatihan', 'PelatihanController@transaction');
	Route::post('/admin/transaksi/pelatihan/verify', 'PelatihanController@verify');

	// E-Mail
	Route::get('/admin/email', 'EmailController@index');
	//Route::post('/admin/email/search', 'EmailController@search');
	Route::get('/admin/email/create', 'EmailController@create');
	Route::post('/admin/email/store', 'EmailController@store');
	Route::post('/admin/email/import', 'EmailController@import');
	Route::get('/admin/email/detail/{id}', 'EmailController@detail');
	Route::post('/admin/email/delete', 'EmailController@delete');

	// Artikel
	Route::get('/admin/artikel', 'BlogController@index');
	Route::get('/admin/artikel/create', 'BlogController@create');
	Route::post('/admin/artikel/store', 'BlogController@store');
	Route::get('/admin/artikel/detail/{id}', 'BlogController@detail');
	Route::get('/admin/artikel/edit/{id}', 'BlogController@edit');
	Route::post('/admin/artikel/update', 'BlogController@update');
	Route::post('/admin/artikel/delete', 'BlogController@delete');

	// Kategori Artikel
	Route::get('/admin/artikel/kategori', 'KategoriArtikelController@index');
	Route::get('/admin/artikel/kategori/create', 'KategoriArtikelController@create');
	Route::post('/admin/artikel/kategori/store', 'KategoriArtikelController@store');
	Route::get('/admin/artikel/kategori/edit/{id}', 'KategoriArtikelController@edit');
	Route::post('/admin/artikel/kategori/update', 'KategoriArtikelController@update');
	Route::post('/admin/artikel/kategori/delete', 'KategoriArtikelController@delete');

	// Tag Artikel
	Route::get('/admin/artikel/tag', 'TagController@index');
	Route::get('/admin/artikel/tag/create', 'TagController@create');
	Route::post('/admin/artikel/tag/store', 'TagController@store');
	Route::get('/admin/artikel/tag/edit/{id}', 'TagController@edit');
	Route::post('/admin/artikel/tag/update', 'TagController@update');
	Route::post('/admin/artikel/tag/delete', 'TagController@delete');

	// Halaman
	Route::get('/admin/halaman', 'HalamanController@index');
	Route::get('/admin/halaman/create', 'HalamanController@create');
	Route::post('/admin/halaman/store', 'HalamanController@store');
	Route::get('/admin/halaman/edit/{id}', 'HalamanController@edit');
	Route::post('/admin/halaman/update', 'HalamanController@update');
	Route::post('/admin/halaman/delete', 'HalamanController@delete');

	if(lms_app() == 'pt'){
		// Program
		Route::get('/admin/program', 'ProgramController@index');
		Route::get('/admin/program/create', 'ProgramController@create');
		Route::post('/admin/program/store', 'ProgramController@store');
		Route::get('/admin/program/detail/{id}', 'ProgramController@detail');
		Route::get('/admin/program/edit/{id}', 'ProgramController@edit');
		Route::post('/admin/program/update', 'ProgramController@update');
		Route::post('/admin/program/delete', 'ProgramController@delete');

		// Karir
		Route::get('/admin/karir', 'KarirController@index');
		Route::get('/admin/karir/create', 'KarirController@create');
		Route::post('/admin/karir/store', 'KarirController@store');
		Route::get('/admin/karir/detail/{id}', 'KarirController@detail');
		Route::get('/admin/karir/edit/{id}', 'KarirController@edit');
		Route::post('/admin/karir/update', 'KarirController@update');
		Route::post('/admin/karir/delete', 'KarirController@delete');
	}

	// Pop-up
	Route::get('/admin/pop-up', 'PopupController@index');
	Route::get('/admin/pop-up/create', 'PopupController@create');
	Route::post('/admin/pop-up/store', 'PopupController@store');
	Route::get('/admin/pop-up/detail/{id}', 'PopupController@detail');
	Route::get('/admin/pop-up/edit/{id}', 'PopupController@edit');
	Route::post('/admin/pop-up/update', 'PopupController@update');
	Route::post('/admin/pop-up/delete', 'PopupController@delete');

	// Fitur
	Route::get('/admin/konten-web/fitur', 'FiturController@index');
	Route::get('/admin/konten-web/fitur/create', 'FiturController@create');
	Route::post('/admin/konten-web/fitur/store', 'FiturController@store');
	Route::get('/admin/konten-web/fitur/edit/{id}', 'FiturController@edit');
	Route::post('/admin/konten-web/fitur/update', 'FiturController@update');
	Route::post('/admin/konten-web/fitur/delete', 'FiturController@delete');

	// Slider
	Route::get('/admin/konten-web/slider', 'SliderController@index');
	Route::get('/admin/konten-web/slider/create', 'SliderController@create');
	Route::post('/admin/konten-web/slider/store', 'SliderController@store');
	Route::get('/admin/konten-web/slider/edit/{id}', 'SliderController@edit');
	Route::post('/admin/konten-web/slider/update', 'SliderController@update');
	Route::post('/admin/konten-web/slider/delete', 'SliderController@delete');

	// Deskripsi
	Route::get('/admin/konten-web/deskripsi', 'DeskripsiController@index');
	Route::post('/admin/konten-web/deskripsi/update', 'DeskripsiController@update');

	// Layanan
	Route::get('/admin/konten-web/layanan', 'LayananController@index');
	Route::get('/admin/konten-web/layanan/create', 'LayananController@create');
	Route::post('/admin/konten-web/layanan/store', 'LayananController@store');
	Route::get('/admin/konten-web/layanan/edit/{id}', 'LayananController@edit');
	Route::post('/admin/konten-web/layanan/update', 'LayananController@update');
	Route::post('/admin/konten-web/layanan/delete', 'LayananController@delete');

	// Testimoni
	Route::get('/admin/konten-web/testimoni', 'TestimoniController@index');
	Route::get('/admin/konten-web/testimoni/create', 'TestimoniController@create');
	Route::post('/admin/konten-web/testimoni/store', 'TestimoniController@store');
	Route::get('/admin/konten-web/testimoni/edit/{id}', 'TestimoniController@edit');
	Route::post('/admin/konten-web/testimoni/update', 'TestimoniController@update');
	Route::post('/admin/konten-web/testimoni/delete', 'TestimoniController@delete');

	// Mentor
	Route::get('/admin/konten-web/mentor', 'MentorController@index');
	Route::get('/admin/konten-web/mentor/create', 'MentorController@create');
	Route::post('/admin/konten-web/mentor/store', 'MentorController@store');
	Route::get('/admin/konten-web/mentor/edit/{id}', 'MentorController@edit');
	Route::post('/admin/konten-web/mentor/update', 'MentorController@update');
	Route::post('/admin/konten-web/mentor/delete', 'MentorController@delete');

	// Mitra
	Route::get('/admin/konten-web/mitra', 'MitraController@index');
	Route::get('/admin/konten-web/mitra/create', 'MitraController@create');
	Route::post('/admin/konten-web/mitra/store', 'MitraController@store');
	Route::get('/admin/konten-web/mitra/edit/{id}', 'MitraController@edit');
	Route::post('/admin/konten-web/mitra/update', 'MitraController@update');
	Route::post('/admin/konten-web/mitra/delete', 'MitraController@delete');

	// Materi
	Route::get('/admin/materi/{kategori}', 'FileController@index');
	Route::get('/admin/materi/{kategori}/view/{id}', 'FileController@view');
	Route::get('/admin/materi/{kategori}/upload', 'FileController@uploadForm');
	Route::post('/admin/materi/{kategori}/upload', 'FileController@upload');
	Route::post('/admin/materi/{kategori}/update', 'FileController@update');
	Route::post('/admin/materi/{kategori}/delete', 'FileController@delete');

	// File Materi
	Route::post('/admin/file/upload-thumbnail', 'FileController@uploadThumbnail');
	Route::post('/admin/file/choose-thumbnail', 'FileController@chooseThumbnail');

	// Folder Materi
	Route::post('/admin/folder/store', 'FolderController@store');
	Route::post('/admin/folder/update', 'FolderController@update');
	Route::post('/admin/folder/upload-icon', 'FolderController@uploadIcon');
	Route::post('/admin/folder/choose-icon', 'FolderController@chooseIcon');
	Route::post('/admin/folder/move', 'FolderController@move');
	Route::post('/admin/folder/delete', 'FolderController@delete');

	// E-Course
	Route::get('/admin/e-course', 'CourseController@index');
	Route::get('/admin/e-course/add-chapter', 'CourseController@createChapter');
	Route::post('/admin/e-course/store-chapter', 'CourseController@storeChapter');
	Route::get('/admin/e-course/chapter/{id}', 'CourseController@detailChapter');
	Route::get('/admin/e-course/edit-chapter/{id}', 'CourseController@editChapter');
	Route::post('/admin/e-course/update-chapter', 'CourseController@updateChapter');
	Route::post('/admin/e-course/delete-chapter', 'CourseController@deleteChapter');
	Route::get('/admin/e-course/chapter/{id}/create', 'CourseController@create');
	Route::post('/admin/e-course/store', 'CourseController@store');
	Route::get('/admin/e-course/detail/{id}', 'CourseController@detail');
	Route::get('/admin/e-course/edit/{id}', 'CourseController@edit');
	Route::post('/admin/e-course/update', 'CourseController@update');
	Route::post('/admin/e-course/delete', 'CourseController@delete');
	
	// Kumpulan Copywriting
	Route::get('/admin/script', 'ScriptController@index');
	Route::get('/admin/script/create-rak', 'ScriptController@createRak');
	Route::post('/admin/script/store-rak', 'ScriptController@storeRak');
	Route::get('/admin/script/edit-rak/{id}', 'ScriptController@editRak');
	Route::post('/admin/script/update-rak', 'ScriptController@updateRak');
	Route::post('/admin/script/delete-rak', 'ScriptController@deleteRak');
	Route::get('/admin/script/rak/{id}', 'ScriptController@detailRak');
	Route::get('/admin/script/rak/{id}/create', 'ScriptController@create');
	Route::post('/admin/script/store', 'ScriptController@store');
	Route::get('/admin/script/detail/{id}', 'ScriptController@detail');
	Route::get('/admin/script/edit/{id}', 'ScriptController@edit');
	Route::post('/admin/script/update', 'ScriptController@update');
	Route::post('/admin/script/delete', 'ScriptController@delete');

	// Kumpulan Tools
	Route::get('/admin/tools', 'ToolController@index');
	Route::get('/admin/tools/upload', 'ToolController@uploadForm');
	Route::post('/admin/tools/upload', 'ToolController@upload');
	Route::post('/admin/tools/update', 'ToolController@update');
	Route::post('/admin/tools/upload-thumbnail', 'ToolController@uploadThumbnail');
	Route::post('/admin/tools/choose-thumbnail', 'ToolController@chooseThumbnail');
	Route::post('/admin/tools/delete', 'ToolController@delete');

	// Toolbox
	Route::post('/admin/toolbox/store', 'ToolboxController@store');
	Route::post('/admin/toolbox/update', 'ToolboxController@update');
	Route::post('/admin/toolbox/upload-icon', 'ToolboxController@uploadIcon');
	Route::post('/admin/toolbox/choose-icon', 'ToolboxController@chooseIcon');
	Route::post('/admin/toolbox/move', 'ToolboxController@move');
	Route::post('/admin/toolbox/delete', 'ToolboxController@delete');

	// Pelatihan
	Route::get('/admin/pelatihan', 'PelatihanController@index');
	Route::get('/admin/pelatihan/create', 'PelatihanController@create');
	Route::post('/admin/pelatihan/store', 'PelatihanController@store');
	Route::get('/admin/pelatihan/detail/{id}', 'PelatihanController@detail');
	Route::get('/admin/pelatihan/peserta/{id}', 'PelatihanController@participant');
	Route::get('/admin/pelatihan/edit/{id}', 'PelatihanController@edit');
	Route::post('/admin/pelatihan/update', 'PelatihanController@update');
	Route::post('/admin/pelatihan/delete', 'PelatihanController@delete');
	
	// E-Sertifikat
	Route::get('/admin/e-sertifikat/trainer', 'SertifikatController@indexTrainer');
	Route::get('/admin/e-sertifikat/peserta', 'SertifikatController@indexParticipant');
	Route::get('/admin/e-sertifikat/trainer/detail/{id}', 'SertifikatController@viewTrainer');
	Route::get('/admin/e-sertifikat/peserta/detail/{id}', 'SertifikatController@viewParticipant');

	// Statistik
	Route::get('/admin/statistik/visitor', 'StatistikController@visitor');
	Route::get('/admin/statistik/top-visitor', 'StatistikController@topVisitor');
	Route::get('/admin/statistik/file-reader', 'StatistikController@fileReader');
	Route::get('/admin/statistik/aktivitas/{id}', 'StatistikController@detailAktivitas');
	
	// File Tidak Terpakai
	Route::get('/admin/file/unused', 'FileController@unused');
	Route::post('/admin/file/unused/delete', 'FileController@delete_unused');
	Route::post('/admin/file/unused/delete-all', 'FileController@delete_all_unused');
});

// Member Capabilities...
Route::group(['middleware' => ['member']], function(){

	// Logout
	Route::get('/member/logout', function(){
	    return redirect('/');
	});
	Route::post('/member/logout', 'Auth\LoginController@logout');

	// Dashboard
	Route::get('/member', 'DashboardController@member');

	// Pemberitahuan
	Route::get('/member/pemberitahuan', function(){
		return view('error/has-no-access');
	});

	// Afiliasi
	Route::get('/member/afiliasi/cara-jualan', function(){
		return view('afiliasi/member/cara-jualan');
	});

	// Profil
	Route::get('/member/profil', 'UserController@memberProfile');	
	Route::post('/member/profil/update-profil', 'UserController@updateProfile');	
	Route::post('/member/profil/update-photo', 'UserController@updatePhoto');	
	Route::post('/member/profil/choose-photo', 'UserController@choosePhoto');	
	
	// E-Signature
	Route::get('/member/e-signature', 'SignatureController@index');
	Route::post('/member/e-signature/update', 'SignatureController@update');

	// Rekening
	Route::get('/member/rekening', 'RekeningController@index');
	Route::get('/member/rekening/create', 'RekeningController@create');
	Route::post('/member/rekening/store', 'RekeningController@store');
	Route::get('/member/rekening/edit/{id}', 'RekeningController@edit');
	Route::post('/member/rekening/update', 'RekeningController@update');
	Route::post('/member/rekening/delete', 'RekeningController@delete');

	// Transaksi: Komisi
	Route::get('/member/transaksi/komisi', 'KomisiController@index');
	Route::post('/member/transaksi/komisi/konfirmasi', 'KomisiController@confirmation');	
	Route::post('/member/transaksi/komisi/take-comission', 'KomisiController@takeComission');

	// Transaksi: Withdrawal
	Route::get('/member/transaksi/withdrawal', 'WithdrawalController@index');

	// Transaksi: Pelatihan
	Route::get('/member/transaksi/pelatihan', 'PelatihanController@transaction');
	
	// Pop-up
	Route::get('/member/informasi/detail/{id}', 'PopupController@detail');

	// Materi
	Route::get('/member/materi/{kategori}', 'FileController@index');
	Route::get('/member/materi/{kategori}/view/{id}', 'FileController@view');
	Route::post('/member/materi/{kategori}/search', 'FileController@search');

	// E-Course
	Route::get('/member/e-course', 'CourseController@index');
	Route::get('/member/e-course/chapter/{id}', 'CourseController@detailChapter');
	Route::get('/member/e-course/detail/{id}', 'CourseController@detail');
	
	// Kumpulan Copywriting
	Route::get('/member/script', 'ScriptController@index');
	Route::get('/member/script/rak/{id}', 'ScriptController@detailRak');
	Route::get('/member/script/detail/{id}', 'ScriptController@detail');

	// Kumpulan Tools
	Route::get('/member/tools', 'ToolController@index');
	Route::post('/member/tools/search', 'ToolController@search');

	// Pelatihan
	Route::get('/member/pelatihan', 'PelatihanController@index');
	Route::post('/member/pelatihan/daftar', 'PelatihanController@register');
	Route::get('/member/pelatihan/detail/{id}', 'PelatihanController@detail');
	Route::get('/member/pelatihan/peserta/{id}', 'PelatihanController@participant');
	Route::post('/member/pelatihan/update-status', 'PelatihanController@updateStatus');
	
	// E-Sertifikat
	Route::get('/member/e-sertifikat/trainer', 'SertifikatController@indexTrainer');
	Route::get('/member/e-sertifikat/peserta', 'SertifikatController@indexParticipant');
	Route::get('/member/e-sertifikat/trainer/detail/{id}', 'SertifikatController@viewTrainer');
	Route::get('/member/e-sertifikat/peserta/detail/{id}', 'SertifikatController@viewParticipant');
});