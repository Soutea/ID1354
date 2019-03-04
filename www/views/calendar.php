<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
    <link rel="stylesheet" type="text/css" href="/resources/design.css"/>
</head>
<body>

<?php require "_header.php" ?>

<h2 class="calendarmonth">
    February</h2>
<table>
    <thead>
    <tr>
        <td> Monday</td>
        <td> Tuesday</td>
        <td> Wednesday</td>
        <td> Thursday</td>
        <td> Friday</td>
        <td>Saturday</td>
        <td>Sunday</td>
    </tr>
    </thead>
    <tbody>

    <tr class="days">
        <td>
            <span class="calendar-number">1</span>
            <a
                href="/TastyRecipe/View/ViewRecipe?title=Pancakes"">
                <img class="cell-image" src="/resources/images/pancakes.jpg" alt="Pancakes"/>
            </a>

        </td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
    </tr>
    <tr class="days">
        <td>8</td>
        <td>9</td>
        <td>
            <span class="calendar-number">10</span>
            <a
                href="/TastyRecipe/View/ViewRecipe?title=Meatballs">
                <img class="cell-image" src="/resources/images/meatballs.jpg" alt="Meatballs"/>
            </a>
        <td>11</td>
        <td>12</td>
        <td>13</td>
        <td>14</td>
    </tr>
    <tr class="days">
        <td>15</td>
        <td>16</td>
        <td>17</td>
        <td>18</td>
        <td>19</td>
        <td>20</td>
        <td>21</td>
    </tr>
    <tr class="days">
        <td>22</td>
        <td>23</td>
        <td>24</td>
        <td>25</td>
        <td>26</td>
        <td>27</td>
        <td>28</td>
    </tr>
    </tbody>
</table>
</body>
</html>