<?php

class AppController
{
    private $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isPost(): bool
    {
        return $this->request === 'POST';
    }

    protected function isGet(): bool
    {
        return $this->request === 'GET';
    }

    protected function render(string $template = null, array $variables=[])
    {
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found!';

        if (file_exists($templatePath)) {
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }

        print $output;
    }

    protected function checkCookies(): bool
    {
        if (!isset($_COOKIE['user'])) {
            $this->render('login');
            return false;
        }
        return true;
    }

    protected function setCookieLive($name, $value='', $expire = 0, $path = ''): bool
    {
        $_COOKIE[$name] = $value;
        return setcookie($name, $value, $expire, $path);
    }

    protected function extendCookies()
    {
        $this->setCookieLive("user", $_COOKIE['user'], time() + 3600, '/');
        $this->setCookieLive("teamId", $_COOKIE['teamId'], time() + 3600, '/');
        $this->setCookieLive("role", $_COOKIE['role'], time() + 3600, '/');
    }
}