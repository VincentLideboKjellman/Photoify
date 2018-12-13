# 28 - Project Structure

[<img src="https://media.giphy.com/media/qqcZ1DWUT8ZVe/giphy.gif" width="100%">](https://www.themoviedb.org/movie/4538-the-darjeeling-limited)

In this lesson we'll look at how we can structure our PHP applications. We'll make our projects look similar to PHP frameworks such as [Symfony](https://symfony.com) and [Laravel](https://laravel.com).

> An indispensable part of every programming project is how you structure it, which involves organizing files and sources into directories, naming conventions, and similar. As your application grows, so does the need for structuring it in way that it is easy to manage and maintain - [Nikola Poša](http://blog.nikolaposa.in.rs/2017/01/16/on-structuring-php-projects)

## Assignments

1. To get you started with this file structure we're going to build a login system where the users can both login and logout. Copy the entire [application structure](examples) from the examples directory.

2. Copy the [`login.php`](resources) file from the resources directory and save it next to the `about.php` and `index.php` files. Add a new [navigation](https://getbootstrap.com/docs/4.1/components/navbar/) item with the text _Login_. When the users click on this link, they should be taken to the login page.

3. Visit the new login page in the browser. We're going to create a login system for our application.

    Use the following login credentials:

    - Email: francis@darjeeling.com
    - Password: the-darjeeling-limited

    When the form is submitted to `app/users/login.php`:
    
    - Check if the `email` and `password` [exists in the request](https://secure.php.net/manual/en/function.isset.php).
    - Fetch and [sanitize](https://secure.php.net/manual/en/filter.filters.sanitize.php) the email address value and store it in an variable called `$email`.
    - [Fetch](https://devdocs.io/sqlite/lang_select#simpleselect) the user in the database by the given email address.
    - If the user wasn't found in the database, redirect the user back to the login page.
    - If the user was found in the database, [verify](https://secure.php.net/manual/en/function.password-verify.php) the password from the request against the one in the database.
    - If the password was valid, store the user's `id`, `name` and `email` in a [session](https://secure.php.net/manual/en/book.session.php) variable called `user`.
    - Redirect the user back to the start page.
    
4. Update the _Login_ link in the navigation to show _Logout_ if the session variable `user` exists. When the user clicks on the logout link they should be taken to `app/users/logout.php`.

5. Add the logout script in the `app/users/logout.php` file. Remove the `user` variable from the session and redirect the user back to the start page. As a user, you should now be able to both login and logout.

## Extra

6. If the user is logged in, add a welcoming text to the start page. Fetch the name from the `user` session variable. The output **should** look like the snippet below.
    
    ```
    Welcome, Francis!
    ```
    
7. Since we want to provide a great UX for our users we should add highlighted menu items for the current page. Add an [active state](https://getbootstrap.com/docs/4.1/components/navbar/#nav) to the navigation links if the current URL or script name equals the name of the link. If you implemented this correctly, visit the about page and the about navigation item should be highlighted in the menu. 

    > **Tip:** Use the [`$_SERVER`](https://secure.php.net/manual/en/reserved.variables.server.php) variable to fetch the current URL from the environment information.

8. Watch [this video](https://youtu.be/LkDhnRaRbhg) about project structure in PHP by Codecourse.

## Next

In the next lesson you'll be given an assignment. If you want to prepare, please see the resources below and go back to previous lessons to practice your PHP development [skills](https://media.giphy.com/media/1zi3qxEOGYvMRmVQ9s/giphy.gif).

## Resources

- [Clean Code PHP](https://github.com/jupeter/clean-code-php#readme) - GitHub
- [DB Browser for SQLite](http://sqlitebrowser.org) - GitHub
- [Dealing with Forms](https://secure.php.net/manual/en/tutorial.forms.php) - PHP
- [Design Patterns PHP](https://github.com/domnikl/DesignPatternsPHP#readme) - GitHub
- [On structuring PHP projects](http://blog.nikolaposa.in.rs/2017/01/16/on-structuring-php-projects) - Nikola Poša
- [PHP Session](https://devdocs.io/php-sessions) - DevDocs
- [PSR-2: Coding Style Guide](http://www.php-fig.org/psr/psr-2) - PHP-FIG
