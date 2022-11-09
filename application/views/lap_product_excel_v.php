<?php
header("content-type: application/vnd-ms-excel");
header("content-dispotion: attachment; filename=DataBarang.xls");
?>

<table border="1" width="100%">
    <tr align="center">
        <td colspan="7"><h1>Laporan Product Berdasarkan <?php echo $filter; ?></h1></td>
    </tr>
    <tr align="center">
        <td>Kode Product</td>
        <td>Nama Product</td>
        <td>Satuan</td>
        <td>Stok</td>
        <td>Stok Minimal</td>
        <td>Stok Maximal</td>
        <td>Harga Product</td>
    </tr>
    <?php
        foreach($laporan->result() as $data) {
    ?>
            <tr>
                <td><?php echo $data->kd_barang; ?></td>
                <td><?php echo $data->nm_barang; ?></td>
                <td><?php echo $data->satuan; ?></td>
                <td><?php echo $data->stok; ?></td>
                <td><?php echo $data->stokmin; ?></td>
                <td><?php echo $data->stokmax; ?></td>
                <td><?php echo $data->harga_product; ?></td>
            </tr>
    <?php
        }
    ?>
</table>