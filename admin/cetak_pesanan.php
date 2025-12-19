<?php
require '../vendor/autoload.php';
include '../includes/koneksi.php';

use Dompdf\Dompdf;

// Ambil data pesanan
$query = "SELECT * FROM pesanan ORDER BY id DESC";
$result = $koneksi->query($query);

// Siapkan HTML untuk PDF
$html = '
<html>
<head>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #fffdf9;
            color: #3b2f2f;
        }
        h2 {
            text-align: center;
            color: #4b2e05;
            margin-bottom: 5px;
        }
        p {
            text-align: center;
            font-size: 12px;
            color: #6c584c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #4b2e05;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #6f4e37;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f8f3ef;
        }
    </style>
</head>
<body>
    <h2>☕ Coffee Store - Laporan Data Pesanan</h2>
    <p>Dibuat pada: ' . date("d-m-Y H:i") . '</p>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>';

$no = 1;
while ($row = $result->fetch_assoc()) {
    $tanggal = isset($row['tanggal']) ? $row['tanggal'] : '-';
    $html .= "
        <tr>
            <td>$no</td>
            <td>{$row['nama']}</td>
            <td>{$row['nohp']}</td>
            <td>{$row['produk']}</td>
            <td>{$row['jumlah']}</td>
            <td>{$tanggal}</td>
        </tr>";
    $no++;
}

$html .= '
    </table>
    <br><br>
    <p style="text-align:right;">Ttd,<br><b>Admin Coffee Store</b></p>
</body>
</html>';

// Buat PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Data_Pesanan_CoffeeStore.pdf", ["Attachment" => false]);
exit;
