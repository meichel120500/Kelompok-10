<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('CSS/styleDashboard.css') }}" />

    <!-- link fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Manrope:wght@200;300;400;500;600;700;800&family=MuseoModerno:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,400;0,700;1,400;1,700&family=Roboto:wght@500&display=swap"
      rel="stylesheet"
    />
    <!-- link icon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0-beta2/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />

    <!-- title web -->
    <title>WEBANKMIN</title>
  </head>
  <body>
    <!-- main -->
    <div class="main">
      <!-- sidebar -->
      <div class="sidebar">
        <h1>We<span>bankmin</span></h1>
        <div class="items">
          <div class="dashboard">
            <a href="{{ url('/') }}"
              ><img src="{{ asset('assets/dashboard.png') }}" alt="" />
              <span class="sidebar-text"><h2>dashboard</h2></span>
            </a>
          </div>
          <div class="saldo">
            <a href="{{ route('saldo') }}"
              ><img src="{{ asset('assets/saldo.png') }}" alt="" />
              <span class="sidebar-text"><h2>Saldo</h2></span>
            </a>
          </div>
          <div class="akun">
            <ul class="dropdown">
              <li id="dropdown-trigger">
                <a href="#sdfea"
                  ><img src="{{ asset('assets/akun.png') }}" alt="" />
                  <span><h2>Account</h2></span>
                  <i class="fas fa-caret-down"></i>
                </a>
              </li>
              <li id="item-dropdown1">
                <a href="{{route('profil')}}">Profile Details</a>
              </li>
              <li id="item-dropdown2">
                <a href="{{route('security_account')}}">Security Account</a>
              </li>
            </ul>
          </div>
          <div class="logout">
            <a href="{{ route('logout') }}">
              <img src="{{ asset('assets/logout.png') }}" alt="" />
              <span><h2>Logout</h2></span>
            </a>
          </div>
        </div>
      </div>

      <div class="main-menu">
        <!-- topbar -->
        <div class="topbar" id="topbar">
          <div id="hamburger-menu">
            <i class="fas fa-bars"></i>
          </div>
          <div class="profile">
            <i class="fas fa-user"></i>
          </div>
        </div>

        <div class="menu-dashboard">
          <h2>Dashboard</h2>
          <div class="saldo-user">
            <h2>Saldo Terakhir Anda<br /><span>Rp. {{$bank->nilai_saldo ?? "-"}}</span></h2>
          </div>
          <div class="dashboard-items">
            <div class="transfer-uang">
              <h2>Total Transfer Uang<br /><span>Rp. {{$total_transfer}}</span></h2>
            </div>
            <div class="total-pendapatan">
              <h2>Total Pendapatan Uang<br /><span>Rp. {{$total_pendapatan}}</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- link js -->
    <script src="{{ asset('JS/script.js') }}"></script>
  </body>
</html>
