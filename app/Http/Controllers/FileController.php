<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\FilePath;
use App\Files;
use App\FileDetail;
use App\FileReader;
use App\FileThumbnail;
use App\Folder;
use App\FolderIcon;
use App\KategoriMateri;
use App\User;

class FileController extends Controller
{
    /**
     * Menampilkan data materi
     *
	 * string $category
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $category)
    {
		// Kategori materi
		$kategori = KategoriMateri::where('kategori','=',$category)->first();

        // View
        if(Auth::user()->is_admin == 1){
			// Folder
        	$dir = $request->query('dir');
			if($dir == null){
				$directory = Folder::find(1);
				$folders = Folder::where('folder_parent','=',$directory->id_folder)->where('jenis_folder','=',$kategori->id_km)->orderBy('modified_at','desc')->get();
				$files = Files::where('id_folder','=',$directory->id_folder)->where('jenis_file','=',$kategori->id_km)->orderBy('nama_file','asc')->get();
				return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir=/');
			}
			else{
				if($dir == '/')
					$directory = Folder::where('dir_folder','=',$dir)->first();
				else
					$directory = Folder::where('dir_folder','=',$dir)->where('jenis_folder','=',$kategori->id_km)->first();
				if(!$directory){
					$directory = Folder::find(1);
					$folders = Folder::where('folder_parent','=',$directory->id_folder)->where('jenis_folder','=',$kategori->id_km)->orderBy('modified_at','desc')->get();
					$files = Files::where('id_folder','=',$directory->id_folder)->where('jenis_file','=',$kategori->id_km)->orderBy('nama_file','asc')->get();
					return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir=/');
				}
			
				// Data folder dan file
				$folders = Folder::where('folder_parent','=',$directory->id_folder)->where('jenis_folder','=',$kategori->id_km)->orderBy('modified_at','desc')->get();
				$files = Files::where('id_folder','=',$directory->id_folder)->where('jenis_file','=',$kategori->id_km)->orderBy('nama_file','asc')->get();
			}
			
			// Folder icon
			$folder_icon = FolderIcon::all();
			
			// File Thumbnail
			$file_thumbnail = FileThumbnail::all();
			
			// Folder tersedia
			$available_folders = Folder::where('jenis_folder','=',$kategori->id_km)->orWhere('jenis_folder','=',0)->orderBy('folder_parent','asc')->orderBy('nama_folder','asc')->get();
			
            return view('materi/admin/index', [
				'available_folders' => $available_folders,
				'directory' => $directory,
				'file_thumbnail' => $file_thumbnail,
				'folder_icon' => $folder_icon,
                'folders' => $folders,
				'files' => $files,
				'kategori' => $kategori
            ]);
        }
        elseif(Auth::user()->is_admin == 0){
			// User belum membayar
			if(Auth::user()->status == 0) return redirect('/member/pemberitahuan');
			
			// Go to folder
        	$dir = $request->query('dir');
			if($dir == null){
				$directory = Folder::find(1);
				$folders = Folder::where('folder_parent','=',$directory->id_folder)->where('jenis_folder','=',$kategori->id_km)->orderBy('modified_at','desc')->get();
				$files = Files::where('id_folder','=',$directory->id_folder)->where('jenis_file','=',$kategori->id_km)->orderBy('nama_file','asc')->get();
				return redirect('/member/materi/'.generate_permalink($kategori->kategori).'?dir=/');
			}
			else{
				if($dir == '/')
					$directory = Folder::where('dir_folder','=',$dir)->first();
				else
					$directory = Folder::where('dir_folder','=',$dir)->where('jenis_folder','=',$kategori->id_km)->first();
				if(!$directory){
					$directory = Folder::find(1);
					$folders = Folder::where('folder_parent','=',$directory->id_folder)->where('jenis_folder','=',$kategori->id_km)->orderBy('modified_at','desc')->get();
					$files = Files::where('id_folder','=',$directory->id_folder)->where('jenis_file','=',$kategori->id_km)->orderBy('nama_file','asc')->get();
					return redirect('/member/materi/'.generate_permalink($kategori->kategori).'?dir=/');
				}
			
				// Data folder dan file
				$folders = Folder::where('folder_parent','=',$directory->id_folder)->where('jenis_folder','=',$kategori->id_km)->orderBy('modified_at','desc')->get();
				$files = Files::where('id_folder','=',$directory->id_folder)->where('jenis_file','=',$kategori->id_km)->orderBy('nama_file','asc')->get();
			}
			
            return view('materi/member/index', [
				'directory' => $directory,
                'folders' => $folders,
                'files' => $files,
				'kategori' => $kategori
            ]);
        }
	}
	
    /**
     * Mencari file
     *
	 * string $category
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, $category)
    {
		// Kategori materi
		$kategori = KategoriMateri::where('kategori','=',$category)->first();

		if($request->search != ''){
			// Folder
			$folders = Folder::where('nama_folder','like','%'.$request->search.'%')->where('jenis_folder','=',$request->jenis_folder)->get();
			if(count($folders)>0){
				foreach($folders as $key=>$folder){
					$folders[$key]->count = count_files($folder->id_folder, $folder->jenis_folder);
				}
			}

			// File
			$files = Files::where('nama_file','like','%'.$request->search.'%')->where('jenis_file','=',$request->jenis_file)->get();
			if(count($files)>0){
				foreach($files as $key=>$file){
					$files[$key]->count = count_pages($file->url);
				}
			}
		}
		else{
			// Folder
			$folders = Folder::where('jenis_folder','=',$request->jenis_folder)->where('folder_parent','=',$kategori->id_km)->get();
			if(count($folders)>0){
				foreach($folders as $key=>$folder){
					$folders[$key]->count = count_files($folder->id_folder, $folder->jenis_folder);
				}
			}

			// File
			$files = Files::where('jenis_file','=',$request->jenis_file)->where('id_folder','=',$kategori->id_km)->get();
			if(count($files)>0){
				foreach($files as $key=>$file){
					$files[$key]->count = count_pages($file->url);
				}
			}
		}
		
		echo json_encode([
			'folders' => $folders,
			'files' => $files,
		]);
	}

    /**
     * Menampilkan detail materi
     *
     * string $category
     * int $id
     * @return \Illuminate\Http\Response
     */
    public function view($category, $id)
    {
        // Data file
        $file = Files::find($id);
		
		// Mengecek data
		if(!$file)
			abort(404);
		else
			$file_detail = FileDetail::where('id_file','=',$file->url)->orderBy('nama_fd','asc')->get();

		// Simpan data pembaca
		$reader = new FileReader;
		$reader->id_user = Auth::user()->id_user;
		$reader->id_file = $file->id_file;
		$reader->read_at = date('Y-m-d H:i:s');
		$reader->save();

		// Kategori materi
		$kategori = KategoriMateri::find($file->jenis_file);

        // View
        if(Auth::user()->is_admin == 1){
			return view('materi/admin/view', [
				'file' => $file,
				'file_detail' => $file_detail,
				'kategori' => $kategori,
			]);
        }
        elseif(Auth::user()->is_admin == 0){
			// User belum membayar
			if(Auth::user()->status == 0) return redirect('/member/pemberitahuan');

			return view('materi/member/view', [
				'file' => $file,
				'file_detail' => $file_detail,
				'kategori' => $kategori,
			]);
        }
    }

    /**
     * Mengupdate file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'nama_file' => 'required|max:255',
        ], validation_messages());
        
        // Mengecek jika ada error
        if($validator->fails()){
            // Kembali ke halaman sebelumnya dan menampilkan pesan error
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // Jika tidak ada error
        else{
            // Nama file
            $file = Files::find($request->id_file);
            $nama_file = $request->nama_file;
            $i = 1;
            while(count_existing_file($file->id_folder, $file->jenis_file, $nama_file, $request->id_file) > 0){
                $nama_file = rename_file($request->nama_file, $i);
                $i++;
            }

            // Mengupdate data
            $file->nama_file = $nama_file;
            $file->save();
			
			// Get data folder
			$folder = Folder::find($file->id_folder);

			// Kategori materi
			$kategori = KategoriMateri::find($file->jenis_file);
        }

        // Redirect
        return redirect('/admin/materi/'.$kategori->kategori.'?dir='.$folder->dir_folder)->with(['message' => 'Berhasil mengupdate file.']);
    }

    /**
     * Menampilkan form upload file
     *
	 * string $category
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function uploadForm(Request $request, $category)
    {
		// Kategori materi
		$kategori = KategoriMateri::where('kategori','=',$category)->first();

        // View
        if(Auth::user()->is_admin == 1){
            if(Auth::user()->role == role_it() || Auth::user()->role == role_manajer() || Auth::user()->role == role_mentor()){
				// Go to folder
				$dir = $request->query('dir');
				if($dir == null){
					$directory = Folder::find(1);
					return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'/upload?dir=/');
				}
				else{
					if($dir == '/')
						$directory = Folder::where('dir_folder','=',$dir)->first();
					else
						$directory = Folder::where('dir_folder','=',$dir)->where('jenis_folder','=',$kategori->id_km)->first();
					if(!$directory){
						$directory = Folder::find(1);
						return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'/upload?dir=/');
					}
				}
				
	            return view('materi/admin/upload', [
					'directory' => $directory,
					'kategori' => $kategori
				]);
            }
            else{
                // View
                return view('error/forbidden');
            }
        }
    }
	
    /**
     * Mengupload file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
		// Get data
		$file_name = $request->name;

		// Save files
		if($request->detail == 1){
			$data = $request->code;
			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			$data = base64_decode($data);
			
			$number = $request->key + 1;
			$number = add_zero($number);
			$file_detail_name = $file_name.'-'.$number.'.jpg';
			if(file_put_contents('assets/uploads/'.$file_detail_name, $data)){
				$file_detail = new FileDetail;
				$file_detail->id_file = $file_name;
				$file_detail->nama_fd = $file_detail_name;
				$file_detail->save();
			}
		}
		else{
            // Nama file
            $nama_file = $request->nama_file;
            $i = 1;
            while(count_existing_file($request->id_folder, $request->jenis_file, $nama_file, null) > 0){
                $nama_file = rename_file($request->nama_file, $i);
                $i++;
            }

			// Save data
			$file = new Files;
			$file->id_folder = $request->id_folder;
			$file->nama_file = $nama_file;
			$file->jenis_file = $request->jenis_file;
			$file->thumbnail_file = '';
			$file->ukuran_file = 0;
			$file->tipe_file = '0';
			$file->url = $file_name;
			$file->uploaded_at = date('Y-m-d H:i:s');
			$file->save();

			// Update modified_at di folder
			$folder = Folder::find($request->id_folder);
			$folder->modified_at = $file->uploaded_at;
			$folder->save();
		}
	}

    /**
     * Upload thumbnail
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadThumbnail(Request $request)
    {
		// Upload gambar
		$image_name = upload_file_content($request->src_image, "assets/images/file-thumbnail/");
		
		// Simpan data File Thumbnail
		$file_thumbnail = new FileThumbnail;
		$file_thumbnail->file_thumbnail = $image_name;
		$file_thumbnail->uploaded_at = date('Y-m-d H:i:s');
		$file_thumbnail->save();
		
		// Get data File
		$file = Files::find($request->id_file);
		$file->thumbnail_file = $image_name;
		$file->save();

		// Get directory folder
		$dir = Folder::find($file->id_folder);

		// Kategori materi
		$kategori = KategoriMateri::find($file->jenis_file);

		// Redirect
		return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir='.$dir->dir_folder)->with(['message' => 'Berhasil mengganti thumbnail.']);
    }

    /**
     * Choose thumbnail
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chooseThumbnail(Request $request)
    {		
		// Get data File Thumbnail
		$file_thumbnail = FileThumbnail::find($request->id_ft);
		
		// Get data file
		$file = Files::find($request->id_file_2);
		$file->thumbnail_file = $file_thumbnail != null ? $file_thumbnail->file_thumbnail : '';
		$file->save();

		// Get directory folder
		$dir = Folder::find($file->id_folder);

		// Kategori materi
		$kategori = KategoriMateri::find($file->jenis_file);

		// Redirect
		return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir='.$dir->dir_folder)->with(['message' => 'Berhasil mengganti thumbnail.']);
    }

    /**
     * Menghapus file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // Menghapus data
        $file = Files::find($request->id);
		
		// File detail
		$file_detail = FileDetail::where('id_file','=',$file->url)->get();
		if(count($file_detail) > 0){
			foreach($file_detail as $data){
				$fd = FileDetail::find($data->id_fd);
				File::delete('assets/uploads/'.$fd->nama_fd);
				$fd->delete();
			}
		}
		else{
        	File::delete('assets/uploads/'.$file->url);
		}
        $file->delete();
			
		// Get data folder
		$folder = Folder::find($file->id_folder);

		// Kategori materi
		$kategori = KategoriMateri::find($file->jenis_file);

        // Redirect
		return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir='.$folder->dir_folder)->with(['message' => 'Berhasil menghapus file.']);
    }

    /**
     * Menampilkan file yang tak terpakai
     *
     * @return \Illuminate\Http\Response
     */
    public function unused(Request $request)
    {
		// Directory
		$dir = $request->query('dir');
		
		if(!is_dir($dir)){
			abort(404);
		}

		// Path ini
		$this_path = FilePath::where('path','=',$dir)->first();

		// Default Path
		$path = FilePath::all();
		
		// File tak terpakai
		$unused_files = unused_files($dir, array_files($this_path->tabel, $this_path->field));
			
		// View
		return view('file/admin/unused', [
			'dir' => $dir,
			'path' => $path,
			'array' => $unused_files,
		]);
    }

    /**
     * Menghapus file yang tak terpakai
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_unused(Request $request)
    {
		// Delete
        File::delete($request->dir.'/'.$request->id);
		
        // Redirect
		return redirect('/admin/file/unused?dir='.$request->dir)->with(['message' => 'Berhasil menghapus file.']);
    }

    /**
     * Menghapus semua file yang tak terpakai
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_all_unused(Request $request)
    {
		// Directory
		$dir = $request->dir;

		// Path ini
		$this_path = FilePath::where('path','=',$dir)->first();
		
		$unused_files = unused_files($dir, array_files($this_path->tabel, $this_path->field));
		foreach($unused_files as $file){
			// Delete
			File::delete($dir.'/'.$file);
		}
		
        // Redirect
		return redirect('/admin/file/unused?dir='.$request->dir)->with(['message' => 'Berhasil menghapus semua file.']);
    }
}
