<?php
class Courses
{
    private $conn;
    public function __construct()
    {
        $db = new BaseModel();
        $this->conn = $db->getConnection();
    }

    public function getAll()
    {
        $sql = "
            SELECT courses.*, instructor.name AS instructorName FROM `courses` INNER JOIN instructor ON courses.instructor_id = instructor.id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($name, $imagePath, $instructor_id, $duration, $price)
    {
        $sql = "
            INSERT INTO `courses`(`name`, `thumbnail`, `instructor_id`, `duration`, `price`) 
            VALUES (:name, :thumbnail, :instructor_id, :duration, :price)    
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":thumbnail", $imagePath);
        $stmt->bindParam(":instructor_id", $instructor_id);
        $stmt->bindParam(":duration", $duration);
        $stmt->bindParam(":price", $price);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $sql = "
            SELECT courses.*, instructor.name AS instructorName FROM `courses` INNER JOIN instructor ON courses.instructor_id = instructor.id where courses.id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($id, $name, $imagePath, $instructor_id, $duration, $price)
    {
        $sql = "
            UPDATE `courses` SET `name`=:name ,`thumbnail`=:thumbnail,`instructor_id`=:instructor_id,`duration`=:duration,`price`=:price WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":thumbnail", $imagePath);
        $stmt->bindParam(":instructor_id", $instructor_id);
        $stmt->bindParam(":duration", $duration);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}