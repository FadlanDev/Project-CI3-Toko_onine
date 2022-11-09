    <title>Halaman Table Product</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/easyui/jquery.easyui.min.js"></script>
    
    <table id="dg" title="List Data Product" class="easyui-datagrid" style="width:100%;height:550px;"
            url="<?php echo base_url(); ?>product/getproduct"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true"> 
        <thead>
            <tr>
                <th field="kd_barang">Kode Product</th>
                <th field="nm_barang">Nama Product</th>
                <th field="satuan">Satuan</th>
                <th field="stok">Stok</th>
                <th field="stokmin">Stok Minimal</th>
                <th field="stokmax">Stok Maximal</th>
                <th field="harga_product">Harga Product</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newProduct()">Tambah Product</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editProduct()">Edit Product</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapusProduct()">Hapus Product</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Information Product</h3>
            <div style="margin-bottom:10px">
                <input name="kd_barang" class="easyui-textbox" required="true" label="Kode :" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nm_barang" class="easyui-textbox" required="true" label="Nama :" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="satuan" class="easyui-textbox" required="true" label="Satuan:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="stok" class="easyui-textbox" required="true" label="Stok:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="stokmin" class="easyui-textbox" required="true" label="Stok Min:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="stokmax" class="easyui-textbox" required="true" label="Stok Max:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="harga_product" class="easyui-textbox" required="true" label="Harga :" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newProduct(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Tambah Product');
            $('#fm').form('clear');
            url = '<?php echo base_url(); ?>Product/SimpanData';
        }
        function editProduct(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit Product');
                $('#fm').form('load',row);
                url = '<?php echo base_url(); ?>Product/UpdateData?id_kd_barang='+row.kd_barang;
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
        function hapusProduct(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Apakah Anda Yakin Ingin Menghapus Data Ini?',function(r){
                    if (r){
                        $.post('<?php echo base_url(); ?>Product/HapusData', {kd_barang:row.kd_barang},function(result){
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