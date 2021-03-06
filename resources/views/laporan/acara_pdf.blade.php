<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
		    table {
    border-spacing: 0;
    width: 100%;
    }
    th {
    background: #404853;
    background: linear-gradient(#687587, #404853);
    border-left: 1px solid rgba(0, 0, 0, 0.2);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    color: #fff;
    padding: 8px;
    text-align: left;
    text-transform: uppercase;
    }
    th:first-child {
    border-top-left-radius: 4px;
    border-left: 0;
    }
    th:last-child {
    border-top-right-radius: 4px;
    border-right: 0;
    }
    td {
    border-right: 1px solid #c6c9cc;
    border-bottom: 1px solid #c6c9cc;
    padding: 8px;
    }
    td:first-child {
    border-left: 1px solid #c6c9cc;
    }
    tr:first-child td {
    border-top: 0;
    }
    tr:nth-child(even) td {
    background: #e8eae9;
    }
    tr:last-child td:first-child {
    border-bottom-left-radius: 4px;
    }
    tr:last-child td:last-child {
    border-bottom-right-radius: 4px;
    }
    img {
    	width: 40px;
    	height: 40px;
    	border-radius: 100%;
    }
    .center {
    	text-align: center;
    }
	</style>
  <link rel="stylesheet" href="">
	<title>Laporan Data Acara</title>
</head>
<body>

<img id="img-n" width="10000" height="600000" style="display:block; margin:auto;" src="img/gbi.png"/>

<h2 class="center">GEREJA BAPTIS INDONESIA <br> NGADINEGARAN YOGYARKARTA</h2>
<h6 class="center">Alamat: Jalan D.I. Panjaitan No.29 Yogyakarta 55142 INDONESIA<br>
Akte Notaris No.37Th.1973. Terdaftar pada: Dep.Agama RI No.E/Ket/392/1385/75 Telp: 00274-384267 <br>
<hr width="100%" align="center"> </h6>

<h3 class="center">LAPORAN DATA ACARA</h3>
 <table id="pseudo-demo">
                      <thead>
                        <tr>
                          <th>
                            Acara
                          </th>
                          <th>
                            Tanggal
                          </th>
                          <th>
                            Lokasi
                          </th>
                          <th>
                            Biaya
                          </th>
                          <th>
                            Ket
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                            {{$data->nama_acr}}
                          </td>
                         <td>
                            {{$data->tgl_acara}}
                          </td>
                          <td>
                            {{$data->lokasi}}
                          </td>
                          <td>
                            {{$data->jumlah_acara}}
                          </td>
                          <td>
                            {{$data->ket}}
                          
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
</body>
</html>