
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
  <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
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

      <!-- Card COVID-19 -->
      <div class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-chart">
              <div class="card-header ">
                <h1 style='text-align:center;'>Riwayat Berita COVID-19 di Indonesia</h1>
              </div>
            </div>
            <div class="card-chart">
              <div class="row">
                <div class="col-sm-4">
                    <div class="card card-header">
                      <div class="text-left">
                          <h5 class="card-category">Total Kasus Covid-19</h5>
                          <h2 class="card-title text-left">1.626.812</h2>
                      </div>
                    </div>
                </div>
                <div class="col-sm-4">
                  <div class="card card-header">
                      <div class="text-left">
                          <h5 class="card-category">Total Pasien Meninggal Covid-19</h5>
                          <h2 class="card-title text-left">1.481.449</h2>
                      </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card card-header">
                      <div class="text-left">
                          <h5 class="card-category">Total Pasien Sembuh Covid-19</h5>
                          <h2 class="card-title text-left">44.172</h2>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div><div class="col-sm-12">
            <div class="card card-chart">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-7 text-left">
                    <h5 class="card-category">Graph COVID-19</h5>
                    <h2 class="card-title">Kasus COVID-19 di Indonesia pada Setiap Provinsi</h2>
                  </div>
                  <div class="col-sm-5 search_bar">
                    <input id="searchbar" onkeyup="search_news()" type="text" name="search" placeholder="Cari Berita..">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="width:1000px;height:300px;position: relative;">
                  <p>Berikut Merupakan Data Kasus COVID-19 di Indonesia pada setiap provinsi</a></p>
                
                  <div class="row">
                    <div class="col-sm-7">
                      <canvas id="chart1"></canvas>
                    </div>
                    <div class="col-sm-5 scroll" style="width:1500px;height:300px;overflow:auto;">
                      @foreach($berita as $b)
                      <div class="row">
                        <div class="col-sm-4 div-gambar">
                            <a href="{{$b->url}}">
                              <img src="{{$b->img_url}}" class="img-fluid">
                            </a>
                          </div>
                          
                          <div class="col-sm-8">
                            @if($b->news_portal=='kompas')
                                <div class="col-sm-12 text-justify news-kompas news-portal">{{$b->news_portal}}</div>
                            @else
                                <div class="col-sm-12 text-justify news-tribun news-portal">{{$b->news_portal}}</div>
                            @endif
                            <div class="col-sm-12 text-justify news-title"><a href="{{$b->url}}">{{$b->title}}</a></div>

                          </div>

                      </div>
                         <br>
                        @endforeach
                    </div>
                  </div>
                  
                </div>
                <br>
                <br>
                <form method='get' action=/berita>
                  <div class="row">
                    <div class="col-sm-5">
                        <label>Tanggal</label>
                          <input name="datestart" type='date'>
                        <label>-</label>
                          <input name="dateend" type='date'>
                    </div>
                    <div class="col-sm-7">
                  <label>Provinsi</label>
                  <select name="area" id="type" onchange="onProvinceChanged(this)">
                    <option value="">Pilih Provinsi</option>
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
                
      
                  <label id="label_kota">Kota</label>
                  <select name="kota" id="kota">
                    <option value="Semua">Semua</option>
                    <option value="Other">Other</option>
                  </select>
                    </div>
                  </div>
                  <label>Label</label>
                  <select name="label">
                    <option>Pilih Label</option>
                    <option value="NOF">Notitification of information</option>
                    <option value="Donation">Donation</option>
                    <option value="Criticism">Criticism</option>
                    <option value="Hoax">Hoax</option>
                    <option value="Other">Other</option>
                  </select>
                  <input type='submit'>
                </form>

              </div>
            </div>
          </div>
        </div>
        
        <!-- Riwayat Berita COVID-19 -->
        <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Riwayat Berita COVID-19</h5>
                    <h2 class="card-title">Berita COVID-19 di Indonesia</h2>
                  </div>
                  <div class="col-sm-6">
                  
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="width:1000px;height:500px;position: relative;">
                    <div class="col-sm-12 scroll" style="width:1000px;height:500px;overflow:auto;">
                      
                        @php
                            $counter=0;
                        @endphp

                        @foreach($berita as $b)
                            @if($counter%3==0)
                              <div class="row">

                                  <div class="col-sm-4">
                                  <div class="row">
                                    <div class="col-sm-4 div-gambar">
                                        <a href="{{$b->url}}">
                                          <img src="{{$b->img_url}}" class="news-gambar">
                                        </a>
                                    </div>
                          
                                  <div class="col-sm-8">
                                      @if($b->news_portal=='kompas')
                                        <div class="col-sm-12 text-justify news-kompas news-portal">{{$b->news_portal}}</div>

                                      @else
                                        <div class="col-sm-12 text-justify news-tribun news-portal">{{$b->news_portal}}</div>
                                      @endif
                                      <div class="col-sm-12 text-justify news-title"><a href="{{$b->url}}">{{$b->title}}</a></div>
                                  </div>
                                  </div>
                                  </div>
                            
                            @elseif($counter%3==1)
                                  <div class="col-sm-4">
                                  <div class="row">
                                    <div class="col-sm-4 div-gambar">
                                        <a href="{{$b->url}}">
                                          <img src="{{$b->img_url}}" class="img-fluid">
                                        </a>
                                    </div>
                          
                                  <div class="col-sm-8">
                                      @if($b->news_portal=='kompas')
                                        <div class="col-sm-12 text-justify news-kompas news-portal">{{$b->news_portal}}</div>

                                      @else
                                        <div class="col-sm-12 text-justify news-tribun news-portal">{{$b->news_portal}}</div>
                                      @endif
                                      <div class="col-sm-12 text-justify news-title"><a href="{{$b->url}}">{{$b->title}}</a></div>
                                  </div>
                                  </div>
                                  </div>
                            
                            @elseif($counter%3==2)
                                  <div class="col-sm-4">
                                  <div class="row">
                                    <div class="col-sm-4 div-gambar">
                                        <a href="{{$b->url}}">
                                          <img src="{{$b->img_url}}" class="img-fluid">
                                        </a>
                                    </div>
                          
                                  <div class="col-sm-8">
                                      @if($b->news_portal=='kompas')
                                        <div class="col-sm-12 text-justify news-kompas">{{$b->news_portal}}</div>

                                      @else
                                        <div class="col-sm-12 text-justify news-tribun">{{$b->news_portal}}</div>
                                      @endif
                                      <div class="col-sm-12 text-justify news-title"><a href="{{$b->url}}">{{$b->title}}</a></div>
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
                  
                  <div>

                  </div>
                </div>
                <br>
                <br>
                <form method='get' action=/berita>
                  <label>Tanggal</label>
                    <input name="datestart" type='date'>
                  <label>-</label>
                    <input name="dateend" type='date'>
                  <select name="area" id="type">
                    <option>Pilih Provinsi</option>
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
                  <input type='submit'>
                </form>
              </div>
            </div>
          </div>
        </div>
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
                <div style="width:1000px;height:300px;position: relative;">
                  <div class="row">
                    <div class="col-sm-12">
                      <canvas id="chart2"></canvas>
                    </div>
                  </div>
                  
                </div>
                <br>
                <br>
                <form method='get' action=/berita>
                  <label>Tanggal</label>
                    <input name="datestart2" type='date'>
                  <label>-</label>
                    <input name="dateend2" type='date'>
                  <input type='submit'>
                </form>

              </div>
            </div>
          </div>
        </div>
        <div class="card-chart">
              <div class="row">
                <div class="col-sm-3">
                    <div class="card card-header">
                      <div class="text-left">
                          <h5 class="card-title">Notification of Information</h5>
                      </div>
                      <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Meninggal</li>
                            <li class="list-group-item">Positif</li>
                            <li class="list-group-item">Total</li>
                            <li class="list-group-item">Sembuh</li>
                            <li class="list-group-item">Update</li>
                        </ul>
                      </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card card-header">
                      <div class="text-left">
                          <h5 class="card-title">Donation</h5>
                      </div>
                      <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Salurkan</li>
                            <li class="list-group-item">Sumbang</li>
                            <li class="list-group-item">Terdampak</li>
                            <li class="list-group-item">Bantuan</li>
                            <li class="list-group-item">Bantu</li>
                        </ul>
                      </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card card-header">
                      <div class="text-left">
                          <h5 class="card-title">Criticisms</h5>
                      </div>
                      <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Pemerintah</li>
                            <li class="list-group-item">Buruk</li>
                            <li class="list-group-item">Gagal</li>
                            <li class="list-group-item">Kritik</li>
                            <li class="list-group-item">Singgung</li>
                        </ul>
                      </div>
                    </div>
                </div>
                 <div class="col-sm-3">
                    <div class="card card-header">
                      <div class="text-left">
                          <h5 class="card-title">Hoax</h5>
                      </div>
                      <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Klarifikasi</li>
                            <li class="list-group-item">Tegaskan</li>
                            <li class="list-group-item">Klaim</li>
                            <li class="list-group-item">Hoaks</li>
                            <li class="list-group-item">Fakta</li>
                        </ul>
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
  console.log( {!! json_encode($label) !!});
  var ctx = document.getElementById('chart2');

  // <block:setup:1>
  const data = {
    labels: ['Notification','Donation','Criticisms','Hoax','Other'],
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
  // </block:config>



  </script>
  <script src="/assets/js/berita/kota.js"></script>
  <script src="/assets/js/berita/cari_berita.js"></script>
	<script>
		function generateData() {
      var unit = document.getElementById('unit').value;

      function unitLessThanDay() {
        return unit === 'second' || unit === 'minute' || unit === 'hour';
      }

      function beforeNineThirty(date) {
        return date.hour() < 9 || (date.hour() === 9 && date.minute() < 30);
      }

      // Returns true if outside 9:30am-4pm on a weekday
      function outsideMarketHours(date) {
        if (date.isoWeekday() > 5) {
          return true;
        }
        if (unitLessThanDay() && (beforeNineThirty(date) || date.hour() > 16)) {
          return true;
        }
        return false;
      }

      function randomNumber(min, max) {
        return Math.random() * (max - min) + min;
      }

      function randomBar(date, lastClose) {
        var open = randomNumber(lastClose * 0.95, lastClose * 1.05).toFixed(2);
        var close = randomNumber(open * 0.95, open * 1.05).toFixed(2);
        return {
          t: date.valueOf(),
          y: close
        };
      }

      var date = moment('Feb 20 2020', 'MMM DD YYYY'); //hari kemarin
      var now = moment();
      var data = [];
      var lessThanDay = unitLessThanDay();
      for (; data.length < 600 && date.isBefore(now); date = date.clone().add(1, unit).startOf(unit)) {
        if (outsideMarketHours(date)) {
          if (!lessThanDay || !beforeNineThirty(date)) {
            date = date.clone().add(date.isoWeekday() >= 5 ? 8 - date.isoWeekday() : 1, 'day');
          }
          if (lessThanDay) {
            date = date.hour(9).minute(30).second(0);
          }
        }
        data.push(randomBar(date, data.length > 0 ? data[data.length - 1].y : 30));
      }

      document.getElementById('percobaan').textContent = JSON.stringify(data);
      return data;
    }

    var ctx = document.getElementById('chart1').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 500;

    var color = Chart.helpers.color;
    var s1=[{
          label: 'Angka Kasus COVID-19',
          backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
          borderColor: window.chartColors.red,
          data: {!! json_encode($data) !!},
          //data: generateData()
          type: 'line',
          pointRadius: 0,
          fill: false,
          lineTension: 0,
          borderWidth: 2
        },
        
        
        ];




		var cfg = {
			data: {
				datasets: s1
			},
			options: {
				animation: {
					duration: 0
				},
				scales: {
					xAxes: [{
						type: 'time',
						distribution: 'series',
						offset: true,
						ticks: {
							major: {
								enabled: true,
								fontStyle: 'bold'
							},
							source: 'data',
							autoSkip: true,
							autoSkipPadding: 75,
							maxRotation: 0,
							sampleSize: 100
						},
						afterBuildTicks: function(scale, ticks) {
							var majorUnit = scale._majorUnit;
							var firstTick = ticks[0];
							var i, ilen, val, tick, currMajor, lastMajor;

							val = moment(ticks[0].value);
							if ((majorUnit === 'minute' && val.second() === 0)
									|| (majorUnit === 'hour' && val.minute() === 0)
									|| (majorUnit === 'day' && val.hour() === 9)
									|| (majorUnit === 'month' && val.date() <= 3 && val.isoWeekday() === 1)
									|| (majorUnit === 'year' && val.month() === 0)) {
								firstTick.major = true;
							} else {
								firstTick.major = false;
							}
							lastMajor = val.get(majorUnit);

							for (i = 1, ilen = ticks.length; i < ilen; i++) {
								tick = ticks[i];
								val = moment(tick.value);
								currMajor = val.get(majorUnit);
								tick.major = currMajor !== lastMajor;
								lastMajor = currMajor;
							}
							return ticks;
						}
					}],
					yAxes: [{
						gridLines: {
							drawBorder: false
						},
						scaleLabel: {
							display: true,
							labelString: 'Jumlah Kasus'
						}
					}]
				},
				tooltips: {
					intersect: false,
					mode: 'index',
					callbacks: {
						label: function(tooltipItem, myData) {
							var label = myData.datasets[tooltipItem.datasetIndex].label || '';
							if (label) {
								label += ': ';
							}
							label += parseFloat(tooltipItem.value).toFixed(2);
							return label;
						}
					}
				}
			}
		};

		var chart = new Chart(ctx, cfg);

		document.getElementById('update').addEventListener('click', function() {
			var type = document.getElementById('type').value;
			var dataset = chart.config.data.datasets[0];
			dataset.type = type;
			dataset.data = generateData();
			chart.update();
		});

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