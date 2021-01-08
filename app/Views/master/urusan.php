<html>
    <head>
        <title>Master Urusan</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <a class="dropdown-item" href="#">Bidang Urusan</a>
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
        <main role="main" class="container">
            <h1 class="mt-5">MASTER URUSAN</h1>
            <p class="lead">
                <button type="button" class="btn btn-success">IMPORT</button>
            </p>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>KODE</th>
                        <th>URAIAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($urusan as $row){
                            ?>
                    <tr>
                        <td><?=$row->id_urusan?></td>
                        <td><?=$row->kode_urusan?></td>
                        <td><?=$row->nama_urusan?></td>
                        <td><a href="#" class="btn btn-primary btn-sm">Edit</a> <a href="#" class="btn btn-danger btn-sm">Hapus</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </main>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://nusantaraprov.sipd.kemendagri.go.id/assets/js/crypto_base64.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            
        });
    </script>
</html>