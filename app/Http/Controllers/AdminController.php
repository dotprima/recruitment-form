<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('roles', 'applicant')->get();

        $data = [
            'users' => $users
        ];
        return view('profile.profile',$data);
   }

   public function applicant($id)
    {
        $users = User::where('_id', $id)->first();
        $pendidikan = DB::collection('pendidikan')->where('id_applicant', $id)->get();
        $pelatihan = DB::collection('pelatihan')->where('id_applicant', $id)->get();
        $pekerjaan = DB::collection('pekerjaan')->where('id_applicant', $id)->get();
        $skill = DB::collection('skill')->where('id_applicant', $id)->get();

        $data = [
            'users' => $users,
            'getPendidikan' => $pendidikan,
            'getPelatihan' => $pelatihan,
            'getPekerjaan' => $pekerjaan,
            'getSkill' => $skill
        ];
        return view('profile.users_view',$data);
   }
}
