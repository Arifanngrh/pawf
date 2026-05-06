<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostAdmin extends BaseController
{
    public function index()
    {
        $post = new PostModel();
        $data['posts'] = $post->orderBy('created_at', 'DESC')->findAll();
        return view('admin/admin_post_list', $data);
    }

    public function preview($id)
    {
        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();

        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('post_detail', $data);
    }

    public function create()
    {
        return view('admin/admin_post_create');
    }

    public function store()
    {
        $rules = [
            'title'   => 'required|min_length[3]|max_length[255]',
            'content' => 'required',
            'image'   => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ];

        if (! $this->validate($rules)) {
            return view('admin/admin_post_create', [
                'validation' => $this->validator,
            ]);
        }

        $post = new PostModel();
        $imageFile = $this->request->getFile('image');
        $imageName = $imageFile->getRandomName();

        $uploadPath = ROOTPATH . 'public/uploads';
        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $imageFile->move($uploadPath, $imageName);

        $post->insert([
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'status'  => $this->request->getPost('status'),
            'slug'    => url_title($this->request->getPost('title'), '-', TRUE),
            'image'   => $imageName,
        ]);

        return redirect()->to('/admin/post')->with('message', 'Post berhasil ditambahkan');
    }

    public function edit($id)
    {
        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();

        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }

        // Validasi data (gambar opsional saat edit)
        $rules = [
            'title' => 'required',
            'image' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ];

        if ($this->validate($rules)) {
            $imageFile = $this->request->getFile('image');
            $imageName = $data['post']['image']; // Gunakan nama lama sebagai default

            // Jika ada file baru yang diupload
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                // Hapus gambar lama jika ada
                if (! empty($imageName) && file_exists(ROOTPATH . 'public/uploads/' . $imageName)) {
                    @unlink(ROOTPATH . 'public/uploads/' . $imageName);
                }
                
                // Upload gambar baru
                $imageName = $imageFile->getRandomName();
                $uploadPath = ROOTPATH . 'public/uploads';
                if (! is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                $imageFile->move($uploadPath, $imageName);
            }

            $post->update($id, [
                'title'   => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'status'  => $this->request->getPost('status'),
                'slug'    => url_title($this->request->getPost('title'), '-', TRUE),
                'image'   => $imageName,
            ]);

            return redirect('admin/post')->with('message', 'Post berhasil diperbarui');
        }

        return view('admin/admin_post_update', [
            'post'       => $data['post'],
            'validation' => $this->validator,
        ]);
    }

    public function delete($id)
    {
        $post = new PostModel();
        $data = $post->find($id);

        if ($data) {
            // Hapus file gambar dari folder sebelum hapus data di DB
            if (file_exists(ROOTPATH . 'public/uploads/' . $data['image'])) {
                @unlink(ROOTPATH . 'public/uploads/' . $data['image']);
            }
            $post->delete($id);
        }

        return redirect('admin/post');
    }
}