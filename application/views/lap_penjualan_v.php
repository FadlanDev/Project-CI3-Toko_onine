<title>Cetak Laporan Penjualan</title>
<div style="background-image: url(asset/images/scr.jpg); width:100%;height:100%"></div>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/easyui/jquery.easyui.min.js"></script>

    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:false,modal:true,border:'thin',buttons:'#dlg-buttons'"title="Laporan Penjualan">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Masukan Data</h3>
            <div style="margin-bottom:10px">
                <p><input name="filter" id="username" type="radio" checked="checked" />Berdasarkan Pelanggan :</p>
                <input name="pelanggan" id="pelanggan" class="easyui-textbox" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <p><input name="filter" id="product" type="radio"/>Berdasarkan Produk :</p>
                <input name="nm_produk" id="nm_produk" class="easyui-textbox" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-excel" onclick="Laporan('excel')">Cetak Excel</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-pdf" onclick="Laporan('pdf')">Cetak Pdf</a>
    </div>
        <script type="text/javascript">
            function Laporan(ket){
                if(document.getElementById('username').checked==true) {
                    var datalaporan="filter=username&pelanggan="+document.getElementById('pelanggan').value;
                }
                if(document.getElementById('product').checked==true){
                    var datalaporan="filter=product&nm_produk="+document.getElementById('nm_produk').value;
                }
                
                if(ket=='excel') {
                    window.open('<?php echo base_url(); ?>lap_penjualan/cetakexcel?'+datalaporan);
                }else{
                    window.open('<?php echo base_url(); ?>lap_penjualan/cetakpdf?'+datalaporan);
                }
            }
        </script>