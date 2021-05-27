 
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
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <link rel="stylesheet" href="/assets/bower_components/jqcloud2/dist/jqcloud.min.css">
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
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" type="text/css" href="/assets/css/berita.css">
  {{-- <link href="/assets/demo/demo.css" rel="stylesheet" /> --}}
</head>

<body class="white-content">
  <div class="wrapper">
    <div class="sidebar">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
              <img src="/assets/img/2.png" width="120%" height="120%"> ITS
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
          <li class="active">
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
          <li>
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
            <a class="navbar-brand" href="javascript:void(0)">   <img src="/assets/img/lambangits.png" width="4%" height="4%"> ITS</a>
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

      <!-- Card COVID-19 -->
      <div class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-chart">
              <div class="card-header ">
                <h1 style='text-align:center;'>Statistik Berita Populer COVID-19 di {{$provinsi}}</h1>
              </div>
            </div>
             <div class="card card-header">
              <form method='get' action=/berita/statistik>
              <div class="row">
                <div class="col-6 form-group row">
                  <label for="example-date-input" class="col-2 col-form-label">Date</label>
                  <input class="col-4 form-control" type="date" value="2020-03-18" id="example-date-input" name="datestart">
                  <label for="example-date-input" class="col-1 col-form-label">-</label>
                  
                  <input class="col-4 form-control" type="date" value="{{date('Y-m-d')}}" id="example-date-input" name="dateend">
                </div>
                <!-- <div class="col-6 row">
                  <label for="example-date-input" class="col-2 col-form-label">Provinsi</label>
                  <div class="col-10 dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-provinsi" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Provinsi</button>
                    <div class="dropdown-menu dropdown-multicol" aria-labelledby="dropdownMenuButton">
                      <div class="dropdown-row">
                        <a class="dropdown-item" href="#">c</a>
                        <a class="dropdown-item" href="#">Bananas</a>
                        <a class="dropdown-item" href="#">Apples</a>
                      </div>
                      <div class="dropdown-row">
                        <a class="dropdown-item" href="#">Potatoes</a>
                        <a class="dropdown-item" href="#">Leeks</a>
                        <a class="dropdown-item" href="#">Cauliflowers</a>
                      </div>
                      <div class="dropdown-row">
                        <a class="dropdown-item" href="#">Beef</a>
                        <a class="dropdown-item" href="#">Pork</a>
                        <a class="dropdown-item" href="#">Venison</a>
                      </div>
                    </div>

                  </div>
                </div> -->
                <div class="col-3 row">
                <select class="col-11" name="area" id="area">
                    <option value="Semua"selected>Pilih Provinsi</option>
                    <option value="Jatim">Jawa Timur</option>
                    <option value="Jabar">Jawa Barat</option>
                    <option value="Jateng">Jawa Tengah</option>
                    <option value="DIY">D.I Yogyakarta</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Banten">Banten</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Aceh">Aceh</option>
                    <option value="Sumut">Sumatera Utara</option>
                    <option value="Sumbar">Sumatera Barat</option>
                    <option value="Sumsel">Sumatera Selatan</option>
                    <option value="Riau">Riau</option>
                    <option value="Kep_riau">Kepulauan Riau</option>
                    <option value="Babel">Bangka Belitung</option>
                    <option value="Bengkulu">Bengkulu</option>
                    <option value="Lampung">Lampung</option>
                    <option value="Bali">Bali</option>
                    <option value="NTT">NTT</option>
                    <option value="NTB">NTB</option>
                    <option value="Kalbar">Kalimantan Barat</option>
                    <option value="Kalteng">Kalimantan Tengah</option>
                    <option value="Kalsel">Kalimantan Selatan</option>
                    <option value="Kaltim">Kalimantan Timur</option>
                    <option value="Kaltara">Kalimantan Utara</option>
                    <option value="Sulut">Sulawesi Utara</option>25
                    <option value="Sulteng">Sulawesi Tengah</option>
                    <option value="Sulbar">Sulawesi Barat</option>
                    <option value="Sulsel">Sulawesi Selatan</option>
                    <option value="Sultra">Sulawesi Tenggara</option>
                    <option value="Gorontalo">Gorontalo</option>
                    <option value="Maluku">Maluku</option>
                    <option value="Malut">Maluku Utara</option>
                    <option value="Papua">Papua</option>
                    <option value="Papbar">Papua Barat</option>
                  </select>
                </div>
                 <input class="btn btn-primary" id="submitbutton" type='submit'>
                  </div>
              </form>
                
              </div>
            
        <!-- Card COVID-19 -->
      <div class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-12 text-left">
                    <h5 class="card-category">Graph data berita populer</h5>
                    <h2 class="card-title">Graph Data Berita Populer Topik Covid-19 Berdasarkan Label</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="width:700px;height:300px;position: relative;">
                  <div class="row">
                    <div class="col-sm-12">
                      <canvas id="chart2"></canvas>
                    </div>
                  </div>
                  
                </div>
                <br>
                <br>
                <br>
              </div>
            </div>
          </div>
        </div>
        
        <div class="card card-chart" style="height: 500px;">        
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-12 text-left" >
                    <h5 class="card-category">Graph data berita populer</h5>
                    <h2 class="card-title">Graph Data Berita Populer Topik Covid-19 Berdasarkan Label</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="wordcloud-all" id="wordcloud-all" ></div>
                    </div>
                </div>
                  
              </div>   
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="card card-chart" style="height: 600px;">        
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-12 text-left" >
                    <h5 class="card-category">Graph data berita populer</h5>
                    <h2 class="card-title">Graph Data Berita Populer Topik Covid-19 Berdasarkan Label</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="wordcloud-information" id="wordcloud-information" ></div>
                    </div>
                </div>
                  
              </div>   
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card card-chart" style="height: 600px;">        
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-12 text-left" >
                    <h5 class="card-category">Graph data berita populer</h5>
                    <h2 class="card-title">Graph Data Berita Populer Topik Covid-19 Berdasarkan Label</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="wordcloud-donation" id="wordcloud-donation" ></div>
                    </div>
                </div>   
            </div>
          </div>
          </div>
          </div>
          <div class="row">
          <div class="col-sm-6">
            <div class="card card-chart" style="height: 600px;">        
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-12 text-left" >
                    <h5 class="card-category">Graph data berita populer</h5>
                    <h2 class="card-title">Graph Data Berita Populer Topik Covid-19 Berdasarkan Label</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="wordcloud-criticisms" id="wordcloud-criticisms" ></div>
                    </div>
                </div>
                  
              </div>   
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card card-chart" style="height: 600px;">        
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-12 text-left" >
                    <h5 class="card-category">Graph data berita populer</h5>
                    <h2 class="card-title">Graph Data Berita Populer Topik Covid-19 Berdasarkan Label</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="wordcloud-hoax" id="wordcloud-hoax" ></div>
                    </div>
                </div>   
            </div>
          </div>
          </div>
          </div>
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
    console.log("tes");
  console.log( {!! json_encode($label) !!});
  var ctx = document.getElementById('chart2');

  // <block:setup:1>
  const data = {
    labels: ['Informasi','Donasi','Kritik','Hoaks','Lain-lain'],
    datasets: [{
      data: {!! json_encode($label) !!},
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  
  // </block:setup>

  // <block:config:0>
  var barChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      legend: {
        display: false
    },
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero: true
              }
          }]
      }
    },
  });

  ctx.onclick = function(e) {
   var slice  = barChart.getElementAtEvent(e);
   if (!slice.length) return; // return if not clicked on slice
   var label = slice[0]._model.label;
   switch (label) {
      // add case for each label/slice
      case 'Informasi':
         window.open("{{URL::to('/berita/list/?label=notification of information')}}");
         break;
      case 'Donasi':
         window.open("{{URL::to('berita/list/?label=donation')}}");
         break;
      case 'Kritik':
         window.open("{{URL::to('berita/list/?label=criticisms')}}");
         break;
      case 'Hoaks':
         window.open("{{URL::to('berita/list/?label=hoax')}}");
         break;
      case 'Lain-lain':
         window.open("{{URL::to('berita/list/?label=other')}}");
         break;
      // add rests ...
   }
  }
  // </block:config>



  </script>
  


  
  
  <!--   Core JS Files   -->
  <script src="/assets/js/core/jquery.min.js"></script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <!--  Notifications Plugin    -->
  <script src="/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="/assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>

  
 
  <script src="/assets/bower_components/jqcloud2/dist/jqcloud.min.js"></script>
  

<script >
    var words_all = {!! json_encode($wordcloud_all) !!};
    var words_information = {!! json_encode($wordcloud_information) !!};
    var words_donation = {!! json_encode($wordcloud_donation) !!};
    var words_criticisms = {!! json_encode($wordcloud_criticisms) !!};
    var words_hoax = {!! json_encode($wordcloud_hoax) !!};
$('#wordcloud-all').jQCloud(words_all, {
  width: 1000,
  height: 400
});
$('#wordcloud-information').jQCloud(words_information, {
  width: 1000,
  height: 400
});
$('#wordcloud-donation').jQCloud(words_donation, {
  width: 1000,
  height: 400
});
$('#wordcloud-criticisms').jQCloud(words_criticisms, {
  width: 1000,
  height: 400
});
$('#wordcloud-hoax').jQCloud(words_hoax, {
  width: 1000,
  height: 400
});
  </script>
  
  
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
    <script language="JavaScript" type="text/javascript" src="/assets/js/berita/dropdown.js"></script>
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