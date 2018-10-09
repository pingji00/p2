<?php

require 'helpers.php';
require 'Food.php';
require 'Form.php';

use DWA\Form;
use FoodCalorie\Food;

session_start();

# Load food data from JSON file
$food = new Food('foods.json');
$form = new Form($_GET);

# Get data from input
$quantity = $form->get('quantity');
$unit = $form->get('unit');
$inputFood = $form->get('food');

$errors = $form->validate(
    [
        'quantity' => 'required|numeric|min:0',
    ]
);


if(!$form->hasErrors) {
    # Calculate food data according to quantity
    $nutrFacts = $food->getNutrFacts($quantity, $unit, $inputFood);
}

# Store data in the session
$_SESSION['results'] = [
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'quantity' => $quantity,
    'unit' => $unit,
    'foodName' => $inputFood,
];
$_SESSION['nutrition'] = $nutrFacts;

# Redirect back to the form
header('Location: index.php');