<?php

function formatDate($date)
{
  return \Carbon\Carbon::parse($date)->format('M d, Y');
}
