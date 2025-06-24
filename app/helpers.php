<?php

if (!function_exists('formatDate')) {
  function formatDate($date, $format = 'M d, Y')
  {
    return \Carbon\Carbon::parse($date)->format($format);
  }
}
