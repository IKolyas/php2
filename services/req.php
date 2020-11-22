<?php
function post(string $param) {
    return $_POST[$param];
}
function get(string $param) {
    return $_GET[$param];
}