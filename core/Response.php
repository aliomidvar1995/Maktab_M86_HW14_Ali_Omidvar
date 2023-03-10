<?php

namespace core;

class Response {
    public function getStatusCode($code) {
        // print($code);
        // exit();
        http_response_code($code);
    }

    public function redirect(string $path) {
        header('Location: '.$path);
    }

    public function renderView($layout, $view, $params = []) {
        $layoutContent = $this->layoutContent($layout, $params);
        $viewContent = $this->viewContent($view, $params);
        print(str_replace('{{content}}', $viewContent, $layoutContent));
    }
    protected function layoutContent($layout, $params) {
        ob_start();
        require_once Application::$ROOT_DIR."/view/layout/$layout.php";
        return ob_get_clean();
    }
    protected function viewContent($view, $params) {
        ob_start();
        require_once Application::$ROOT_DIR."/view/$view.php";
        return ob_get_clean();
    }
}