<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019  TA History COVID (https://www.creative-tim.com)


* Coded by  TA History COVID

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    TA History COVID
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
            <a href="./dashboard.html">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./icons.html">
              <i class="tim-icons icon-atom"></i>
              <p>Berita</p>
            </a>
          </li>
          <li>
            <a href="./map.html">
              <i class="tim-icons icon-pin"></i>
              <p>Perbandingan Kota</p>
            </a>
          </li>
          <li class="active ">
            <a href="./notifications.html">
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
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-sound-wave"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to your email</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a></li>
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="../assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
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
                <h1 style='text-align:center;'>PERBANDINGAN POLA PENYEBARAN KASUS COVID-19 DI JAWA TIMUR </h1>
              </div>
            </div>
          </div><div class="col-12"><div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
              </div>

              <div class="card-body">
              <label>Tanggal Mulai</label>
                <input type='date'> 
                
              <label>Tanggal Berakhir</label>
                <input type='date'>

              <div class="card-body">
              <label for="Kabupaten">Kabupaten :</label>
              <form method='get' action='/perbandingan'>
              <select id="Kabupaten" name='tetangga'>
                <option value="">-</option>
                @foreach($kabupaten as $k)
                <option value="{{$k->id}}">{{$k->kabupaten}}</option>
                @endforeach
              </select> 
              <input type='submit' name='submit'>
              </form>
              </div>
              </div>
            </div>
          </div>
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  
                  <div class="col-sm-6">
                  
                  </div>
                </div>
              </div>

              @foreach ($data_all as $semua)
                   <div class="card-body">
                <div style="width:1000px">
                    <p ><h2 style='text-align:center'>{{$semua->kabupaten}} -- {{$semua->tetangga}}</h2>
                    <canvas id="chart{{$semua->tetangga}}"></canvas>
                  </div>
                  <br>
                  <br>
                  
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
            }
          }
        }

      
    });
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
  
</body>

</html><!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019  TA History COVID (https://www.creative-tim.com)


* Coded by  TA History COVID

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->