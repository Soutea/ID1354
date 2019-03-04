<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meatballs</title>
    <link rel="stylesheet" type="text/css" href="/resources/design.css"/>
</head>
<body>
<?php require "_header.php" ?>
<h2>
    <?= $recipe->title ?>
</h2>
<p class="recipedescription">
    <?= $recipe->description ?>
</p>

<img class="recipeimage" src="/resources/images/<?= $recipe->imagePath ?>" alt="<?= $recipe ?>"/>
<p>
    <a href="<?= $recipe->imageUrl ?>">source</a>
</p>

<p class="recipeinfo">
    <?= $recipe->totalTime ?>
    <?= $recipe->quantity ?>
</p>

<div class="recipesection">
    <h3>
        What you'll need (5 servings)
    </h3>

    <ul>
        <?php foreach ($recipe->ingredients as $ingredient) { ?>
            <li><?= $ingredient ?></li>
        <?php } ?>
    </ul>
</div>
<div class="recipesection">
    <h3>
        Directions
    </h3>

    <ol>
        <?php foreach ($recipe->recipeSteps as $step) { ?>
            <li><?= $step ?></li>
        <?php } ?>
    </ol>
</div>
<div class="recipesection">
    <h3>
        Nutrition facts per portion
    </h3>
    <ul>
        <li>Energy: 806 kJ / 193 kcal</li>
        <li>Protein: 14,1 g</li>
        <li>Carbs: 2,4 g</li>
        <li>Fat: 14,2g</li>
    </ul>
</div>

<h3 class="comments-header">
    Comments
</h3>
<div data-for-recipe="<?= $recipe->title ?>" id="commentsection"></div>
<script src="/resources/comments.jsx" type="text/babel"></script> <!--babel krävs för jsx -->
</body>
</html>