@extends('layouts.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{ route('cetak') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" disabled><i class="fas fa-download fa-sm text-white-50"></i> CETAK</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Rawat Inap Pasien <strong class="text-danger">(Hari Ini)</strong></h6>
            <strong class="text-success">{{ $list['akomodasi']['now'] }}</strong>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Bangsal Lt.3</th>
                            <th>Bangsal Lt.4</th>
                            <th>Kebidanan</th>
                            <th>Perinatologi</th>
                            <th>Isolasi</th>
                            <th>ICU</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Total Jml</th>
                            <th colspan="6">{{ $list['akomodasi']['total'][0]->jumlah }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <th>Jml</th>
                            <td>{{ $list['akomodasi']['lt3'][0]->jumlah }}</td>
                            <td>{{ $list['akomodasi']['lt4'][0]->jumlah }}</td>
                            <td>{{ $list['akomodasi']['keb'][0]->jumlah }}</td>
                            <td>{{ $list['akomodasi']['per'][0]->jumlah }}</td>
                            <td>{{ $list['akomodasi']['iso'][0]->jumlah }}</td>
                            <td>{{ $list['akomodasi']['icu'][0]->jumlah }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rekap Kunjungan Pasien</h6>
            <strong class="text-success"><b>{{ $list['kunjungan']['yest'] }}</b></strong><hr>
            <form class="form-inline" action="{{ route('filterKunjungan') }}" method="GET">
                <i class="fas fa-calendar-alt fa-lg fa-fw text-warning"></i>  Filter
                <select onchange="submitBtn()" class="custom-select" style="width: auto;margin-left:10px;margin-right:10px" name="tanggal" id="tanggal" required>
                    <option hidden selected>Tgl</option>
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                    <option value="06">6</option>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                </select>
                <select onchange="submitBtn()" class="custom-select" style="width: auto;margin-right:10px" name="bulan" id="bulan" required>
                    <option hidden selected>Bln</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <select onchange="submitBtn()" class="custom-select" style="width: auto;margin-right:10px" name="tahun" id="tahun" required>
                    <option hidden selected>Thn</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                </select>
                <button id="submit" class="btn btn-primary" disabled>Submit</button>
            </form>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="tabelrekap" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Perincian</th>
                                    <th>Jml</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Total Jml</th>
                                    <th colspan="11">{{ $list['kunjungan']['total'][0]->jumlah }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <th>Rawat Darurat / Poli Umum (IGD)</th>
                                    <td>{{ $list['kunjungan']['igd'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli Anak</th>
                                    <td>{{ $list['kunjungan']['anak'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli Bedah</th>
                                    <td>{{ $list['kunjungan']['bedah'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli Gigi</th>
                                    <td>{{ $list['kunjungan']['gigi'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli Dalam</th>
                                    <td>{{ $list['kunjungan']['dalam'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli Ortopedi</th>
                                    <td>{{ $list['kunjungan']['orto'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli Jiwa</th>
                                    <td>{{ $list['kunjungan']['jiwa'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli Kulit / Kelamin</th>
                                    <td>{{ $list['kunjungan']['kulit'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli THT</th>
                                    <td>{{ $list['kunjungan']['tht'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli Paru</th>
                                    <td>{{ $list['kunjungan']['paru'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Poli Syaraf</th>
                                    <td>{{ $list['kunjungan']['syaraf'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Rehabilitasi Medik</th>
                                    <td>{{ $list['kunjungan']['rehab'][0]->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th>Kebidanan</th>
                                    <td>{{ $list['kunjungan']['keb'][0]->jumlah }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th colspan="2">Pasien Pulang</th>
                                </tr>
                                <tr>
                                    <th>UMUM</th>
                                    <th>BPJS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $list['kunjungan']['umum'][0]->jumlah }}</td>
                                    <td>{{ $list['kunjungan']['bpjs'][0]->jumlah }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>Rawat Inap</th>
                                <th>Laboratorium</th>
                                <th>Radiologi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $list['kunjungan']['inap'][0]->jumlah }}</td>
                                    <td>{{ count($list['kunjungan']['lab']) }}</td>
                                    <td>{{ count($list['kunjungan']['rad']) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function submitBtn() {
        var tanggal = document.getElementById("tanggal").value;
        var bulan = document.getElementById("bulan").value;
        var tahun = document.getElementById("tahun").value;
        if (tanggal != "Tgl" && bulan != "Bln" && tahun != "Thn" ) {
            document.getElementById("submit").disabled = false;
        }
    }
</script>
@endsection
