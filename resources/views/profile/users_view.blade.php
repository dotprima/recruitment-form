@extends('layouts.app')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Summary {{$users['name']}}</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (session()->has('message_upload'))
                                <div class="alert alert-success">
                                    {{ session()->get('message_upload') }}
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="<?= !$users['images'] == null ? URL::to('/') . '/' . $users['images'] : 'https://ui-avatars.com/api/?name=' . Auth::user()->name ?>"
                                    alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                                <div class="button-wrapper">

                                   
                                </div>
                            </div>
                            <form>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Nama Depan</label>
                                    <input class="form-control" type="text" id="name" value="{{$users['name']}}" readonly />
                                    @error('name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">Nama Belakang</label>
                                    <input class="form-control" type="text" value="last_name" id="{{$users['last_name']}} " readonly />
                                    @error('last_name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="email" id="email" value="{{$users['email']}}"readonly />
                                    @error('email')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">No KTP</label>
                                    <input class="form-control" type="number" value="{{$users['no_ktp']}}" id="{{$users['no_ktp']}}"readonly />
                                    @error('no_ktp')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <input class="form-control" type="text" value="{{$users['jk']}}"
                                        id="no_orang_dekat"  readonly />
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">Tempat Tanggal Lahir</label>
                                    <input class="form-control" type="text" value="{{$users['ttl']}}" id="ttl" readonly/>
                                    @error('ttl')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">Agama</label>
                                    <input class="form-control" type="text" value="{{$users['agama']}}" id="agama" readonly/>
                                    @error('agama')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">Golongan Darah</label>
                                    <input class="form-control" type="text" value="{{$users['darah']}}" id="darah"readonly />
                                    @error('darah')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">Status</label>
                                    <input class="form-control" type="text" value="{{$users['status']}}" id="status"readonly />
                                    @error('status')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">Alamat KTP</label>
                                    <input class="form-control" type="text" value="{{$users['alamat_ktp']}}"
                                        id="alamat_ktp" readonly/>
                                    @error('alamat_ktp')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">Alamat Tinggal</label>
                                    <input class="form-control" type="text" value="{{$users['alamat_tinggal']}}"
                                        id="alamat_tinggal" readonly/>
                                    @error('alamat_tinggal')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">No Telephone</label>
                                    <input class="form-control" type="text" value="{{$users['no_telp']}}" id="no_telp" readonly/>
                                    @error('no_telp')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">Nama Orang Terdekat</label>
                                    <input class="form-control" type="text" value="{{$users['nama_orang_dekat']}}"
                                        id="nama_orang_dekat"readonly />
                                    @error('nama_orang_dekat')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">No Telephpne Orang Terdekat</label>
                                    <input class="form-control" type="text" value="{{$users['no_orang_dekat']}}"
                                        id="no_orang_dekat"  readonly />
                                    @error('no_orang_dekat')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="ditempatkan" class="form-label">Bersedia di tempatkan diseluruh kantor
                                        perusahaan</label>
                                        <input class="form-control" type="text" value="{{$users['ditempatkan']}}"
                                        id="no_orang_dekat"  readonly />
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="last_name" class="form-label">Penghasilan yang diharapkan perbulan</label>
                                    <input class="form-control" type="text" value="{{$users['gaji']}}" id="gaji" readonly/>
                                    @error('gaji')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>



                            </div>



                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            
                        </form>
                    </div>

                    <!-- /Account -->
                </div>


                <div class="card">
                    <h5 class="card-header">Pendidikan Terakhir</h5>
                    <div class="card-body">
                      
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Jenjang Pendidikan</th>
                                    <th>Insitusi Akademik</th>
                                    <th>Jurusan</th>
                                    <th>Tahun Lulus</th>
                                    <th>IPK</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getPendidikan as $item)
                                    <tr>
                                        <td>{{ $item['pendidikan'] }}</td>
                                        <td>{{ $item['akademik'] }}</td>
                                        <td>{{ $item['jurusan'] }}</td>
                                        <td>{{ $item['lulus'] }}</td>
                                        <td>{{ $item['ipk'] }}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header">Riwayat Pelatihan</h5>
                    <div class="card-body">
                      
                        <br>
                        @if (session()->has('message_pelatihan_delete'))
                            <div class="alert alert-success">
                                {{ session('message_pelatihan_delete') }}
                            </div>
                        @endif
                        @if (session()->has('error_pelatihan_delete'))
                            <div class="alert alert-danger">
                                {{ session('error_pelatihan_delete') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Kursus / Seminar</th>
                                    <th>Setifikat (Ada / Tidak Ada)</th>
                                    <th>Tahun</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getPelatihan as $item)
                                    <tr>
                                        <td>{{ $item['kursus'] }}</td>
                                        <td>{{ $item['sertifikat'] }}</td>
                                        <td>{{ $item['tahun'] }}</td>
                                       
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <br>


                <div class="card">
                    <h5 class="card-header">Riwayat Pekerjaan</h5>
                    <div class="card-body">
                       
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Posisi Terakhir</th>
                                    <th>Pendapatan Terakhir</th>
                                    <th>Tahun Bekerja</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getPekerjaan as $item)
                                    <tr>
                                        <td>{{ $item['perusahaan'] }}</td>
                                        <td>{{ $item['posisi'] }}</td>
                                        <td>{{ $item['pendapatan'] }}</td>
                                        <td>{{ $item['tahun_bekerja'] }}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Skill / Keterampilan yang dimiliki</h5>
                    <div class="card-body">
                       
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Skill</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getSkill as $item)
                                    <tr>
                                        <td>{{ $item['skill'] }}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            
            </div>

           

        </div>
    </div>
@endsection

@section('css')
    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
@endsection

@section('js')
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="../../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/pages-account-settings-account.js"></script>
    <script></script>
@endsection
