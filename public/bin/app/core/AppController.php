<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-21
 * Time: 05:34
 */
class AppController
{
    public $controller = 'home';

    public $method = 'index';

    public $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // Controller
        $this->controller = ucfirst($url[0]);

        unset($url[0]);

        require __DIR__ . '/../controllers/' . ucfirst($this->controller) . '.php';

        $this->controller = new Month();

        // Method
        $this->method = $url[1];

        unset($url[1]);

        // Params
        $this->params = !empty($url) ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    private function parseUrl()
    {
        $isset = isset($_GET['url']);
        if ($isset) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return null;
    }
}
