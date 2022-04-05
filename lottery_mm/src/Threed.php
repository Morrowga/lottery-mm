<?php

namespace Lottery\Threed;

class Threed
{

    public function numbers(){
        $data = [];
        $result = [];
        for($i = 0; $i < 1000; $i++) {
            array_push($data, $i);
        }

        foreach($data as $datum){
            if(strlen((string)$datum) === 1){
                $one = '00' . (string)$datum;
                array_push($result,$one);
            } 
            if(strlen((string)$datum) === 2){
                $two = '0' . (string)$datum;
                array_push($result,$two);
            } 

            if(strlen((string)$datum) === 3){
                $three = (string)$datum;
                array_push($result,$three);
            } 
        }

        return $result;
    }

    public function reverse_origin($number){
        $first = $second = $third = $array = [] ;
        $data = $this->numbers();
        if(gettype($number) === 'object'){
            throw new \ErrorException("Expected string or array. object given.");
        } else if(is_array($number)){
            foreach($number as $num){
                if(strlen($num) === 3){
                    $split = str_split($num);
                    if($split[0] === $split[1] && $split[0] === $split[2]){
                        array_push($array, $num);
                    } else if($split[0] === $split[1]) {
                        $res = [
                            $split[0] . $split[1] . $split[2],
                            $split[0] . $split[2] . $split[1],
                            $split[2] . $split[1] . $split[0],
                        ];
    
                        foreach($res as $s){
                            array_push($array, $s);
                        }
                    }  else if($split[0] === $split[2]){
                        $res = [
                            $split[0] . $split[1] . $split[2],
                            $split[0] . $split[2] . $split[1],
                            $split[1] . $split[2] . $split[0],
                        ];
    
                        foreach($res as $s){
                            array_push($array, $s);
                        }
                    } else if($split[1] === $split[2]){
                        $res = [
                            $split[0] . $split[1] . $split[2],
                            $split[1] . $split[0] . $split[2],
                            $split[1] . $split[2] . $split[0],
                        ];
    
                        foreach($res as $s){
                            array_push($array, $s);
                        }
                    } else {
                        foreach($data as $datum){
                            if(strpos($datum, $split[0]) !== false){
                                array_push($first,$datum);
                            }
                        }
            
                        foreach($first as $f){
                            if(strpos($f, $split[1]) !== false){
                                array_push($second,$f);
                            }
                        }
            
                        foreach($second as $s){
                            if(strpos($s, $split[2]) !== false){
                                array_push($third,$s);
                            }
                        }
    
                        foreach($third as $t){
                            array_push($array, $t);
                        }
    
                        unset($first);
                        unset($second);
                        unset($third);
                        $first = [];
                        $second = [];
                        $third = [];
                    }
                } else {
                    throw new \ErrorException("Expected string length is 3.  ". strlen($num) . " given");
                }
            }
            return response()->json(['reverse' => $array]);
        } else {
            if(strlen($number) === 3){
                $split = str_split($number);

                if($split[0] === $split[1] && $split[0] === $split[2]){
                    return response()->json(["reverse" => $number]);
                } else if($split[0] === $split[1]) {
                    $res = [
                        $split[0] . $split[1] . $split[2],
                        $split[0] . $split[2] . $split[1],
                        $split[2] . $split[1] . $split[0],
                    ];
                    return response()->json(['reverse' => $res]);
                }  else if($split[0] === $split[2]){
                    $res = [
                        $split[0] . $split[1] . $split[2],
                        $split[0] . $split[2] . $split[1],
                        $split[1] . $split[2] . $split[0],
                    ];
                    return response()->json(['reverse' => $res]);
                } else if($split[1] === $split[2]){
                    $res = [
                        $split[0] . $split[1] . $split[2],
                        $split[1] . $split[0] . $split[2],
                        $split[1] . $split[2] . $split[0],
                    ];
                    return response()->json(['reverse' => $res]);
                } else {
                    foreach($data as $datum){
                        if(strpos($datum, $split[0]) !== false){
                            array_push($first,$datum);
                        }
                    }
        
                    foreach($first as $f){
                        if(strpos($f, $split[1]) !== false){
                            array_push($second,$f);
                        }
                    }
        
                    foreach($second as $s){
                        if(strpos($s, $split[2]) !== false){
                            array_push($third,$s);
                        }
                    }
        
                    return response()->json(['reverse' => $third]);
                }
            }
            throw new \ErrorException("Expected string length is 3.  ". strlen($number) . " given");
        }
    }


    public function reverse_without_origin($number){
        $first = $second = $third = $array = [] ;
        $data = $this->numbers();
        if(gettype($number) === 'object'){
            throw new \ErrorException("Expected string or array. object given.");
        } else if(is_array($number)){
            foreach($number as $num){
                if(strlen($num) === 3){
                    $split = str_split($num);
                    if($split[0] === $split[1] && $split[0] === $split[2]){
                        array_push($array, $num);
                    } else if($split[0] === $split[1]) {
                        $res = [
                            $split[0] . $split[2] . $split[1],
                            $split[2] . $split[1] . $split[0],
                        ];
    
                        foreach($res as $s){
                            array_push($array, $s);
                        }
                    }  else if($split[0] === $split[2]){
                        $res = [
                            $split[0] . $split[2] . $split[1],
                            $split[1] . $split[2] . $split[0],
                        ];
    
                        foreach($res as $s){
                            array_push($array, $s);
                        }
                    } else if($split[1] === $split[2]){
                        $res = [
                            $split[1] . $split[0] . $split[2],
                            $split[1] . $split[2] . $split[0],
                        ];
    
                        foreach($res as $s){
                            array_push($array, $s);
                        }
                    } else {
                        foreach($data as $datum){
                            if(strpos($datum, $split[0]) !== false){
                                array_push($first,$datum);
                            }
                        }
            
                        foreach($first as $f){
                            if(strpos($f, $split[1]) !== false){
                                array_push($second,$f);
                            }
                        }
            
                        foreach($second as $s){
                            if(strpos($s, $split[2]) !== false){
                                array_push($third,$s);
                            }
                        }
    
                        foreach($third as $t){
                            if($t !== $num){
                                array_push($array, $t);
                            }
                        }
    
                        unset($first);
                        unset($second);
                        unset($third);
                        $first = [];
                        $second = [];
                        $third = [];
                    }
                } else {
                    throw new \ErrorException("Expected string length is 3.  ". strlen($num) . " given");
                }
            }
            return response()->json(['reverse' => $array]);
        } else {
            if(strlen($number) === 3){
                $split = str_split($number);

                if($split[0] === $split[1] && $split[0] === $split[2]){
                    return response()->json(["reverse" => $number]);
                } else if($split[0] === $split[1]) {
                    $res = [
                        $split[0] . $split[1] . $split[2],
                        $split[0] . $split[2] . $split[1],
                        $split[2] . $split[1] . $split[0],
                    ];
                    return response()->json(['reverse' => $res]);
                }  else if($split[0] === $split[2]){
                    $res = [
                        $split[0] . $split[1] . $split[2],
                        $split[0] . $split[2] . $split[1],
                        $split[1] . $split[2] . $split[0],
                    ];
                    return response()->json(['reverse' => $res]);
                } else if($split[1] === $split[2]){
                    $res = [
                        $split[0] . $split[1] . $split[2],
                        $split[1] . $split[0] . $split[2],
                        $split[1] . $split[2] . $split[0],
                    ];
                    return response()->json(['reverse' => $res]);
                } else {
                    foreach($data as $datum){
                        if(strpos($datum, $split[0]) !== false){
                            array_push($first,$datum);
                        }
                    }
        
                    foreach($first as $f){
                        if(strpos($f, $split[1]) !== false){
                            array_push($second,$f);
                        }
                    }
        
                    foreach($second as $s){
                        if(strpos($s, $split[2]) !== false){
                            array_push($third,$s);
                        }
                    }
        
                    return response()->json(['reverse' => $third]);
                }
            }
            throw new \ErrorException("Expected string length is 3.  ". strlen($number) . " given");
        }
    }
       
    public function tookBolean($num,$lucky){
        $split = str_split($num);
        if(str_contains($lucky, $split[0])){
            if(str_contains($lucky, $split[1])){
                if(str_contains($lucky, $split[2])){
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            } else {
                return response()->json(false);
            }
        } else {
            return response()->json(false);
        }
    }
}