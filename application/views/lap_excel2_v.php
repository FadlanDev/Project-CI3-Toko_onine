<?php
header("content-type: application/vnd-ms-excel");
header("content-dispotion: attachment; filename=DataBarang.xls");
?>

<table border="1" width="100%">
    <tr align="center">
        <td colspan="4"><h1>Laporan Penjualan Berdasarkan <?php echo $filter; ?></h1></td>
    </tr>
    <tr align="center">
        <td>Nama</td>
        <td>Produk</td>
        <td>Nomer HP</td>
        <td>Email</td>
    </tr>
    <?php
        foreach($laporan->result() as $data) {
    ?>
            <tr>
                <td><?php echo $data->pelanggan; ?></td>
                <td><?php echo $data->nm_produk; ?></td>
                <td><?php echo $data->nomer_hp; ?></td>
                <td><?php echo $data->email; ?></td>
            </tr>
    <?php
        }
    ?>
</table>