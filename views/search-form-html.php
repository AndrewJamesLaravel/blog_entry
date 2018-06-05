<?php

$pageData->content .= include_once "views/user-navigation.php";

return "<aside id='search-bar'>
            <form method='post' action='index.php?page=search'>
                <input type='search' name='search-term' />
                <input type='submit' value='search'>
            </form>
        </aside>";