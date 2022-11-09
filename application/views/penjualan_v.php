    <title>Halaman Table Penjualan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/easyui/jquery.easyui.min.js"></script>

    <table id="dg" title="List Data Penjualan" class="easyui-datagrid" style="width:100%;height:550px"
            url="<?php echo base_url(); ?>penjualan/getpenjualan"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true"> 
        <thead>
            <tr>
                <th field="pelanggan">Pelanggan</th>
                <th field="nm_produk">Nama Product</th>
                <th field="nomer_hp">Nomor Handphone</th>
                <th field="email">Email</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newPenjualan()">Tambah Data Penjualan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editPenjualan()">Edit Data Penjualan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapusPenjualan()">Hapus Data Penjualan</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Information Penjualan</h3>
            <div style="margin-bottom:10px">
                <input name="pelanggan" class="easyui-textbox" required="true" label="Pelanggan :" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nm_produk" class="easyui-textbox" required="true" label="Produk :" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nomer_hp" class="easyui-textbox" required="true" label="Nomer hp:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="email" class="easyui-textbox" required="true" label="Email:" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newPenjualan(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Tambah Data Penjualan');
            $('#fm').form('clear');
            url = '<?php echo base_url(); ?>Penjualan/SimpanData';
        }
        function editPenjualan(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit Data Penjualan');
                $('#fm').form('load',row);
                url = '<?php echo base_url(); ?>Penjualan/UpdateData?id_pelanggan='+row.pelanggan;
            }
        }
        function saveUser(){
            $('#fm').form('submit',{
                url: url,
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        alert (result.Konfirmasi);
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function hapusPenjualan(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Apakah Anda Yakin Ingin Menghapus Data Ini?',function(r){
                    if (r){
                        $.post('<?php echo base_url(); ?>Penjualan/HapusData', {pelanggan:row.pelanggan},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
    </script>