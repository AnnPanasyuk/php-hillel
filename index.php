    <?php
    session_start();


    require_once './model/base_model.php';
    require_once './model/post.php';
    require_once './model/comment.php';
    require_once './model/user.php';

    require_once './acl.php';
    require_once './router.php';

    require_once './actions/base_page.php';
    require_once './actions/index_page.php';
    require_once './actions/post_page.php';
    require_once './actions/add_post_page.php';
    require_once './actions/delete_page.php';
    require_once './actions/register_user_page.php';
    require_once './actions/login_user_page.php';
    require_once './actions/logout_user_page.php';

    echo 'hello!';
    $acl = new ACL();

    $router = new Router($_GET, $_POST, $_SESSION, $_SERVER, $acl);

    $router->attach('indexPage', new IndexPage());
    $router->attach('postPage', new PostPage());
    $router->attach('addPostPage', new AddPostPage());
    $router->attach('deletePostPage', new DeletePostPage());
    $router->attach('registerPage', new RegisterUserPage());
    $router->attach('loginPage', new LoginUserPage());
    $router->attach('logoutPage', new LogoutUserPage());


    $router->serve();
