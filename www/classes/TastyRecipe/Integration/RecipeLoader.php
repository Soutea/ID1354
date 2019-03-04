<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 15:23
 */

namespace TastyRecipe\Integration;



class RecipeLoader
{
    public static function get() { // singleton pattern. första gången den ropas på, skapas en anslutning.
        static $instance;                 // ropa på get igen, används den gamla, ny skapas ej
        if ($instance === null) {
            $instance = new RecipeLoader();
        }
        return $instance;
    }

    function findRecipeByTitle($title){
        $recipes = simplexml_load_file(dirname(__FILE__).'/storedrecipes.xml');
        $recipes->registerXPathNamespace("mcb", "http://www.mycookbook-android.com");
        return $recipes->xpath("/mcb:cookbook/mcb:recipe[mcb:title='$title']")[0]; //första meatballsreceptet
    }


}