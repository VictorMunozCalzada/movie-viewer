<?php

declare(strict_types=1);

namespace Model;

require_once(__DIR__ . '/../config.php');

use function Config\get_lib_dir;
use function Config\get_csv_dir;
use function Config\get_blog_dir;

require_once(get_lib_dir() . '/table/table.php');
require_once(get_lib_dir() . '/user/user.php');
require_once(get_lib_dir() . '/utils/utils.php');

use Table\Table;
use User\User;

use function Utils\join_paths;
use function Utils\read_json;

use \DateTimeImmutable as DTI;



// ############################################################################
// Table functions
// ############################################################################

// Example: '/manga' => '/app/db/manga.csv'
// ----------------------------------------------------------------------------
function get_csv_path(string $csv_id): string
{

    $csv_suffix        = '.csv';
    $csv_relative_path = $csv_id . $csv_suffix;
    $csv_full_path     = join_paths(get_csv_dir(), $csv_relative_path);

    return $csv_full_path;
}

// ----------------------------------------------------------------------------
function read_table(string $csv_filename, string $separator): Table
{

    $data = Table::readCSV($csv_filename, $separator);
    return $data;
}

// ----------------------------------------------------------------------------
function add_blog_message(string $title, string $text): void
{
    // 1. Get current day
    $timestamp     = new DTI('now');
    $timestamp_str = $timestamp->format(DTI::RFC3339);
    $day_str = substr($timestamp_str, 0, 10);

    $blog_array = ["title" => $title, "text" => $text];

    file_put_contents(get_blog_dir() . "/$day_str.json", json_encode($blog_array));
}

// ----------------------------------------------------------------------------
function delete_blog_message(string $title): void
{
    $blog_entries_path = (array_reverse(glob(get_blog_dir() . "/*")));

    $blog_entries_list = array();

    foreach ($blog_entries_path as $entry) {
        $blog_file = read_json($entry);
        $blog_entries_names = basename($entry);
        $blog_entries_list += [$blog_entries_names => $blog_file];
    }


    $ok = '';
    foreach ($blog_entries_list as $filename => $entry) {
        foreach ($entry as $key => $value) {
            if ($key == 'title' && $value == $title) {
                // Remove that json file
                // TODO
                $output = shell_exec('rm -f ' . get_blog_dir() . "/" . $filename);
                $ok = 'ok';
            }
        }
    }
}
// ----------------------------------------------------------------------------
function add_movie(string $csv_filename, string $film, string $genre, string $studio, string $audience, string $profitability, string $gross, string $year): void
{

    // 1. Read Table
    $blog_data = Table::readCSV($csv_filename);


    // 3. Append new row
    $blog_data->prependRow([$film, $genre, $studio, $audience, $profitability, $gross, $year]);

    // 4. Write Table
    $blog_data->writeCSV($csv_filename);
}
// ----------------------------------------------------------------------------
function delete_movie(string $csv_filename, string $film): void
{
    $movies_data = Table::readCSV($csv_filename);

    $key = searchForFilm($film, $movies_data->body);

    unset($movies_data->body[$key]);

    $movies_data->body = array_values($movies_data->body);

    $movies_data->writeCSV($csv_filename);
}
//----------------------
function searchForFilm($film, $array)
{
    foreach ($array as $key => $val) {
        if ($val['FILM'] == $film) {
            return $key;
        }
    }
    return null;
}
// ----------------------------------------------------------------------------
function read_csv($csv_movies_path): array
{
    $lines = explode("\n", file_get_contents($csv_movies_path));
    $headers = str_getcsv(array_shift($lines));
    $data = array();
    foreach ($lines as $line) {

        $row = array();

        foreach (str_getcsv($line) as $key => $field)
            $row[$headers[$key]] = $field;

        $row = array_filter($row);

        $data[] = $row;
    }
    return $data;
}

// ----------------------------------------------------------------------------

function get_blog_entries(): array
{
    $blog_entries_path = (array_reverse(glob(get_blog_dir() . "/*")));
    $blog_entries = [];



    foreach ($blog_entries_path as $path) {
        $entry = read_json($path);
        $blog_entries[] = $entry;
    }

    return $blog_entries;
}


//-------------------- Gallery Methods -----------------------------///

function get_img_url_array(array $local_file_array): array
{
    // Filter and keep only image files
    $check_is_image    = fn ($file) => preg_match('~(jpg|jpeg|png)$~i', basename($file));
    $local_image_array = array_values(array_filter($local_file_array, $check_is_image));


    return $local_image_array;
}

function get_img_info_array(array $local_file_array): array
{

    $get_clean_path = fn ($path) => "/img/" . basename($path);
    $local_image_array = get_img_url_array($local_file_array);
    $images_path = array_map($get_clean_path, $local_image_array);

    // Create alt texts
    $make_alt_text = fn ($file) => pathinfo($file)['filename'];
    $web_alt_array = array_map($make_alt_text, $local_image_array);

    $imgInfoArray = [
        'image_array' => $images_path,
        'alt_array'   => $web_alt_array
    ];
    return $imgInfoArray;
}


function get_img_info_category(array $local_file_array, string $genre): array
{

    $get_clean_path = fn ($path) => "/img/$genre/" . basename($path);
    $local_image_array = get_img_url_array($local_file_array);
    $images_path = array_map($get_clean_path, $local_image_array);

    // Create alt texts
    $make_alt_text = fn ($file) => pathinfo($file)['filename'];
    $web_alt_array = array_map($make_alt_text, $local_image_array);

    $imgInfoArray = [
        'image_array' => $images_path,
        'alt_array'   => $web_alt_array
    ];
    return $imgInfoArray;
}

//-------------------- Login Methods -----------------------------///

function check_user_login(string $username, string $password): mixed
{

    $users_list = User::getUsersList(get_csv_path('users'));

    // Search for the credentials in the users list and return true if find it
    foreach ($users_list as $user) {
        if ($username == $user->getUsername() && $password == $user->getPassword()) {
            return $user;
        }
    }

    return null;
}

// ----------------------------------------------------------------------------
function add_user(string $csv_filename, string $username, string $password): void
{
    $newUserr = new User($username, $password);

    $handle = fopen($csv_filename, "a");

    fputcsv($handle, []);
    fputcsv($handle, [$newUserr->getUsername(), $newUserr->getPassword(), $newUserr->getRole()]);

    fclose($handle);

    // $row = <<<END
    // $username '|' $role 

    // END;

    // file_put_contents();
}
