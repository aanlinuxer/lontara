<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Twig_view
{
    protected $allowed_functions = [];

    public function render($template, array $data=[], array $functions = [])
    {
        $views_path = APPPATH . 'views';
        $loader = new \Twig\Loader\FilesystemLoader($views_path);
        $twig = new \Twig\Environment($loader, [
            'cache' => APPPATH . 'cache/twig',
            'debug' => ENVIRONMENT == 'development' ? TRUE : FALSE
        ]);

        if (count($functions) > 0)
        {
            $this->add_functions($functions);
        }

        if (count($this->allowed_functions) > 0)
        {
            foreach ($this->allowed_functions as $func)
            {
                $twig->addFunction(new \Twig\TwigFunction($func, $func));
            }
        }

        return $twig->render($template.'.twig', $data);
    }

    public function add_functions(array $functions)
    {
        $this->allowed_functions = array_merge($this->allowed_functions, $functions);
    }

}
