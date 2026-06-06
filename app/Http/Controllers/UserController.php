<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users', compact('users'));
    }

    public function create()
    {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        DB::table('users')->insert([
            'name' => $user_name,
            'email' => $user_email,
            'password' => bcrypt($user_password),
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();

        return view('users', compact('user', 'users'));
    }

    public function update()
    {
        $id = $_POST['id'];

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
        ];

        if (!empty($_POST['password'])) {
            $data['password'] = bcrypt($_POST['password']);
        }

        DB::table('users')->where('id', '=', $id)->update($data);

        return redirect('users');
    }
}
