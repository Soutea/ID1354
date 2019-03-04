<?php

namespace TastyRecipe\Model;


use TastyRecipe\Integration\RecipeLoader;

class Recipe
{
    public $title, $description, $totalTime, $imagePath, $imageUrl, $quantity, $ingredients, $recipeSteps, $nutritionFacts;

    public function __construct($title, $description, $totalTime, $imagePath, $imageUrl, $quantity, $ingredients, $recipeSteps,
                                $nutritionFacts)
    {
        $this->title = $title;
        $this->description = $description;
        $this->totalTime = $totalTime;
        $this->imagePath = $imagePath;
        $this->imageUrl = $imageUrl;
        $this->quantity = $quantity;
        $this->ingredients = $ingredients;
        $this->recipeSteps = $recipeSteps;
        $this->nutritionFacts = $nutritionFacts;


    }

    private static function unwrapXmlList($xmlList)
    {
        $arr = [];
        foreach ($xmlList->li as $elem) {
            $arr[] = $elem->__toString();
        }
        return $arr;
    }

    static function findByTitle($title)
    {
        // Den rå datastrukturen som vi får från SimpleXML
        $raw = RecipeLoader::get()->findRecipeByTitle($title);
        return new Recipe(
            $raw->title->__toString(),
            $raw->description->__toString(),
            $raw->totaltime->__toString(),
            trim($raw->imagepath->__toString()),
            trim($raw->imageurl->__toString()),
            $raw->quantity->__toString(),
            Recipe::unwrapXmlList($raw->ingredient),
            Recipe::unwrapXmlList($raw->recipetext),
            Recipe::unwrapXmlList($raw->nutrition));
    }

}