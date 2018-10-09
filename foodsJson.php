<?php
$foodsJson = file_get_contents('foods.json');
$foods = json_decode($foodsJson, true);