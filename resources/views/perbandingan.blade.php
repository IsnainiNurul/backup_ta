
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
	<script src="/assets/moment.js"></script>
	<script src="/assets/Chart.min.js"></script>
	<script src="/assets/utils.js"></script>
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  {{-- <link href="../assets/demo/demo.css" rel="stylesheet" /> --}}

  <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		#map {
			width: 1200px;
			height: 800px;
		}
	</style>

<style>
    html, body {
    height: 100%;
    margin: 0;
    }
    table.border th,
    table.border td{
    border:1px solid #ccc;
    }
    .map {
    width: 100%;
    height: 510px;
    }
    .leaflet-control-layers input[type=checkbox],
    .leaflet-control-layers input[type=radio] {
    opacity: 1;
    width: 1em;
    }
    .leaflet-popup-content-wrapper {
    background:#2c3e50;
    color:#fff;
    border-radius:3px;
    }
    .leaflet-popup-tip {
    background:#2c3e50;
    }

    table th{	
    box-shadow: 0 -2px 0 #999 inset;
    box-sizing:border-box;
    }/*
    table tbody tr td{
    background:white;
    }
    table.striped tbody tr.active, table.striped tbody tr:hover td, table:not(.nohover) tbody tr.active, table:not(.nohover) tbody tr:hover td {
    background: #ccc !important;
    }
    table.striped tbody tr.active, table.striped tbody tr:hover td, table:not(.nohover) tbody tr.active, table:not(.nohover) tbody tr:hover td{
    background: #aaa;
    }*/
    .sticky.top{top:0}
    
    .legend.info {
    padding: 6px 8px;
    font: 14px/16px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.9);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 5px;
    }
    .legend.info h4 {
    margin: 0 0 5px;
    color: #777;
    }
    
    .legend {
    line-height: 1.3;
    color: #555;
    }
    .legend i {
    width: 18px;
    height: 15px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
    }
    
    .leaflet-bottom.leaflet-left{
    display:flex;
    flex-direction:row-reverse;
    flex-wrap: wrap;
    align-items: flex-end;
    }
    .leaflet-bottom.leaflet-left .leaflet-control{
    flex:1 auto;
    }
    .label:empty {
display: none;
    }
    .empty:empty {
width: 50px;
height: 1em;
display: inline-block;
vertical-align: text-bottom;
background-size: 600% 100%;
background: linear-gradient(90deg,#ccc, #eee);
background-size: 600% 100%;
animation: gradient 1s linear infinite;
animation-direction: alternate;
    }
    @keyframes gradient {
0% {background-position: 0%}
100% {background-position: 100%}
    }
    sup.label{
    font-size:.6em;	
    }
    .label.pin {
    position:relative;
    font-size: 9px;
    padding: 0;
    border-radius: 50%;
    display: inline-block;
    line-height:25px;
    text-align: center;
    white-space:nowrap;
    transition:1s margin;
    }
    .label.pin:before {
    content: '';
    position: absolute;
    background: transparent;
    box-sizing:border-box;
    border: 4px solid white;
    top: -2px;
    left: -2px;
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    z-index: -1;
    border-radius: 50% 50% 50% 0;
    transform:rotate(-45deg);
    }
    .label-text{
    font-size:9px;
    color:#fff;
    text-shadow:1px 1px 3px #333;
    white-space:nowrap;
    text-align:center;
    }
    .map-pin:hover .label.pin{
    margin-top:-20px;
    }
    .map-pin:hover .label.pin:before{
    box-shadow:0 0 5px #333;
    }
.text-bold{font-weight:bold}
.sticky{background:inherit}
.sticky.left{
float:none;
left:0}
.border{border:1px #ccc solid}
table th,table td{text-align:center;padding:0 10px}
</style>
  <style>
  html { height: 100%; overflow:auto; }
  body { height: 100%; }

  th {
  position: -webkit-sticky;
  position: sticky;
  background : white;
  top: 0;
  z-index: 2;
}
ul.b {list-style-type: square;}
  </style>
</head>

<body class="white-content">
  <div class="wrapper">
    <div class="sidebar">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
              <img src="../assets/img/2.png" width="120%" height="120%"> ITS
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            TA History COVID
          </a>
        </div>
        <ul class="nav">
          <li >
            <a href="/">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="/berita">
              <i class="tim-icons icon-atom"></i>
              <p>Berita</p>
            </a>
          </li>
          <li>
            <a href="/perbandingan">
              <i class="tim-icons icon-pin"></i>
              <p>Perbandingan Kota</p>
            </a>
          </li>
          <li class="active ">
            <a href="/prediksi">
              <i class="tim-icons icon-bell-55"></i>
              <p>Prediksi</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">   <img src="../assets/img/lambangits.png" width="4%" height="4%"> ITS</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <h1 style='text-align:center; font-family: "Bookman Old Style", serif; font-size:35px;'>PERBANDINGAN POLA PENYEBARAN KASUS COVID-19 DI JAWA TIMUR </h1>
                <div>
                
                <div id='map'></div>

                  <strong>
                  Keterangan :
                  </strong>
                  <br>
                  <em style="font-family:Georgia, serif; font-size: 16px">
                  <ul class="b">
                  <li>
                  Sistem informasi ini menampilkan visualisasi perbandingan pola penambahan kasus
                  di suatu kabupaten dengan kabupaten tetangganya di Jawa Timur dengan Bland Altman Plot.
                  </li>
                  <li>
			              Grafik Bland Altman menunjukkan tingkat selisih dan rata-rata pola kasus pada kabupaten dan Tetangganya.
                  </li>
                  <li>
                    Jika semakin mendekati garis biru, perbandingan antara kedua kota tersebut memiliki pola yang semakin mirip, dan jika semakin menjauhi garis biru, polanya semakin tidak mirip.
                  </li>
                  </em>
                  <b style="font-family:Georgia, serif; font-size: 16px"">
                  <li>
                    Sumbu X : selisih jumlah kasus di Kabupaten dengan tetangganya
                  </li>
                  <li>
                    Sumbu Y : rata-rata jumlah kasus di Kabupaten dengan tetangganya
                  </li>
                  </b>
                  </ul>
                </div>
                  <em style="font-family:Georgia, serif; font-size: 17px"">
                  Untuk mengetahui perbandingan Kabupaten dengan tetangganya dari range tanggal tertentu, silahkan input tanggal mulai dan tanggal berakhir :
                  </em>
                <form action='/perbandingan/update' method='get'>
                  <div class="card-body">
                  <label style= "font-size: 14px">Tanggal Mulai</label>
                  <input type='date' name='mulai' value='{{$mulai}}' required> 
                  <label style= "font-size: 14px">Tanggal Berakhir</label>
                  <input type='date' name='akhir' value='{{$akhir}}' required>
	            	  <input type='submit' value='update'>
	              </form>
                <div class="card-body">
                  <label for="Kabupaten" style= "font-size: 14px">Kabupaten :</label>
                  <form method='get' action='/perbandingan'>
                    <select id="Kabupaten" name='tetangga'>
                      <option value="">{{$data->kabupaten}}</option>
                        @foreach($kabupaten as $k)
                      <option value="{{$k->id}}">{{$k->kabupaten}}</option>
                        @endforeach
                    </select> 
                  <input type='submit' name='submit'>
                  </form>
                  <br>
                      <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Data Tabel</button>
                      <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog"> -->
        
                        <!-- Modal content-->
                        <!-- <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Data Tabel</h4>
                          </div>
                          <div class="modal-body">
                            <p>Isi tabel range waktu</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div> -->   
              </div>

              @foreach ($data_all as $semua)
              <div class="container">
                <div class ="row">
                  <div class="col-sm-6">
                    <div class="card-body" class="col-sm-6">
                      <div style="width:600px">
                      <p><h2 style='text-align:center; font-family: "Bookman Old Style", serif;'>{{$semua->kabupaten}} >< {{$semua->tetangga}}</h2>
                      <p><h2 style='text-align:center; font-family: "Bookman Old Style", serif;'>Korelasi Pearson : {{$semua->pearson}}</h2>
                        <canvas id="chart{{$semua->tetangga}}"></canvas>
                        <canvas id="charts{{$semua->tetangga}}"></canvas>
                        <a href='/perbandingan/regresi?kota={{$semua->kabupaten}}&tetangga={{$semua->tetangga}}&mulai={{$mulai}}&akhir={{$akhir}}'><button type="button" class="btn btn-info btn-lg" >Regresi Linear</button></a>
                        
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modalbiareror" onclick="gettabel('{{$semua->tetangga}}')" data-target="#myModal{{$semua->tetangga}}">Data Tabel</button>
                        <form  target="_blank" action="/perbandingan/data" method="post">
                           @csrf
                        <input type="hidden" name="text_html" id='html{{$semua->tetangga}}'>
                        <input type="submit" style='display: none' value="" id="submit{{$semua->tetangga}}">
                        
                        </form>
                        <!-- <div class="modal fade bd-example-modal-lg" id="myModal{{$semua->tetangga}}" role="dialog"> -->
                        <div class="modal" style='position: fix;left: 50%;top: 80%;transform: translate(-50%, -80%);' id="myModal{{$semua->tetangga}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" style='position: fix;left: 30%;transform: translate(-50%, 0%);' >
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                <h4 class="modal-title">Data Tabel {{$semua->tetangga}}</h4>

                              </div>
                              <div class="modal-body">
                                <p>kabupaten = {{$semua->kabupaten}}</p>
                                <p>Tetangga = {{$semua->tetangga}}</p>
                                <p>Rata rata = {{$semua->mean}}</p>
                                <p>minimal = {{$semua->min}}</p>
                                <p>max = {{$semua->max}}</p>
                                <?php 
                                $tes = substr($semua->m1, 2, -1);
                                $m1 = explode(",",$tes);

                                
                                $tes = substr($semua->m2, 2, -1);
                                $m2 = explode(",",$tes);

                                
                                $tes = substr($semua->x, 2, -1);
                                $x = explode(",",$tes);

                                
                                $tes = substr($semua->y, 2, -1);
                                $y = explode(",",$tes);
                                ?>
                                <p></p>
                                <div class="container">
                                <div class="row">
                                <table class="table table-fixed">
                                <thead>
                                <tr>
                                  <th >Nomor</th>
                                  <th >{{$semua->kabupaten}}</th>
                                  <th>{{$semua->tetangga}}</th>
                                  <th>Mean (A+B)/2</th>
                                  <th>Diff (A - B)</th>
                                  <th>(Diff / Mean)</th>
                                </tr>
                              </thead>

                              <tbody>
                              <?php $date = date_create((string)$mulai); ?>
                              @for ($i = 0; $i < count($x); $i++)
                                <tr><?php 
                                $tambah = 0;
                                if($i>0){$tambah = 1;}
                                $hari = (string)($tambah);
                                $hari = $hari." days";
                                date_add($date,date_interval_create_from_date_string($hari)); ?>
                                  <td>{{date_format($date,"Y-m-d")}}</td>
                                  <td>{{(int)$m1[$i]}}</td>
                                  <td>{{(int)$m2[$i]}}</td>
                                  <td>{{     (float)(((int)$m1[$i]+(int)$m2[$i])/2)    }}</td>
                                  <td>{{(int)$m1[$i] - (int)$m2[$i]}}</td>
				<td> @if(( (float)(((int)$m1[$i]+(int)$m2[$i])/2) ) != 0) {{sprintf('%0.2f',    (   (int)$m1[$i] - (int)$m2[$i]   )        / ( (float)(((int)$m1[$i]+(int)$m2[$i])/2)   ))   }}@else Tak Hingga @endif </td>
				</tr>
                              @endfor
                              
                              </tbody>
                            </table>
                            </div>
                            </div>

                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
 
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                 TA History COVID
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Blog
              </a>
            </li>
          </ul>
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>2018 made with <i class="tim-icons icon-heart-2"></i> by
            <a href="javascript:void(0)" target="_blank"> TA History COVID</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/black-dashboard" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
          <a href="https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block btn-round">
            Documentation
          </a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
          <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
      </ul>
    </div>
  </div>
  
  <script>
  var plugins = [
    {
      id: 'customPlugin',
      beforeDraw: chart => {
        const datasets = chart.config.data.datasets;
        if (datasets) {
          const { ctx } = chart.chart;

          ctx.save();
          ctx.fillStyle = 'black';
          ctx.font = '400 12px Open Sans, sans-serif';

          for (let i = 0; i < datasets.length - 1; i++) {
            const ds = datasets[i];
            const label = ds.label;
            const meta = chart.getDatasetMeta(i);
            const len = meta.data.length - 1;
            const xOffset = chart.canvas.width - 120;
            const yOffset = meta.data[len]._model.y-20;
            if(label =='Data'){continue;}
            ctx.fillText(label, xOffset, yOffset);
          }
          ctx.restore();
        }
      }
    }
  ];
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	
		
  var loop = {!! json_encode($tetangga) !!};

  var data_all = {!! json_encode($data_all) !!};
  console.log(data_all);
  array_loop = [];
  
  for (var i = 0; i < data_all.length; i++) {
    array_loop.push(i);
  }
  console.log(array_loop);

  array_loop.forEach(myFunction);

  array_loop.forEach(myFunctions);

  function myFunction(item) {
  var x = data_all[item]['x'];
  x = x.replace('[','').replace(']','').split(',');
  var y = data_all[item]['y'];
  y = y.replace('[','').replace(']','').split(',');
  console.log(y[0]);
  var array_obj = [];
  var xx = [];
  var yy = [];
  for (var i = 0; i < x.length; i++) {
    
  var obj={};
   obj['x'] = x[i];
   obj['y'] = y[i];
  if(x[i] > 0 || x[i] <0){
    
  array_obj.push(obj);
  
  xx.push(parseFloat(x[i]));
  yy.push(parseFloat(y[i]));
  }
}
  console.log(array_obj);
  console.log(Math.min.apply(Math, xx));
  console.log(Math.max.apply(Math, xx));

const data = {
  
  datasets: [{
    type: 'scatter',
    label: 'Data',
    data: array_obj,
    backgroundColor: 'rgb(0, 99, 132)'
  }, {
    type: 'line',
    label: 'Minimum : '+data_all[item]['min'],
    data: [{
      x: Math.min.apply(Math, xx),
      y: data_all[item]['min'],
    }, {
      x: Math.max.apply(Math, xx),
      y: data_all[item]['min'],
    },],
    fill: false,
    borderDash: [10, 30],//untuk bintik bintik
    borderColor: 'rgb(255, 0, 0)'
  },{
    type: 'line',
    label: 'Max : '+data_all[item]['max'],
    data: [{
      x: Math.min.apply(Math, xx),
      y: data_all[item]['max'],
    }, {
      x: Math.max.apply(Math, xx),
      y: data_all[item]['max'],
    },],
    fill: false,
    
    borderDash: [10, 30],//untuk bintik bintik
    borderColor: 'rgb(255, 0, 0)'
  },{
    type: 'line',
    label: 'Mean : '+data_all[item]['mean'],
    data: [{
      x: Math.min.apply(Math, xx),
      y: data_all[item]['mean'],
    },{
      x: Math.max.apply(Math, xx),
      y: data_all[item]['mean'],
    },],
    fill: false,
    
    borderColor: 'rgb(54, 162, 235)'
  },{label:''}]
};
console.log(xx);
console.log('Min xx =='+Math.min.apply(Math, xx));
console.log('Max xx =='+Math.max.apply(Math, xx));
console.log('min==='+data_all[item]['min']);
console.log('max==='+data_all[item]['max']);
console.log('mean==='+data_all[item]['mean']);


var name = 'chart'+data_all[item]['tetangga'];

var ctx = document.getElementById(name).getContext('2d');
		ctx.canvas.width = 1000;
		ctx.canvas.height = 500;
    
		var chart = new Chart(ctx, {
      type: 'scatter',
        data: data,
        plugins:plugins,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }, 
          yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'RATA-RATA'+' '+data_all[item]['kabupaten']+'-'+data_all[item]['tetangga']
          }
        }],
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: data_all[item]['kabupaten']+'-'+data_all[item]['tetangga']
          }
        }],
          }
        }

      
    });
}

function myFunctions(item) {
  var x = data_all[item]['m1'];
  x = x.replace('[','').replace(']','').split(',');
  var y = data_all[item]['m2'];
  y = y.replace('[','').replace(']','').split(',');
  console.log(y[0]);
  var array_obj = [];
  var xx = [];
  var yy = [];
    for (var i = 0; i < x.length; i++) {
      
    var obj={};
    obj['x'] = x[i];
    obj['y'] = y[i];
    if(x[i] > 0 || x[i] <0){
      
    array_obj.push(obj);
    
    xx.push(parseFloat(x[i]));
    yy.push(parseFloat(y[i]));
    }
    
  }

  console.log(array_obj);
  console.log(Math.min.apply(Math, xx));
  console.log(Math.max.apply(Math, xx));
  var x_terbesar = Math.max.apply(Math, xx);
  var y_terbesar = Math.max.apply(Math, yy);
  var terbesar = y_terbesar;
  if(x_terbesar > y_terbesar){
    terbesar = x_terbesar;
  }
 console.log('--------------------------------------');
 console.log(terbesar);
 console.log('--------------------------------------');
const data = {
  
  datasets: [{
    type: 'scatter',
    label: 'Data',
    data: array_obj,
    backgroundColor: 'rgb(0, 99, 132)'
  },{label:''}]
};
console.log(xx);
console.log('Min xx =='+Math.min.apply(Math, xx));
console.log('Max xx =='+Math.max.apply(Math, xx));
console.log('min==='+data_all[item]['min']);
console.log('max==='+data_all[item]['max']);
console.log('mean==='+data_all[item]['mean']);


var name = 'charts'+data_all[item]['tetangga'];

var ctx = document.getElementById(name).getContext('2d');
		ctx.canvas.width = 1000;
		ctx.canvas.height = 500;
    
		var chart = new Chart(ctx, {
      type: 'scatter',
        data: data,
        plugins:plugins,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }, 
          yAxes: [{
          scaleLabel: {
            display: true,
            labelString: data_all[item]['kabupaten']
          },
          ticks: {
                beginAtZero: true,
                max : terbesar-(terbesar%100)+Math.round(terbesar/1000)*100,callback: function(value, index, values) {
                  if (value >=1000){
             return value/1000+'K'}
             return value;
           }
            }
        }],
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: data_all[item]['tetangga']
          },
          ticks: {
                beginAtZero: true,
                max : terbesar-(terbesar%100)+Math.round(terbesar/1000)*100,callback: function(value, index, values) {
                  if (value >=1000){
             return value/1000+'K'}
             return value;
           }
            }
        }],
          }
        }

      
    });
}
	</script>

  <script>
  function gettabel(id){
    var table = document.getElementById('myModal'+id).getElementsByTagName('table')['0'].innerHTML;
    document.getElementById("html"+id).value = table;
    document.getElementById("submit"+id).click();
    console.log(table);
  }


  </script>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  

<script type="text/javascript">
var euCountries  = {
    type: "FeatureCollection",
    features: [{
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[113.1244948, -6.8927977], [113.1162642, -6.9153555], [113.1152495, -6.9368088], [113.1018294, -6.9318383], [113.0952452, -6.945339], [113.1088561, -6.9731834], [113.112686, -6.988838], [113.1346129, -6.9773862], [113.1476897, -6.9838884], [113.1388396, -7.0060136], [113.1332167, -7.0359108], [113.1152266, -7.0317356], [113.1119689, -7.0596902], [113.1201324, -7.0801074], [113.107582, -7.0798709], [113.1160277, -7.1041772], [113.1072768, -7.107961], [113.1032943, -7.1261146], [113.0942382, -7.1361454], [113.0972136, -7.1551273], [113.0789107, -7.1510251], [113.0706557, -7.1621468], [113.0575942, -7.1636703], [113.0482253, -7.1838253], [113.0612868, -7.1901896], [113.0403722, -7.2128792], [112.9662739, -7.1987125], [112.9193627, -7.1840579], [112.8908107, -7.1779333], [112.8716275, -7.1654234], [112.8525559, -7.165483], [112.7996413, -7.1577334], [112.776375, -7.1595642], [112.7518937, -7.1709588], [112.719218, -7.1720318], [112.6917607, -7.1548464], [112.7046182, -7.1098103], [112.7016656, -7.0939598], [112.6861045, -7.0955696], [112.6735942, -7.0731237], [112.6739567, -7.060001], [112.6828803, -7.0319026], [112.7135801, -7.0406312], [112.7234411, -7.0384799], [112.7382986, -7.0218267], [112.7745336, -6.9980312], [112.8118356, -6.9559873], [112.8468464, -6.8990552], [112.8636217, -6.8919178], [112.8888666, -6.8906751], [112.9213058, -6.8940325], [112.9518042, -6.8871054], [112.9698291, -6.8890091], [113.0103385, -6.8810001], [113.0635983, -6.8819345], [113.0875729, -6.8889105], [113.1244948, -6.8927977]]]
        },
        properties: {
            id: "1",
            name: "BANGKALAN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[113.8380577, -8.5525761], [113.8554228, -8.5153698], [113.8421324, -8.4943213], [113.8532332, -8.4325842], [113.8758314, -8.4157566], [113.8921431, -8.4109043], [113.91024, -8.441873], [113.9346846, -8.4223817], [113.9444807, -8.3975881], [113.9272612, -8.3798965], [113.9131468, -8.3404802], [113.9268873, -8.3279451], [113.9210585, -8.3090118], [113.9333189, -8.2834524], [113.9342344, -8.2555116], [113.9442366, -8.2444853], [113.9593733, -8.2432588], [113.9679258, -8.2219718], [113.959648, -8.2039493], [113.9707258, -8.1895336], [113.9908827, -8.1826147], [114.0042417, -8.1621851], [114.0239332, -8.1403478], [114.0432966, -8.1338056], [114.0604246, -8.1224235], [114.0813749, -8.1255515], [114.0917433, -8.1161512], [114.1287229, -8.1097624], [114.135246, -8.1029113], [114.1703336, -8.108146], [114.1836774, -8.1209681], [114.1960676, -8.1032297], [114.2132719, -8.1000159], [114.2194211, -8.0748598], [114.2311399, -8.0704252], [114.2468946, -8.0542585], [114.2480924, -8.0433647], [114.2357862, -8.0309794], [114.2384488, -8.006901], [114.2243421, -7.9866621], [114.2496946, -7.939358], [114.2713239, -7.9195911], [114.2831342, -7.8972361], [114.2991331, -7.8857462], [114.3447186, -7.9114806], [114.3615338, -7.914375], [114.3967282, -7.9269234], [114.4135434, -7.9401198], [114.4238986, -7.9354567], [114.4226624, -7.9610056], [114.4301491, -7.9970158], [114.425699, -8.0144022], [114.4338308, -8.0302563], [114.4291275, -8.04517], [114.4301052, -8.065418], [114.4187507, -8.078411], [114.4156566, -8.0923571], [114.3980296, -8.124329], [114.4020933, -8.1474074], [114.3852873, -8.1867702], [114.382087, -8.203206], [114.3905928, -8.2327583], [114.3662018, -8.2789575], [114.3648727, -8.3091767], [114.3577465, -8.3263644], [114.360105, -8.3380577], [114.3523611, -8.3549309], [114.3518837, -8.3741405], [114.339995, -8.4266591], [114.3420351, -8.4386343], [114.3555144, -8.4582154], [114.355487, -8.469605], [114.3656999, -8.4925324], [114.3520546, -8.524918], [114.3672895, -8.5370136], [114.3784046, -8.5267854], [114.3854856, -8.505055], [114.3874527, -8.4789003], [114.3827443, -8.4481207], [114.3989312, -8.4588816], [114.3969466, -8.4943926], [114.4096658, -8.5154145], [114.4014983, -8.533933], [114.4100143, -8.5745024], [114.4238787, -8.6049734], [114.4325623, -8.6122799], [114.4391067, -8.630531], [114.4582486, -8.638353], [114.4730496, -8.6174663], [114.488482, -8.6296367], [114.5057, -8.635813], [114.5142875, -8.6501964], [114.5482064, -8.6593772], [114.5618452, -8.6557657], [114.588972, -8.687051], [114.6056347, -8.7166323], [114.5891999, -8.7621052], [114.5664376, -8.773443], [114.5363756, -8.7804544], [114.5047687, -8.7755052], [114.4770837, -8.7604192], [114.4465538, -8.7529878], [114.41578, -8.7493339], [114.400817, -8.7529408], [114.3696897, -8.7504635], [114.3446092, -8.7425256], [114.3441433, -8.7333312], [114.3715754, -8.7176895], [114.3772378, -8.6987812], [114.369452, -8.6703671], [114.3499527, -8.6458123], [114.312513, -8.6210526], [114.2483196, -8.5997853], [114.2296509, -8.6026841], [114.229941, -8.6206659], [114.2207048, -8.6451322], [114.1855148, -8.6403049], [114.1594207, -8.6269663], [114.1390373, -8.6212238], [114.0949947, -8.6149101], [114.0783975, -8.6248008], [114.0593417, -8.6267146], [114.0499371, -8.6389664], [114.0314181, -8.6299218], [114.032009, -8.6148379], [114.0258336, -8.5948416], [114.0070267, -8.5894438], [113.9981582, -8.6024618], [113.9637884, -8.6167655], [113.9469597, -8.5988937], [113.9656343, -8.5962921], [113.9686196, -8.5845824], [113.9621147, -8.5706642], [113.9444452, -8.5583073], [113.9256709, -8.5602118], [113.9237456, -8.573603], [113.9089441, -8.5798804], [113.8963656, -8.5673104], [113.855414, -8.5520483], [113.8380577, -8.5525761]]]
        },
        properties: {
            id: "2",
            name: "BANYUWANGI"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.4784288, -7.7676579], [112.5008468, -7.7613081], [112.5150451, -7.740681], [112.5294952, -7.7352751], [112.5335617, -7.7249902], [112.5748672, -7.732704], [112.5882415, -7.7654565], [112.5866546, -7.7829822], [112.5699004, -7.8166974], [112.5643157, -7.8794726], [112.5833053, -7.888624], [112.5949935, -7.9021533], [112.5758514, -7.9171084], [112.5679321, -7.9131163], [112.530281, -7.9207567], [112.5149764, -7.9202036], [112.4851684, -7.9326728], [112.4739303, -7.9324878], [112.4756011, -7.9030656], [112.4883346, -7.8804201], [112.4948272, -7.8558677], [112.495407, -7.8128127], [112.4880294, -7.8030656], [112.4872894, -7.7850045], [112.4784288, -7.7676579]]]
        },
        properties: {
            id: "30",
            name: "KOTA BATU"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.9568862, -7.9967746], [111.9770736, -8.0114669], [111.9775467, -7.9963454], [112.0190353, -7.9994864], [112.0537262, -7.9886169], [112.090805, -7.991578], [112.0963287, -7.970045], [112.1141204, -7.9774226], [112.154335, -7.9769057], [112.1799926, -7.973401], [112.201332, -7.9640402], [112.2161865, -7.9627136], [112.2631225, -7.9444364], [112.2989349, -7.9370622], [112.3065795, -7.9292973], [112.3565597, -7.9465297], [112.370491, -7.9572672], [112.4041442, -7.9344066], [112.4103012, -7.9346288], [112.4469146, -7.9117006], [112.4514846, -7.9275383], [112.4745101, -7.9581178], [112.4788818, -7.9720562], [112.4693527, -7.9852303], [112.4713363, -7.9953011], [112.4540481, -8.0617951], [112.457756, -8.0674361], [112.4542694, -8.1067065], [112.4584426, -8.118018], [112.4524536, -8.1443642], [112.4311905, -8.1586016], [112.3716354, -8.1706408], [112.367897, -8.1838979], [112.3853072, -8.1922387], [112.3830261, -8.2074269], [112.3931656, -8.2315692], [112.3812637, -8.2462367], [112.3846435, -8.281308], [112.3826904, -8.2959088], [112.3713607, -8.310913], [112.3585165, -8.3487574], [112.3465133, -8.3498409], [112.3337593, -8.3331763], [112.3182621, -8.3419783], [112.285245, -8.3323321], [112.2666712, -8.3488654], [112.2570962, -8.3442412], [112.2208392, -8.3426387], [112.222831, -8.3318698], [112.1699764, -8.320453], [112.1546962, -8.3287869], [112.1415776, -8.3155922], [112.1297768, -8.3255659], [112.1206804, -8.3154184], [112.0982297, -8.3181543], [112.0542306, -8.3173993], [112.034106, -8.3193454], [112.02849646, -8.31234825], [112.0322418, -8.2948855], [112.0236816, -8.2810954], [112.030632, -8.2626819], [112.0226516, -8.2442588], [112.0278473, -8.2019805], [112.0229721, -8.1932773], [112.0286255, -8.1690177], [112.0594635, -8.1842002], [112.0785827, -8.1875171], [112.1048965, -8.1580886], [112.116539, -8.1576146], [112.119873, -8.1273459], [112.0911712, -8.1106814], [112.0813675, -8.119274], [112.0681686, -8.1121825], [112.0451507, -8.1085271], [112.0370102, -8.1020354], [112.0030746, -8.0954408], [111.9913254, -8.0786952], [111.9946289, -8.059328], [111.9748687, -8.0443534], [111.9568862, -7.9967746]], [[112.1324615, -8.0907077], [112.1401672, -8.0963248], [112.1501007, -8.1212911], [112.1669769, -8.1336507], [112.1958389, -8.0879993], [112.199501, -8.0679692], [112.173149, -8.0580291], [112.1623382, -8.0840005], [112.1470794, -8.0801066], [112.1324615, -8.0907077]]]
        },
        properties: {
            id: "3",
            name: "BLITAR"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.1324615, -8.0907077], [112.1470794, -8.0801066], [112.1623382, -8.0840005], [112.173149, -8.0580291], [112.199501, -8.0679692], [112.1958389, -8.0879993], [112.1669769, -8.1336507], [112.1501007, -8.1212911], [112.1401672, -8.0963248], [112.1324615, -8.0907077]]]
        },
        properties: {
            id: "31",
            name: "KOTA BLITAR"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.6227417, -6.9860339], [111.6525955, -7.0001535], [111.6602859, -7.0393614], [111.6748886, -7.0486569], [111.6945953, -7.0540828], [111.6923065, -7.0635423], [111.7131195, -7.08116], [111.7435226, -7.0841235], [111.7533874, -7.0932841], [111.7674484, -7.0836071], [111.7943497, -7.0820641], [111.8210678, -7.087203], [111.8542862, -7.1143789], [111.8635635, -7.128273], [111.8792953, -7.1324457], [111.8970642, -7.1301984], [111.9129791, -7.137649], [111.9312973, -7.13346], [111.9302063, -7.1543407], [111.9426498, -7.1547069], [111.9512786, -7.1332235], [111.985878, -7.1396927], [111.9976425, -7.122229], [112.0100632, -7.0942387], [112.0348053, -7.0771693], [112.047409, -7.0775413], [112.0791626, -7.0660133], [112.0856475, -7.0855607], [112.115509, -7.089724], [112.1225433, -7.1081719], [112.1336898, -7.0983433], [112.154541, -7.1101183], [112.1625366, -7.1117882], [112.1614456, -7.1358012], [112.1402206, -7.1574511], [112.1262588, -7.183443], [112.1186523, -7.2112316], [112.1093444, -7.2225031], [112.0895843, -7.2279228], [112.0843429, -7.2595796], [112.0920486, -7.266662], [112.0900192, -7.2980766], [112.0725631, -7.3332538], [112.0885009, -7.3578748], [112.0815277, -7.3825549], [112.0692901, -7.3969942], [112.0487518, -7.3944348], [112.0203552, -7.4075865], [111.9986725, -7.4033827], [111.97126, -7.4049796], [111.958023, -7.413319], [111.9585724, -7.4296431], [111.940361, -7.4401211], [111.9053573, -7.4333224], [111.87397, -7.4409756], [111.8609771, -7.4359383], [111.8209991, -7.4395546], [111.800415, -7.4610981], [111.770462, -7.4696397], [111.7373123, -7.4509038], [111.7167053, -7.4432139], [111.6845398, -7.4166159], [111.6712189, -7.4095425], [111.630722, -7.3897395], [111.5969925, -7.3592395], [111.574913, -7.3485622], [111.5498275, -7.3614325], [111.546875, -7.3692159], [111.5235443, -7.3715129], [111.5135422, -7.3628964], [111.4720917, -7.3574147], [111.46192, -7.362003], [111.4461358, -7.3368034], [111.4578813, -7.3236677], [111.4475048, -7.3134374], [111.4267819, -7.3128161], [111.4565729, -7.2593325], [111.4695513, -7.2618768], [111.4866775, -7.2446623], [111.503672, -7.2478765], [111.5210581, -7.2381699], [111.5637642, -7.1913208], [111.5863645, -7.1856952], [111.5841329, -7.1709629], [111.6106262, -7.1419649], [111.6079254, -7.1282324], [111.6163177, -7.104474], [111.6125336, -7.0822191], [111.6258163, -7.072834], [111.6289825, -7.0597395], [111.6172943, -7.0472693], [111.6129989, -7.010746], [111.6227417, -6.9860339]]]
        },
        properties: {
            id: "4",
            name: "BOJONEGORO"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[113.6237791, -7.9614563], [113.637123, -7.9495879], [113.6607665, -7.9378658], [113.6709364, -7.9202686], [113.688484, -7.9038081], [113.6998518, -7.8993511], [113.706787, -7.8858585], [113.7224577, -7.8790278], [113.7337187, -7.8316922], [113.733528, -7.8096385], [113.7473601, -7.7962508], [113.7704085, -7.7963438], [113.793434, -7.8028102], [113.8090819, -7.8131113], [113.8368834, -7.8123073], [113.84951, -7.795577], [113.8967207, -7.7982783], [113.9368208, -7.7917294], [113.9357069, -7.7764353], [113.9508436, -7.7652306], [113.9890287, -7.7810391], [114.0051039, -7.7625336], [114.044235, -7.7583946], [114.0712431, -7.7614654], [114.0806119, -7.7955421], [114.088661, -7.8056725], [114.0891645, -7.8242658], [114.0952909, -7.839722], [114.0919111, -7.8622855], [114.0942304, -7.8808363], [114.1109236, -7.9089382], [114.1137845, -7.9428642], [114.1320035, -7.9883335], [114.1662366, -7.9704449], [114.1766813, -7.9695017], [114.2116926, -7.9777634], [114.2243421, -7.9866621], [114.2384488, -8.006901], [114.2357862, -8.0309794], [114.2480924, -8.0433647], [114.2468946, -8.0542585], [114.2311399, -8.0704252], [114.2194211, -8.0748598], [114.2132719, -8.1000159], [114.1960676, -8.1032297], [114.1836774, -8.1209681], [114.1703336, -8.108146], [114.135246, -8.1029113], [114.1287229, -8.1097624], [114.0917433, -8.1161512], [114.0813749, -8.1255515], [114.0604246, -8.1224235], [114.0432966, -8.1338056], [114.0295179, -8.114612], [114.0282362, -8.0951122], [114.000778, -8.069239], [113.9871671, -8.066954], [113.9701994, -8.0549539], [113.960861, -8.0559172], [113.9188383, -8.0252089], [113.886421, -8.0124783], [113.879257, -8.0334477], [113.8543775, -8.0453362], [113.8123854, -8.0461945], [113.8058012, -8.0563178], [113.7860106, -8.0519204], [113.7719801, -8.0383401], [113.753784, -8.0519023], [113.7397154, -8.0468831], [113.7261885, -8.0235725], [113.710121, -8.0111976], [113.6872404, -8.0115133], [113.6721342, -7.9870434], [113.6708525, -7.9682727], [113.64356, -7.9731229], [113.6237791, -7.9614563]]]
        },
        properties: {
            id: "5",
            name: "BONDOWOSO"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "MultiPolygon",
            coordinates: [[[[112.4400656, -6.87452484], [112.44744515, -6.87483706], [112.4654637, -6.8911855], [112.5040791, -6.9067643], [112.5197989, -6.9057292], [112.5358584, -6.886817], [112.5403323, -6.860525], [112.5564551, -6.8470311], [112.5750079, -6.8615476], [112.5766468, -6.8795408], [112.5927443, -6.8919087], [112.6070952, -6.8764945], [112.619042, -6.909668], [112.6168063, -6.9176195], [112.5940792, -6.9264097], [112.5969048, -6.9513813], [112.6151331, -6.9889518], [112.6295456, -7.0064826], [112.6504603, -7.0201909], [112.6452888, -7.0330055], [112.6529672, -7.0417561], [112.6475574, -7.0594526], [112.6369214, -7.0724442], [112.6343894, -7.0980713], [112.6224468, -7.1109166], [112.6311243, -7.1349766], [112.6478219, -7.128147], [112.6515509, -7.1435039], [112.6662183, -7.1594217], [112.6657342, -7.1914998], [112.6397738, -7.1924241], [112.6096787, -7.2077778], [112.6004881, -7.2024996], [112.5978998, -7.2285691], [112.6171729, -7.2575595], [112.6328149, -7.2632976], [112.628158, -7.2853664], [112.6293998, -7.311618], [112.6492011, -7.3145899], [112.6502494, -7.3267023], [112.665226, -7.3401748], [112.6645692, -7.3514405], [112.6289367, -7.36808], [112.6182403, -7.366362], [112.5927123, -7.3722971], [112.5657501, -7.3980735], [112.5439529, -7.4047111], [112.5250549, -7.3972391], [112.4953307, -7.4081], [112.4755859, -7.3848327], [112.4743804, -7.3707894], [112.4821014, -7.3489936], [112.4800033, -7.3074673], [112.4660567, -7.312692], [112.4442901, -7.3050192], [112.4377822, -7.3134516], [112.4088897, -7.3142828], [112.3927459, -7.3325066], [112.3682556, -7.3247298], [112.4009704, -7.3141216], [112.4119873, -7.2735456], [112.3992538, -7.2662891], [112.4073486, -7.2469968], [112.4400634, -7.2179774], [112.45755, -7.2065185], [112.4724731, -7.2087787], [112.4791412, -7.1978644], [112.5015411, -7.1923669], [112.5090942, -7.1723479], [112.50521, -7.1632002], [112.4871139, -7.1661814], [112.4723052, -7.1595605], [112.4760894, -7.1256312], [112.4875411, -7.1288227], [112.5012435, -7.106789], [112.519165, -7.1079386], [112.5359039, -7.0956892], [112.5316924, -7.0821794], [112.5451507, -7.0590156], [112.5247192, -7.0392297], [112.5140075, -7.0411871], [112.4983978, -7.0309962], [112.5120315, -7.0129632], [112.4803848, -7.0029806], [112.4603805, -7.0083703], [112.4533538, -7.0014003], [112.4269638, -7.0019816], [112.4216613, -6.9959739], [112.367134, -6.9777292], [112.3756866, -6.9545988], [112.3909683, -6.9601001], [112.4068679, -6.9577144], [112.4122238, -6.9453934], [112.4234695, -6.9468116], [112.4286117, -6.9295076], [112.4217452, -6.9121374], [112.4485626, -6.8846558], [112.4400656, -6.87452484]]], [[[112.5695014, -5.8093093], [112.5824135, -5.8051839], [112.5899285, -5.7758825], [112.612347, -5.7683901], [112.6156219, -5.7488675], [112.6242983, -5.7497825], [112.6464862, -5.7302221], [112.6692206, -5.7371663], [112.6741075, -5.7232404], [112.6881516, -5.7234593], [112.7044916, -5.7354316], [112.7216953, -5.7380576], [112.7361926, -5.7663272], [112.7320808, -5.7764946], [112.7393339, -5.7895708], [112.7280307, -5.8179763], [112.7338779, -5.8310993], [112.7133, -5.8464207], [112.6851851, -5.8558662], [112.6520544, -5.852643], [112.6324013, -5.8447191], [112.6205948, -5.8560396], [112.5917959, -5.8555514], [112.5745708, -5.8269474], [112.5695014, -5.8093093]]]]
        },
        properties: {
            id: "6",
            name: "GRESIK"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "MultiPolygon",
            coordinates: [[[[113.303859, -8.3064777], [113.3094557, -8.2988926], [113.319702, -8.2655684], [113.3131713, -8.2287079], [113.3271712, -8.2208811], [113.3333892, -8.2082831], [113.3443373, -8.2078215], [113.3678893, -8.1850859], [113.3667296, -8.1679102], [113.3795851, -8.1572253], [113.3765639, -8.1353489], [113.3622359, -8.1010376], [113.3663253, -8.0850598], [113.357025, -8.0780455], [113.3486632, -8.054896], [113.3630446, -8.027681], [113.3871688, -8.0136563], [113.391632, -7.9974414], [113.4062575, -8.0090872], [113.4253691, -8.0111853], [113.4324111, -8.020517], [113.4582595, -8.024674], [113.4723967, -8.0219904], [113.4892348, -7.9967118], [113.5141524, -8.0137516], [113.5279082, -8.0126358], [113.5525359, -7.9982105], [113.5596922, -7.9873262], [113.5893629, -7.9853764], [113.6039885, -7.9806185], [113.6159743, -7.989338], [113.6276854, -7.9759059], [113.64356, -7.9731229], [113.6708525, -7.9682727], [113.6721342, -7.9870434], [113.6872404, -8.0115133], [113.710121, -8.0111976], [113.7261885, -8.0235725], [113.7397154, -8.0468831], [113.753784, -8.0519023], [113.7719801, -8.0383401], [113.7860106, -8.0519204], [113.8058012, -8.0563178], [113.8123854, -8.0461945], [113.8543775, -8.0453362], [113.879257, -8.0334477], [113.886421, -8.0124783], [113.9188383, -8.0252089], [113.960861, -8.0559172], [113.9701994, -8.0549539], [113.9871671, -8.066954], [114.000778, -8.069239], [114.0282362, -8.0951122], [114.0295179, -8.114612], [114.0432966, -8.1338056], [114.0239332, -8.1403478], [114.0042417, -8.1621851], [113.9908827, -8.1826147], [113.9707258, -8.1895336], [113.959648, -8.2039493], [113.9679258, -8.2219718], [113.9593733, -8.2432588], [113.9442366, -8.2444853], [113.9342344, -8.2555116], [113.9333189, -8.2834524], [113.9210585, -8.3090118], [113.9268873, -8.3279451], [113.9131468, -8.3404802], [113.9272612, -8.3798965], [113.9444807, -8.3975881], [113.9346846, -8.4223817], [113.91024, -8.441873], [113.8921431, -8.4109043], [113.8758314, -8.4157566], [113.8532332, -8.4325842], [113.8421324, -8.4943213], [113.8554228, -8.5153698], [113.8380577, -8.5525761], [113.8363277, -8.528725], [113.8125671, -8.5455354], [113.8092974, -8.5336876], [113.8102318, -8.4975755], [113.790848, -8.4881456], [113.7621276, -8.5137719], [113.7366679, -8.5260765], [113.7318922, -8.5148154], [113.7186286, -8.5203558], [113.7222874, -8.4967646], [113.7181519, -8.4855549], [113.6698138, -8.4982212], [113.6473103, -8.4949113], [113.6480856, -8.4790749], [113.6389642, -8.4546378], [113.6000032, -8.4357976], [113.5671288, -8.4249767], [113.5491903, -8.4303036], [113.5265294, -8.4300182], [113.4946048, -8.4129924], [113.4855831, -8.4158278], [113.4747382, -8.3984378], [113.4758141, -8.3859098], [113.4564614, -8.3787441], [113.4252951, -8.3805523], [113.3932891, -8.399978], [113.3863343, -8.3994515], [113.3730186, -8.3689646], [113.3599073, -8.3501787], [113.3298639, -8.3202237], [113.303859, -8.3064777]]], [[[113.2642462, -8.4871639], [113.2685975, -8.4681026], [113.2879292, -8.4612547], [113.2941593, -8.4498979], [113.3272469, -8.452527], [113.3431595, -8.4580326], [113.3534187, -8.448768], [113.3722546, -8.4582112], [113.3977008, -8.4550117], [113.4131151, -8.4694381], [113.4074168, -8.492886], [113.3131749, -8.5073442], [113.2954779, -8.5060718], [113.2838164, -8.4977559], [113.2690522, -8.4972275], [113.2642462, -8.4871639]]]]
        },
        properties: {
            id: "7",
            name: "JEMBER"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.0692901, -7.3969942], [112.0815277, -7.3825549], [112.0969848, -7.3847631], [112.1377639, -7.3679275], [112.1503753, -7.3672742], [112.1724548, -7.3576025], [112.2112503, -7.3486322], [112.2272567, -7.3504294], [112.25, -7.3631591], [112.2754592, -7.3568977], [112.3033142, -7.3545188], [112.3249435, -7.3449444], [112.3457336, -7.3450469], [112.3370056, -7.361339], [112.3364105, -7.3783969], [112.3469009, -7.3960351], [112.3447799, -7.4321955], [112.3328323, -7.4524077], [112.3411788, -7.4595774], [112.3987426, -7.4577621], [112.384407, -7.4786114], [112.3716964, -7.4889792], [112.3778991, -7.5022968], [112.3708801, -7.5102767], [112.3738021, -7.5254491], [112.3637161, -7.5526379], [112.3749008, -7.5630664], [112.3778457, -7.5899877], [112.3899383, -7.6097106], [112.4038925, -7.6228513], [112.4100036, -7.6449832], [112.4116744, -7.6735357], [112.4302825, -7.6997432], [112.438591, -7.7328676], [112.447464, -7.7411703], [112.4467849, -7.7591475], [112.4558334, -7.7791313], [112.422203, -7.7669414], [112.3963928, -7.7757462], [112.3752822, -7.7639707], [112.3611984, -7.7611569], [112.3483886, -7.7487124], [112.3179626, -7.7373447], [112.3104095, -7.7307905], [112.2674865, -7.7225956], [112.2505264, -7.7248963], [112.2218856, -7.691573], [112.2180862, -7.6767467], [112.2043609, -7.6584434], [112.1831054, -7.6414508], [112.1834411, -7.6339902], [112.1650161, -7.6131982], [112.1389846, -7.6115359], [112.1096038, -7.601215], [112.1151123, -7.5819746], [112.1113433, -7.5666729], [112.1362991, -7.5341817], [112.1507873, -7.5292264], [112.1520919, -7.5060883], [112.1683959, -7.4916931], [112.1568679, -7.4655619], [112.1279449, -7.4579573], [112.1000213, -7.4628344], [112.0794754, -7.4735642], [112.0808944, -7.452189], [112.0626449, -7.4172703], [112.0692901, -7.3969942]]]
        },
        properties: {
            id: "8",
            name: "JOMBANG"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.9544067, -7.812406], [111.967514, -7.7957195], [111.9782486, -7.794289], [111.9941177, -7.7714037], [112.0108718, -7.772581], [112.00251, -7.7895636], [112.0170593, -7.8001842], [112.0320358, -7.801093], [112.0331726, -7.8188261], [112.0558395, -7.8344206], [112.0676803, -7.8364629], [112.0655594, -7.8583816], [112.0487747, -7.8724789], [112.0218734, -7.8631462], [112.0156326, -7.8558859], [111.995903, -7.8520068], [112.0081177, -7.8401031], [111.9842224, -7.8377866], [111.9839172, -7.8280706], [111.9580917, -7.8228616], [111.9544067, -7.812406]]]
        },
        properties: {
            id: "32",
            name: "KOTA KEDIRI"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.799202, -7.8365673], [111.8622055, -7.7765454], [111.8798141, -7.7649502], [111.8995132, -7.7411651], [111.9277877, -7.7227835], [111.9314728, -7.7100996], [111.9542541, -7.6795658], [111.9795379, -7.6831082], [111.9822082, -7.7104224], [111.9981613, -7.7310657], [112.002243, -7.752345], [112.0202179, -7.7631735], [112.020607, -7.7425408], [112.0281066, -7.7253064], [112.0590667, -7.7235207], [112.0750885, -7.7036046], [112.0758667, -7.6787566], [112.0854797, -7.6581453], [112.1011886, -7.6351747], [112.1030883, -7.6094693], [112.1096038, -7.601215], [112.1389846, -7.6115359], [112.1650161, -7.6131982], [112.1834411, -7.6339902], [112.1831054, -7.6414508], [112.2043609, -7.6584434], [112.2180862, -7.6767467], [112.2218856, -7.691573], [112.2505264, -7.7248963], [112.2674865, -7.7225956], [112.3104095, -7.7307905], [112.3179626, -7.7373447], [112.3483886, -7.7487124], [112.3611984, -7.7611569], [112.3752822, -7.7639707], [112.3963928, -7.7757462], [112.422203, -7.7669414], [112.3974227, -7.7853707], [112.3822021, -7.7850622], [112.3644638, -7.7672733], [112.3490142, -7.7611846], [112.3333129, -7.7757253], [112.3198928, -7.7778157], [112.292427, -7.7688001], [112.2880172, -7.779076], [112.3066787, -7.7995452], [112.3094863, -7.8391694], [112.3212432, -7.8555187], [112.3257064, -7.8713459], [112.3233642, -7.8916095], [112.3119506, -7.9047192], [112.3140106, -7.9181927], [112.3065795, -7.9292973], [112.2989349, -7.9370622], [112.2631225, -7.9444364], [112.2161865, -7.9627136], [112.201332, -7.9640402], [112.1799926, -7.973401], [112.154335, -7.9769057], [112.1141204, -7.9774226], [112.0963287, -7.970045], [112.090805, -7.991578], [112.0537262, -7.9886169], [112.0190353, -7.9994864], [111.9775467, -7.9963454], [111.9770736, -8.0114669], [111.9568862, -7.9967746], [111.9470672, -7.9711122], [111.9447937, -7.9532003], [111.931221, -7.9623017], [111.9168319, -7.9611453], [111.882843, -7.9471816], [111.8630294, -7.9076595], [111.8512497, -7.9008569], [111.8303756, -7.8774361], [111.8027115, -7.8656682], [111.799202, -7.8365673]], [[111.9544067, -7.812406], [111.9580917, -7.8228616], [111.9839172, -7.8280706], [111.9842224, -7.8377866], [112.0081177, -7.8401031], [111.995903, -7.8520068], [112.0156326, -7.8558859], [112.0218734, -7.8631462], [112.0487747, -7.8724789], [112.0655594, -7.8583816], [112.0676803, -7.8364629], [112.0558395, -7.8344206], [112.0331726, -7.8188261], [112.0320358, -7.801093], [112.0170593, -7.8001842], [112.00251, -7.7895636], [112.0108718, -7.772581], [111.9941177, -7.7714037], [111.9782486, -7.794289], [111.967514, -7.7957195], [111.9544067, -7.812406]]]
        },
        properties: {
            id: "9",
            name: "KEDIRI"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.154541, -7.1101183], [112.1672516, -7.0974454], [112.218811, -7.0686764], [112.2152557, -7.0547189], [112.2186431, -7.035931], [112.2079849, -7.0343131], [112.2143783, -7.009242], [112.2020187, -6.9446572], [112.2030029, -6.9182991], [112.1807785, -6.9108934], [112.1706212, -6.8971062], [112.2147644, -6.8803717], [112.2235146, -6.8725865], [112.2472405, -6.8782223], [112.2697528, -6.8784604], [112.2846051, -6.8694751], [112.2997648, -6.8737865], [112.3334668, -6.864329], [112.3426938, -6.8700822], [112.3576221, -6.8640679], [112.3711881, -6.8732238], [112.3998356, -6.8737144], [112.4142776, -6.8642661], [112.4400656, -6.87452484], [112.4485626, -6.8846558], [112.4217452, -6.9121374], [112.4286117, -6.9295076], [112.4234695, -6.9468116], [112.4122238, -6.9453934], [112.4068679, -6.9577144], [112.3909683, -6.9601001], [112.3756866, -6.9545988], [112.367134, -6.9777292], [112.4216613, -6.9959739], [112.4269638, -7.0019816], [112.4533538, -7.0014003], [112.4603805, -7.0083703], [112.4803848, -7.0029806], [112.5120315, -7.0129632], [112.4983978, -7.0309962], [112.5140075, -7.0411871], [112.5247192, -7.0392297], [112.5451507, -7.0590156], [112.5316924, -7.0821794], [112.5359039, -7.0956892], [112.519165, -7.1079386], [112.5012435, -7.106789], [112.4875411, -7.1288227], [112.4760894, -7.1256312], [112.4723052, -7.1595605], [112.4871139, -7.1661814], [112.50521, -7.1632002], [112.5090942, -7.1723479], [112.5015411, -7.1923669], [112.4791412, -7.1978644], [112.4724731, -7.2087787], [112.45755, -7.2065185], [112.4400634, -7.2179774], [112.4073486, -7.2469968], [112.3992538, -7.2662891], [112.4119873, -7.2735456], [112.4009704, -7.3141216], [112.3682556, -7.3247298], [112.3457336, -7.3450469], [112.3249435, -7.3449444], [112.3033142, -7.3545188], [112.2754592, -7.3568977], [112.25, -7.3631591], [112.2272567, -7.3504294], [112.2112503, -7.3486322], [112.1724548, -7.3576025], [112.1503753, -7.3672742], [112.1377639, -7.3679275], [112.0969848, -7.3847631], [112.0815277, -7.3825549], [112.0885009, -7.3578748], [112.0725631, -7.3332538], [112.0900192, -7.2980766], [112.0920486, -7.266662], [112.0843429, -7.2595796], [112.0895843, -7.2279228], [112.1093444, -7.2225031], [112.1186523, -7.2112316], [112.1262588, -7.183443], [112.1402206, -7.1574511], [112.1614456, -7.1358012], [112.1625366, -7.1117882], [112.154541, -7.1101183]]]
        },
        properties: {
            id: "10",
            name: "LAMONGAN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.9421996, -7.9833562], [112.9587859, -7.9856398], [112.9763488, -7.9794614], [112.9940185, -7.9615939], [113.0221251, -7.9691932], [113.0424956, -7.9885003], [113.0538405, -8.0092628], [113.0634536, -8.001373], [113.0705718, -7.9815662], [113.104988, -7.9813869], [113.1147231, -7.9917347], [113.136032, -7.976557], [113.150978, -7.9781882], [113.1908492, -7.9449837], [113.2119445, -7.9108817], [113.2075194, -7.8980443], [113.2481917, -7.9078676], [113.2674483, -7.9012591], [113.2681044, -7.9178006], [113.2752532, -7.9298016], [113.3227385, -7.9280616], [113.3449553, -7.9560663], [113.3465041, -7.9751822], [113.3615111, -7.9961516], [113.3630446, -8.027681], [113.3486632, -8.054896], [113.357025, -8.0780455], [113.3663253, -8.0850598], [113.3622359, -8.1010376], [113.3765639, -8.1353489], [113.3795851, -8.1572253], [113.3667296, -8.1679102], [113.3678893, -8.1850859], [113.3443373, -8.2078215], [113.3333892, -8.2082831], [113.3271712, -8.2208811], [113.3131713, -8.2287079], [113.319702, -8.2655684], [113.3094557, -8.2988926], [113.303859, -8.3064777], [113.2549796, -8.2866979], [113.2127768, -8.2812428], [113.1651815, -8.2835219], [113.1237373, -8.2916077], [113.0764999, -8.2884184], [113.0549781, -8.2981327], [113.0080834, -8.3119544], [112.9728305, -8.3314206], [112.95747906, -8.35169877], [112.9340667, -8.3302887], [112.9424209, -8.3174751], [112.9148788, -8.301584], [112.9184798, -8.2829721], [112.9111785, -8.2698858], [112.9228515, -8.2397945], [112.912857, -8.2193992], [112.9133452, -8.2069175], [112.9034576, -8.1743238], [112.9036864, -8.1541212], [112.9167785, -8.1348226], [112.925331, -8.1114557], [112.9231567, -8.0869587], [112.9058227, -8.0815599], [112.9003066, -8.0599325], [112.9084472, -8.0424402], [112.9347304, -8.0187566], [112.9421996, -7.9833562]]]
        },
        properties: {
            id: "11",
            name: "LUMAJANG"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.5109787, -7.6593899], [111.5117035, -7.6489291], [111.5110016, -7.6351175], [111.4990081, -7.6258845], [111.5020905, -7.6072401], [111.5215225, -7.5973463], [111.5387878, -7.6020374], [111.5528106, -7.59485], [111.5603409, -7.600696], [111.5529175, -7.6185355], [111.5552902, -7.6304244], [111.5419159, -7.6594071], [111.5260315, -7.6642146], [111.5109787, -7.6593899]]]
        },
        properties: {
            id: "33",
            name: "KOTA MADIUN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.449913, -7.7785224], [111.4585876, -7.7253685], [111.4707718, -7.7125811], [111.5008468, -7.6917338], [111.4989929, -7.6732511], [111.5109787, -7.6593899], [111.5260315, -7.6642146], [111.5419159, -7.6594071], [111.5552902, -7.6304244], [111.5529175, -7.6185355], [111.5603409, -7.600696], [111.5528106, -7.59485], [111.5387878, -7.6020374], [111.5215225, -7.5973463], [111.5020905, -7.6072401], [111.4990081, -7.6258845], [111.5110016, -7.6351175], [111.5117035, -7.6489291], [111.4905395, -7.6579985], [111.4873047, -7.6415452], [111.4638748, -7.6349778], [111.4585495, -7.625], [111.4683914, -7.6149864], [111.479332, -7.5774173], [111.4892883, -7.5628805], [111.4996566, -7.5644016], [111.5115356, -7.5383243], [111.5361938, -7.5448646], [111.5522842, -7.5301413], [111.5700912, -7.5241165], [111.5957718, -7.4976849], [111.6106567, -7.4689269], [111.6373214, -7.4624314], [111.6509323, -7.4389786], [111.6696014, -7.4188151], [111.6712189, -7.4095425], [111.6845398, -7.4166159], [111.7167053, -7.4432139], [111.7373123, -7.4509038], [111.770462, -7.4696397], [111.800415, -7.4610981], [111.8180771, -7.4731688], [111.8217621, -7.4929332], [111.8424987, -7.4977803], [111.8467636, -7.5046248], [111.8370819, -7.5308022], [111.8386764, -7.5416779], [111.8178787, -7.5485129], [111.8041992, -7.5454788], [111.7946548, -7.5731692], [111.792221, -7.5961337], [111.7866516, -7.6023516], [111.7829361, -7.6504359], [111.756134, -7.6839122], [111.7526321, -7.70547], [111.7329406, -7.7263016], [111.7254562, -7.7709589], [111.7281113, -7.7793111], [111.7521896, -7.8010134], [111.7328109, -7.8012661], [111.7226181, -7.8125433], [111.6931534, -7.8080715], [111.6906128, -7.7913603], [111.6761093, -7.78445], [111.6778946, -7.7744398], [111.6582412, -7.7670354], [111.6527481, -7.772952], [111.6008377, -7.7825098], [111.5920333, -7.7954525], [111.5769424, -7.8045635], [111.5502624, -7.799684], [111.5329208, -7.8037543], [111.498703, -7.7950167], [111.4664612, -7.7770786], [111.449913, -7.7785224]]]
        },
        properties: {
            id: "12",
            name: "MADIUN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.1944935, -7.6204158], [111.2311783, -7.6100792], [111.2584991, -7.5984788], [111.2754211, -7.603404], [111.294281, -7.6021552], [111.301506, -7.5868201], [111.3186951, -7.5862078], [111.354393, -7.5704093], [111.3744049, -7.5728626], [111.3683014, -7.5520377], [111.3739777, -7.5395035], [111.4215469, -7.5364379], [111.435852, -7.5205221], [111.4617691, -7.5092649], [111.4771805, -7.5158729], [111.5019226, -7.5143199], [111.5115356, -7.5383243], [111.4996566, -7.5644016], [111.4892883, -7.5628805], [111.479332, -7.5774173], [111.4683914, -7.6149864], [111.4585495, -7.625], [111.4638748, -7.6349778], [111.4873047, -7.6415452], [111.4905395, -7.6579985], [111.5117035, -7.6489291], [111.5109787, -7.6593899], [111.4989929, -7.6732511], [111.5008468, -7.6917338], [111.4707718, -7.7125811], [111.4585876, -7.7253685], [111.449913, -7.7785224], [111.4133987, -7.775896], [111.4093018, -7.7795772], [111.3621597, -7.7849183], [111.3419647, -7.7836804], [111.329834, -7.7999977], [111.3147201, -7.7921748], [111.3076782, -7.797707], [111.2899246, -7.794013], [111.2832489, -7.7819032], [111.2935562, -7.7606678], [111.2868271, -7.7429752], [111.2745437, -7.7349138], [111.2670211, -7.743289], [111.2387695, -7.7508607], [111.2157287, -7.737803], [111.2138672, -7.7229657], [111.1820297, -7.712367], [111.1831207, -7.6909733], [111.1905975, -7.676073], [111.1875381, -7.6598939], [111.1944935, -7.6204158]]]
        },
        properties: {
            id: "13",
            name: "MAGETAN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.5698776, -7.9393237], [112.5903625, -7.9364198], [112.6024856, -7.9216479], [112.6419219, -7.9140299], [112.6583175, -7.9247978], [112.665245, -7.9368351], [112.6602706, -7.9655283], [112.6947173, -7.9816883], [112.6853561, -8.0037392], [112.6720428, -8.0091246], [112.6746291, -8.0307243], [112.6574859, -8.0454148], [112.6318359, -8.0458859], [112.6309356, -8.0350359], [112.6084213, -8.0168579], [112.5913162, -7.9860977], [112.599266, -7.9586414], [112.5698776, -7.9393237]]]
        },
        properties: {
            id: "34",
            name: "KOTA MALANG"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "MultiPolygon",
            coordinates: [[[[112.422203, -7.7669414], [112.4558334, -7.7791313], [112.4647445, -7.7680868], [112.4784288, -7.7676579], [112.4872894, -7.7850045], [112.4880294, -7.8030656], [112.495407, -7.8128127], [112.4948272, -7.8558677], [112.4883346, -7.8804201], [112.4756011, -7.9030656], [112.4739303, -7.9324878], [112.4851684, -7.9326728], [112.5149764, -7.9202036], [112.530281, -7.9207567], [112.5679321, -7.9131163], [112.5758514, -7.9171084], [112.5949935, -7.9021533], [112.5833053, -7.888624], [112.5643157, -7.8794726], [112.5699004, -7.8166974], [112.5866546, -7.7829822], [112.5882415, -7.7654565], [112.6020278, -7.7692307], [112.6161651, -7.7876027], [112.6546706, -7.7974776], [112.6613998, -7.8059071], [112.6996078, -7.81401], [112.71492, -7.8207896], [112.7310562, -7.8189076], [112.7499999, -7.851136], [112.7725982, -7.8671721], [112.7804336, -7.8921803], [112.7920531, -7.9125002], [112.8054122, -7.9254578], [112.8207778, -7.9277938], [112.8358383, -7.9410303], [112.8562087, -7.9396713], [112.8850936, -7.9525025], [112.8960723, -7.9473837], [112.9353179, -7.9561956], [112.9281692, -7.9686005], [112.9421996, -7.9833562], [112.9347304, -8.0187566], [112.9084472, -8.0424402], [112.9003066, -8.0599325], [112.9058227, -8.0815599], [112.9231567, -8.0869587], [112.925331, -8.1114557], [112.9167785, -8.1348226], [112.9036864, -8.1541212], [112.9034576, -8.1743238], [112.9133452, -8.2069175], [112.912857, -8.2193992], [112.9228515, -8.2397945], [112.9111785, -8.2698858], [112.9184798, -8.2829721], [112.9148788, -8.301584], [112.9424209, -8.3174751], [112.9340667, -8.3302887], [112.95747906, -8.35169877], [112.9472405, -8.3596319], [112.9387987, -8.3818701], [112.9174782, -8.394107], [112.8728776, -8.409465], [112.8597895, -8.4015887], [112.843587, -8.4005593], [112.8460563, -8.3865605], [112.8313051, -8.3688464], [112.8202006, -8.3730163], [112.8194585, -8.3917109], [112.7988886, -8.4045759], [112.7832723, -8.3872227], [112.7702791, -8.3871381], [112.7652593, -8.4083021], [112.7450084, -8.417191], [112.710341, -8.4173928], [112.6908952, -8.4281497], [112.6714075, -8.4444715], [112.6515251, -8.4479533], [112.639998, -8.4348553], [112.6102984, -8.4213543], [112.5880143, -8.4178983], [112.5724208, -8.4073675], [112.5545682, -8.4021101], [112.4903725, -8.4014667], [112.4801578, -8.3951084], [112.4437819, -8.3974674], [112.4235901, -8.3829567], [112.372643, -8.3749973], [112.3585165, -8.3487574], [112.3713607, -8.310913], [112.3826904, -8.2959088], [112.3846435, -8.281308], [112.3812637, -8.2462367], [112.3931656, -8.2315692], [112.3830261, -8.2074269], [112.3853072, -8.1922387], [112.367897, -8.1838979], [112.3716354, -8.1706408], [112.4311905, -8.1586016], [112.4524536, -8.1443642], [112.4584426, -8.118018], [112.4542694, -8.1067065], [112.457756, -8.0674361], [112.4540481, -8.0617951], [112.4713363, -7.9953011], [112.4693527, -7.9852303], [112.4788818, -7.9720562], [112.4745101, -7.9581178], [112.4514846, -7.9275383], [112.4469146, -7.9117006], [112.4103012, -7.9346288], [112.4041442, -7.9344066], [112.370491, -7.9572672], [112.3565597, -7.9465297], [112.3065795, -7.9292973], [112.3140106, -7.9181927], [112.3119506, -7.9047192], [112.3233642, -7.8916095], [112.3257064, -7.8713459], [112.3212432, -7.8555187], [112.3094863, -7.8391694], [112.3066787, -7.7995452], [112.2880172, -7.779076], [112.292427, -7.7688001], [112.3198928, -7.7778157], [112.3333129, -7.7757253], [112.3490142, -7.7611846], [112.3644638, -7.7672733], [112.3822021, -7.7850622], [112.3974227, -7.7853707], [112.422203, -7.7669414]], [[112.5698776, -7.9393237], [112.599266, -7.9586414], [112.5913162, -7.9860977], [112.6084213, -8.0168579], [112.6309356, -8.0350359], [112.6318359, -8.0458859], [112.6574859, -8.0454148], [112.6746291, -8.0307243], [112.6720428, -8.0091246], [112.6853561, -8.0037392], [112.6947173, -7.9816883], [112.6602706, -7.9655283], [112.665245, -7.9368351], [112.6583175, -7.9247978], [112.6419219, -7.9140299], [112.6024856, -7.9216479], [112.5903625, -7.9364198], [112.5698776, -7.9393237]]], [[[112.6778358, -8.4451774], [112.6916944, -8.4308507], [112.7128787, -8.4347934], [112.7115106, -8.4589205], [112.7021051, -8.4631076], [112.6778358, -8.4451774]]]]
        },
        properties: {
            id: "14",
            name: "MALANG"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.3457336, -7.3450469], [112.3682556, -7.3247298], [112.3927459, -7.3325066], [112.4088897, -7.3142828], [112.4377822, -7.3134516], [112.4442901, -7.3050192], [112.4660567, -7.312692], [112.4800033, -7.3074673], [112.4821014, -7.3489936], [112.4743804, -7.3707894], [112.4755859, -7.3848327], [112.4953307, -7.4081], [112.4632568, -7.4314812], [112.4686431, -7.4452909], [112.488594, -7.4599494], [112.5117416, -7.466802], [112.5636214, -7.4760736], [112.5826339, -7.4926604], [112.6092834, -7.5075687], [112.6307754, -7.5327142], [112.6707992, -7.5585216], [112.6599502, -7.5723193], [112.6650771, -7.5931447], [112.6544036, -7.5958856], [112.6194763, -7.6231788], [112.628807, -7.6521085], [112.6147003, -7.6813205], [112.593605, -7.7011403], [112.5843505, -7.7227109], [112.5748672, -7.732704], [112.5335617, -7.7249902], [112.5294952, -7.7352751], [112.5150451, -7.740681], [112.5008468, -7.7613081], [112.4784288, -7.7676579], [112.4647445, -7.7680868], [112.4558334, -7.7791313], [112.4467849, -7.7591475], [112.447464, -7.7411703], [112.438591, -7.7328676], [112.4302825, -7.6997432], [112.4116744, -7.6735357], [112.4100036, -7.6449832], [112.4038925, -7.6228513], [112.3899383, -7.6097106], [112.3778457, -7.5899877], [112.3749008, -7.5630664], [112.3637161, -7.5526379], [112.3738021, -7.5254491], [112.3708801, -7.5102767], [112.3778991, -7.5022968], [112.3716964, -7.4889792], [112.384407, -7.4786114], [112.3987426, -7.4577621], [112.3411788, -7.4595774], [112.3328323, -7.4524077], [112.3447799, -7.4321955], [112.3469009, -7.3960351], [112.3364105, -7.3783969], [112.3370056, -7.361339], [112.3457336, -7.3450469]], [[112.405632, -7.4791855], [112.4076156, -7.4916552], [112.422966, -7.4929341], [112.443756, -7.4818576], [112.4605104, -7.4830795], [112.4690551, -7.4550375], [112.4550857, -7.4473842], [112.4343185, -7.4596905], [112.4158172, -7.4572602], [112.405632, -7.4791855]]]
        },
        properties: {
            id: "15",
            name: "MOJOKERTO"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.405632, -7.4791855], [112.4076156, -7.4916552], [112.422966, -7.4929341], [112.443756, -7.4818576], [112.4605104, -7.4830795], [112.4690551, -7.4550375], [112.4550857, -7.4473842], [112.4343185, -7.4596905], [112.4158172, -7.4572602], [112.405632, -7.4791855]]]
        },
        properties: {
            id: "35",
            name: "KOTA MOJOKERTO"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.800415, -7.4610981], [111.8209991, -7.4395546], [111.8609771, -7.4359383], [111.87397, -7.4409756], [111.9053573, -7.4333224], [111.940361, -7.4401211], [111.9585724, -7.4296431], [111.958023, -7.413319], [111.97126, -7.4049796], [111.9986725, -7.4033827], [112.0203552, -7.4075865], [112.0487518, -7.3944348], [112.0692901, -7.3969942], [112.0626449, -7.4172703], [112.0808944, -7.452189], [112.0794754, -7.4735642], [112.1000213, -7.4628344], [112.1279449, -7.4579573], [112.1568679, -7.4655619], [112.1683959, -7.4916931], [112.1520919, -7.5060883], [112.1507873, -7.5292264], [112.1362991, -7.5341817], [112.1113433, -7.5666729], [112.1151123, -7.5819746], [112.1096038, -7.601215], [112.1030883, -7.6094693], [112.1011886, -7.6351747], [112.0854797, -7.6581453], [112.0758667, -7.6787566], [112.0750885, -7.7036046], [112.0590667, -7.7235207], [112.0281066, -7.7253064], [112.020607, -7.7425408], [112.0202179, -7.7631735], [112.002243, -7.752345], [111.9981613, -7.7310657], [111.9822082, -7.7104224], [111.9795379, -7.6831082], [111.9542541, -7.6795658], [111.9314728, -7.7100996], [111.9277877, -7.7227835], [111.8995132, -7.7411651], [111.8798141, -7.7649502], [111.8622055, -7.7765454], [111.799202, -7.8365673], [111.7857284, -7.833311], [111.7688293, -7.8241138], [111.7521896, -7.8010134], [111.7281113, -7.7793111], [111.7254562, -7.7709589], [111.7329406, -7.7263016], [111.7526321, -7.70547], [111.756134, -7.6839122], [111.7829361, -7.6504359], [111.7866516, -7.6023516], [111.792221, -7.5961337], [111.7946548, -7.5731692], [111.8041992, -7.5454788], [111.8178787, -7.5485129], [111.8386764, -7.5416779], [111.8370819, -7.5308022], [111.8467636, -7.5046248], [111.8424987, -7.4977803], [111.8217621, -7.4929332], [111.8180771, -7.4731688], [111.800415, -7.4610981]]]
        },
        properties: {
            id: "16",
            name: "NGANJUK"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.46192, -7.362003], [111.4720917, -7.3574147], [111.5135422, -7.3628964], [111.5235443, -7.3715129], [111.546875, -7.3692159], [111.5498275, -7.3614325], [111.574913, -7.3485622], [111.5969925, -7.3592395], [111.630722, -7.3897395], [111.6712189, -7.4095425], [111.6696014, -7.4188151], [111.6509323, -7.4389786], [111.6373214, -7.4624314], [111.6106567, -7.4689269], [111.5957718, -7.4976849], [111.5700912, -7.5241165], [111.5522842, -7.5301413], [111.5361938, -7.5448646], [111.5115356, -7.5383243], [111.5019226, -7.5143199], [111.4771805, -7.5158729], [111.4617691, -7.5092649], [111.435852, -7.5205221], [111.4215469, -7.5364379], [111.3739777, -7.5395035], [111.3683014, -7.5520377], [111.3744049, -7.5728626], [111.354393, -7.5704093], [111.3186951, -7.5862078], [111.301506, -7.5868201], [111.294281, -7.6021552], [111.2754211, -7.603404], [111.2584991, -7.5984788], [111.2311783, -7.6100792], [111.1944935, -7.6204158], [111.1930618, -7.6139579], [111.1696091, -7.5907688], [111.153862, -7.5639791], [111.1513748, -7.5377297], [111.1462326, -7.5275869], [111.153656, -7.5092125], [111.1518478, -7.4978514], [111.1352386, -7.4837031], [111.1315307, -7.4606318], [111.1184463, -7.4142637], [111.1296463, -7.4014864], [111.1453018, -7.3688488], [111.1405563, -7.3523864], [111.1420517, -7.3324298], [111.1553039, -7.3133459], [111.1372681, -7.2998857], [111.1398773, -7.2841677], [111.1504211, -7.2737221], [111.1557007, -7.257914], [111.1776657, -7.2643866], [111.1991653, -7.2554759], [111.208313, -7.2449317], [111.2216568, -7.2525277], [111.2441559, -7.2855096], [111.285881, -7.2897839], [111.2958298, -7.3004503], [111.3470382, -7.3228178], [111.3685989, -7.3403057], [111.4098816, -7.349329], [111.4525452, -7.3747925], [111.46192, -7.362003]]]
        },
        properties: {
            id: "17",
            name: "NGAWI"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.273323, -7.9373607], [111.2983246, -7.9410262], [111.3163147, -7.9363122], [111.3265304, -7.9552402], [111.3276749, -7.9681139], [111.3553695, -7.984128], [111.3561249, -8.0002651], [111.3503113, -8.0211963], [111.3668365, -8.0307626], [111.3533249, -8.0592489], [111.3524246, -8.0933733], [111.3614654, -8.1189441], [111.3800659, -8.1373882], [111.3800125, -8.1550941], [111.3932419, -8.1594505], [111.4055481, -8.1726245], [111.4248047, -8.1703415], [111.4227752, -8.1885738], [111.4014129, -8.196557], [111.408638, -8.2130832], [111.3934708, -8.230031], [111.4063949, -8.2583761], [111.4036782, -8.2708091], [111.3982802, -8.2775805], [111.3782833, -8.2752776], [111.3671864, -8.2609522], [111.3567401, -8.2703241], [111.3417038, -8.2623464], [111.3275634, -8.2730104], [111.2991361, -8.2576115], [111.2915661, -8.2745819], [111.2793328, -8.2698257], [111.2808197, -8.2570619], [111.2603321, -8.2478057], [111.2144017, -8.2656074], [111.2019033, -8.2649076], [111.1929128, -8.2787543], [111.1772057, -8.2729378], [111.1673104, -8.2801694], [111.1384171, -8.2774647], [111.1370927, -8.2616656], [111.1013838, -8.2521497], [111.0907538, -8.2203474], [111.0745491, -8.2243661], [111.0762726, -8.245776], [111.0450131, -8.2507028], [111.0297413, -8.2564906], [111.0148241, -8.2484839], [110.9945194, -8.2521025], [110.9881388, -8.2429151], [110.9602453, -8.233979], [110.9555551, -8.2263733], [110.9266352, -8.2227372], [110.9088497, -8.2110679], [110.8988419, -8.1773567], [110.9026337, -8.1534013], [110.910202, -8.1344175], [110.9532242, -8.0624218], [110.9942398, -8.0824174], [111.0181808, -8.0763855], [111.037056, -8.0800447], [111.0642853, -8.0677032], [111.0671921, -8.0370664], [111.0750732, -8.0250787], [111.0917587, -8.0333814], [111.0886841, -8.0600586], [111.1135101, -8.0567407], [111.1264419, -8.0610494], [111.1261291, -8.0391121], [111.1361694, -8.0236168], [111.1304932, -8.0079145], [111.1328735, -7.9738865], [111.1457977, -7.9671402], [111.1494217, -7.9545884], [111.1432648, -7.9425816], [111.1548767, -7.922502], [111.1882248, -7.922595], [111.1999206, -7.9397249], [111.2233124, -7.9296975], [111.235733, -7.9446067], [111.2564545, -7.9489197], [111.273323, -7.9373607]]]
        },
        properties: {
            id: "18",
            name: "PACITAN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[113.3935139, -7.2178403], [113.3966521, -7.2000214], [113.3805159, -7.1915275], [113.3795851, -7.1501829], [113.3574294, -7.1536519], [113.3673857, -7.1364681], [113.3635634, -7.1003062], [113.3765257, -7.0949794], [113.3823546, -7.0796992], [113.3931655, -7.0737421], [113.3969649, -7.0393607], [113.3946761, -7.0300118], [113.4215621, -7.0114013], [113.4196166, -6.9948246], [113.4365996, -6.9600212], [113.4594954, -6.9467589], [113.4609984, -6.9354378], [113.4780043, -6.9237024], [113.476158, -6.9084965], [113.4833784, -6.8968878], [113.5723431, -6.8927243], [113.5914012, -6.8889386], [113.6391278, -6.8876557], [113.6356886, -6.9132558], [113.6401976, -6.9277106], [113.6272352, -6.9515444], [113.6257246, -6.9659201], [113.6084288, -6.974299], [113.6121367, -6.9918872], [113.607849, -7.0129219], [113.5821532, -7.0198875], [113.5831374, -7.0413767], [113.6049498, -7.0449668], [113.5997389, -7.0626317], [113.6219176, -7.0895949], [113.6020964, -7.1217371], [113.6017484, -7.1286819], [113.5742509, -7.1610649], [113.5610329, -7.2099448], [113.5496664, -7.2313368], [113.5131276, -7.2534412], [113.5055863, -7.2497942], [113.5017829, -7.2298487], [113.4653219, -7.2216078], [113.4178868, -7.2212041], [113.3935139, -7.2178403]]]
        },
        properties: {
            id: "19",
            name: "PAMEKASAN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.9028271, -7.6256976], [112.9286159, -7.6312527], [112.952354, -7.6221595], [112.9524088, -7.63267], [112.9379729, -7.6604388], [112.9232101, -7.675504], [112.9013671, -7.6863582], [112.8831405, -7.6608012], [112.8695525, -7.6555164], [112.879013, -7.6303671], [112.8862685, -7.6238373], [112.9028271, -7.6256976]]]
        },
        properties: {
            id: "36",
            name: "KOTA PASURUAN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.5748672, -7.732704], [112.5843505, -7.7227109], [112.593605, -7.7011403], [112.6147003, -7.6813205], [112.628807, -7.6521085], [112.6194763, -7.6231788], [112.6544036, -7.5958856], [112.6650771, -7.5931447], [112.6599502, -7.5723193], [112.6707992, -7.5585216], [112.6799621, -7.5493759], [112.7061843, -7.5449327], [112.7235488, -7.5685456], [112.7388915, -7.5732206], [112.7674636, -7.5741909], [112.784706, -7.5627783], [112.8165206, -7.5589178], [112.8320312, -7.5523704], [112.84549, -7.5780944], [112.8712711, -7.5792252], [112.8890263, -7.6154587], [112.9028271, -7.6256976], [112.8862685, -7.6238373], [112.879013, -7.6303671], [112.8695525, -7.6555164], [112.8831405, -7.6608012], [112.9013671, -7.6863582], [112.9232101, -7.675504], [112.9379729, -7.6604388], [112.9524088, -7.63267], [112.952354, -7.6221595], [112.9743003, -7.6499103], [112.9922041, -7.6575488], [113.0285714, -7.6484889], [113.0518952, -7.6586139], [113.0637093, -7.6692968], [113.0878431, -7.70328], [113.0999804, -7.7025571], [113.088333, -7.7074468], [113.071083, -7.7330158], [113.0546798, -7.7482684], [113.057083, -7.759433], [113.0501632, -7.7760503], [113.0537032, -7.7852809], [113.0473403, -7.819792], [113.027275, -7.8340757], [113.0062179, -7.8576253], [112.9902343, -7.8694265], [112.9660033, -7.8959525], [112.948799, -7.9063089], [112.9530639, -7.9428089], [112.9353179, -7.9561956], [112.8960723, -7.9473837], [112.8850936, -7.9525025], [112.8562087, -7.9396713], [112.8358383, -7.9410303], [112.8207778, -7.9277938], [112.8054122, -7.9254578], [112.7920531, -7.9125002], [112.7804336, -7.8921803], [112.7725982, -7.8671721], [112.7499999, -7.851136], [112.7310562, -7.8189076], [112.71492, -7.8207896], [112.6996078, -7.81401], [112.6613998, -7.8059071], [112.6546706, -7.7974776], [112.6161651, -7.7876027], [112.6020278, -7.7692307], [112.5882415, -7.7654565], [112.5748672, -7.732704]]]
        },
        properties: {
            id: "20",
            name: "PASURUAN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.2899246, -7.794013], [111.3076782, -7.797707], [111.3147201, -7.7921748], [111.329834, -7.7999977], [111.3419647, -7.7836804], [111.3621597, -7.7849183], [111.4093018, -7.7795772], [111.4133987, -7.775896], [111.449913, -7.7785224], [111.4664612, -7.7770786], [111.498703, -7.7950167], [111.5329208, -7.8037543], [111.5502624, -7.799684], [111.5769424, -7.8045635], [111.5920333, -7.7954525], [111.6008377, -7.7825098], [111.6527481, -7.772952], [111.6582412, -7.7670354], [111.6778946, -7.7744398], [111.6761093, -7.78445], [111.6906128, -7.7913603], [111.6931534, -7.8080715], [111.7226181, -7.8125433], [111.7328109, -7.8012661], [111.7521896, -7.8010134], [111.7688293, -7.8241138], [111.7857284, -7.833311], [111.7713852, -7.8560705], [111.7774658, -7.8627538], [111.7694549, -7.8865961], [111.7552948, -7.908286], [111.7498779, -7.8906798], [111.6991424, -7.8995895], [111.7027817, -7.9113111], [111.6918182, -7.9309992], [111.6700668, -7.9445886], [111.6546936, -7.941132], [111.6377182, -7.9608182], [111.659935, -7.9686226], [111.6533813, -7.9833622], [111.6574402, -7.9975595], [111.6456604, -8.0115918], [111.6299743, -8.0036315], [111.6097412, -8.0066442], [111.602005, -8.0182933], [111.5817031, -8.0258913], [111.5733642, -8.0478258], [111.5572281, -8.0499277], [111.5332489, -8.0615987], [111.5422974, -8.0701036], [111.5267868, -8.0823097], [111.5270996, -8.1041603], [111.5192794, -8.1100092], [111.4830933, -8.1084613], [111.4830398, -8.1258859], [111.4730072, -8.143116], [111.4753646, -8.1710882], [111.438324, -8.1648607], [111.4248047, -8.1703415], [111.4055481, -8.1726245], [111.3932419, -8.1594505], [111.3800125, -8.1550941], [111.3800659, -8.1373882], [111.3614654, -8.1189441], [111.3524246, -8.0933733], [111.3533249, -8.0592489], [111.3668365, -8.0307626], [111.3503113, -8.0211963], [111.3561249, -8.0002651], [111.3553695, -7.984128], [111.3276749, -7.9681139], [111.3265304, -7.9552402], [111.3163147, -7.9363122], [111.2983246, -7.9410262], [111.273323, -7.9373607], [111.2730713, -7.925764], [111.2881546, -7.9055514], [111.2994919, -7.8779611], [111.299675, -7.859858], [111.3193054, -7.8543682], [111.3057861, -7.8410663], [111.3069076, -7.8241729], [111.2987442, -7.8014984], [111.2899246, -7.794013]]]
        },
        properties: {
            id: "21",
            name: "PONOROGO"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[113.1795196, -7.7457034], [113.2142941, -7.7355455], [113.2379705, -7.7400558], [113.2329329, -7.7562587], [113.2386321, -7.8041336], [113.2277526, -7.802581], [113.2053832, -7.8252971], [113.2001647, -7.8124782], [113.1768721, -7.8106148], [113.1822433, -7.7908933], [113.1639174, -7.7792298], [113.1679534, -7.761419], [113.1795196, -7.7457034]]]
        },
        properties: {
            id: "37",
            name: "KOTA PROBOLINGGO"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.9353179, -7.9561956], [112.9530639, -7.9428089], [112.948799, -7.9063089], [112.9660033, -7.8959525], [112.9902343, -7.8694265], [113.0062179, -7.8576253], [113.027275, -7.8340757], [113.0473403, -7.819792], [113.0537032, -7.7852809], [113.0501632, -7.7760503], [113.057083, -7.759433], [113.0546798, -7.7482684], [113.071083, -7.7330158], [113.088333, -7.7074468], [113.0999804, -7.7025571], [113.1018102, -7.7127531], [113.1171714, -7.7254751], [113.1403806, -7.7255537], [113.1464924, -7.7352877], [113.1682225, -7.7389095], [113.1795196, -7.7457034], [113.1679534, -7.761419], [113.1639174, -7.7792298], [113.1822433, -7.7908933], [113.1768721, -7.8106148], [113.2001647, -7.8124782], [113.2053832, -7.8252971], [113.2277526, -7.802581], [113.2386321, -7.8041336], [113.2329329, -7.7562587], [113.2379705, -7.7400558], [113.2546884, -7.7479722], [113.27437, -7.7786651], [113.2867528, -7.7826446], [113.309825, -7.7681992], [113.3242275, -7.7760342], [113.3394982, -7.7769979], [113.3689861, -7.7578308], [113.3814762, -7.7369712], [113.3921478, -7.7429975], [113.410608, -7.734497], [113.4375922, -7.7345604], [113.4689993, -7.7140905], [113.4710554, -7.7067799], [113.490378, -7.6971349], [113.504139, -7.6981178], [113.5281585, -7.7093728], [113.5641624, -7.7139151], [113.576611, -7.7069675], [113.5966414, -7.7171078], [113.5793074, -7.7259231], [113.5725554, -7.7420679], [113.576393, -7.7561956], [113.5982359, -7.7708512], [113.6040495, -7.7982088], [113.5933912, -7.8037448], [113.6114119, -7.824029], [113.6023482, -7.8451558], [113.6172789, -7.8731666], [113.6150969, -7.8871294], [113.6234511, -7.8955412], [113.6248396, -7.925346], [113.6111067, -7.9483825], [113.6237791, -7.9614563], [113.64356, -7.9731229], [113.6276854, -7.9759059], [113.6159743, -7.989338], [113.6039885, -7.9806185], [113.5893629, -7.9853764], [113.5596922, -7.9873262], [113.5525359, -7.9982105], [113.5279082, -8.0126358], [113.5141524, -8.0137516], [113.4892348, -7.9967118], [113.4723967, -8.0219904], [113.4582595, -8.024674], [113.4324111, -8.020517], [113.4253691, -8.0111853], [113.4062575, -8.0090872], [113.391632, -7.9974414], [113.3871688, -8.0136563], [113.3630446, -8.027681], [113.3615111, -7.9961516], [113.3465041, -7.9751822], [113.3449553, -7.9560663], [113.3227385, -7.9280616], [113.2752532, -7.9298016], [113.2681044, -7.9178006], [113.2674483, -7.9012591], [113.2481917, -7.9078676], [113.2075194, -7.8980443], [113.2119445, -7.9108817], [113.1908492, -7.9449837], [113.150978, -7.9781882], [113.136032, -7.976557], [113.1147231, -7.9917347], [113.104988, -7.9813869], [113.0705718, -7.9815662], [113.0634536, -8.001373], [113.0538405, -8.0092628], [113.0424956, -7.9885003], [113.0221251, -7.9691932], [112.9940185, -7.9615939], [112.9763488, -7.9794614], [112.9587859, -7.9856398], [112.9421996, -7.9833562], [112.9281692, -7.9686005], [112.9353179, -7.9561956]]]
        },
        properties: {
            id: "22",
            name: "PROBOLINGGO"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[113.0403722, -7.2128792], [113.0612868, -7.1901896], [113.0482253, -7.1838253], [113.0575942, -7.1636703], [113.0706557, -7.1621468], [113.0789107, -7.1510251], [113.0972136, -7.1551273], [113.0942382, -7.1361454], [113.1032943, -7.1261146], [113.1072768, -7.107961], [113.1160277, -7.1041772], [113.107582, -7.0798709], [113.1201324, -7.0801074], [113.1119689, -7.0596902], [113.1152266, -7.0317356], [113.1332167, -7.0359108], [113.1388396, -7.0060136], [113.1476897, -6.9838884], [113.1346129, -6.9773862], [113.112686, -6.988838], [113.1088561, -6.9731834], [113.0952452, -6.945339], [113.1018294, -6.9318383], [113.1152495, -6.9368088], [113.1162642, -6.9153555], [113.1244948, -6.8927977], [113.1665386, -6.8901661], [113.1984734, -6.8972334], [113.2343776, -6.890699], [113.2927503, -6.8893449], [113.3122937, -6.892861], [113.3234726, -6.8879949], [113.3562441, -6.8901465], [113.3872679, -6.8868932], [113.4402093, -6.8877082], [113.4833784, -6.8968878], [113.476158, -6.9084965], [113.4780043, -6.9237024], [113.4609984, -6.9354378], [113.4594954, -6.9467589], [113.4365996, -6.9600212], [113.4196166, -6.9948246], [113.4215621, -7.0114013], [113.3946761, -7.0300118], [113.3969649, -7.0393607], [113.3931655, -7.0737421], [113.3823546, -7.0796992], [113.3765257, -7.0949794], [113.3635634, -7.1003062], [113.3673857, -7.1364681], [113.3574294, -7.1536519], [113.3795851, -7.1501829], [113.3805159, -7.1915275], [113.3966521, -7.2000214], [113.3935139, -7.2178403], [113.3266452, -7.2140344], [113.3154613, -7.2189423], [113.2769333, -7.2153945], [113.2614838, -7.2249313], [113.2204568, -7.2203333], [113.1708537, -7.2277345], [113.1594058, -7.2065442], [113.1332536, -7.2226353], [113.1008802, -7.2281162], [113.0748255, -7.224194], [113.0403722, -7.2128792]]]
        },
        properties: {
            id: "23",
            name: "SAMPANG"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.4953307, -7.4081], [112.5250549, -7.3972391], [112.5439529, -7.4047111], [112.5657501, -7.3980735], [112.5927123, -7.3722971], [112.6182403, -7.366362], [112.6289367, -7.36808], [112.6645692, -7.3514405], [112.6783599, -7.3504308], [112.7046747, -7.3361528], [112.7330523, -7.3480123], [112.7552256, -7.3367082], [112.8125715, -7.3463995], [112.826033, -7.3432436], [112.8427995, -7.3361287], [112.8343838, -7.3832618], [112.8338516, -7.4049388], [112.8404961, -7.4776578], [112.8162968, -7.4752937], [112.837105, -7.5119685], [112.8619615, -7.5213794], [112.8728491, -7.5385131], [112.8680247, -7.5509851], [112.8712711, -7.5792252], [112.84549, -7.5780944], [112.8320312, -7.5523704], [112.8165206, -7.5589178], [112.784706, -7.5627783], [112.7674636, -7.5741909], [112.7388915, -7.5732206], [112.7235488, -7.5685456], [112.7061843, -7.5449327], [112.6799621, -7.5493759], [112.6707992, -7.5585216], [112.6307754, -7.5327142], [112.6092834, -7.5075687], [112.5826339, -7.4926604], [112.5636214, -7.4760736], [112.5117416, -7.466802], [112.488594, -7.4599494], [112.4686431, -7.4452909], [112.4632568, -7.4314812], [112.4953307, -7.4081]]]
        },
        properties: {
            id: "24",
            name: "SIDOARJO"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[113.5966414, -7.7171078], [113.6425011, -7.7259173], [113.6679902, -7.736472], [113.7121441, -7.7077475], [113.7255754, -7.7224088], [113.761509, -7.7382675], [113.7883797, -7.7318632], [113.8111273, -7.7117554], [113.8202979, -7.696646], [113.8398505, -7.6847332], [113.8861876, -7.688116], [113.9046494, -7.6995327], [113.934107, -7.6982025], [113.9377694, -7.6807323], [113.9502553, -7.6810832], [113.9730107, -7.650973], [114.0012149, -7.6371977], [114.0350679, -7.6041054], [114.0431139, -7.6064688], [114.0702434, -7.6394908], [114.0847607, -7.6728444], [114.1013474, -7.7023488], [114.1340885, -7.7136011], [114.1660378, -7.7153138], [114.1953629, -7.7077569], [114.2077901, -7.7177448], [114.2360806, -7.6982443], [114.245595, -7.7011502], [114.2565641, -7.7162021], [114.2911488, -7.74621], [114.3095255, -7.7462825], [114.3285184, -7.7584551], [114.3501911, -7.7533189], [114.3796429, -7.7576258], [114.3909171, -7.7692553], [114.4034522, -7.7698779], [114.4219586, -7.7871262], [114.4423056, -7.7972282], [114.4647753, -7.8251633], [114.4589809, -7.848873], [114.4634403, -7.8901659], [114.4430139, -7.899821], [114.4244469, -7.9158159], [114.4238986, -7.9354567], [114.4135434, -7.9401198], [114.3967282, -7.9269234], [114.3615338, -7.914375], [114.3447186, -7.9114806], [114.2991331, -7.8857462], [114.2831342, -7.8972361], [114.2713239, -7.9195911], [114.2496946, -7.939358], [114.2243421, -7.9866621], [114.2116926, -7.9777634], [114.1766813, -7.9695017], [114.1662366, -7.9704449], [114.1320035, -7.9883335], [114.1137845, -7.9428642], [114.1109236, -7.9089382], [114.0942304, -7.8808363], [114.0919111, -7.8622855], [114.0952909, -7.839722], [114.0891645, -7.8242658], [114.088661, -7.8056725], [114.0806119, -7.7955421], [114.0712431, -7.7614654], [114.044235, -7.7583946], [114.0051039, -7.7625336], [113.9890287, -7.7810391], [113.9508436, -7.7652306], [113.9357069, -7.7764353], [113.9368208, -7.7917294], [113.8967207, -7.7982783], [113.84951, -7.795577], [113.8368834, -7.8123073], [113.8090819, -7.8131113], [113.793434, -7.8028102], [113.7704085, -7.7963438], [113.7473601, -7.7962508], [113.733528, -7.8096385], [113.7337187, -7.8316922], [113.7224577, -7.8790278], [113.706787, -7.8858585], [113.6998518, -7.8993511], [113.688484, -7.9038081], [113.6709364, -7.9202686], [113.6607665, -7.9378658], [113.637123, -7.9495879], [113.6237791, -7.9614563], [113.6111067, -7.9483825], [113.6248396, -7.925346], [113.6234511, -7.8955412], [113.6150969, -7.8871294], [113.6172789, -7.8731666], [113.6023482, -7.8451558], [113.6114119, -7.824029], [113.5933912, -7.8037448], [113.6040495, -7.7982088], [113.5982359, -7.7708512], [113.576393, -7.7561956], [113.5725554, -7.7420679], [113.5793074, -7.7259231], [113.5966414, -7.7171078]]]
        },
        properties: {
            id: "25",
            name: "SITUBONDO"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "MultiPolygon",
            coordinates: [[[[113.6391278, -6.8876557], [113.6823262, -6.8821764], [113.7310005, -6.8871961], [113.7396304, -6.8838791], [113.797481, -6.8854529], [113.8859324, -6.8659068], [113.9084938, -6.8632736], [113.9663254, -6.8726192], [114.0232017, -6.8994147], [114.0919446, -6.9293632], [114.1072535, -6.9421414], [114.1209757, -6.9722081], [114.1176691, -6.9818106], [114.0933405, -6.9798539], [114.0561857, -7.0043756], [114.0361776, -7.0094304], [114.0123588, -7.005358], [113.9894121, -7.0088727], [113.9754235, -7.0218905], [113.9621431, -7.0435164], [113.9468486, -7.0417613], [113.9381467, -7.0242507], [113.9165981, -7.0129613], [113.9201501, -7.0303452], [113.944577, -7.0431204], [113.9411069, -7.0572731], [113.9171002, -7.0430488], [113.8930928, -7.060316], [113.8764934, -7.079499], [113.8700806, -7.0966405], [113.8898015, -7.1079218], [113.8924636, -7.1327118], [113.8157291, -7.1331336], [113.7400757, -7.1152459], [113.6748444, -7.109284], [113.6541331, -7.1270185], [113.6340701, -7.1234202], [113.6017484, -7.1286819], [113.6020964, -7.1217371], [113.6219176, -7.0895949], [113.5997389, -7.0626317], [113.6049498, -7.0449668], [113.5831374, -7.0413767], [113.5821532, -7.0198875], [113.607849, -7.0129219], [113.6121367, -6.9918872], [113.6084288, -6.974299], [113.6257246, -6.9659201], [113.6272352, -6.9515444], [113.6401976, -6.9277106], [113.6356886, -6.9132558], [113.6391278, -6.8876557]]], [[[115.2036104, -6.9042919], [115.2157177, -6.8864295], [115.2410557, -6.8839357], [115.2531695, -6.8622743], [115.2512684, -6.8484272], [115.2367759, -6.83836], [115.2426767, -6.8286182], [115.2791065, -6.8276382], [115.3186123, -6.8346223], [115.3415675, -6.8323824], [115.3928701, -6.8346181], [115.4393662, -6.8474333], [115.4705818, -6.8591938], [115.4809904, -6.8668404], [115.5186331, -6.8819641], [115.5440284, -6.902417], [115.5598071, -6.9069002], [115.5673719, -6.9423856], [115.5349631, -6.9550446], [115.5209774, -6.9432526], [115.4988309, -6.9451375], [115.5003069, -6.9355605], [115.467287, -6.9191826], [115.4567303, -6.9059879], [115.4468901, -6.9200421], [115.4236427, -6.9228887], [115.4195136, -6.9370317], [115.3961453, -6.9200097], [115.39796, -6.9077528], [115.3796935, -6.9085745], [115.3788557, -6.8989146], [115.3270716, -6.9224003], [115.3360145, -6.9460111], [115.3569035, -6.9462134], [115.3604673, -6.9597548], [115.3785318, -6.9565963], [115.382269, -6.9824814], [115.3964504, -6.9784646], [115.4039238, -6.9881416], [115.3803384, -6.9952243], [115.3583007, -6.9921141], [115.3304286, -6.9940538], [115.3282355, -6.9579675], [115.3073733, -6.9501623], [115.2955001, -6.9529544], [115.299831, -6.9677873], [115.2839692, -6.9678592], [115.2935958, -7.0015284], [115.2680397, -6.9831641], [115.2620896, -6.9564407], [115.276891, -6.9474718], [115.2692622, -6.9345628], [115.2504417, -6.9376657], [115.2440661, -6.9296167], [115.2147367, -6.9397747], [115.2095717, -6.9350329], [115.2089882, -6.9112815], [115.2036104, -6.9042919]]], [[[113.7491959, -7.2180323], [113.7545657, -7.2062494], [113.7754977, -7.2091659], [113.8122547, -7.2208209], [113.7920415, -7.2354452], [113.7611371, -7.2192084], [113.7491959, -7.2180323]]], [[[113.8807368, -7.2008475], [113.8973513, -7.184259], [113.926152, -7.174465], [113.940298, -7.1995915], [113.9067274, -7.2103154], [113.8868844, -7.2118694], [113.8807368, -7.2008475]]], [[[115.7412565, -7.1535049], [115.7558814, -7.1505356], [115.7703104, -7.1588225], [115.7836104, -7.1549915], [115.7902254, -7.1421213], [115.8056685, -7.1576267], [115.8299371, -7.1535651], [115.8319702, -7.1659425], [115.8427961, -7.1711249], [115.8950688, -7.1660984], [115.8977795, -7.1801706], [115.8925438, -7.1935189], [115.8765042, -7.2027262], [115.8369577, -7.2066113], [115.7934844, -7.1863977], [115.7562232, -7.1727406], [115.7412565, -7.1535049]]], [[[114.4748515, -7.1458987], [114.496276, -7.1367766], [114.5091623, -7.1543192], [114.4809562, -7.1570551], [114.4748515, -7.1458987]]], [[[116.2346434, -6.9425089], [116.2552213, -6.928493], [116.2698769, -6.9387174], [116.2526893, -6.9496657], [116.2346434, -6.9425089]]], [[[115.7781851, -6.9622965], [115.7883453, -6.9373116], [115.7962847, -6.9485688], [115.792712, -6.9602784], [115.7781851, -6.9622965]]], [[[114.3932292, -5.5646095], [114.3949431, -5.5422862], [114.424949, -5.5502684], [114.451822, -5.5469821], [114.451763, -5.5663634], [114.4457576, -5.5795883], [114.4220281, -5.5898765], [114.4185922, -5.57556], [114.3932292, -5.5646095]]], [[[114.587963, -5.0652164], [114.5994019, -5.0479958], [114.6080737, -5.0564105], [114.6113244, -5.0730413], [114.6038997, -5.090917], [114.5926475, -5.0862149], [114.587963, -5.0652164]]], [[[113.9361083, -7.0711346], [113.9490044, -7.0556852], [113.9622956, -7.067383], [113.9785194, -7.0725294], [114.02069331, -7.07035762], [114.05357733, -7.07802223], [114.06433185, -7.11085454], [114.0466817, -7.1130076], [114.01010347, -7.1058293], [113.9847072, -7.1057318], [113.9424598, -7.0878292], [113.9361083, -7.0711346]]], [[[115.53617282, -7.00229259], [115.5403282, -7.0133078], [115.5330438, -7.0330007], [115.516841, -7.0174862], [115.53617282, -7.00229259]]], [[[115.6840563, -7.0631128], [115.7077007, -7.0585537], [115.7064488, -7.0735824], [115.6840563, -7.0631128]]], [[[115.6155145, -7.0543968], [115.6302881, -7.040576], [115.6339679, -7.0576627], [115.6155145, -7.0543968]]], [[[114.5133948, -7.1379092], [114.5473489, -7.1291531], [114.5912579, -7.1341074], [114.613922, -7.1405334], [114.6163185, -7.1528509], [114.5974123, -7.1624043], [114.5755681, -7.1620246], [114.5543361, -7.1415713], [114.5228213, -7.1439439], [114.5133948, -7.1379092]]], [[[114.27158, -7.0917165], [114.2960688, -7.063008], [114.3288322, -7.0552274], [114.3405267, -7.060024], [114.3687648, -7.0848001], [114.3746763, -7.1116083], [114.3917298, -7.133092], [114.39372, -7.1512481], [114.4052106, -7.1708192], [114.38771154, -7.18149914], [114.36276105, -7.17895712], [114.31852628, -7.16247433], [114.2956423, -7.1432677], [114.2751668, -7.1079427], [114.27158, -7.0917165]]], [[[114.1611746, -6.99847], [114.1670303, -6.9735378], [114.1773677, -6.9647672], [114.1865221, -6.9716468], [114.1825336, -7.0024549], [114.1611746, -6.99847]]], [[[115.4256035, -6.9846976], [115.4302563, -6.9786377], [115.4584764, -6.9877905], [115.4635195, -7.0043781], [115.4365854, -7.0002505], [115.4256035, -6.9846976]]], [[[115.5652965, -6.9598865], [115.5720998, -6.9454283], [115.5876526, -6.9389324], [115.6412915, -6.9670296], [115.6730488, -6.9873646], [115.6682204, -7.0041755], [115.6493381, -6.996978], [115.6339422, -7.0047357], [115.6156506, -7.0021849], [115.5901042, -6.9916003], [115.5924645, -6.977948], [115.5724767, -6.974652], [115.5652965, -6.9598865]]]]
        },
        properties: {
            id: "26",
            name: "SUMENEP"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.6657342, -7.1914998], [112.6617229, -7.2079581], [112.6694941, -7.2198311], [112.686612, -7.2242482], [112.7132839, -7.2165661], [112.7198043, -7.2060472], [112.7434105, -7.1958473], [112.7653295, -7.1964993], [112.7803338, -7.208796], [112.8067803, -7.2515218], [112.8183353, -7.2494091], [112.8334576, -7.259488], [112.8466701, -7.2865306], [112.8429848, -7.3160245], [112.826033, -7.3432436], [112.8125715, -7.3463995], [112.7552256, -7.3367082], [112.7330523, -7.3480123], [112.7046747, -7.3361528], [112.6783599, -7.3504308], [112.6645692, -7.3514405], [112.665226, -7.3401748], [112.6502494, -7.3267023], [112.6492011, -7.3145899], [112.6293998, -7.311618], [112.628158, -7.2853664], [112.6328149, -7.2632976], [112.6171729, -7.2575595], [112.5978998, -7.2285691], [112.6004881, -7.2024996], [112.6096787, -7.2077778], [112.6397738, -7.1924241], [112.6657342, -7.1914998]]]
        },
        properties: {
            id: "38",
            name: "KOTA SURABAYA"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.4248047, -8.1703415], [111.438324, -8.1648607], [111.4753646, -8.1710882], [111.4730072, -8.143116], [111.4830398, -8.1258859], [111.4830933, -8.1084613], [111.5192794, -8.1100092], [111.5270996, -8.1041603], [111.5267868, -8.0823097], [111.5422974, -8.0701036], [111.5332489, -8.0615987], [111.5572281, -8.0499277], [111.5733642, -8.0478258], [111.5817031, -8.0258913], [111.602005, -8.0182933], [111.6097412, -8.0066442], [111.6299743, -8.0036315], [111.6456604, -8.0115918], [111.6574402, -7.9975595], [111.6533813, -7.9833622], [111.659935, -7.9686226], [111.6377182, -7.9608182], [111.6546936, -7.941132], [111.6700668, -7.9445886], [111.6918182, -7.9309992], [111.7027817, -7.9113111], [111.6991424, -7.8995895], [111.7498779, -7.8906798], [111.7552948, -7.908286], [111.7382431, -7.9306673], [111.7381744, -7.9590492], [111.7590103, -7.9837918], [111.7537689, -8.0024881], [111.755783, -8.0240878], [111.7702865, -8.041439], [111.7802124, -8.0392312], [111.7977371, -8.0674466], [111.8096542, -8.0757808], [111.8141632, -8.0885343], [111.8438339, -8.0963077], [111.8407058, -8.1195525], [111.8245544, -8.1320819], [111.8020858, -8.137412], [111.7710418, -8.1380319], [111.7531738, -8.1467599], [111.733612, -8.1422071], [111.7114486, -8.1790819], [111.7282943, -8.2003631], [111.7335434, -8.2525882], [111.7458954, -8.2589788], [111.7488556, -8.2813834], [111.7588348, -8.2902011], [111.7740815, -8.2890626], [111.7681811, -8.2960134], [111.7705317, -8.3278311], [111.7537313, -8.3399819], [111.739938, -8.3312339], [111.7485151, -8.3129466], [111.7263347, -8.2868973], [111.7120287, -8.2913227], [111.7134434, -8.3222421], [111.6901302, -8.328382], [111.6987497, -8.3453452], [111.7133065, -8.3514079], [111.7098488, -8.3667941], [111.6972162, -8.3794986], [111.6699748, -8.3673149], [111.6672918, -8.3557871], [111.6495598, -8.3549965], [111.6330255, -8.3432001], [111.6283543, -8.325152], [111.608631, -8.3266246], [111.5953352, -8.3220821], [111.5710836, -8.33171], [111.5735412, -8.3180311], [111.5611318, -8.3081361], [111.5458684, -8.3075615], [111.5159748, -8.3337786], [111.4947037, -8.3151292], [111.4782575, -8.3056237], [111.4657707, -8.3205226], [111.4451166, -8.3015423], [111.4542673, -8.2855818], [111.4489772, -8.2691239], [111.4226035, -8.259572], [111.4036782, -8.2708091], [111.4063949, -8.2583761], [111.3934708, -8.230031], [111.408638, -8.2130832], [111.4014129, -8.196557], [111.4227752, -8.1885738], [111.4248047, -8.1703415]]]
        },
        properties: {
            id: "27",
            name: "TRENGGALEK"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[112.1706212, -6.8971062], [112.1807785, -6.9108934], [112.2030029, -6.9182991], [112.2020187, -6.9446572], [112.2143783, -7.009242], [112.2079849, -7.0343131], [112.2186431, -7.035931], [112.2152557, -7.0547189], [112.218811, -7.0686764], [112.1672516, -7.0974454], [112.154541, -7.1101183], [112.1336898, -7.0983433], [112.1225433, -7.1081719], [112.115509, -7.089724], [112.0856475, -7.0855607], [112.0791626, -7.0660133], [112.047409, -7.0775413], [112.0348053, -7.0771693], [112.0100632, -7.0942387], [111.9976425, -7.122229], [111.985878, -7.1396927], [111.9512786, -7.1332235], [111.9426498, -7.1547069], [111.9302063, -7.1543407], [111.9312973, -7.13346], [111.9129791, -7.137649], [111.8970642, -7.1301984], [111.8792953, -7.1324457], [111.8635635, -7.128273], [111.8542862, -7.1143789], [111.8210678, -7.087203], [111.7943497, -7.0820641], [111.7674484, -7.0836071], [111.7533874, -7.0932841], [111.7435226, -7.0841235], [111.7131195, -7.08116], [111.6923065, -7.0635423], [111.6945953, -7.0540828], [111.6748886, -7.0486569], [111.6602859, -7.0393614], [111.6525955, -7.0001535], [111.6227417, -6.9860339], [111.604721, -6.9669566], [111.58741, -6.9635543], [111.5739212, -6.9544386], [111.5753326, -6.9178037], [111.5835724, -6.9103283], [111.6024704, -6.9115829], [111.5997162, -6.8955631], [111.6151809, -6.8798694], [111.6100082, -6.8714332], [111.6103973, -6.8478269], [111.6192016, -6.8216071], [111.6350097, -6.8288045], [111.6604538, -6.8151421], [111.6641922, -6.7974867], [111.6599044, -6.7821388], [111.664711, -6.7700467], [111.6843719, -6.7705664], [111.6914992, -6.7539632], [111.7098676, -6.7661453], [111.7287119, -6.7716061], [111.7509246, -6.7705729], [111.769796, -6.7754617], [111.8091014, -6.7938958], [111.8303407, -6.8001882], [111.8650164, -6.798654], [111.9226945, -6.7790514], [111.946585, -6.7639733], [111.9609043, -6.7605871], [111.9767117, -6.7693587], [111.9869256, -6.7956842], [112.0063394, -6.8177683], [112.0102419, -6.8349594], [112.0358958, -6.870177], [112.0529572, -6.8868644], [112.0723385, -6.8948196], [112.1074124, -6.8950746], [112.1213068, -6.9015974], [112.1706212, -6.8971062]]]
        },
        properties: {
            id: "28",
            name: "TUBAN"
        }
    }, {
        type: "Feature",
        geometry: {
            type: "Polygon",
            coordinates: [[[111.7552948, -7.908286], [111.7694549, -7.8865961], [111.7774658, -7.8627538], [111.7713852, -7.8560705], [111.7857284, -7.833311], [111.799202, -7.8365673], [111.8027115, -7.8656682], [111.8303756, -7.8774361], [111.8512497, -7.9008569], [111.8630294, -7.9076595], [111.882843, -7.9471816], [111.9168319, -7.9611453], [111.931221, -7.9623017], [111.9447937, -7.9532003], [111.9470672, -7.9711122], [111.9568862, -7.9967746], [111.9748687, -8.0443534], [111.9946289, -8.059328], [111.9913254, -8.0786952], [112.0030746, -8.0954408], [112.0370102, -8.1020354], [112.0451507, -8.1085271], [112.0681686, -8.1121825], [112.0813675, -8.119274], [112.0911712, -8.1106814], [112.119873, -8.1273459], [112.116539, -8.1576146], [112.1048965, -8.1580886], [112.0785827, -8.1875171], [112.0594635, -8.1842002], [112.0286255, -8.1690177], [112.0229721, -8.1932773], [112.0278473, -8.2019805], [112.0226516, -8.2442588], [112.030632, -8.2626819], [112.0236816, -8.2810954], [112.0322418, -8.2948855], [112.02849646, -8.31234825], [112.0200925, -8.3036372], [111.9947349, -8.2978334], [111.9804404, -8.2850438], [111.9478477, -8.2773629], [111.9362086, -8.2926954], [111.9378499, -8.305962], [111.9110386, -8.2974727], [111.8901156, -8.297807], [111.8693165, -8.2824573], [111.8634555, -8.2713489], [111.8395894, -8.274593], [111.8026232, -8.2648136], [111.7951617, -8.2554948], [111.7764724, -8.2583873], [111.7789283, -8.2756819], [111.7740815, -8.2890626], [111.7588348, -8.2902011], [111.7488556, -8.2813834], [111.7458954, -8.2589788], [111.7335434, -8.2525882], [111.7282943, -8.2003631], [111.7114486, -8.1790819], [111.733612, -8.1422071], [111.7531738, -8.1467599], [111.7710418, -8.1380319], [111.8020858, -8.137412], [111.8245544, -8.1320819], [111.8407058, -8.1195525], [111.8438339, -8.0963077], [111.8141632, -8.0885343], [111.8096542, -8.0757808], [111.7977371, -8.0674466], [111.7802124, -8.0392312], [111.7702865, -8.041439], [111.755783, -8.0240878], [111.7537689, -8.0024881], [111.7590103, -7.9837918], [111.7381744, -7.9590492], [111.7382431, -7.9306673], [111.7552948, -7.908286]]]
        },
        properties: {
            id: "29",
            name: "TULUNGAGUNG"
        }
    }]
};

    </script>
<script src="https://unpkg.com/@turf/turf@3.5.2/turf.min.js"></script>
<script>

	var map = L.map('map');

	map.createPane('labels');

	// This pane is above markers but below popups
	map.getPane('labels').style.zIndex = -1000;

	// Layers in this pane are non-interactive and do not obscure mouse/touch events
	// map.getPane('labels').style.pointerEvents = 'none';

	var cartodbAttribution = '';

	var positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png', {
		attribution: cartodbAttribution
	}).addTo(map);

	var positronLabels = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
		attribution: cartodbAttribution,
		pane: 'labels'
	}).addTo(map);

	geojson = L.geoJson(euCountries,{style:({properties})=>{
							var kdkab = properties.name.toLowerCase();
							// var warna = risiko[kdkab][0].ke_risiko;
							return {
                                className:properties.id+' '+properties.name.replace(" ","_"),
								fillColor:'blue',
								fillOpacity:0.7
							}
						},onEachFeature: function(feature,layer){
                            // layer._path.id = feature.properties.id;
                            var icon =L.divIcon({
									className: 'location-pin',
									html: `
										<div class="map-pin relative" style="width:100px;margin-left:-20px" onclick="gantiwarna(`+feature.properties.id+`)">
											<div class="flex center mb-1" style="pointer-events:none">
												<div style="width:20px;height:20px" class="label pin maroon" id='`+feature.properties.id+`' ></div>
											</div>
											<div class="label-text">`+feature.properties.name.replace('Kabupaten','KAB.').toUpperCase()+`</div>
										</div>
									`,
									iconSize: [60, 30],
									iconAnchor: [30,25],
									tooltipAnchor: [20,0],
								});
                        
                        // if (feature.geometry.type === 'Polygon') {
                            console.log('Polygon detected');
                            var centroid = turf.centroid(feature);
                            var lon = centroid.geometry.coordinates[0];
                            var lat = centroid.geometry.coordinates[1];
                            var marker = L.marker([lat,lon],{icon:icon}).addTo(map);
                            // marker.bindPopup(feature.properties.name);
                        // }
                }


    }).addTo(map);

	// geojson.eachLayer(function (layer) {
	// 	// layer.bindPopup(layer.feature.properties.name);
	// 	layer.bindPopup(layer.feature.properties.name);
	// });

	map.setView({ lat: -7.8027689, lng: 112.5479625 }, 9);
</script>
<script>
var url_string = window.location.href; //window.location.href
var url = new URL(url_string);
var c = url.searchParams.get("tetangga");
console.log(c);

document.getElementById(c).style.border="4px solid YELLOW";
document.getElementsByClassName(c)['0'].setAttribute('fill','orange')


    function gantiwarna(id) {
        console.log('test');
        if(String(window.location.href).includes('tetangga=')){
            window.location.href=window.location.href.split("tetangga=")[0]+'tetangga='+id;;
        }else{
  window.location.href = window.location.href+'?tetangga='+id;}
  document.getElementById(id).style.border="4px solid YELLOW";
}


  var loopp = {!! json_encode($tetangga) !!};
  for (var xxx =0;xxx < loopp.length;xxx++){
  console.log(loopp[xxx]);
  
document.getElementsByClassName(loopp[xxx].replace(" ","_"))['0'].setAttribute('fill','green');
  }
  
</script>
</body>

</html>
