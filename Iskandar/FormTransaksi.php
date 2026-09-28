<!DOCTYPE html>
<html>
<head>
    <title>Kopi Oke</title>
</head>

<body>

<h1>Selamat Datang di Kopi Kuy</h1>
<h2>Form Trnsaksi Pelanggan</h2>

<form method="post">

    Nama Pelanggan:
    <input type="text" name="nama" placeholder="Contoh: Andi">
    <br><br>

    Pilih Menu Kopi:
    <select name="menu">
        <option value="Americano">Americano - Rp 10.000</option>
        <option value="Cappuccino">Cappuccino - Rp 15.000</option>
        <option value="Latte">Latte - Rp 20.000</option>
    </select>
    <br><br>

    Jumlah (Qty):
    <input type="number" name="jumlah" value="1">
    <br><br>

    Ukuran Cup (Size):
    <br>

    <input type="radio" name="ukuran" value="Regular" checked>
    Regular

    <input type="radio" name="ukuran" value="Large">
    Large (+Rp 5.000)

    <br><br>

    Ekstra / Topping (Bisa Pilih Lebih dari Satu):
    <br>

    <input type="checkbox" name="espresso" value="4000">
    Extra Shot Espresso (+Rp 4.000)
    <br>

    <input type="checkbox" name="caramel" value="3000">
    Caramel Sauce (+Rp 3.000)
    <br>

    <input type="checkbox" name="oatmilk" value="6000">
    Ganti Oat Milk (+Rp 6.000)

    <br><br>

    <input type="submit" name="proses" value="Cetak Transaksi">

</form>

<?php

if (isset($_POST['proses'])) {

    $nama = $_POST['nama'];
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];
    $ukuran = $_POST['ukuran'];

    // Harga menu
    if ($menu == "Americano") {
        $harga = 10000;
    } elseif ($menu == "Cappuccino") {
        $harga = 15000;
    } else {
        $harga = 20000;
    }

    // Tambahan ukuran
    if ($ukuran == "Large") {
        $harga = $harga + 5000;
    }

    // Menghitung topping
    $topping = "";
    $biayaTopping = 0;

    if (isset($_POST['espresso'])) {
        $topping = $topping . "- Espresso Shot<br>";
        $biayaTopping = $biayaTopping + 4000;
    }

    if (isset($_POST['caramel'])) {
        $topping = $topping . "- Caramel Sauce<br>";
        $biayaTopping = $biayaTopping + 3000;
    }

    if (isset($_POST['oatmilk'])) {
        $topping = $topping . "- Oat Milk<br>";
        $biayaTopping = $biayaTopping + 6000;
    }

    // Perhitungan
    $hargaCup = $harga * $jumlah;
    $totalTopping = $biayaTopping * $jumlah;
    $total = $hargaCup + $totalTopping;


    echo "<h2>STRUK PEMBELIAN</h2>";

    echo "Pelanggan: " . $nama . "<br>";

    echo "Menu: " . $menu . " (" . $ukuran . ")<br>";

    echo "Harga/Cup: Rp " . number_format($harga, 0, ',', '.');
    echo " x " . $jumlah;
    echo " = Rp " . number_format($hargaCup, 0, ',', '.');
    echo "<br>";

    echo "Topping Tambahan:<br>";

    if ($topping == "") {
        echo "- Tidak ada<br>";
    } else {
        echo $topping;
    }

    echo "Biaya Topping: Rp " . number_format($biayaTopping, 0, ',', '.');
    echo " x " . $jumlah;
    echo " = Rp " . number_format($totalTopping, 0, ',', '.');
    echo "<br>";

    echo "Total: Rp " . number_format($total, 0, ',', '.');
}

?>

</body>
</html>