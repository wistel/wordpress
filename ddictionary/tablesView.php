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
$tableName = $_GET['table'];
$tablerow=$matches[$tableName];

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>数据字典[<?php echo $tableName;?>] - 帮助文档 - Newfrog</title>
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
<table cellpadding="5" cellspacing="1" class="dict" width="760">
    <tbody>
        <tr>
            <th width="190">字段名</th><th width="190">类型</th><th width="190">注释</th><th width="190">备注</th>
        </tr>
        <?php foreach($tablerow as $value):
            $dbtextDeal=$SqlTextDeal->dbtextDeal($value);
        ?>
        <tr onmouseover="this.className=&#39;on&#39;;" onmouseout="this.className=&#39;&#39;;" class="">
            <td><?php echo $dbtextDeal['id'][0]?></td><td><?php echo $dbtextDeal['type'];?></td><td><?php echo $dbtextDeal['comment'][0]?></td><td></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</body></html>