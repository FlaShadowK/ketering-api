@extends('adminlte::page')

@section('title_prefix', 'Kreiranje korisnika - ')

@section('content_header')
    <h1>Kreiranje korisnika</h1>
@stop

@section('js')
    <script>
        const imagePreview = document.getElementById('imagePreview');

        const updatePreview = (e) => {

            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                };

                reader.readAsDataURL(file);

            } else {

                imagePreview.src = '';
            }
        }
    </script>
@stop


@section('content')
    <form action="{{ route('users-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col-12">

                <div class="mb-3">
                    <label for="first_name" class="form-label">Ime</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Unesite ime...">
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Prezime</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Unesite prezime...">

                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Korisničko ime</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Unesite korisničko ime...">

                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mejl</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Unesite e-mejl...">

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Sifra</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Unesite sifru...">

                </div>



                <div>
                    <label for="role">Tip naloga</label>
                    <select class="form-control" name="role_id" id="role">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-12 mb-5">
                <x-adminlte-input-file id="fileInput" name="photo" label="Fotografija" placeholder="Otpremite fotografiju..." onchange="updatePreview(event)" disable-feedback />
                <b>Prikaz fotografije</b>
                <div class="d-flex justify-content-center mt-2 border border-black">
                    <img style="max-width: 100%; height: 300px; object-fit: cover;" id="imagePreview" src="" alt="Prikaz nije dostupan.">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2" style="width: 100px">Kreiraj</button>
    </form>
@stop
