<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Tambah Data Bagian</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
              <?php 
              include_once "../database/database.php";

              if (isset($_POST['button_simpan'])){
                $nik = $_POST['nik'];
                $nama = $_POST['nama'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $bagian = $_POST['bagian'];
                
                // $insertSQL = "INSERT INTO bagian VALUES (NULL '".$nik."' , '".$nama."' , '".$jenis_kelamin."' , '".$bagian."' )"; 

                $insertSQL = "INSERT INTO bagian VALUES (NULL, ?, ?, ?, ?)";
                
                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($insertSQL); 
                $statement->bindParam(1, $nik);
                $statement->bindParam(2, $nama);
                $statement->bindParam(3, $jenis_kelamin);
                $statement->bindParam(4, $bagian);
                $statement->execute();
            ?>
                 <div class="alert alert-success" role="alert">
                   Data Bagian Berhasil Ditambah
                </div>
            <?php 
                    $_SESSION['pesan'] = "Data Bagian Berhasil Ditambah";
                header('Location: main.php?page=bagian');

              }
             
              ?>
          </div>
        </div>
        <div>
            <form action="" method="post">
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                <input type="text" class="form-control" id="nik" name="nik" required >
            </div> 
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div>
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Laki-laki" name="jenis_kelamin" id="jenis_kelamin1" required>
                <label class="form-check-label" for="jenis_kelamin1">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin" id="jenis_kelamin2">
                <label class="form-check-label" for="jenis_kelamin2">
                    Perempuan
                </label>
            </div>
            
            <div class="mb-3">
                <label for="bagian" class="form-label">Bagian</label>
                <select class="form-select" aria-label="Default select example" name="bagian" required>
                    <option value="" selected>Pilih Bagian</option>
                    <option value="Direksi">Direksi</option>
                    <option value="Direktur Utama">Direktur Utama</option>
                    <option value="Direktur Keuangan">Direktur Keuangan</option>
                    <option value="Direktur">Direktur </option>
                    <option value="Manajer">Manajer</option>
                    <option value="Manajer Keuangan">Manajer Keuangan</option>
                    <option value="Pemasaran">Pemasaran</option>
                    <option value="Administrasi">Administrasi</option>
                </select>
            </div> 
                <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
            </form>
        </div>
</main>