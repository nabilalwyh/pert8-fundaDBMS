<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <!-- Form input -->
        <div class="container mx-auto px-4 py-8 grid grid-cols-2 gap-4">
        <div>
            <h1 class="fs-3 fw-medium mb-4">Input Mahasiswa</h1>

            <!-- Form input artikel -->
            <form action="add.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nama" class="block">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="npm" class="block">NPM:</label>
                    <input type="text" name="npm" id="npm" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="materi_kursus" class="block">Materi Kursus:</label>
                    <textarea name="materi_kursus" id="materi_kursus" rows="5" class="form-control" required></textarea>
                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <button type="reset" name="reset" value="cancel" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
        <!-- End of Form Input -->


        <!-- Start of Data Table  -->
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NPM</th>
            <th scope="col">Materi Kursus</th>
            </tr>
        </thead>
            <tbody>
                <?php
                include('database/config.php');
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM mahasiswa_51421587");
                while ($row = mysqli_fetch_array($query)) {        
                ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['npm'] ?></td>
                            <td><?php echo $row['materi_kursus'] ?></td>
                            <td class="text-center">
                                <a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning">EDIT</a>
                                <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                            </td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- End of Data Table -->
</body>
</html>