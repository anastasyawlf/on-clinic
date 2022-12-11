<?php
    include ('config.php');
    if(isset($_POST['kirim'])){
        $FullName = $_POST['nama'];
        $Specialization = $_POST['spesialis'];
        $waktu = $_POST['waktu'];
        $hari = implode(',', $_POST['hari']);

        mysqli_query($con, "INSERT INTO implode VALUES ('','$FullName','$Specialization','$hari','$waktu')");
        
        header('location:index.php?sukses');
    }

    $sql = mysqli_query($con, "SELECT * FROM implode ORDER BY id DESC");
?>



<html>
<head>
    <meta charset="UTF-8">
    <title>Jadwal Dokter</title>
</head>

</html>

<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" FullName="nama"></td>
            </tr>
            <tr>
                <td>Spesialis</td>
                <td>:</td>
                    <td><input type="text" Specialization="spesialis"></td>
            </tr>
            <tr>
                <td>Hari</td>
                <td>:</td>
                <td>
                    <input type="checkbox" name="hari[]" value="senin">Senin<br/>
                    <input type="checkbox" name="hari[]" value="selasa">Selasa<br/>
                    <input type="checkbox" name="hari[]" value="rabu">Rabu<br/>
                    <input type="checkbox" name="hari[]" value="kamis">Kamis<br/>
                    <input type="checkbox" name="hari[]" value="jumat">Jumat<br/>
                    <input type="checkbox" name="hari[]" value="sabtu">Sabtu<br/>
                </td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                    <td><input type="text" waktu="waktu"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="kirim" value="Tambahkan"></td>
            </tr>
        </table>
    </form>
<!-- Tampilan Tabel -->
    <table>
        <tr>
            <th>Nama</th>
            <th>Spesialis</th>
            <th>Hari</th>
            <th>Waktu</th>
        </tr>
        <?php if(mysqli_num_rows($sql)>0){ ?>
            <?php while ($data = mysqli_fetch_array($sql)){ ?>
                <tr>
                    <td><?php echo $data['nama']?></td>
                    <td><?php echo $data['spesialis']?></td>
                    <td><?php echo $data['hari']?></td>
                    <td><?php echo $data['waktu']?></td>
                    <td></td>
                </tr>
            <?php } ?>
        <?php } ?>
    </table>
</body>