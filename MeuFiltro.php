<?php

class Meufiltro extends php_user_filter
{
 public $stream;
 public function onCreate():bool
 {

   $this->stream= fopen('php://temp','w+');
   return $this->stream !== false;
 }

 public function filter($in, $out, &$consumed, $closing):int
 {
    $saida='';
    while($bucket=stream_bucket_make_writeable($in)){
        $linhas = explode("\n",$bucket->data);
        foreach($linhas as $linha){
            if(stripos($linha,'espero')!=false){

                $saida .="$linha \n";
            }


        }
    }

    

    $bucketsaida=stream_bucket_new($this->stream,$saida);
    stream_bucket_append($out,$bucketsaida);


    return PSFS_PASS_ON;
 }






}