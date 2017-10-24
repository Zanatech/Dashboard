<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;

class TableController extends Controller
{
  public static function new_table($table_title, $headers, $content, $had_link, $link, $reveal, $charts){

    if (is_object($content)) {

    foreach ($content as $object) {
      $array[] = $object->array();
    }
      if (isset($array)) {
        $table['content'] = $array;
      }else{ $table['content'] = null;}

    }else{ $table['content'] = $content;   }


    $table['table_title'] = $table_title; 
    $table['table_name'] = $headers;
    $table['main'] = $had_link;
    $table['link'] = $link;
    $table['reveal'] = $reveal;
    $table['charts'] = $charts;

    return $table;
  }

  public static function excelhtmltable($table_title, $content){
    if (is_object($content)) {

      foreach ($content as $object) {
        $array[] = $object->array();
      }
        if (isset($array)) {
          $table['content'] = $array;
        }else{ $table['content'] = null;}

    }else{ $table['content'] = $content;   }

    $table['table_title'] = $table_title; 

    return $table;
  }

  public static function multi_bar($title, $labels, $datasets){

    $chart = Charts::multi('bar', 'material')
                    ->title($title)
                    ->template("material")
                    ->labels($labels);

    foreach ($datasets as $dataset) {
      $chart->dataset($dataset['label'], $dataset['values']);
    }

    return $chart;
  }

  public static function multi_areaspline($title, $labels, $datasets){

    $chart = Charts::multi('areaspline', 'highcharts')
                    ->title($title)
                    ->labels($labels);

    foreach ($datasets as $dataset) {
      $chart->dataset($dataset['label'], $dataset['values']);
    }

    return $chart;
  }

  public static function create_line($title, $element_label, $labels, $values){

    return Charts::create('line', 'highcharts')
                  ->title($title)
                  ->elementLabel($element_label)
                  ->labels($labels)
                  ->values($values)
                  ->responsive(true);
    }
}
