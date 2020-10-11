<?php

namespace App\Console\Commands;

class MakeCrudCommand extends MakeScaffoldCommand
{
    /**
     * Define console command name
     * php black make:command
     */
    protected $name = 'make:crud';
    protected $help = 'check if Controller, Model and Route with the same you used does not exist';
    protected $description = 'Generate Controller, Routes, Eloquent Model and Views Scaffold';

    protected function arguments()
    {
        return [
            'name' => $this->require('MakeCrud name command description'),
        ];
    }

    public function handler()
    {

        $name = $this->input->getArgument('name');

        $this->info("============================");
        $this->info("Making a new Controller file");
        $this->info("============================");

        $file = $this->scaffold(
            $this->stub('controller_file'),
            $this->stub('replace.controller_file')
        );

        $content = $this->scaffold(
            $this->stub('controller_content'),
            $this->stub('replace.controller_content')
        );

        $path = "{$this->stub('make_controller_path')}/{$file}";

        $exists = $this->files->exists($path);

        if ($exists) {
            $this->info("===============================");
            return $this->error("{$file} already exists!");
            $this->info("===============================");
        }

        $status = $this->files->put($path, $content);

        $this->info("===================================================");
        $this->info("Successfully Generated {$file}! (status: {$status})");
        $this->info("===================================================");
        
        if ($status) {

            $this->info("===============================================================");

            $this->info('Wait for program to generate routes for '. $name .' controller' );

            $this->info("===============================================================");

            $file = routes_path('web.php');

            $data = file_get_contents($file);

            $temp_strng = 'BO : ' . ucfirst($name);

            if (strpos($data, $temp_strng) !== false) {

                $this->info("=======================");
                $this->error("Whoops: routes exists!");
                $this->info("=======================");

                return false;

            } else if( strpos( $name, "." ) !== false ) {

                $this->info("============================================");

                $this->error('Error: Your route name cannot contain a dot');

                $this->info("============================================");

            }
            
            $newRoute = file_get_contents (resources_path('stubs/{DummyRoute}.stub'));

            $newRoute = str_replace("DummyController", ucfirst($name), $newRoute);

            $newUrlname = strtolower($name);

            $newRoute = str_replace("DummyRoute", $newUrlname, $newRoute);

            $newRoute = str_replace("Name", ucfirst($name), $newRoute);

            $newRoute = str_replace('<?php','', $newRoute);

            $final_data = str_replace("#####-- Do not delete line --#####", $newRoute, $data);

            $make_route = file_put_contents($file, $final_data);

            $this->info("======================================");
            $this->info("Successfully Generated {$name} routes!");
            $this->info("======================================");

            if ($make_route) {
                $this->info("================");
                $this->info("Generating Model");
                $this->info("================");

                $file = $this->scaffold(
                    $this->stub('model_file'),
                    $this->stub('replace.model_file')
                );

                $content = $this->scaffold(
                    $this->stub('model_content'),
                    $this->stub('replace.model_content')
                );

                $path = "{$this->stub('make_model_path')}/{$file}";

                $exists = $this->files->exists($path);

                if ($exists) {
                    $this->info("===============================");
                    return $this->error("{$file} already exists!");
                    $this->info("===============================");
                }

                $status = $this->files->put($path, $content);

                $this->info("==========================================================");
                $this->info("Successfully Generated {$file}! (status: {$status})");
                $this->info("==========================================================");
            
            }

        }

        if( strpos( $name, "." ) !== false ) {

            // check if there is dot (.) in the name arg
            $this->info("===========================================");

            $this->error('Error: Your view name cannot contain a dot');

            $this->info("===========================================");

        }
        else {
                
            //we just need to copy the view template to the resources/views/ folder

            $sourcePath = resources_path('stubs/views');
            $path = resources_path('views/'.$name);

            if (!is_dir($path)) {

                mkdir(resources_path('views/'.strtolower($name)));

            } 
            else {

                $this->info("====================");

                $this->error('Error: path exixst!');

                $this->info("====================");

                return false;
            }

            $destinationPath = resources_path('views/'.$name);       

            copy($sourcePath.'/create.blade.php', $destinationPath.'/create.blade.php');
            copy($sourcePath.'/edit.blade.php', $destinationPath.'/edit.blade.php');
            copy($sourcePath.'/show.blade.php', $destinationPath.'/show.blade.php');
            $copyViews = copy($sourcePath.'/index.blade.php', $destinationPath.'/index.blade.php');

            if($copyViews){

                $this->info("==============================================================================================");
                $this->info('view files have been created in the resources/views/' . $name .' folder');
                $this->info("==============================================================================================");

                return true;
            }

            $this->error("===========================================================================");
            $this->info('sorry! unable to create views in the resources/views/' . $name .' folder');
            $this->error("===========================================================================");
            
            return false;
        }
        // else {

        //     // Files

        //     $index_file = $this->scaffold(
        //         $this->stub('view_file.index_file'),
        //         $this->stub('replace.index_file')
        //     );

        //     $create_file = $this->scaffold(
        //         $this->stub('create_file'),
        //         $this->stub('replace.create_file')
        //     );

        //     $edit_file = $this->scaffold(
        //         $this->stub('edit_file'),
        //         $this->stub('replace.edit_file')
        //     );

        //     $show_file = $this->scaffold(
        //         $this->stub('show_file'),
        //         $this->stub('replace.show_file')
        //     );


        //     // Contents

        //     $index_content = $this->scaffold(
        //         $this->stub('view_content.index_content'),
        //         $this->stub('replace.index_content')
        //     );

        //     $create_content = $this->scaffold(
        //         $this->stub('view_content.create_content'),
        //         $this->stub('replace.create_content')
        //     );

        //     $edit_content = $this->scaffold(
        //         $this->stub('view_content.edit_content'),
        //         $this->stub('replace.edit_content')
        //     );

        //     $show_content = $this->scaffold(
        //         $this->stub('view_content.show_content'),
        //         $this->stub('replace.show_content')
        //     );

        //     // Check If Directory Exists
        //     if (!is_dir(resources_path('views/'.strtolower($name)))) {

        //         mkdir(resources_path('views/'.strtolower($name)));

        //     }

        //     // Paths
        //     $index_path  = "{$this->stub('make_view_path')}/".strtolower($name)."/{$index_file}";

        //     $create_path = "{$this->stub('make_view_path')}/".strtolower($name)."/{$create_file}";

        //     $edit_path   = "{$this->stub('make_view_path')}/".strtolower($name)."/{$edit_file}";

        //     $show_path   = "{$this->stub('make_view_path')}/".strtolower($name)."/{$show_file}";

        //     // Check If File Exists
        //     $index_exists  = $this->files->exists($index_path);
            
        //     $create_exists = $this->files->exists($create_path);

        //     $edit_exists   = $this->files->exists($edit_path);

        //     $show_exists   = $this->files->exists($show_path);

        //     if ( $index_exists && $create_exists && $edit_exists && $show_exists) {
        //         $this->info("===============================");
        //         return $this->error("{ {$index_exists}, {$create_exists}, {$edit_exists}, {$show_exists}, already exists!");
        //         $this->info("===============================");
        //     }

        //     $this->files->put($path, $index_content);
        //     $this->files->put($create_path, $create_content);
        //     $this->files->put($edit_path, $edit_content);
        //     $status = $this->files->put($show_path, $show_content);

        //     $this->info("==========================================");
        //     $this->info("Successfully Generated {$name}! view files");
        //     $this->info("==========================================");
            
        //     return true;
        // }


    }
}
