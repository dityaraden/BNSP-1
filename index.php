<?php
session_start();

$ipk = 3.5;
$_SESSION['ipk'] = $ipk;
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Form Beasiswa</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <style>
          body {
               display: flex;
               flex-direction: column;
               align-items: center;
               justify-content: center;
               min-height: 100vh;
               margin: 0;
          }

          form {
               width: 400px;
               max-width: 100%;
          }

          .navbar {
               width: 100%;
          }
     </style>
</head>

<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
          <div class="container-fluid">
               <a class="navbar-brand" href="#">Beasiswa App</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                         <li class="nav-item active">
                              <a class="nav-link" href="index.php">Daftar</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="hasil.php">Hasil</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>

     <div class="container mt-2 d-flex flex-column justify-content-center align-content-center align-items-center ">
          <h1>Pendaftaran Beasiswa</h1>
          <form action="proses.php" method="post" enctype="multipart/form-data">
               <div class="">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control" name="nama" autocomplete="off" required>
               </div>

               <div class="">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" autocomplete="off" required>
               </div>

               <div class="">
                    <label for="nomor_hp" class="form-label">Nomor HP:</label>
                    <input type="tel" class="form-control" name="nomor_hp" pattern="[0-9]{10,15}" autocomplete="off" required>
               </div>

               <div class="">
                    <label for="semester" class="form-label">Semester:</label>
                    <select class="form-select" name="semester" required>
                         <?php for ($i = 1; $i <= 8; $i++) : ?>
                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                         <?php endfor; ?>
                    </select>
               </div>
               <div class="">
                    <label for="ipk" class="form-label">IPK Terakhir :</label>
                    <input type="tel" class="form-control" autocomplete="off" value="<?php echo $ipk ?>" disabled required>
               </div>
               <div class="">
                    <label for="ipk" class="form-label">Pilihan Beasiswa :</label>
                    <select class="form-select" name="beasiswa" <?php echo ($ipk < 3) ? "disabled" : "" ?> required>
                         <option value="beasiswa akademik">Beasiswa Akademik</option>
                         <option value="beasiswa non akademik">Beasiswa Non Akademik</option>
                    </select>
               </div>
               <div class="mb-3">
                    <label for="berkas" class="form-label">Upload Berkas:</label>
                    <input type="file" class="form-control" <?php echo ($ipk < 3) ? 'disabled' : ''; ?> name="berkas" accept=".pdf, .jpg, .jpeg, .png, .zip" required>
               </div>

               <button type="submit" class="btn btn-primary" name="daftar" <?php echo ($ipk < 3) ? 'disabled' : ''; ?>>Daftar</button>
          </form>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-veoXp3Mk9HsRgg21YFiex9VGxm9KgIo7Ri+5ZtQZSNH0TcuCpLg2L7pJyH+8LbDr" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-AFrZBTmMzkc5lFNuh1PKK3jRVVE5yOp8C9YJSf15cDZqM6eE5qDl8iFA4EdaPny7" crossorigin="anonymous"></script>
</body>

</html>