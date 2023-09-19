<!DOCTYPE html>

<html>

    <head>
        <title>chek transaksi terakhir</title>

    </head>
    
    <body>
        <?php 
            $servername     = "localhost:3307";
            $database       = "data_transaksi";
            $username       = "root";
            $password       = "";
    
            // membuat koneksi
            $conn = mysqli_connect($servername, $username, $password, $database);
        ?>
        <div class="container mt-4">
            <!-- form filter data berdasarkan range tanggal  -->
            <form action="history.php" method="get">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label">Periode</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-auto">
                        -
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
    
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Tanggal tf</td>
                                <td>name</td>
                                <td>saldo</td>
                            </tr>
                        </thead>
                        <?php 
                            //jika tanggal dari dan tanggal ke ada maka
                            if(isset($_GET['dari']) && isset($_GET['ke'])){
                                // tampilkan data yang sesuai dengan range tanggal yang dicari 
                                $data = mysqli_query($conn, "SELECT * from data_transaksi WHERE tgl_tf BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
                            }else{
                                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                                $data = mysqli_query($conn, "select * from data_transaksi");		
                            }
                            // $no digunakan sebagai penomoran 
                            $id = 1;
                            // while digunakan sebagai perulangan data 
                            while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $d['tgl_tf']; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><?php echo $d['saldo']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
    
    </html>