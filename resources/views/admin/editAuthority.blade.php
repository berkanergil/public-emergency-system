@extends('admin.adminDasboard')

@section('statistic_content')
    <div class="row gutters d-flex justify-content-center align-items-center">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card p-5">
                <div class="card-title text-center mt-3">
                    <h3 class="text-danger text-bold">KURS BİLGİLERİNİ DÜZENLE</h3>
                </div>
                <div class="card-body">
                    <form id="" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="title">Kurs İsmi</label>
                                    <input value="" type="text" class="form-control" id="title" name="title">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="description">Kurs Açıklaması</label>
                                    <textarea name="description" class="form-control" id="description"
                                        rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="reset" id="submit" name="submit" class="btn btn-secondary"><i
                                            class="far fa-window-close mr-1"></i> İptal</button>
                                    <button type="submit" id="submit" name="submit" class="btn btn-success"> <i
                                            class="far fa-edit mr-1"></i>Güncelle
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if (session('success'))
                        <div class="container mb-4 d-flex justify-content-center align-items-center text-center"
                            style="color: #23BD55;font-size:25px">
                            {{ session('success') }}
                        </div>
                    @elseif (session('failure'))
                        <div class="container mb-4 d-flex justify-content-center align-items-center text-center"
                            style="color: #AE0E0F;font-size:25px">
                            {{ session('failure') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
