<?php

namespace FoodCalorie;

class Food
{

    #Properties
    private $foodsList;

    #Methods

    public function __construct($json)
    {
        # Load food data from JSON file
        $foodsJson = file_get_contents($json);
        $this->foodsList = json_decode($foodsJson, true);
    }

    public function getAll()
    {
        return $this->foodsList;
    }

    public function getNutrFacts($quantity, $unit, string $inputFood)
    {
        # Change coefficient based on the selected unit.
        # The JSON file that I downloaded use 100g as base unit,
        # so if the unit is lb, then 1lb = 4.536 * 100g, otherwise 1kg = 10 * 100g
        $coefficient = ($unit === 'lb') ? 4.536 : 10;

        $nutrFacts = [];

        # Save nutrition facts to selected food
        foreach ($this->foodsList as $food) {
            if ($inputFood === $food['name']) {
                foreach ($food['nutrition-per-100g'] as $nutr => $nutrAmt) {
                    $nutrFacts[$nutr] = round($nutrAmt * $coefficient * $quantity);

                    if ($nutr == "energy") {
                        $nutrFacts[$nutr] .= " calorie";
                    } else {
                        $nutrFacts[$nutr] .= " g";
                    }
                }
            }
        }

        return $nutrFacts;
    }
}