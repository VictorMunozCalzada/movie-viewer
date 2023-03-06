<?php

declare(strict_types=1);

namespace User;

require_once(__DIR__ . '/../../app/config.php');

use function Config\get_lib_dir;

require_once(get_lib_dir() . '/utils/utils.php');

use function Utils\array_prepend;
use function Utils\is_empty_str;



// ############################################################################
// Table CSV helper functions
// ############################################################################

// ----------------------------------------------------------------------------
function split_csv_str(string $csv_str, string $separator): array
{

    // 1. Split into lines
    $line_array = explode(PHP_EOL, $csv_str);

    // 2. Remove empty lines anywhere
    $has_data        = fn ($line) => !is_empty_str($line);
    $data_line_array = array_filter($line_array, $has_data);

    // 3. Explode each line + trim each field
    $split_line  = fn ($line) => array_map('trim', explode($separator, $line));
    $data_matrix = array_map($split_line, $data_line_array);

    return $data_matrix;
}

// ----------------------------------------------------------------------------
function read_csv(string $csv_filename, string $separator): array
{

    $csv_str         = file_get_contents($csv_filename);
    $trimmed_csv_str = trim($csv_str);
    $data            = split_csv_str($trimmed_csv_str, $separator);

    // Gets the values from the csv array to create new User objects
    $list = array_map(function ($data) {
        return new User($data[0], $data[1], $data[2]);
    }, $data);

    return $list;
}

// ----------------------------------------------------------------------------
function write_csv(array $table, string $csv_filename, string $separator = ' | '): void
{

    // // 1. Check if table contains the separator string
    // $contents_str  = convert_table_to_string($table->header, $table->body, '');
    // $has_separator = str_contains($contents_str, $separator);

    // // 2. If separator found: Abort
    // $error_msg = "Write error: Table contains '$separator' already. Cannot use it as a separator in CSV file.";
    // if ($has_separator) {
    //     throw new \Exception($error_msg);
    // }

    // // 3. Else: Return string using separator
    // $table_str = convert_table_to_string($table->header, $table->body, $separator);
    // file_put_contents($csv_filename, $table_str);
}



// ############################################################################
// User Class
// ############################################################################

class User
{

    protected string $username;
    protected string $password;
    protected string $role;

    // ------------------------------------------------------------------------
    public function __construct(string $username, string $password, string $role = "user")
    {

        $this->username     = $username;
        $this->password     = $password;
        $this->role         = $role;
    }

    // ------------------------------------------------------------------------
    public function __toString(): string
    {

        $string =  $string = $this->username . ", " . $this->password . ", " . $this->role;
        return $string;
    }

    // ------------------------------------------------------------------------
    public static function getUsersList(
        string $csv_filename,
        string $separator = ','
    ): array {

        $list = read_csv($csv_filename, $separator);
        return $list;
    }

    // ------------------------------------------------------------------------
    public static function insertUser(
        string $csv_filename,
        string $separator = ' , '
    ): void {

        // write_csv($this, $csv_filename, $separator);
    }

    // ------------------------------------------------------------------------
    public function validateUsername(string $username): void
    {
        // Validation required
    }

    // ------------------------------------------------------------------------
    public function validatePassword(string $password): void
    {
        // Validation required
    }

    // ------------------------------------------------------------------------
    public function getPassword(): string
    {
        return $this->password;
    }

    // ------------------------------------------------------------------------
    public function getUsername(): string
    {

        return $this->username;
    }

    // ------------------------------------------------------------------------
    public function getRole(): string
    {
        return $this->role;
    }

    // ------------------------------------------------------------------------
}
