<html>
    <head>
        <title>.::SIPD Importer Tools::.</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">SIPD-Importer</a>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">DATA MASTER </a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="<?=site_url('master/urusan')?>">Urusan</a>
                <a class="dropdown-item" href="<?=site_url('master/bidang')?>">Bidang Urusan</a>
                <a class="dropdown-item" href="#">Program</a>
                <a class="dropdown-item" href="#">Kegiatan</a>
                <a class="dropdown-item" href="#">Akun</a>
                <a class="dropdown-item" href="#">OPD</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">APBD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">PENATA USAHAAN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url('login/logout')?>">LOGOUT</a>
            </li>
        </ul>

    </nav>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://nusantaraprov.sipd.kemendagri.go.id/assets/js/crypto_base64.js"></script>
    <script>
        $(document).ready(function(){
            $('#login-form').submit(function(e){
                e.preventDefault();
                alert('test');
            });
        });
    </script>
</html>