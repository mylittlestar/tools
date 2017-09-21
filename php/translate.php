#!/usr/bin/php
<?php
// 将json或者xml转换成php代码格式

$content = file_get_contents("test.xml");
$transArray = json_decode(json_encode(simplexml_load_string($content)));
$resultCode = "";

//是不是该有一个公共的数组层级来进行存储
$keyArray = array();
$valueArray = array();
$index = 0;


transArrayToCode($transArray,$index);

echo json_encode($keyArray);
echo json_encode($valueArray);

echo count($keyArray)."\n";
echo count($valueArray)."\n";


//现有算法的思路是把所有的结构以层级的方式提取出来
//但是怎么把对应的代码生成出来呢，重新遍历也不可避免要去解决层级的问题


/**
 * 转换数组成指定格式
 * @param  [type] $transArray [description]
 * @param  [type] $index      [description]
 * @return [type]             [description]
 */
function transArrayToCode($transArray,$index){
	//echo json_encode($transArray).gettype($transArray)."\n";
	global $resultCode, $keyArray, $valueArray;
	$index++;
	foreach ($transArray as $key => $value){
		$keyArray[$index][] = $key;
		if (gettype($value) == "object") {
			transArrayToCode($value,$index);
		}else{
			$valueArray[] = $value;
		}
	}
}

/**
 * 数组层级的遍历问题
 * 如果有无数的数组层级又怎么拼接起来
 * @param  [type] $keyArray   [description]
 * @param  [type] $valueArray [description]
 * @return [type]             [description]
 */
function transArrayToPHP($keyArray, $valueArray){
	$key_len = count($keyArray);
	for($i = 0; $i < $key_len; $i++){
		
	}

}



/**
 * 数组转换成php源码
 * @param  [type] $tranStr [description]
 * @param  [type] $str     [description]
 * @return [type]          [description]
 */
function transStrToCode($tranStr,$str){

}