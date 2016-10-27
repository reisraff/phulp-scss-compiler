<?php

namespace Phulp\ScssCompiler;

use Leafo\ScssPhp\Compiler;
use Phulp\PipeInterface;
use Phulp\Source;

class ScssCompiler implements \Phulp\PipeInterface
{
    /**
     * @var array $options
     */
    private $options = [
        'import_paths' => null
    ];

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->options, $options);
    }

    /**
     * @inheritdoc
     */
    public function execute(\Phulp\Source $src)
    {
        foreach ($src->getDistFiles() as $key => $file) {
            if (preg_match('/\.scss$/', $file->getName()) || preg_match('/\.scss$/', $file->getDistpathname())) {
                $scss = new Compiler();

                if ($this->options['import_paths'] && is_array($this->options['import_paths'])) {
                    $scss->setImportPaths($this->options['import_paths']);
                }

                $css = $scss->compile($file->getContent());
                $file->setContent($css);
                $file->setDistpathname(preg_replace('/scss$/', 'css', $file->getDistpathname()));
            }
        }
    }
}

