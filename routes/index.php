<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'courses'              => (new HomeController)->getCourses(),
    'add-course'         => (new HomeController)->addCourse(),
    'insert-course'         => (new HomeController)->insertCourse(),
    'update-course'         => (new HomeController)->updateCourse(),
    'edit-course'         => (new HomeController)->editCourse(),
};