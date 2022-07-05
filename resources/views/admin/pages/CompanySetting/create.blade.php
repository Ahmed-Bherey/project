@extends('admin.includes.master')
@section('title')
    Company Setting
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- start row --}}
                <div class="row ">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        {{-- start card --}}
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-cog  mr-1"></i>Company Setting</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="{{ route('companysetting.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control input" id="name"
                                                    @isset($compSetts) value="{{ $compSetts->name }}" @endisset
                                                    name="name">
                                                {{-- invalid --}}
                                                <label for="Name">Name</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid name.</div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="ar_name">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input" placeholder="Ar name"
                                                    id="arname"
                                                    @isset($compSetts) value="{{ $compSetts->ar_name }}" @endisset
                                                    name="ar_name">
                                                {{-- invalid --}}
                                                <label for="text">Ar name</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid number.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Fax">
                                                    <i class="fa-solid fa-arrow-down-1-9"></i>
                                                </span>
                                                <input type="text" class="form-control input"
                                                    @isset($compSetts) value="{{ $compSetts->fax }}" @endisset
                                                    id="fax" placeholder="fax" name="fax">
                                                {{-- invalid --}}
                                                <label for="Fax">Fax </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid fax.</div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Address">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="text" class="form-control input"
                                                    @isset($compSetts) value="{{ $compSetts->address }}" @endisset
                                                    id="address" placeholder="Address" name="address">
                                                {{-- invalid --}}
                                                <label for="Address">Address</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid address.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Fax">
                                                    <i class="fa-solid fa-arrow-down-1-9"></i>
                                                </span>
                                                <input type="text" class="form-control input"
                                                    @isset($compSetts) value="{{ $compSetts->cr }}" id="cr" @endisset
                                                    placeholder="cr" name="cr">
                                                {{-- invalid --}}
                                                <label for="Fax">cr </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid cr.</div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="ar_name">
                                                    <i class="fa-solid fa-arrow-down-1-9"></i>
                                                </span>
                                                <input type="number" class="form-control input" placeholder="vat number"
                                                    for="vat number"
                                                    @isset($compSetts) value="{{ $compSetts->tel1 }}" @endisset
                                                    id="vat number" placeholder="vat number" name="vat_no">
                                                {{-- invalid --}}
                                                <label for="vat number">vat number</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid vat number.</div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="email">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control input"
                                                    @isset($compSetts) value="{{ $compSetts->email }}" @endisset
                                                    placeholder="email" name="email">
                                                {{-- invalid --}}
                                                <label for="email">email </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="tel">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input"
                                                    @isset($compSetts) value="{{ $compSetts->tel }}" @endisset
                                                    id="tel" placeholder="tel" name="tel">
                                                {{-- invalid --}}
                                                <label for="tel">tel</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid tel.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="tel">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input"
                                                    @isset($compSetts) value="{{ $compSetts->tel1 }}" @endisset
                                                    id="tel" placeholder="tel" name="tel1">
                                                {{-- invalid --}}
                                                <label for="tel">tel1</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid tel.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="tel2">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input"
                                                    @isset($compSetts) value="{{ $compSetts->tel2 }}" @endisset
                                                    id="te2" placeholder="tel2" name="tel2">
                                                {{-- invalid --}}
                                                <label for="tel2">tel2 </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid tel.</div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="tel3">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input"
                                                    @isset($compSetts) value="{{ $compSetts->tel3 }}" @endisset
                                                    id="tel3" placeholder="tel3" name="tel3">
                                                {{-- invalid --}}
                                                <label for="tel">tel3</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid tel.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="tel4">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input"
                                                    @isset($compSetts) value="{{ $compSetts->tel4 }}" @endisset
                                                    id="tel4" placeholder="tel4" name="tel4">
                                                {{-- invalid --}}
                                                <label for="tel">tel4 </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid tel.</div>
                                            </div>
                                        </div>



                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="logo">
                                                    <i class="fa-solid fa-image"></i>
                                                </span>
                                                <input type="file" required class="form-control input" name="logo"
                                                    id="imgload" accept="jpeg,jpg,png">

                                            </div>
                                        </div>
                                        <div class="photo col-sm-4">
                                            <img src=" @isset($compSetts) {{ asset('/public/' . Storage::url($compSetts->logo)) }} @endisset"
                                                id="imgshow" style="height: 100px;width: auto;">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-default bg-info float-right"><i
                                                class="fa fa-check text-light" aria-hidden="true"></i></button>
                                        <button type="submit" class="btn btn-default mr-3  bg-danger float-right"><i
                                                class="fa fa-times text-light  " aria-hidden="true"></i></button>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                            </form>
                            {{-- end form --}}
                        </div>
                        {{-- end card --}}
                    </div>
                </div>


                {{-- photo show --}}
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $('document').ready(function() {
                        $("#imgload").change(function() {
                            if (this.files && this.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#imgshow').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(this.files[0]);
                            }
                        });
                    });
                </script>

            </div>
        </section>
    </div>
@endsection
