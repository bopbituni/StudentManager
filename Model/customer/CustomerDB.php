<?php


namespace Model;


class CustomerDB
{
    public $conn;

    public function __construct($connect)
    {
        $this->conn = $connect;
    }

    public function create($customer)
    {
        $sql = "INSERT INTO students(name, email, address) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $customer->getName());
        $stmt->bindParam(2, $customer->getEmail());
        $stmt->bindParam(3, $customer->getAddress());
        return $stmt->execute();

    }

    public function getAll()
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $customers = [];
        foreach ($result as $item) {
            $customer = new Customer();
            $customer->setId($item['id']);
            $customer->setName($item['name']);
            $customer->setEmail($item['email']);
            $customer->setAddress($item['address']);
            array_push($customers, $customer);

        }
        return $customers;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM students WHERE id =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $customer = new Customer();
        $customer->setName($row['name']);
        $customer->setEmail($row['email']);
        $customer->setAddress($row['address']);
        $customer->setId($row["id"]);
        return $customer;

    }

    public function delete($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function update($id, $customer)
    {
        $sql = "UPDATE students SET name = ?, email = ?, address =? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $customer->getName());
        $stmt->bindParam(2, $customer->getEmail());
        $stmt->bindParam(3, $customer->getAddress());
        $stmt->bindParam(4, $id);
        return $stmt->execute();

    }
}