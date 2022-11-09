<!doctype html>
<html>
<head>
    <style type="text/css">
        body{
            background-image: url(asset/images/scr.jpg);
            background-size: 33%;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">  
    <title>Form Login</title> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/metro/easyui.css">  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/mobile.css">  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/easyui/themes/icon.css"> 
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/easyui/jquery.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/easyui/jquery.easyui.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/easyui/jquery.easyui.mobile.js"></script>
    </style>
</head>
<script type="text/javascript">
    function submitlogin(){
        document.getElementById("formlogin").submit();
    }
</script>
<body>
    <div class="body">
        <form id="formlogin" name="formlogin" method="post" action="<?php echo base_url(); ?>Login/ceklogin">
        <header>
            <div class="m-toolbar">
            <center>
            <div style="background:#060606; width:340px; height:80px;">
            <br>
                <font size="3" color="#07F3F7" face="wide latin"><center><p>FORM LOGIN</p></center></font>
            </div>
        </header>
        <div style="margin:20px auto;width:200px;height:200px;border-radius:200px;overflow:hidden">
            <img src="<?php echo base_url(); ?>asset/images/Allianzy1.jpg" style="margin:0;width:100%;height:100%">
        </div>
        <div style="padding:0 20px">
            <div style="text-align:center;margin-bottom:10px">
                <input class="easyui-textbox" id="username" name="username" data-options="prompt:'Masukan Username / Type Username',iconCls:'icon-man'" style="width:50%;height:38px">
            </div>
            <div style="text-align:center;margin-bottom:10px">
                <input class="easyui-passwordbox" id="password" name="password" data-options="prompt:'Masukan Password / Type password'" style="width:50%;height:38px">
            </div>
            <div style="text-align:center;margin-top:30px">
              <button><a href="" class="easyui-linkbutton" onClick="submitlogin()" style="width:70px;height:40px"><span style="font-size:16px">Login</span></a></button>
            </div>
        </div>
        </form>
    </div>
</body>    
</html>

