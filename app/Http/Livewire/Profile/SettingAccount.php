<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class SettingAccount extends Component
{
    public $name,$last_name,$email,$no_ktp,$ttl,$agama,$darah,$status,$alamat_ktp,$alamat_tinggal,$no_telp,$nama_orang_dekat,$no_orang_dekat,$jk,$ipk,$lulus
    ,$jurusan,$akademik,$pendidikan,$sertifikat,$kursus,$tahun,$tahun_bekerja,$perusahaan,$posisi,$pendapatan,$skill,$ditempatkan,$gaji ;

    protected $rules = [
        'name' => 'required|min:5',
        'last_name' => 'required|',
        'email' => 'required|min:5|email',
        'no_ktp' => 'required|max:16',
        'ttl' => 'required|min:5',
        'agama' => 'required',
        'darah' => 'required',
        'status' => 'required',
        'alamat_ktp' => 'required|min:5',
        'alamat_tinggal' => 'required|min:5',
        'no_telp' => 'required|min:5',
        'nama_orang_dekat' => 'required|min:5',
        'no_orang_dekat' => 'required|min:5',
        'jk' => 'required',
    ];


    public function mount(Request $request) {
        $users = User::find($request->user()->id);
        $this->name =  $users['name'];
        $this->last_name =  $users['last_name'];
        $this->email =  $users['email'];
        $this->no_ktp =  $users['no_ktp'];
        $this->ttl =  $users['ttl'];
        $this->agama =  $users['agama'];
        $this->darah =  $users['darah'];
        $this->status =  $users['status'];
        $this->alamat_ktp =  $users['alamat_ktp'];
        $this->alamat_tinggal =  $users['alamat_tinggal'];
        $this->no_telp =  $users['no_telp'];
        $this->nama_orang_dekat =  $users['nama_orang_dekat'];
        $this->no_orang_dekat =  $users['no_orang_dekat'];
        $this->jk =  $users['jk'];
        $this->ditempatkan =  $users['ditempatkan'];
        $this->gaji =  $users['gaji'];
    }

    public function render(Request $request)
    {
        $pendidikan = DB::collection('pendidikan')->where('id_applicant', $request->user()->id)->get();
        $pelatihan = DB::collection('pelatihan')->where('id_applicant', $request->user()->id)->get();
        $pekerjaan = DB::collection('pekerjaan')->where('id_applicant', $request->user()->id)->get();
        $skill = DB::collection('skill')->where('id_applicant', $request->user()->id)->get();

        $data = [
            'getPendidikan' => $pendidikan,
            'getPelatihan' => $pelatihan,
            'getPekerjaan' => $pekerjaan,
            'getSkill' => $skill
        ];
        return view('livewire.profile.setting-account',$data);
    }

    public function updateAccount(Request $request){

        $this->validate();

        // $request->user()->update([
        //     'password' => Hash::make($this->password),
        // ]);
        // $this->post->save();\
        $users = User::find($request->user()->id);
        
        $users->name = $this->name;
        $users->name =  $this->name;
        $users->last_name =  $this->last_name;
        $users->email =  $this->email;
        $users->no_ktp =  $this->no_ktp;
        $users->ttl =  $this->ttl;
        $users->agama =  $this->agama;
        $users->darah =  $this->darah;
        $users->status =  $this->status;
        $users->alamat_ktp =  $this->alamat_ktp;
        $users->alamat_tinggal =  $this->alamat_tinggal;
        $users->no_telp =  $this->no_telp;
        $users->nama_orang_dekat =  $this->nama_orang_dekat;
        $users->no_orang_dekat =  $this->no_orang_dekat;
        $users->jk =  $this->jk;
        $users->gaji =  $this->gaji;
        $users->ditempatkan =  $this->ditempatkan;
        $users->updated_at = NOW();

        if($users->save()){
            session()->flash('message', 'Account successfully updated.');
        }else{
            session()->flash('error', 'Account successfully updated.');
        }

        
       
    }

    public function pendidikan(Request $request){

        $this->validate([
            'pendidikan' => 'required|',
            'akademik' => 'required|min:5',
            'jurusan' => 'required|min:5',
            'lulus' => 'required',
            'ipk' => 'required',
        ]);

        $pendidikan = DB::collection('pendidikan')->insert([
            'id_applicant' => $request->user()->id,
            'pendidikan' => $this->pendidikan,
            'akademik' => $this->akademik,
            'jurusan' => $this->jurusan,
            'lulus' => $this->lulus,
            'ipk' => $this->ipk,
        ]);

        if($pendidikan){
            session()->flash('message_pendidikan', 'Berhasil di tambahkan');
            $this->pendidikan = null;
            $this->akademik = null;
            $this->jurusan = null;
            $this->lulus = null;
            $this->ipk = null;
        }else{
            session()->flash('error_pendidikan', 'Gagal Di tambahkan');
        }

        
       
    }

    public function skill(Request $request){

        $this->validate([
            'skill' => 'required|',
        ]);

        $skill = DB::collection('skill')->insert([
            'id_applicant' => $request->user()->id,
            'skill' => $this->skill,
        ]);

        if($skill){
            session()->flash('message_skill', 'Berhasil di tambahkan');
            $this->skill = null;
        }else{
            session()->flash('error_skill', 'Gagal Di tambahkan');
        }

        
       
    }

    public function pekerjaan(Request $request){

        $this->validate([
            'tahun_bekerja' => 'required',
            'perusahaan' => 'required',
            'pendapatan' => 'required',
            'posisi' => 'required',
        ]);

        $pekerjaan = DB::collection('pekerjaan')->insert([
            'id_applicant' => $request->user()->id,
            'tahun_bekerja' => $this->tahun_bekerja,
            'perusahaan' => $this->perusahaan,
            'pendapatan' => $this->pendapatan,
            'posisi' => $this->posisi,
        ]);

        if($pekerjaan){
            session()->flash('message_pekerjaan', 'Berhasil di tambahkan');
            $this->tahun_bekerja = null;
            $this->perusahaan = null;
            $this->pendapatan = null;
            $this->posisi = null;
        }else{
            session()->flash('error_pekerjaan', 'Gagal Di tambahkan');
        }

        
       
    }


    public function Deletependidikan($id){

        $pendidikan = DB::collection('pendidikan')->where('_id', $id)->delete();
        
        if($pendidikan){
            session()->flash('message_pendidikan_delete', 'Berhasil dihapus');
        }else{
            session()->flash('error_pendidikan_delete', 'Gagal dihapus');
        }
       
    }

    public function Deleteskill($id){

        $skill = DB::collection('skill')->where('_id', $id)->delete();
        
        if($skill){
            session()->flash('message_skill_delete', 'Berhasil dihapus');
        }else{
            session()->flash('error_skill_delete', 'Gagal dihapus');
        }
       
    }

    public function Deletepekerjaan($id){

        $pekerjaan = DB::collection('pekerjaan')->where('_id', $id)->delete();
        
        if($pekerjaan){
            session()->flash('message_pekerjaan_delete', 'Berhasil dihapus');
        }else{
            session()->flash('error_pekerjaan_delete', 'Gagal dihapus');
        }
       
    }


    public function Deletepelatihan($id){

        $pendidikan = DB::collection('pelatihan')->where('_id', $id)->delete();
        
        if($pendidikan){
            session()->flash('message_pelatihan_delete', 'Berhasil dihapus');
        }else{
            session()->flash('error_pelatihan_delete', 'Gagal dihapus');
        }
       
    }

    public function pelatihan(Request $request){

        $this->validate([
            'sertifikat' => 'required',
            'tahun' => 'required',
            'kursus' => 'required',
        ]);

        $pendidikan = DB::collection('pelatihan')->insert([
            'id_applicant' => $request->user()->id,
            'sertifikat' => $this->sertifikat,
            'tahun' => $this->tahun,
            'kursus' => $this->kursus,
        ]);

        if($pendidikan){
            session()->flash('message_pelatihan', 'Berhasil di tambahkan');
            $this->sertifikat = null;
            $this->tahun = null;
            $this->kursus = null;
        }else{
            session()->flash('error_pelatihan', 'Gagal Di tambahkan');
        }

        
       
    }

}
