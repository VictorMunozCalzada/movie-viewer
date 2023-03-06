<?php
declare(strict_types=1);
namespace Context;

require_once(__DIR__ . '/../../app/config.php');
use function Config\get_lib_dir;
use function Config\get_context_dir;

require_once(get_lib_dir() . '/utils/utils.php');
use function Utils\convert_to_string;
use function Utils\ensure_dir;



// ############################################################################
// Browser_id functions
// ############################################################################

// Returns an unused random id.
// WARNING: Enters an infinite loop if all ids are used!
// ------------------------------------------------------------------------
function get_new_browser_id(): string {

    do {
        $random_id  = (string) random_int(1, 99);
        $json_file  = get_context_dir() . "/$random_id.json";
        $id_is_used = file_exists($json_file);
    } while ($id_is_used);

    return $random_id;
}



// ############################################################################
// Context Class
// ############################################################################

class Context {

    public bool   $logged_in;
    public string $name;
    public string $role;

    // ------------------------------------------------------------------------
    public function __construct(bool    $logged_in  = false,
                                string  $name       = '',
                                string  $role       = ''    ){
        
        $this->logged_in = $logged_in;
        $this->name      = $name;
        $this->role      = $role;
    }

    // ------------------------------------------------------------------------
    public function writeToDisk(string $browser_id): void {

        $data = ['logged_in' => $this->logged_in,
                 'name'      => $this->name,
                 'role'      => $this->role      ];

        $json_str  = convert_to_string($data, true);
        $json_file = get_context_dir() . "/$browser_id.json";

        ensure_dir(get_context_dir());
        file_put_contents($json_file, $json_str);
    }

    // ------------------------------------------------------------------------
    public static function readFromDisk(string $browser_id): self {

        $json_file  = get_context_dir() . "/$browser_id.json";
        $json_str   = file_get_contents($json_file);
        $data       = json_decode($json_str, true);

        $context = new Context( $data['logged_in'],
                                $data['name'],
                                $data['role']      );

        return $context;
    }

    // ------------------------------------------------------------------------
}
