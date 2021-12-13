<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Yaml\Yaml;

class OpenapiGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'openapi:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate doc file';

    protected $jsonFile;
    protected $ymlFile;
    protected $rootPath;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->rootPath = resource_path('openapi/');
        $this->ymlFile = storage_path('openapi/api-docs.yml');
        $this->jsonFile = storage_path('openapi/api-docs.json');
    }

    private function clear()
    {
        if (file_exists($this->ymlFile)) {
            unlink($this->ymlFile);
        }

        if (file_exists($this->jsonFile)) {
            unlink($this->jsonFile);
        }

        if (!file_exists(storage_path('openapi/'))) {
            mkdir(storage_path('openapi/'), 0755, true);
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->clear();

        $f = fopen($this->ymlFile, 'w');

        fwrite($f, file_get_contents($this->rootPath.'basic.yml').PHP_EOL);
        $paths = $this->scandir($this->rootPath);
        $this->writeFile($f, $paths, $this->rootPath, 0);

        fclose($f);

        $this->toJson();
    }

    private function scanDir($rp)
    {
        $paths = scandir($rp);

        $results = [];

        foreach ($paths as $p) {
            if ($p == '.' || $p == '..') {
                continue;
            }

            if (is_dir($rp.$p)) {
                $path = $rp.$p.'/';
                $results[$p] = $this->scanDir($path);
            } else {
                $results[] = $p;
            }
        }

        return $results;
    }

    public function writeFile($handle, $paths, $rp, $l)
    {
        $space = '';

        for ($i = 0; $i < $l; $i++) {
            $space .= "  ";
        }

        foreach ($paths as $k => $path) {
            if (is_array($path)) {
                fputs($handle, $space.$k.": ".PHP_EOL);
                $d = $l + 1;
                $this->writeFile($handle, $path, $rp.$k.'/', $d);
            } else {
                if ($l == 0) {
                    continue;
                }

                if ($path == 'basic.yml') {
                    continue;
                }

                $f = fopen($rp.$path, 'r');

                while (!feof($f)) {
                    fputs($handle, $space.fgets($f));
                }

                fputs($handle, PHP_EOL);
                fclose($f);
            }
        }
    }

    public function toJson()
    {
        $value = Yaml::parseFile($this->ymlFile);
        $json = json_encode($value, JSON_PRETTY_PRINT);
        file_put_contents($this->jsonFile, $json);
    }
}
