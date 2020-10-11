<?php

namespace App\Console\Commands;

class MakeRouteCommand extends MakeScaffoldCommand
{
    /**
     * Define console command name
     * php slim make:command
     */
    protected $name = 'make:route';
    protected $help = 'Scaffold Eloquent Model';
    protected $description = 'Generate The Scaffold For An Eloquent Model';

    protected function arguments()
    {
        return [
            'name' => $this->require('Model Name To Scaffold/Generate'),
        ];
    }

    public function handler()
    {
        
        $name = $this->input->getArgument('name');

        $this->info("============================");

        $this->info('Generate '. $name .' routes' );

        $this->info("============================");

        $file = routes_path('web.php');

        $data = file_get_contents($file);

        $temp_strng = 'BO : ' . ucfirst($name);

        if (strpos($data, $temp_strng) !== false) {

            $this->info("==========================================================");
            $this->error("Whoops: routes exists!");
            $this->info("==========================================================");

            return false;

        } else if( strpos( $name, "." ) !== false ) {

            $this->info("===========================================");

            $this->error('Error: Your route name cannot contain a dot');

            $this->info("===========================================");

        }
        
        $newRoute = file_get_contents (resources_path('stubs/{DummyRoute}.stub'));

        $newRoute = str_replace("DummyController", ucfirst($name), $newRoute);

        $newUrlname = strtolower($name);

        $newRoute = str_replace("DummyRoute", $newUrlname, $newRoute);

        $newRoute = str_replace("Name", ucfirst($name), $newRoute);

        $newRoute = str_replace('<?php','', $newRoute);

        $final_data = str_replace("#####-- Do not delete line --#####", $newRoute, $data);

        file_put_contents($file, $final_data);

        $this->info("======================================");
        $this->info("Successfully Generated {$name} routes!");
        $this->info("======================================");

        return true;
    }
}
