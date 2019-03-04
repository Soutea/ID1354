<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/react@15.3.2/dist/react.min.js"></script>
<script src="https://unpkg.com/react-dom@15.3.2/dist/react-dom.min.js"></script>
<script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

<header>
    <ul class="nav-links1">
        <li>
            <a href="/TastyRecipe/View/Calendar">Calendar
            </a>
        </li>
        <li>
            <a href="/TastyRecipe/View/ViewRecipe?title=Pancakes">Old-fashioned Pancakes
            </a>
        </li>
        <li>
            <a href="/TastyRecipe/View/ViewRecipe?title=Meatballs">Swedish Meatballs
            </a>
        </li>
    </ul>
    <ul class="nav-links2">
        <?php if ($loggedIn) { ?>
            <li>
                <a href="/TastyRecipe/View/Logout">Sign out

                </a>
            </li>
            <li>
                Welcome <?= htmlspecialchars($currentUser['username']) ?>
            </li>
        <?php } else { ?>
            <li>
                <a
                    href="/TastyRecipe/View/Login"> Sign in
                </a>
            </li>
            <li>
                <a
                    href="/TastyRecipe/View/Register"> Register
                </a>
            </li>
        <?php } ?>
    </ul>
    <h1>
        <a
            href="/TastyRecipe/View/Index">Tasty Recipe

        </a>
    </h1>
</header>
