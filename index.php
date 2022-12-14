<?php
session_start();
//error_reporting(0);
include('doctor/includes/dbconnection.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobnum = $_POST['phone'];
    $email = $_POST['email'];
    $appdate = $_POST['date'];
    $aaptime = $_POST['time'];
    $specialization = $_POST['specialization'];
    $doctorlist = $_POST['doctorlist'];
    $message = $_POST['message'];
    $aptnumber = mt_rand(100000000, 999999999);
    $cdate = date('Y-m-d');

    if ($appdate <= $cdate) {
        echo '<script>alert("Appointment date must be greater than todays date")</script>';
    } else {
        $sql = "insert into tblappointment(AppointmentNumber,Name,MobileNumber,Email,AppointmentDate,AppointmentTime,Specialization,Doctor,Message)values(:aptnumber,:name,:mobnum,:email,:appdate,:aaptime,:specialization,:doctorlist,:message)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':aptnumber', $aptnumber, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':appdate', $appdate, PDO::PARAM_STR);
        $query->bindParam(':aaptime', $aaptime, PDO::PARAM_STR);
        $query->bindParam(':specialization', $specialization, PDO::PARAM_STR);
        $query->bindParam(':doctorlist', $doctorlist, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);

        $query->execute();
        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Your Appointment Request Has Been Send. We Will Contact You Soon")</script>';
            echo "<script>window.location.href ='index.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>On-Clinic</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/owl.carousel.min.css" rel="stylesheet">

    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <link href="css/templatemo-medic-care.css" rel="stylesheet">

    <link rel="stylesheet" href="index.css" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />

    <script>
        function getdoctors(val) {
            //  alert(val);
            $.ajax({

                type: "POST",
                url: "get_doctors.php",
                data: 'sp_id=' + val,
                success: function(data) {
                    $("#doctorlist").html(data);
                }
            });
        }
    </script>
</head>

<body id="top">

    <main>

        <?php include_once('includes/header.php'); ?>

        <section class="hero" id="hero" style="margin-left: auto; margin-right:auto;">
            <div class="container" style="height:200px">
                <div class="row">

                    <div class="col-20">
                        <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/slider/r1.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img src="images/slider/r2.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img src="images/slider/r3.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding" id="about">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-12">
                    <?php
                        $sql = "SELECT * from tblpage where PageType='aboutus'";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {               ?>
                                <h2 class="mb-lg-3 mb-3"><?php echo htmlentities($row->PageTitle); ?></h2>

                                <p><?php echo ($row->PageDescription); ?></p>

                        <?php $cnt = $cnt + 1;
                            }
                        } ?>
                    </div>
                    <div class="col-md-3 col-md-6 col-6">
                    <img src="images/layanan/1.jpg" alt="" style="height:250px; margin-left: 100px;">

                    <!-- <div class="col-md-4 col-md-5 col-5">
                        <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                            <p class="featured-text">Pelayanan<br><br><span class="featured-number">24</span><br> Jam/Hari</p>
                        </div> -->
                    </div>
                    </div>
                </div>
            </div>
            <br><br>

        <div class="container">
  <button class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="width:45%;">Visi Misi</button>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2" style="width:45%;">Nilai-Nilai</button>                
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body" style="width:90%;">
      <h2>VISI: </h2>
Menjadi klinik keluarga pilihan utama dari pelanggannya (family clinic of choice) yang mengedepankan keamanan pasien (patient safety) dan pelayanan.
<ul>
  <li>Klinik keluarga pilihan utama</li>
  <li>Mengedepankan keamanan pasien (patient safety)</li>
  <li>Pelayanan</li>
</ul>
<h2>MISI: </h2>
Menyediakan pelayanan kesehatan terpadu secara menyeluruh (holistic healthcare) pada keluarga, melalui pelayanan yang berkualitas, fasilitas yang modern dan manajemen yang terbaik.
<ul>
  <li>Pelayanan kesehatan terpadu secara menyeluruh (holistic healthcare)</li>
  <li>Pelayanan berkualitas</li>
  <li>Fasilitas modern</li>
  <li>Manajemen terbaik</li>
</ul>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body" style="width:90%;">
      <h6>Care : </h6>
Kami melayani pasien melalui pelayanan yang responsif, terpadu, nyaman, komunikasi yang baik, mengerti masalah pasien, memberikan pelayanan dan saran yang terbaik, menolong pasien secara menyeluruh, membuat pasien merasa aman seperti dilayani keluarga sendiri. <br>

<h6>Ethic and values :</h6>
Kami bertanggung jawab secara professional dengan standar etik kesehatan yang baik.

<h6>Quality orientation :</h6>
Kami mengadopsi manajemen kualitas sebagai filosofi utama dalam apapun yang kami lakukan dan menekankan pada budaya pengembangan kualitas secara menyeluruh atau terintegrasi yang diwujudkan dengan tenaga medis dan pendukung yang terlatih dan dikembangkan dari waktu ke waktu dengan dukungan peralatan yang modern.

<h6>Integrity : </h6>
Kami bersikap jujur dan memilik prinsip yang jelas serta konsisten untuk mewujudkan cita citanya. <br>

<h6>Team work :</h6>
Kami bekerja sama antar bagian dan tim dengan niat tulus, merasa menjadi bagian dari sebuah tim, saling mendukung untuk tujuan terbaik untuk klinik dan pasien serta komunitas pendukungnya. Kerjasama dengan pemasok, rumah sakit lanjutan dan juga regulator akan ditingkatkan secara professional untuk kepentingan pasien, keluarga pasien dan karyawan klinik.

<h6>Continuous learning : </h6>
Kami memiliki kemauan untuk terus belajar secara teratur dengan menciptakan dan memanfaatkan kesempatan untuk belajar, dan menggunakan pengetahuan dan keterampilan baru yang diperoleh dalam pekerjaan dan pembelajaran melalui penerapannya didalam pekerjaan dan tim terkait sehingga dapat meningkatkan kinerja tim dan klinik secara cepat dan signifikan.
      </div>
    </div>
  </div>
</div></div>
</div>
    </section>

        

        <section class="gallery">
        <h2 class="text-center mb-lg-3 mb-2">Layanan Poliklinik</h2>
        <br>
            <div class="layanan-container">
                <div class="layanan">
                    <img src="images/layanan/anesthesia.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">Anestesi</P>
                </div>
                <div class="layanan">
                    <img src="images/layanan/jantung.png" alt="">
                    <p class="text-center mb-lg-3 mb-2">Jantung dan Pembuluh Darah</P>
                </div>                    
                <div class="layanan">
                    <img src="images/layanan/Dermatology.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">Dermatologi</P>
                </div>
                <div class="layanan">
                    <img src="images/layanan/ent.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">THT</P>
                </div>
                <div class="layanan">
                    <img src="images/layanan/family.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">Dokter Umum</P>
                </div>
                    </div>
                
            <div class="layanan-container">
                <div class="layanan">
                    <img src="images/layanan/general.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">Bedah Umum</P>
                </div>
                <div class="layanan">
                    <img src="images/layanan/internal.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">Penyakit Dalam</P>
                </div>                    
                <div class="layanan">
                    <img src="images/layanan/obstetric.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">Kandungan dan Kebidanan</P>
                </div>
                <div class="layanan">
                    <img src="images/layanan/ophtalmology.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">Mata</P>
                </div>
                <div class="layanan">
                    <img src="images/layanan/orthopedic.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">Ortopedi</P>
                </div>
                    </div> 
                
                <div class="layanan-container">
                <div class="layanan">
                    <img src="images/layanan/gigi.png" alt="">
                    <p class="text-center mb-lg-3 mb-2">Gigi</P>
                </div>                    
                <div class="layanan">
                    <img src="images/layanan/plastik.png" alt="">
                    <p class="text-center mb-lg-3 mb-2">Bedah Plastik</P>
                </div>
                <div class="layanan">
                    <img src="images/layanan/Pediatric.jpg" alt="">
                    <p class="text-center mb-lg-3 mb-2">Anak</P>
                </div>
                <div class="layanan">
                    <img src="images/layanan/kejiwaan.png" alt="">
                    <p class="text-center mb-lg-3 mb-2">Kejiwaan</P>
                </div> </div>
                </div>
            </div>
        </section>
<br><br><br>
    <section class=jadwal>
    <h2 class="text-center mb-lg-3 mb-2">Jadwal Dokter</h2>
    <div class="slider-nav d2">
    <div><img src="images/jadwal/1.jpg" alt="">
    <b style="">Dr. A</b>
    </div>
    <div><img src="images/jadwal/2.jpg" alt="">
    <b style="">Dr. B</b>
    </div>
    <div><img src="images/jadwal/3.jpg" alt="">
    <b style="">Dr. C</b>
    </div>
    <div><img src="images/jadwal/1.jpg" alt="">
    <b style="">Dr. D</b>
    </div>
    <div><img src="images/jadwal/2.jpg" alt="">
    <b style="">Dr. E</b>
    </div>
    <div><img src="images/jadwal/2.jpg" alt="">
    <b style="">Dr. F</b>
    </div>
  </div>

  <div class="slider-for d1">
  <div><img src="images/jadwal/senin.jpg" alt=""></div>
    <div><img src="images/jadwal/senin.jpg" alt=""></div>
    <div><img src="images/jadwal/senin.jpg" alt=""></div>
    <div><img src="images/jadwal/senin.jpg" alt=""></div>
    <div><img src="images/jadwal/senin.jpg" alt=""></div>
    <div><img src="images/jadwal/senin.jpg" alt=""></div>
  </div>
        </section>

        <section class="section-padding" id="booking">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="booking-form">

                            <h2 class="text-center mb-lg-3 mb-2">Buat Janji Temu Dokter</h2>

                            <form role="form" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" required='true'>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email" required='true'>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <input type="telephone" name="phone" id="phone" class="form-control" placeholder="Nomor Telepon" maxlength="14">
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <input type="date" name="date" id="date" value="" class="form-control">

                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <input type="time" name="time" id="time" value="" class="form-control">

                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <select onChange="getdoctors(this.value);" name="specialization" id="specialization" class="form-control" required>
                                            <option value="">Pilih Poli</option>
                                            <!--- Fetching States--->
                                            <?php
                                            $sql = "SELECT * FROM tblspecialization";
                                            $stmt = $dbh->query($sql);
                                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                            while ($row = $stmt->fetch()) {
                                            ?>
                                                <option value="<?php echo $row['ID']; ?>"><?php echo $row['Specialization']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>


                                    <div class="col-lg-6 col-12">
                                        <select name="doctorlist" id="doctorlist" class="form-control">
                                            <option value="">Pilih Dokter</option>
                                        </select>
                                    </div>



                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Pesan Tambahan"></textarea>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" name="submit" id="submit-button">Pesan Sekarang</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <?php include_once('includes/footer.php'); ?>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scrollspy.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>

  <script type="text/javascript">
    $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  arrows: true,
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
  </script>


</body>

</html>