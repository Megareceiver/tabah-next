<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Public_function {

    public function __construct()
    {
            // Do something with $params
    }

    public function time_elapsed_string($datetime, $full = false) {
       $now = new DateTime;
       $ago = new DateTime($datetime);
       $diff = $now->diff($ago);

       $diff->w = floor($diff->d / 7);
       $diff->d -= $diff->w * 7;

       $string = array(
           'y' => 'tahun',
           'm' => 'bulan',
           'w' => 'minggu',
           'd' => 'hari',
           'h' => 'jam',
           'i' => 'menit',
           's' => 'detik',
       );
       foreach ($string as $k => &$v) {
           if ($diff->$k) {
               // $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
               $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
           } else {
               unset($string[$k]);
           }
       }

       if (!$full) $string = array_slice($string, 0, 1);
       return $string ? implode(', ', $string) . ' yang lalu' : 'baru saja';
   }
}
