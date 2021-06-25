
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
  <style type="text/css">
    .my-active span{
      background-color: #5cb85c !important;
      color: white !important;
      border-color: #5cb85c !important;
    }
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
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
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              
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
                <h1 style='text-align:center;'>Riwayat Berita COVID-19 di</h1>
                @if($provinsi!="")
                    <h1 class="capitalize" style='text-align:center;'>Provinsi {{$provinsi}} Kota {{$kota}}
                    </h1>
                @else
                    <h1 style='text-align:center;'>indonesia</h1>
                @endif

              </div>
            </div>
             <div class="card card-header">
              <form method='get' action="/berita/list/{{$provinsi}}/{{$kota}}">
              <div class="row">
                <div class="col-6 form-group row">
                  <label for="example-date-input" class="col-2 col-form-label">Date</label>
                  <input class="col-4 form-control" type="date" value="2020-03-18" id="example-date-input" name="datestart">
                  <label for="example-date-input" class="col-1 col-form-label">-</label>
                  
                  <input class="col-4 form-control" type="date" value="{{date('Y-m-d')}}" id="example-date-input" name="dateend">
                </div>

                <select class="col-2" name="sorting" id="sorting">
                    <option value="Terbaru"selected>Terbaru</option>
                    <option value="Terlama">Terlama</option>
                  </select>
                  <div class="col-2">
                 <input class="btn btn-primary" id="submitbutton" type='submit'>
               </div>
              </form> 
                
              </div>
            </div>
              
<br />
@if ($berita->onFirstPage())
<!-- Riwayat Berita COVID-19 -->
        <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-12 text-left">
                    <h5 class="card-category">Riwayat Berita COVID-19</h5>
                    <h2 class="card-title">Berita Terbaru COVID-19 di Kota {{$kota}}</h2>
                  </div>
                  <div class="col-sm-6">
                  
                  </div>
                </div>
              </div>
              
              <div class="card-body">
                <div style="width:1000px;height:400px;position: relative;">
                        @php 
                            $counter=0;
                        @endphp

                        @foreach($berita as $b)
                            @if($counter==0)
                              <div class="row">
                                  <div class="col-sm-6">
                                  
                                    <div class="col-sm-11 div-gambar-utama">
                                        <a href="{{$b->url}}">
                                          <img src="{{$b->img_url}}" class="news-gambar">
                                        </a>
                                    </div>
                                    
                                  
                                  <div class="col-sm-12">
                                   <div class="row col-sm-11">
                                      @if($b->news_portal=='kompas')
                                        <div class="col-sm-4 text-justify news-kompas news-portal">{{$b->news_portal}}</div>

                                      @else
                                        <div class="col-sm-4 text-justify news-tribun news-portal">{{$b->news_portal}}</div>
                                      @endif
                                        <div class="text-left"><p style="font-size: 10px;">{{$b->date}}</p></div>
                                      </div>
                                      <div class="row col-sm-12">
                                        <a href="/berita/list/?label={{$b->label}}" style="margin-left: 15px;">
                                        @if($b->label=='notification of information')
                                          <div class="text-fit news-tribun news-portal"><p>Informasi</p></div>
                                        @elseif($b->label=='donation')
                                          <div class="text-fit news-tribun news-portal"><p>Donasi</p></div>
                                        @elseif($b->label=='criticisms')
                                          <div class="text-fit news-tribun news-portal"><p>Kritik</p></div>
                                        @elseif($b->label=='Hoax')
                                          <div class="text-fit news-tribun news-portal"><p>Hoaks</p></div>
                                        @else
                                          <div class="text-fit news-tribun news-portal"><p>Lain-lain</p></div>
                                        @endif
                                        </a>
                                      </div>
                                      <div class="col-sm-12 text-justify news-title" target="_blank"><a style="font-size: 15px" href="{{$b->url}}">{{$b->title}}</a></div>
                                      <div class="col-sm-12 text-justify news-title"><span style="font-size: 10px" href="{{$b->url}}">{{substr($b->content, 1, 200)}}</span></div>
                           
                                  </div>

                                  </div>
                                  <div class="col-sm-6">
                            @elseif($counter>0 && $counter<=3)
                                  <div class="berita-left">
                                  <div class="row">
                                    <div class="col-sm-4 div-gambar">
                                        <a href="{{$b->url}}">
                                          <img src="{{$b->img_url}}" class="img-fluid">
                                        </a>
                                    </div>
                          
                                  <div class="col-sm-8">
                                      <div class="row col-sm-11">
                                      @if($b->news_portal=='kompas')
                                        <div class="col-sm-6 text-justify news-kompas">{{$b->news_portal}}</div>

                                      @else
                                        <div class="col-sm-6 text-justify news-tribun">{{$b->news_portal}}</div>
                                      @endif
                                        <div class="text-left"><p style="font-size: 10px;">{{$b->date}}</p></div>
                                      </div>
                                      <div class="row col-sm-12">
                                       <a href="/berita/list/?label={{$b->label}}" style="margin-left: 15px;">
                                        @if($b->label=='notification of information')
                                          <div class="text-fit news-tribun news-portal"><p>Informasi</p></div>
                                        @elseif($b->label=='donation')
                                          <div class="text-fit news-tribun news-portal"><p>Donasi</p></div>
                                        @elseif($b->label=='criticisms')
                                          <div class="text-fit news-tribun news-portal"><p>Kritik</p></div>
                                        @elseif($b->label=='Hoax')
                                          <div class="text-fit news-tribun news-portal"><p>Hoaks</p></div>
                                        @else
                                          <div class="text-fit news-tribun news-portal"><p>Lain-lain</p></div>
                                        @endif
                                        </a>
                                      </div>

                                      <div class="col-sm-12 text-justify news-title"><a href="{{$b->url}}" target="_blank">{{$b->title}}</a></div>
                                  </div>
                                  </div>
                                      </div>
                                                                    <br>
                              <br>
                            
                                  @endif
                        @php
                            $counter++;
                        @endphp
                        @endforeach
    
                              </div>
                      
                      
                    </div>
                  
                  <div>

                  </div>
                </div>
                <br>
                <br>
              </div>
              
            </div>
          </div>
        </div>
      </div>
        @endif
    <!-- Riwayat Berita COVID-19 -->
        <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Riwayat Berita COVID-19</h5>
                    <h2 class="card-title">Berita COVID-19 di Kota {{$kota}}</h2>
                  </div>
                  
                  <div class="col-sm-6 search_bar" style="top: 60px;right: 0px;position: absolute;">
                    @if($provinsi!="" && $provinsi!="Indonesia")
                      <form method='get' action="/berita/cari">
                        <input id="searchbar" onkeypress="search_berita()" type="text" name="cari" placeholder="Cari Berita..">
                      </form>
                    @else
                      <form method='get' action="/berita/cari/?provinsi={{$provinsi}}">
                        <input id="searchbar" onkeypress="search_berita()" type="text" name="cari" placeholder="Cari Berita..">
                      </form>
                    @endif
                  </div>
                </div>
              </div>
              
              <div class="card-body riwayat-berita">
                <div style="width:1000px;height:700px;position: relative;">        
                        @php 
                            $counter=0;
                        @endphp

                        @foreach($berita as $b)
                            @if($counter%2==0)
                              <div class="row">

                                  <div class="col-sm-6">
                                  <div class="row">
                                    <div class="col-sm-4 div-gambar">
                                        <a href="{{$b->url}}">
                                          <img src="{{$b->img_url}}" class="news-gambar">
                                        </a>
                                    </div>
                          
                                  <div class="col-sm-8">
                                      <div class="row col-sm-11">
                                      @if($b->news_portal=='kompas')
                                        <div class="col-sm-6 text-justify news-kompas news-portal">{{$b->news_portal}}</div>

                                      @else
                                        <div class="col-sm-6 text-justify news-tribun news-portal">{{$b->news_portal}}</div>
                                      @endif
                                        <div class="text-left"><p style="font-size: 10px;">{{$b->date}}</p></div>
                                      </div>
                                      <div class="row col-sm-12">
                                        <a href="/berita/list/?label={{$b->label}}" style="margin-left: 15px;">
                                        @if($b->label=='notification of information')
                                          <div class="text-fit news-tribun news-portal"><p>Informasi</p></div>
                                        @elseif($b->label=='donation')
                                          <div class="text-fit news-tribun news-portal"><p>Donasi</p></div>
                                        @elseif($b->label=='criticisms')
                                          <div class="text-fit news-tribun news-portal"><p>Kritik</p></div>
                                        @elseif($b->label=='Hoax')
                                          <div class="text-fit news-tribun news-portal"><p>Hoaks</p></div>
                                        @else
                                          <div class="text-fit news-tribun news-portal"><p>Lain-lain</p></div>
                                        @endif
                                        </a>
                                      </div>
                                      <div class="col-sm-12 text-justify news-title"><a href="{{$b->url}}" target="_blank">{{$b->title}}</a></div>
                                  </div>
                                  </div>
                                  </div>
                            @elseif($counter%2==1)
                                  <div class="col-sm-6">
                                  <div class="row">
                                    <div class="col-sm-4 div-gambar">
                                        <a href="{{$b->url}}">
                                          <img src="{{$b->img_url}}" class="img-fluid">
                                        </a>
                                    </div>
                          
                                  <div class="col-sm-8">
                                      <div class="row col-sm-11">
                                      @if($b->news_portal=='kompas')
                                        <div class="col-sm-6 text-justify news-kompas">{{$b->news_portal}}</div>

                                      @else
                                        <div class="col-sm-6 text-justify news-tribun">{{$b->news_portal}}</div>
                                      @endif
                                        <div class="text-left"><p style="font-size: 10px;">{{$b->date}}</p></div>
                                      </div>
                                      <div class="row col-sm-12">
                                        <a href="/berita/list/?label={{$b->label}}" style="margin-left: 15px;">
                                        @if($b->label=='notification of information')
                                          <div class="text-fit news-tribun news-portal"><p>Informasi</p></div>
                                        @elseif($b->label=='donation')
                                          <div class="text-fit news-tribun news-portal"><p>Donasi</p></div>
                                        @elseif($b->label=='criticisms')
                                          <div class="text-fit news-tribun news-portal"><p>Kritik</p></div>
                                        @elseif($b->label=='Hoax')
                                          <div class="text-fit news-tribun news-portal"><p>Hoaks</p></div>
                                        @else
                                          <div class="text-fit news-tribun news-portal"><p>Lain-lain</p></div>
                                        @endif
                                        </a>
                                      </div>

                                      <div class="col-sm-12 text-justify news-title"><a href="{{$b->url}}" target="_blank">{{$b->title}}</a></div>
                                  </div>
                                  </div>
                                  </div>
                              </div>
                              <br>
                              <br>
                            @endif
                        @php
                            $counter++;
                        @endphp
                        @endforeach
                
          
                
              </div>
               @if ($berita->hasPages())
                            <div class="pagination align-items-center d-flex justify-content-center">
       
                            @if (!$berita->onFirstPage())
                              <a href="{{ $berita->previousPageUrl() }}" rel="prev">← Previous</a>
                            @endif
                            @if ($berita->currentPage()-2>0)
                              <a href="{{$berita->url($berita->currentPage()-2)}}">{{$berita->currentPage()-2}}</a>
                            @endif
                            @if ($berita->currentPage()-1>0)
                              <a href="{{$berita->url($berita->currentPage()-1)}}">{{$berita->currentPage()-1}}</a>
                            @endif
                            <a class="active" href="{{$berita->url($berita->currentPage())}}">{{$berita->currentPage()}}</a>
                            @if ($berita->currentPage()+1<=$berita->lastPage())
                              <a href="{{$berita->url($berita->currentPage()+1)}}">{{$berita->currentPage()+1}}</a>
                            @endif
                            @if ($berita->currentPage()+2<=$berita->lastPage())
                              <a href="{{$berita->url($berita->currentPage()+2)}}">{{$berita->currentPage()+2}}</a>
                            @endif
                            @if ($berita->hasMorePages())
                              <a href="{{ $berita->nextPageUrl() }}" rel="next">Next →</a>
                             
                            @endif
                            </div>
                          @endif
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

  

  <script src="/assets/js/berita/kota.js"></script>
  <script src="/assets/js/berita/cari_berita.js"></script>
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

  
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

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