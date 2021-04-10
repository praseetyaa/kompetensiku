<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\FileDetail;
use App\Files;
use App\Folder;
use App\FolderIcon;
use App\KategoriMateri;

class FolderController extends Controller
{
	/**
     * Menambah folder
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'nama_folder' => 'required|max:255',
        ], validation_messages());
        
        // Mengecek jika ada error
        if($validator->fails()){
            // Kembali ke halaman sebelumnya dan menampilkan pesan error
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // Jika tidak ada error
        else{
            // Nama folder
            $nama_folder = $request->nama_folder;
            $i = 1;
            while(count_existing_folder($request->folder_parent, $request->jenis_folder, $nama_folder, null) > 0){
                $nama_folder = rename_folder($request->nama_folder, $i);
                $i++;
            }

			// Generate dir folder
			if($request->folder_parent == 1){
				$dir = "/".$nama_folder;
			}
			else{
				$folder_parent = Folder::find($request->folder_parent);
				$dir = $folder_parent->dir_folder."/".$nama_folder;
			}
			
            // Menambah data
            $folder = new Folder;
            $folder->nama_folder = $nama_folder;
			$folder->jenis_folder = $request->jenis_folder;
			$folder->dir_folder = $dir;
			$folder->folder_parent = $request->folder_parent;
			$folder->folder_at = date('Y-m-d H:i:s');
            $folder->save();
			
			// Get data folder
            $current_folder = Folder::find($request->folder_parent);
            
            // Kategori materi
            $kategori = KategoriMateri::find($folder->jenis_folder);
        }

        // Redirect
        return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir='.$current_folder->dir_folder)->with(['message' => 'Berhasil menambah folder.']);
    }
	
    /**
     * Mengupdate folder
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'nama_folder2' => 'required|max:255',
        ], validation_messages());
        
        // Mengecek jika ada error
        if($validator->fails()){
            // Kembali ke halaman sebelumnya dan menampilkan pesan error
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // Jika tidak ada error
        else{
            // Nama folder
            $folder = Folder::find($request->id_folder);
            $nama_folder = $request->nama_folder2;
            $i = 1;
            while(count_existing_folder($request->folder_parent, $folder->jenis_folder, $nama_folder, $request->id_folder) > 0){
                $nama_folder = rename_folder($request->nama_folder2, $i);
                $i++;
            }

			// Generate dir folder
			if($request->folder_parent == 1){
				$dir = "/".$nama_folder;
			}
			else{
				$folder_parent = Folder::find($request->folder_parent);
				$dir = $folder_parent->dir_folder."/".$nama_folder;
			}
			
            // Mengupdate data
			$folder->nama_folder = $nama_folder;
			$folder->dir_folder = $dir;
			$folder->folder_parent = $request->folder_parent;
            $folder->save();
			
			// Get data folder
			$current_folder = Folder::find($request->folder_parent);
            
            // Kategori materi
            $kategori = KategoriMateri::find($folder->jenis_folder);
        }

        // Redirect
        return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir='.$current_folder->dir_folder)->with(['message' => 'Berhasil mengupdate folder.']);
    }

    /**
     * Memindah file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function move(Request $request)
    {
		if($request->type == 'file'){
			$file = Files::find($request->id);
			$file->id_folder = $request->destination;
			$file->save();
            
            // Kategori materi
            $kategori = KategoriMateri::find($file->jenis_file);
			
			// Redirect
            return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir=/')->with(['message' => 'Berhasil memindahkan file.']);
		}
    }

    /**
     * Upload icon
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadIcon(Request $request)
    {
		// Upload gambar
		$image_name = upload_file_content($request->src_image, "assets/images/icon/");
		
		// Simpan data Folder Icon
		$folder_icon = new FolderIcon;
		$folder_icon->folder_icon = $image_name;
		$folder_icon->uploaded_at = date('Y-m-d H:i:s');
		$folder_icon->save();
		
		// Get data folder
		$folder = Folder::find($request->id_folder);
		$folder->folder_icon = $image_name;
		$folder->save();

		// Kategori materi
		$kategori = KategoriMateri::find($folder->jenis_folder);

		// Redirect
		return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir=/')->with(['message' => 'Berhasil mengganti icon.']);
    }

    /**
     * Choose icon
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chooseIcon(Request $request)
    {		
		// Get data Folder Icon
		$folder_icon = FolderIcon::find($request->id_fi);
		
		// Get data folder
		$folder = Folder::find($request->id_folder_2);
		$folder->folder_icon = $folder_icon != null ? $folder_icon->folder_icon : '';
		$folder->save();

		// Kategori materi
		$kategori = KategoriMateri::find($folder->jenis_folder);

		// Redirect
		return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir=/')->with(['message' => 'Berhasil mengganti icon.']);
    }

    /**
     * Menghapus folder
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // Get folder
        $folder = Folder::find($request->id);
        $folder->delete();
			
		// Get data current folder
		$current_folder = Folder::find($folder->folder_parent);
		
		// Get folder inside
		$folders = Folder::where('folder_parent','=',$request->id)->get();
		if(count($folders)>0){
			$folders->delete();
		}
		
		// Get files inside
		$files = Files::where('id_folder','=',$request->id)->get();
		if(count($files)>0){
			foreach($files as $file){
                $file_detail = FileDetail::where('id_file','=',$file->url)->get();
                if(count($file_detail) > 0){
                    foreach($file_detail as $data){
                        $fd = FileDetail::find($data->id_fd);
                        File::delete('assets/uploads/'.$fd->nama_fd);
                        $fd->delete();
                    }
                }
				$data_file = Files::find($file->id_file);
				$data_file->delete();
			}
		}
            
        // Kategori materi
        $kategori = KategoriMateri::find($folder->jenis_folder);
        
        // Redirect
        return redirect('/admin/materi/'.generate_permalink($kategori->kategori).'?dir='.$current_folder->dir_folder)->with(['message' => 'Berhasil menghapus folder.']);
    }
}
