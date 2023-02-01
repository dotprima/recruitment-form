<div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-users me-1"></i>
                Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.profileSecurity') }}"><i class="ti-xs ti ti-lock me-1"></i>
                Security</a>
        </li>
    </ul>
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
                    <img src="<?= !Auth::user()->images == null ? URL::to('/') . '/' . Auth::user()->images : 'https://ui-avatars.com/api/?name=' . Auth::user()->name ?>"
                        alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                    <div class="button-wrapper">

                        <label for="upload" class="btn btn-secondary me-2 mb-3" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input type="hidden" name="id" value="{{ Auth::user()->_id }}">
                            <input type="file" id="upload" class="account-file-input" hidden
                                accept="image/png, image/jpeg" name="photo" />
                        </label>
                        <button type="submit" class="btn btn-label-primary mb-3">
                            <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Upload Gambar</span>
                        </button>

                        <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
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
                        <input class="form-control" type="text" id="name" wire:model="name" autofocus />
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input class="form-control" type="text" wire:model="last_name" id="last_name" />
                        @error('last_name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="email" id="email" wire:model="email" />
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">No KTP</label>
                        <input class="form-control" type="number" wire:model="no_ktp" id="no_ktp" />
                        @error('no_ktp')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select id="jk" wire:model="jk" class="select2 form-select">
                            <option value="">Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Tempat Tanggal Lahir</label>
                        <input class="form-control" type="text" wire:model="ttl" id="ttl" />
                        @error('ttl')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Agama</label>
                        <input class="form-control" type="text" wire:model="agama" id="agama" />
                        @error('agama')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Golongan Darah</label>
                        <input class="form-control" type="text" wire:model="darah" id="darah" />
                        @error('darah')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Status</label>
                        <input class="form-control" type="text" wire:model="status" id="status" />
                        @error('status')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Alamat KTP</label>
                        <input class="form-control" type="text" wire:model="alamat_ktp" id="alamat_ktp" />
                        @error('alamat_ktp')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Alamat Tinggal</label>
                        <input class="form-control" type="text" wire:model="alamat_tinggal"
                            id="alamat_tinggal" />
                        @error('alamat_tinggal')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">No Telephone</label>
                        <input class="form-control" type="text" wire:model="no_telp" id="no_telp" />
                        @error('no_telp')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Nama Orang Terdekat</label>
                        <input class="form-control" type="text" wire:model="nama_orang_dekat"
                            id="nama_orang_dekat" />
                        @error('nama_orang_dekat')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">No Telephpne Orang Terdekat</label>
                        <input class="form-control" type="text" wire:model="no_orang_dekat"
                            id="no_orang_dekat" />
                        @error('no_orang_dekat')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="ditempatkan" class="form-label">Bersedia di tempatkan diseluruh kantor
                            perusahaan</label>
                        <select id="ditempatkan" wire:model="ditempatkan" class="select2 form-select">
                            <option value="">Pilih</option>
                            <option value="Bersedia">Bersedia</option>
                            <option value="Tidak Bersedia">Tidak Bersedia</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Penghasilan yang diharapkan perbulan</label>
                        <input class="form-control" type="text" wire:model="gaji" id="gaji" />
                        @error('gaji')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>



                </div>

                @push('scripts')
                    <script>
                        $(document).ready(function() {
                            $('#jk').select2();
                            $('#jk').on('change', function(e) {
                                var data = $('#jk').select2("val");
                                @this.set('jk', data);
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $('#ditempatkan').select2();
                            $('#ditempatkan').on('change', function(e) {
                                var data = $('#ditempatkan').select2("val");
                                @this.set('ditempatkan', data);
                            });
                        });
                    </script>
                    {{-- <script>
                        $(document).ready(function() {
                            $('#language').select2();
                            $('#language').on('change', function(e) {
                                var data = $('#language').select2("val");
                                @this.set('language', data);
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $('#timezone').select2();
                            $('#timezone').on('change', function(e) {
                                var data = $('#timezone').select2("val");
                                @this.set('timezone', data);
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $('#country').select2();
                            $('#country').on('change', function(e) {
                                var data = $('#country').select2("val");
                                @this.set('country', data);
                            });
                        });
                    </script> --}}
                @endpush


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
                <div class="mt-2">
                    <button type="submit" wire:click.prevent="updateAccount()" class="btn btn-primary me-2">Save
                        changes</button>
                </div>
            </form>
        </div>

        <!-- /Account -->
    </div>


    <div class="card">
        <h5 class="card-header">Pendidikan Terakhir</h5>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="pendidikan" class="form-label">Jenjang Pendidikan</label>
                        <input class="form-control" type="text" id="pendidikan" wire:model="pendidikan"
                            autofocus />
                        @error('pendidikan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Nama Insitusi Akademik</label>
                        <input class="form-control" type="text" wire:model="akademik" id="akademik" />
                        @error('akademik')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Jurusan</label>
                        <input class="form-control" type="text" id="jurusan" wire:model="jurusan" />
                        @error('jurusan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Tahun Lulus</label>
                        <input class="form-control" type="number" wire:model="lulus" id="lulus" />
                        @error('lulus')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">IPK</label>
                        <input class="form-control" type="number" wire:model="ipk" id="ipk" />
                        @error('ipk')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if (session()->has('message_pendidikan'))
                    <div class="alert alert-success">
                        {{ session('message_pendidikan') }}
                    </div>
                @endif
                @if (session()->has('error_pendidikan'))
                    <div class="alert alert-danger">
                        {{ session('error_pendidikan') }}
                    </div>
                @endif
                <div class="mt-2">
                    <button type="submit" wire:click.prevent="pendidikan()" class="btn btn-primary me-2">Save
                        changes</button>
                </div>
            </form>
            <br>
            @if (session()->has('message_pendidikan_delete'))
                <div class="alert alert-success">
                    {{ session('message_pendidikan_delete') }}
                </div>
            @endif
            @if (session()->has('error_pendidikan_delete'))
                <div class="alert alert-danger">
                    {{ session('error_pendidikan_delete') }}
                </div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Jenjang Pendidikan</th>
                        <th>Insitusi Akademik</th>
                        <th>Jurusan</th>
                        <th>Tahun Lulus</th>
                        <th>IPK</th>
                        <th>Edit</th>
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
                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-float waves-light"
                                    wire:click="Deletependidikan('{{ strval($item['_id']) }}')">Hapus</button>
                            </td>
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
            <form>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Nama Kursus</label>
                        <input class="form-control" type="text" id="kursus" wire:model="kursus" autofocus />
                        @error('kursus')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Sertifikat</label>
                        <input class="form-control" type="text" wire:model="sertifikat" id="sertifikat" />
                        @error('sertifikat')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Tahun</label>
                        <input class="form-control" type="number" id="tahun" wire:model="tahun" />
                        @error('tahun')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if (session()->has('message_pelatihan'))
                    <div class="alert alert-success">
                        {{ session('message_pelatihan') }}
                    </div>
                @endif
                @if (session()->has('error_pelatihan'))
                    <div class="alert alert-danger">
                        {{ session('error_pelatihan') }}
                    </div>
                @endif
                <div class="mt-2">
                    <button type="submit" wire:click.prevent="pelatihan()" class="btn btn-primary me-2">Save
                        changes</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getPelatihan as $item)
                        <tr>
                            <td>{{ $item['kursus'] }}</td>
                            <td>{{ $item['sertifikat'] }}</td>
                            <td>{{ $item['tahun'] }}</td>
                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-float waves-light"
                                    wire:click="Deletepelatihan('{{ strval($item['_id']) }}')">Hapus</button>
                            </td>
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
            <form>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Nama Perusahaan</label>
                        <input class="form-control" type="text" id="perusahaan" wire:model="perusahaan"
                            autofocus />
                        @error('perusahaan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="last_name" class="form-label">Posisi Terakhir</label>
                        <input class="form-control" type="text" wire:model="posisi" id="posisi" />
                        @error('posisi')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Pendapatan Terakhir</label>
                        <input class="form-control" type="number" id="pendapatan" wire:model="pendapatan" />
                        @error('pendapatan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Tahun</label>
                        <input class="form-control" type="number" id="tahun_bekerja" wire:model="tahun_bekerja" />
                        @error('tahun_bekerja')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if (session()->has('message_pekerjaan'))
                    <div class="alert alert-success">
                        {{ session('message_pekerjaan') }}
                    </div>
                @endif
                @if (session()->has('error_pekerjaan'))
                    <div class="alert alert-danger">
                        {{ session('error_pekerjaan') }}
                    </div>
                @endif
                <div class="mt-2">
                    <button type="submit" wire:click.prevent="pekerjaan()" class="btn btn-primary me-2">Save
                        changes</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
            <br>
            @if (session()->has('message_pekerjaan_delete'))
                <div class="alert alert-success">
                    {{ session('message_pekerjaan_delete') }}
                </div>
            @endif
            @if (session()->has('error_pekerjaan_delete'))
                <div class="alert alert-danger">
                    {{ session('error_pekerjaan_delete') }}
                </div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Posisi Terakhir</th>
                        <th>Pendapatan Terakhir</th>
                        <th>Tahun Bekerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getPekerjaan as $item)
                        <tr>
                            <td>{{ $item['perusahaan'] }}</td>
                            <td>{{ $item['posisi'] }}</td>
                            <td>{{ $item['pendapatan'] }}</td>
                            <td>{{ $item['tahun_bekerja'] }}</td>
                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-float waves-light"
                                    wire:click="Deletepekerjaan('{{ strval($item['_id']) }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <div class="card">
        <h5 class="card-header">Skill / Keterampilan yang dimiliki</h5>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">SKill</label>
                        <input class="form-control" type="text" id="skill" wire:model="skill" autofocus />
                        @error('skill')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if (session()->has('message_skill'))
                    <div class="alert alert-success">
                        {{ session('message_skill') }}
                    </div>
                @endif
                @if (session()->has('error_skill'))
                    <div class="alert alert-danger">
                        {{ session('error_skill') }}
                    </div>
                @endif
                <div class="mt-2">
                    <button type="submit" wire:click.prevent="skill()" class="btn btn-primary me-2">Save
                        changes</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
            <br>
            @if (session()->has('message_skill_delete'))
                <div class="alert alert-success">
                    {{ session('message_skill_delete') }}
                </div>
            @endif
            @if (session()->has('error_skill_delete'))
                <div class="alert alert-danger">
                    {{ session('error_skill_delete') }}
                </div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Skill</th>
                        <th width="50px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getSkill as $item)
                        <tr>
                            <td>{{ $item['skill'] }}</td>
                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-float waves-light"
                                    wire:click="Deleteskill('{{ strval($item['_id']) }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <br>
    <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
            <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                    <p class="mb-0">Once you delete your account, there is no going back. Please be certain.
                    </p>
                </div>
            </div>
            <form id="formAccountDeactivation" onsubmit="return false" method="POST">
                <div class="mb-3 col-md-6">
                    <input class="form-control" type="password" name="deletepassword" id="deletepassword"
                        required />
                    <label class="form-check-label" for="deletepassword">I confirm my account
                        deactivation input password</label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation"
                        required />
                    <label class="form-check-label" for="accountActivation">I confirm my account
                        deactivation</label>
                </div>
                <button type="submit" id="btn-add" class="btn btn-danger deactivate-account">Deactivate
                    Account</button>
            </form>
        </div>
    </div>
</div>

{{-- <script>
    //button create post event
    $('body').on('click', '#btn-create-post', function() {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let title = $('#title').val();
        let content = $('#content').val();
        let token = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({

            url: `/posts`,
            type: "POST",
            cache: false,
            data: {
                "title": title,
                "content": content,
                "_token": token
            },
            success: function(response) {

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
                let post = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.title}</td>
                        <td>${response.data.content}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;

                //append to table
                $('#table-posts').prepend(post);

                //clear form
                $('#title').val('');
                $('#content').val('');

                //close modal
                $('#modal-create').modal('hide');


            },
            error: function(error) {

                if (error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-title').removeClass('d-none');
                    $('#alert-title').addClass('d-block');

                    //add message to alert
                    $('#alert-title').html(error.responseJSON.title[0]);
                }

                if (error.responseJSON.content[0]) {

                    //show alert
                    $('#alert-content').removeClass('d-none');
                    $('#alert-content').addClass('d-block');

                    //add message to alert
                    $('#alert-content').html(error.responseJSON.content[0]);
                }

            }

        });

    });
</script> --}}
