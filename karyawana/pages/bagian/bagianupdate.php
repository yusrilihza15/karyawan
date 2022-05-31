<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Data Bagian</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <?php
            include_once "../database/database.php";

            $id = $_GET['id'];
            echo $id;
            $findSQL = "SELECT * FROM bagian WHERE id = ?";
            $database = new Database();
            $connection = $database->getConnection();
            $statement = $connection->prepare($findSQL);
            $statement->bindParam(1, $id);
            $statement->execute();
            $data = $statement->fetch();

            if (isset($_POST['button_simpan'])) {
                $id = $_POST['id'];
                $nik = $_POST['nik'];
                $nama = $_POST['nama'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $bagian = $_POST['bagian'];

                $updateSQL = "UPDATE `bagian` SET `nik` = ?, `nama` = ?, `jenis_kelamin` = ?, `bagian` = ? WHERE `bagian`.`id` = ?";

                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($updateSQL);
                $statement->bindParam(1, $nik);
                $statement->bindParam(2, $nama);
                $statement->bindParam(3, $jenis_kelamin);
                $statement->bindParam(4, $bagian);
                $statement->bindParam(5, $id);
                $statement->execute();
            ?>
                <div class="alert alert-success" role="alert">
                    Berhasil Edit Data 
                </div>

            <?php 
                $_SESSION['pesan'] = "Berhasil Edit Data";
                header('Location: main.php?page=bagian');
            }
            ?>
        </div>
    </div>
    <div>
        <form action="" method="post">
            <!-- <div class="mb-3">
                <label for="id" class="form-label">Id bagian</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            </div> -->
            <input type="hidden"  id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data['nik'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" required>
            </div>
            <div>
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Laki-laki" name="jenis_kelamin" id="jenis_kelamin1" <?php echo ($data['jenis_kelamin'] == 'Laki-laki') ? " checked" : "" ?> required>
                <label class="form-check-label" for="jenis_kelamin1">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? " checked" : "" ?> id="jenis_kelamin2">
                <label class="form-check-label" for="jenis_kelamin2">
                    Perempuan
                </label>
            </div>
            <div class="mb-3">
                <label for="bagian" class="form-label">bagian</label>
                <select class="form-select" aria-label="Default select example" name="bagian" required>
                    <option value="">Pilih bagian</option>
                    <option value="Direksi" <?php echo ($data['bagian'] == 'Direksi') ? " selected" : "" ?>>Direksi</option>
                    <option value="Direktur Utama" <?php echo ($data['bagian'] == 'Direktur Utama') ? " selected" : "" ?>>Direktur Utama</option>
                    <option value="Direktur Keuangan" <?php echo ($data['bagian'] == 'Direktur Keuangan') ? " selected" : "" ?>>Direktur Keuangan</option>
                    <option value="Direktur" <?php echo ($data['bagian'] == 'Direktur') ? " selected" : "" ?>>Direktur</option>
                    <option value="Manajer" <?php echo ($data['bagian'] == 'Manajer') ? " selected" : "" ?>>Manajer</option>
                    <option value="Manajer Keuangan" <?php echo ($data['bagian'] == 'Manajer Keuangan') ? " selected" : "" ?>>Manajer Keuangan</option>
                    <option value="Pemasaran" <?php echo ($data['bagian'] == 'Pemasaran') ? " selected" : "" ?>>Pemasaran</option>
                    <option value="Administrasi" <?php echo ($data['bagian'] == 'Administrasi') ? " selected" : "" ?>>Administrasi</option>
                    
                </select>
            </div>
            <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
        </form>
    </div>
</main>