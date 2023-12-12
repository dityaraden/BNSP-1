<?php
$conn = mysqli_connect("localhost", "root", "", "beasiswa");

if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Hasil Pendaftaran Beasiswa</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

     <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
               <a class="navbar-brand" href="#">Beasiswa App</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                         <li class="nav-item active">
                              <a class="nav-link" href="index.php">Daftar<span class="sr-only">(current)</span></a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="hasil.php">Hasil</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>

     <div class="container mt-5">
          <h2 class="mb-4 text-center">Hasil Pendaftaran Beasiswa</h2>

          <table class="table table-bordered">
               <thead>
                    <tr>
                         <th>Nama</th>
                         <th>Email</th>
                         <th>Nomor HP</th>
                         <th>Semester</th>
                         <th>IPK</th>
                         <th>Berkas</th>
                         <th>Beasiswa</th>
                         <th>Status Ajuan</th>
                    </tr>
               </thead>
               <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                         <tr>
                              <td class="text-center align-middle"><?php echo $row['nama']; ?></td>
                              <td class="text-center align-middle"><?php echo $row['email']; ?></td>
                              <td class="text-center align-middle"><?php echo $row['nomor_hp']; ?></td>
                              <td class="text-center align-middle"><?php echo $row['semester']; ?></td>
                              <td class="text-center align-middle"><?php echo $row['ipk']; ?></td>
                              <td class="text-center align-middle"><?php echo $row['berkas_path']; ?></td>
                              <td class="text-center align-middle"><?php echo $row['pil_beasiswa']; ?></td>

                              <td class="text-center align-middle">
                                   <p class="bg bg-warning rounded"><?php echo $row['status_ajuan']; ?></p>
                              </td>
                         </tr>
                    <?php endwhile; ?>
               </tbody>
          </table>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-veoXp3Mk9HsRgg21YFiex9VGxm9KgIo7Ri+5ZtQZSNH0TcuCpLg2L7pJyH+8LbDr" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-AFrZBTmMzkc5lFNuh1PKK3jRVVE5yOp8C9YJSf15cDZqM6eE5qDl8iFA4EdaPny7" crossorigin="anonymous"></script>
</body>

</html>

<?php mysqli_close($conn); ?>