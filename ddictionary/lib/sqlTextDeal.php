<?php
/**
 * Created by PhpStorm.
 * User: Witel_Tsang
 * Date: 2016/1/12
 * Time: 16:54
 */

class SqlTextDeal {

    static $instance;
    const DIRFILE='newfrogdb.sql';
    const DIRFILEXML='tablescomment.xml';


    private function __construct(){

    }

    /**
     *
     *单例模式
     *
     */
    public static function getInstance() {
        if ( empty( self::$instance ) ) {
            self::$instance = new SqlTextDeal();
        }
        return self::$instance;
    }

    /**
    *
     *文件转数组
     *
     */
    public function TextDeal(){
        $sqltext = file_get_contents(self::DIRFILE);
        $sqltextArray=array();
        $matches=array();

        //截取出表名
        preg_match_all('/(?<=表的结构).*\`/',$sqltext,$matchesTablesName);

        //截取字段并组合
        foreach($matchesTablesName[0] as $value){
            $value=trim($value);

            $pattern = '/(?<=CREATE TABLE IF NOT EXISTS '.$value.' \()(.+?)(?=ENGINE)/s';
            preg_match($pattern,$sqltext,$matchesTablesfield);

            $decimalPreg = '/(?<=decimal\(\d\d)\,(?=\d)/';
            if(preg_match($decimalPreg,$matchesTablesfield[0],$decimal)!=0){
                $matchesTablesfield[0] = preg_replace($decimalPreg,".",$matchesTablesfield[0]);
               //die('11111');
            }
            $matches[$value]=explode(",",$matchesTablesfield[0]);
        }

        return $matches;
    }


    /**
     *提取sql字段
     */
    public function dbtextDeal($tablefiled){
        $matchfiled=array();
        preg_match('/(?<=\`).*(?=\`)/',$tablefiled,$matchfiled['id']);
        preg_match('/(?<=COMMENT).*/',$tablefiled,$matchfiled['comment']);

        $matchfiled['id'][0]=isset($matchfiled['id'][0])?$matchfiled['id'][0]:' ';
        $matchfiled['comment'][0]=isset($matchfiled['comment'][0])?$matchfiled['comment'][0]:' ';
        $matchfiled['type']=str_replace(array('COMMENT',"`".$matchfiled['id'][0]."`",$matchfiled['comment'][0]),'',$tablefiled);
        return $matchfiled;
    }

    /**
     *提取xml 表描述
     */
    public function xmltablesComment(){
        return simplexml_load_file(self::DIRFILEXML);
    }



}