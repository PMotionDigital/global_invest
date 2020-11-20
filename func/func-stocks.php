<?php

if (!wp_next_scheduled('update_quotes_5')) {
  wp_schedule_event(time(), 'stocks_interval', 'update_quotes_5');
}

add_action('update_quotes_5', 'api_send', 10, 3);

function api_send()
{

  $allowed_hosts = array('globalsecureinvest.com');
  if (!isset($_SERVER['HTTP_HOST']) || !in_array($_SERVER['HTTP_HOST'], $allowed_hosts)) {
    exit;
  } else {
    if (have_rows('spisok_kompanij', 'option')) :

      $STOCK_URLS = array();
      $counter = 0;

      while (have_rows('spisok_kompanij', 'option')) : the_row();
        $STOCK_URLS[$counter] = 'https://finnhub.io/api/v1/quote?symbol=' . get_sub_field('zagolovok_kompanii_publichnyj', 'option') . '&token=btst9k748v6tmsg6knf0';
        $counter++;
      endwhile;

      $STOCK_COUNT = count($STOCK_URLS);
      $result = getResult($STOCK_URLS);

      for ($i = 0; $i < $STOCK_COUNT; $i++) {
        if (json_decode($result[$i])) :
          update_sub_field(array('spisok_kompanij', $i + 1, 'json'), strval($result[$i]), 'option');
        endif;
      }
    endif;
  }
}

function callCURL($url)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $combined = curl_exec($ch);
  curl_close($ch);
  return $combined;
}


function getResult($urls)
{
  $return = array();

  foreach ($urls as $url) {

    $response = callCURL($url);
    $return[] = $response;
  }
  return $return;
}

add_action('wp_ajax_get_stock_info', 'get_stock_info');
add_action('wp_ajax_nopriv_get_stock_info', 'get_stock_info');

function get_stock_info()
{
  $output = array();
  if (have_rows('spisok_kompanij', 'option')) :
    while (have_rows('spisok_kompanij', 'option')) : the_row();
      $output[get_sub_field('zagolovok_kompanii_publichnyj')] = get_sub_field('json');
    endwhile;
  endif;
  echo json_encode($output);
  die;
}
