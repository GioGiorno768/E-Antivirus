<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Eksport</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Laporan Keperluan</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Personil</th>
                    <th>OPD Eksternal</th>
                    <th>Keperluan</th>
                    <th>waktu_mulai</th>
                    <th>waktu_selesai</th>
                    <th>Durasi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($keperluan2x as $keperluan) { ?>
                <tr>
                    <td><?= $keperluan['id'] ?></td>
                    <td><img src="<?= base_url() . 'img/keperluan/' . $keperluan['foto']?>" alt="Sample Image"></td>
                    <td><?= $keperluan['users'] ?></td>
                    <td><?= $keperluan['eksternal'] ?></td>
                    <td><?= $keperluan['keperluan'] ?></td>
                    <td><?= $keperluan['waktu_mulai'] ?></td>
                    <td><?= $keperluan['waktu_selesai'] ?></td>
                    <td><?= $keperluan['durasi'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
