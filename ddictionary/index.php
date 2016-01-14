<?php
/**
 * Created by PhpStorm.
 * User: Witel_Tsang
 * Date: 2016/1/12
 * Time: 16:47
 */
require_once('lib/sqlTextDeal.php');
$SqlTextDeal=SqlTextDeal::getInstance();
$matches=$SqlTextDeal->TextDeal();
$xmltablesComment=$SqlTextDeal->xmltablesComment();

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>数据字典 - 帮助文档 - Magento</title>
    <style>
        * {font-size:16px;font-family:Verdana,Arial;}
        .dict{background:#333333;margin:auto;}
        .dict th{background:#9999CC;font-weight:bold;height:25px;line-height:24px;letter-spacing:1px;color:#FFFFFF;}
        .dict td{line-height:22px;padding-left:10px;padding-right:10px;}
        .dict tr{background:#FFFFFF;}
        .on td{background:#CCCCFF;}
        a:link,a:visited,a:active{text-decoration:none;color:#136EC2}
        a:hover{text-decoration:none;}
    </style>
</head>
<body>
<style>
    .dict{background:#333333;margin:auto;}
    .dict th{background:#888888;font-weight:bold;height:25px;line-height:24px;letter-spacing:1px;color:#FFFFFF;}
    .dict td{line-height:20px;padding-left:10px;padding-right:10px;}
    .dict tr{background:#FFFFFF;}
    .on td{background:#F1F1F1;}
</style>
<h1 style="display: table;margin: auto;">Magento 数据词典</h1>
<table cellpadding="5" cellspacing="1" class="dict" width="760">
    <tbody>
    <tr><th width="345">表名</th>
        <th width="345">注释</th>
        <th width="70">词典</th>
    </tr>

    <?php
        foreach($matches as $key=>$value):
        $formatkey=str_replace('`','',$key);
    ?>
    <tr onmouseover="this.className=&#39;on&#39;;" onmouseout="this.className=&#39;&#39;;" class="">
        <td><?php echo $formatkey;?></td>
        <td><?php echo $xmltablesComment->$formatkey ;?></td>
        <td align="center"><a href="tablesView.php?table=<?php echo $key;?>" target="_blank">查看</a></td>
    </tr>
    <?php endforeach;?>

    </tbody>
</table>

</body></html>
