<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
    .upper { text-transform: uppercase; }
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
    .badge {
  display: inline-block;
  padding: 0.25em 0.4em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: 0.25rem; }
  .badge-warning {
  color: #212529;
  background-color: #ffaf00; }
  .badge-warning[href]:hover, .preview-list .preview-item .preview-thumbnail [href].badge.badge-busy:hover, .badge-warning[href]:focus, .preview-list .preview-item .preview-thumbnail [href].badge.badge-busy:focus {
    color: #212529;
    text-decoration: none;
    background-color: #cc8c00; }

.badge-success, .preview-list .preview-item .preview-thumbnail .badge.badge-online {
  color: #fff;
  background-color: #00ce68; }
  .badge-success[href]:hover, .preview-list .preview-item .preview-thumbnail [href].badge.badge-online:hover, .badge-success[href]:focus, .preview-list .preview-item .preview-thumbnail [href].badge.badge-online:focus {
    color: #fff;
    text-decoration: none;
    background-color: #009b4e; }
	</style>
  <link rel="stylesheet" href="">
	<title>Laporan Data Talenta</title>
</head>
<body>

<img id="img-n" width="10000" height="600000" style="display:block; margin:auto;" src="img/gbi.png"/>
<h2 class="center">GEREJA BAPTIS INDONESIA <br> NGADINEGARAN YOGYARKARTA</h2>
<h6 class="center">Alamat: Jalan D.I. Panjaitan No.29 Yogyakarta 55142 INDONESIA<br>
Akte Notaris No.37Th.1973. Terdaftar pada: Dep.Agama RI No.E/Ket/392/1385/75 Telp: 00274-384267 <br>
<hr width="100%" align="center"> </h6>



<h3 class="center">LAPORAN DATA TALENTA </h3>
<h3 class="center upper">{{$talenta->anggota->nama}}</h3>


 <table id="pseudo-demo">
                      <thead>
                        <tr>
                          <th>
                            PELAYANAN
                          </th>
                          <th>
                            JENIS KELAMIN
                          </th>
                          <th>
                            NO HP
                          </th>
                          
                          <th>
                            STATUS KEANGGOTAAN
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                    
                       <tr>


                          <td>
                         
                         {{$talenta->nama_talenta}}
                        </td>
                          

                          <td>
                            {{$talenta->anggota->jk}}
                          </td>
                         
     
                          <td>
                            {{$talenta->anggota->hp}}
                          </td>


                          <td>
                            {{$talenta->anggota->sts_anggota}}
                          </td>
                        </tr>
                      
                      </tbody>
                    </table>
</body>
</html>