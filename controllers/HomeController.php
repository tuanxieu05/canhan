<?php

class HomeController
{
    public function index()
    {
        require_once PATH_VIEW_MAIN;
    }

    public function getCourses()
    {
        $courses = new Courses();
        $data = $courses->getAll();


        $title = "Danh sách khóa học";
        $view = "list-courses";
        require_once PATH_VIEW_MAIN;
    }

    public function addCourse()
    {
        $instructor = new Instructor();
        $dataInstructor = $instructor->getAll();
        $title = "Thêm mới khóa học";
        $view = "add-course";
        require_once PATH_VIEW_MAIN;
    }

    public function insertCourse()
    {
        $name = $_POST['name'];
        $instructor_id = $_POST['instructor_id'];
        $duration = $_POST['duration'];
        $price = $_POST['price'];

        $imagePath = null;
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
            $imagePath = upload_file("courses", $_FILES['thumbnail']);
        }

        $courses = new Courses();
        $result = $courses->insert($name, $imagePath, $instructor_id, $duration, $price);
        if ($result) {
            header("Location: " . BASE_URL . "?action=courses");
        } else {
            header("Location: " . BASE_URL . "?action=add-course");
        }
    }

    public function updateCourse()
    {
        $instructor = new Instructor();
        $dataInstructor = $instructor->getAll();

        $id = $_GET['id'];
        $courses = new Courses();
        $data = $courses->getById($id);

        $title = "Cập nhật khóa học";
        $view = "update-course";
        require_once PATH_VIEW_MAIN;
    }

    public function editCourse()
    {
        $name = $_POST['name'];
        $instructor_id = $_POST['instructor_id'];
        $duration = $_POST['duration'];
        $price = $_POST['price'];
        
        $id = $_GET['id'];
        $courses = new Courses();
        $data = $courses->getById($id);


        $imagePath =  $data['thumbnail'];
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
            unlink(PATH_ASSETS_UPLOADS . $data['thumbnail']);
            $imagePath = upload_file("courses", $_FILES['thumbnail']);
        }


        $result = $courses->edit($id, $name, $imagePath, $instructor_id, $duration, $price);
        if ($result) {
            header("Location: " . BASE_URL . "?action=courses");
        } else {
            header("Location: " . BASE_URL . "?action=update-course&id=" . $id);
        }
    }
}


