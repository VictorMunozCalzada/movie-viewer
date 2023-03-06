<?php

declare(strict_types=1);

namespace Controller;

require_once(__DIR__ . '/../config.php');

use function Config\get_lib_dir;
use function Config\get_model_dir;
use function Config\get_view_dir;
use function Config\get_public_dir;
use function Config\get_utils_dir;

require_once(get_lib_dir() . '/request/request.php');
require_once(get_model_dir() . '/model.php');
require_once(get_lib_dir() . '/response/response.php');
require_once(get_lib_dir() . '/context/context.php');
require_once(get_utils_dir() . '/utils.php');
require_once(get_view_dir() . '/view.php');

use Response\Response;
use Request\Request;
use Context\Context;
use Table\Table;


use function Model\get_csv_path;
use function Model\read_table;
use function Model\add_blog_message;
use function Model\add_movie;
use function Model\delete_movie;
use function Model\check_user_login;
use function Model\get_blog_entries;
use function Model\get_img_info_array;
use function Model\get_img_info_category;
use function Model\add_user;
use function Model\delete_blog_message;
use function View\get_template_path;
use function View\render_template;




use function Utils\api_call;

function generateIndexView(string $template_path, string $skeleton_path, Context $context)
{
    $username = $context->name;
    $index_body = render_template(get_template_path($template_path), ["name" => $username]);
    $index_view = render_template(
        get_template_path($skeleton_path),
        [
            'title' => 'WebApp',
            'body'  => $index_body,
            "name" => $username
        ]
    );


    return $index_view;
}

function generateBlogView(string $template_path, string $skeleton_path, array $blog_vars, Context $context)
{
    $username = $context->name;
    $blog_body = render_template(
        get_template_path($template_path),
        ['blog_entry' => $blog_vars]
    );
    $blog_view = render_template(
        get_template_path($skeleton_path),
        [
            'title' => 'Blog',
            'body'  => $blog_body,
            "name" => $username
        ]
    );

    return $blog_view;
}

function generateGalleryView(string $template_path, string $skeleton_path, array $gallery_vars, Context $context)
{
    $username = $context->name;
    $gallery_body = render_template(get_template_path($template_path), $gallery_vars);
    $gallery_view = render_template(
        get_template_path($skeleton_path),
        [
            'title' => 'Gallery',
            'body'  => $gallery_body,
            "name" => $username

        ]
    );

    return $gallery_view;
}

function generateDataView(string $template_path, string $skeleton_path, Table $movies_table, Context $context)
{
    $username = $context->name;
    $data_body = render_template(
        get_template_path($template_path),
        ['movies_table' => $movies_table]
    );

    $data_view = render_template(
        get_template_path($skeleton_path),
        [
            'title' => 'Data',
            'body'  => $data_body,
            "name" => $username
        ]
    );

    return $data_view;
}

function generateWebServiceView(string $template_path, string $skeleton_path, array $result_billboard, Context $context)
{
    $username = $context->name;
    $web_service_body = render_template(get_template_path($template_path), ['movies_array' => $result_billboard]);

    $web_service_view = render_template(
        get_template_path($skeleton_path),
        [
            'title' => 'Data',
            'body'  => $web_service_body,
            "name" => $username
        ]
    );

    return $web_service_view;
}




// ############################################################################
// Route handlers
// ############################################################################
// All controller functions receive $request, whether they use it or not.

// ----------------------------------------------------------------------------
function index(Request $request, Context $context): array
{
    $action = $request->parameters['action'] ?? 'list';
    if ($action == 'logout') {
        $context->logged_in = false;
    }

    // Registered
    if ($context->logged_in == true) {  // User

        if ($context->role == "user") {
            $index_view = generateIndexView('/body/user/index-user', '/skeleton/skeleton-registered', $context);
            $response   = new Response($index_view);
            return [$response, $context];
        } else if ($context->role == "admin") {  // Admin
            $index_view = generateIndexView('/body/admin/index-admin', '/skeleton/skeleton-registered', $context);
            $response   = new Response($index_view);
            return [$response, $context];
        }
    } else {  // Not logged: Guest
        $index_view = generateIndexView('/body/guest/index-guest', '/skeleton/skeleton', $context);
        $response   = new Response($index_view);
        return [$response, $context];
    }
}

// ----------------------------------------------------------------------------
function login(Request $request, Context $context): array
{

    if ($request->method == 'GET') {  // If GET, send form

        $login_body = render_template(
            get_template_path('/body/guest/login'),
            []
        );
        $login_view = render_template(
            get_template_path('/skeleton/skeleton'),
            [
                'title' => 'Login',
                'body'  => $login_body
            ]
        );

        $response = new Response($login_view);
        return [$response, $context];
    } elseif ($request->method == 'POST') {  // If POST get form parameters

        $username = $request->parameters['username'];
        $password = $request->parameters['password'];

        // Look into users.csv if the username and password are corrects, etc.
        if (check_user_login($username, $password) != null) {
            $role = check_user_login($username, $password)->getRole(); // Get the role 
            $context->logged_in = true;
            $context->name = $username;
            $context->role = $role;
            $response = new Response(redirection_path: '/index');
        } else {
            $login_body = render_template(
                get_template_path('/body/guest/login-error'),
                []
            );
            $login_view = render_template(
                get_template_path('/skeleton/skeleton'),
                [
                    'title' => 'Login',
                    'body'  => $login_body
                ]
            );

            $response = new Response($login_view);
        }

        return [$response, $context];
    }
}

// ----------------------------------------------------------------------------
function register(Request $request, Context $context): array
{

    if ($request->method == 'GET') {  // If GET, send form

        $register_body = render_template(
            get_template_path('/body/guest/register'),
            []
        );
        $register_view = render_template(
            get_template_path('/skeleton/skeleton'),
            [
                'title' => 'Register',
                'body'  => $register_body
            ]
        );

        $response = new Response($register_view);
        return [$response, $context];
    } elseif ($request->method == 'POST') {  // If POST get form parameters

        $username = $request->parameters['username'];
        $password = $request->parameters['password'];

        // Look into users.csv if the username and password exist.
        if (check_user_login($username, $password)) {

            $register_body = render_template(
                get_template_path('/body/guest/register-error'),
                []
            );
            $register_view = render_template(
                get_template_path('/skeleton/skeleton'),
                [
                    'title' => 'Register',
                    'body'  => $register_body
                ]
            );
            $response = new Response($register_view);
        } else {
            add_user(get_csv_path('users'), $username, $password);
            $response = new Response();
            $response->set_redirection('/login');
        }

        return [$response, $context];
    }
}

// ----------------------------------------------------------------------------
function blog(Request $request, Context $context): array
{
    // Get data
    $blog_vars = get_blog_entries();

    // Registered
    if ($context->logged_in == true) {
        if ($context->role == "user") { // User
            if ($request->method == 'POST') {
                $title = $request->parameters['title'];
                $text = $request->parameters['text'];
                add_blog_message($title, $text);
                $response = new Response();
                $response->set_redirection('/blog');
            } else if ($request->method == 'GET') {

                $blog_view = generateBlogView('/body/user/blog-user', '/skeleton/skeleton-registered', $blog_vars, $context);
                $response = new Response($blog_view);
                return [$response, $context];
            }
        } else if ($context->role == "admin") { // Admin
            if ($request->method == 'POST') {
                $title = $request->parameters['title'];
                $text = $request->parameters['text'];
                $action = $request->parameters['modify'];


                if ($action == "add") {
                    add_blog_message($title, $text);
                } elseif ($action == "delete") {
                    delete_blog_message($title);
                }
                $response = new Response();
                $response->set_redirection('/blog');
            } else if ($request->method == 'GET') {

                $blog_view = generateBlogView('/body/admin/blog-admin', '/skeleton/skeleton-registered', $blog_vars, $context);
                $response = new Response($blog_view);
                return [$response, $context];
            }
        }
    } else { // Not logged: Guest
        $blog_view = generateBlogView('/body/guest/blog-guest', '/skeleton/skeleton', $blog_vars, $context);
        $response = new Response($blog_view);
        return [$response, $context];
    }
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function gallery(Request $request, Context $context): array
{
    // Get data
    $local_file_array = glob(__DIR__ . '/../../../db/gallery/*');
    $gallery_vars = get_img_info_array($local_file_array);

    // Registered
    if ($context->logged_in == true) {
        if ($context->role == "user") { // User
            $gallery_view = generateGalleryView('/body/user/gallery-user', '/skeleton/skeleton-registered', $gallery_vars, $context);
            $response = new Response($gallery_view);
            return [$response, $context];
        } else if ($context->role == "admin") { // Admin
            $gallery_view = generateGalleryView('/body/admin/gallery-admin', '/skeleton/skeleton-registered', $gallery_vars, $context);
            $response = new Response($gallery_view);
            return [$response, $context];
        }
    } else { // Not logged: Guest
        $gallery_view = generateGalleryView('/body/guest/gallery-guest', '/skeleton/skeleton', $gallery_vars, $context);
        $response = new Response($gallery_view);
        return [$response, $context];
    }
}
// ----------------------------------------------------------------------------

function genre(Request $request, Context $context): array
{


    $genre = $request->parameters['genre'];
    $username = $context->name;
    $category_vars = glob(get_public_dir() . "/img/$genre/*");

    //si el array está vacio mandar un template de error avisando que el genero no existe
    $action_vars = get_img_info_category($category_vars, $genre);
    $action_vars['category'] = $genre;

    // Registered
    if ($context->logged_in == true) {

        $gallery_body = render_template(get_template_path('/body/guest/category-guest'), $action_vars);
        $gallery_view = render_template(
            get_template_path('/skeleton/skeleton-registered'),
            [
                'title' => $genre,
                'body'  => $gallery_body,
                'name'  => $username
            ]
        );

        $response = new Response($gallery_view);
        return [$response, $context];
    } else {
        $gallery_body = render_template(get_template_path('/body/guest/category-guest'), $action_vars);
        $gallery_view = render_template(
            get_template_path('/skeleton/skeleton'),
            [
                'title' => $genre,
                'body'  => $gallery_body,
                'name'  => $username
            ]
        );

        $response = new Response($gallery_view);
        return [$response, $context];
    }
}

// ----------------------------------------------------------------------------
function data(Request $request, Context $context): array
{
    // Get data
    $movies_table = read_table(get_csv_path('movies'), '|');

    // Registered
    if ($context->logged_in == true) {
        if ($context->role == "user") { // User

            if ($request->method == 'POST') {
                // Get form values
                $film = $request->parameters['film'];
                $genre = $request->parameters['genre'];
                $studio = $request->parameters['studio'];
                $audience = $request->parameters['audience'];
                $profitability = $request->parameters['profitability'];
                $gross = $request->parameters['gross'];
                $year = $request->parameters['year'];

                add_movie(get_csv_path('movies'), $film, $genre, $studio, $audience, $profitability, $gross, $year);
                $response = new Response();
                $response->set_redirection('/data');
            } else if ($request->method == 'GET') {
                $data_view = generateDataView('/body/user/data-user', '/skeleton/skeleton-registered', $movies_table, $context);
                $response = new Response($data_view);
            }
        } else if ($context->role == "admin") { // Admin
            if ($request->method == 'POST') {
                // Get form values
                $film = $request->parameters['film'];
                $genre = $request->parameters['genre'];
                $studio = $request->parameters['studio'];
                $audience = $request->parameters['audience'];
                $profitability = $request->parameters['profitability'];
                $gross = $request->parameters['gross'];
                $year = $request->parameters['year'];
                $action = $request->parameters['modify'];

                if ($action == "add") {
                    add_movie(get_csv_path('movies'), $film, $genre, $studio, $audience, $profitability, $gross, $year);
                } elseif ($action == "delete") {
                    delete_movie(get_csv_path('movies'), $film);
                }
                $response = new Response();
                $response->set_redirection('/data');
            } else if ($request->method == 'GET') {
                $data_view = generateDataView('/body/admin/data-admin', '/skeleton/skeleton-registered', $movies_table, $context);
                $response = new Response($data_view);
            }
        }
    } else { // Not logged: Guest
        $data_view = generateDataView('/body/guest/data-guest', '/skeleton/skeleton', $movies_table, $context);
        $response = new Response($data_view);
    }
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function web_service(Request $request, Context $context): array
{
    // Get data
    $api_key = "2c30fc277d011c88735381b4cf9c7ac2";
    $result_billboard = api_call("https://api.themoviedb.org/3/trending/all/day?api_key=", $api_key);

    // Registered
    if ($context->logged_in == true) {
        if ($context->role == "user") { // User
            if ($request->method == 'GET') {
                $web_service_view = generateWebServiceView('/body/user/web-service-user', '/skeleton/skeleton-registered',  $result_billboard, $context);
                $response = new Response($web_service_view);
                return [$response, $context];
            }
        } else if ($context->role == "admin") { // Admin

            if ($request->method == 'GET') {
                $web_service_view = generateWebServiceView('/body/admin/web-service-admin', '/skeleton/skeleton-registered',  $result_billboard, $context);
                $response = new Response($web_service_view);
                return [$response, $context];
            }
        }
    } else { // Not logged: Guest
        $result_billboard = [];
        $web_service_view = generateWebServiceView('/body/guest/web-service-guest', '/skeleton/skeleton',  $result_billboard, $context);
        $response = new Response($web_service_view);
        return [$response, $context];
    }
}



// ----------------------------------------------------------------------------
function error_404(Request $request, Context $context): array
{
    $username = $context->name;
    if ($context->logged_in == true) {
        $error404_body = render_template(
            get_template_path('/body/guest/error404'),
            ['request_path' => $request->path]
        );

        $error404_view = render_template(
            get_template_path('/skeleton/skeleton-registered'),
            [
                'title' => 'Not found',
                'body'  => $error404_body,
                'name'  => $username
            ]
        );

        $response = new Response($error404_view, 404);
        return [$response, $context];
    } else { // Not logged: Guest
        $error404_body = render_template(
            get_template_path('/body/guest/error404'),
            ['request_path' => $request->path]
        );

        $error404_view = render_template(
            get_template_path('/skeleton/skeleton'),
            [
                'title' => 'Not found',
                'body'  => $error404_body,
                'name'  => $username
            ]
        );

        $response = new Response($error404_view, 404);
        return [$response, $context];
    }
}

// ----------------------------------------------------------------------------
function contact(Request $request, Context $context): array
{

    $username = $context->name;
    if ($context->logged_in == true) {
        if ($request->method == 'GET') {


            $contact_body = render_template(
                get_template_path('/body/guest/contact'),
                []
            );
            $contact_view = render_template(
                get_template_path('/skeleton/skeleton-registered'),
                [
                    'title' => 'Contact',
                    'body'  => $contact_body,
                    'name'  => $username
                ]
            );
            $response = new Response($contact_view);
            return [$response, $context];
        }
    } else { // Not logged: Guest
        if ($request->method == 'GET') {
            $contact_body = render_template(
                get_template_path('/body/guest/contact'),
                []
            );
            $contact_view = render_template(
                get_template_path('/skeleton/skeleton'),
                [
                    'title' => 'Contact',
                    'body'  => $contact_body,
                    'name'  => $username
                ]
            );
            $response = new Response($contact_view);
            return [$response, $context];
        }
    }
}
