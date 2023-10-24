<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class UserAccount extends BaseController
{
    protected $db, $builder;

    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data['sidebar_active'] = 'user_account';
        // $users = new \Myth\Auth\Models\UserModel;
        // $data['users'] = $users->findAll();

        $this->builder->select('users.id as userid, username, email, nisn, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('admin/user_account/index', $data);
    }

    public function tambah_form() {
        $data['sidebar_active'] = 'user_account';
        return view('admin/user_account/tambah', $data);
    }

    public function detail($id)
    {
        $data['sidebar_active'] = 'user_account';
        // $users = new \Myth\Auth\Models\UserModel;
        // $data['users'] = $users->findAll();

        $this->builder->select('users.id as userid, username, email, nisn, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        return view('admin/user_account/detail', $data);
    }

    public function delete($userId) {
        $this->builder->where('users.id', $userId);
        
        if ($this->builder->delete()) {
            // Jika penghapusan berhasil, Anda dapat menangani situasi ini sesuai kebutuhan Anda.
            // Misalnya, tampilkan pesan sukses atau redirect ke halaman lain.
            return redirect()->to(base_url('user-account'))->with('status', '<div class="alert alert-danger alert-dismissible" role="alert"> User berhasil di hapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            // Jika terjadi kesalahan saat menghapus pengguna, Anda dapat menangani situasi ini sesuai kebutuhan Anda.
            // Misalnya, tampilkan pesan kesalahan atau redirect ke halaman lain.
            return redirect()->back()->with('error', 'Error deleting user');
        }
        
    }
}