<?php

namespace Controller;

use Model\DBConnection;
use Model\CustomerDB;
use Model\Customer;

class CustomerController
{
    private $customerDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=studentManager", "root", "123456@Abc");
        $this->customerDB = new CustomerDB($connection->connect());
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include 'View/add.php';
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];

            $customer = new Customer();
            $customer->setName($name);
            $customer->setEmail($email);
            $customer->setAddress($address);

            $this->customerDB->create($customer);
            header('Location:index.php');
        }
    }

    public function index()
    {
        $customers = $this->customerDB->getAll();
        include "View/list.php";
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $id = $_GET['id'];
            $customer = $this->customerDB->get($id);
            include "View/delete.php";
        } else {
            $id = $_POST['id'];
            $this->customerDB->delete($id);
            header("Location: index.php");
        }
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET['id'];
            $customer = $this->customerDB->get($id);
            include "View/edit.php";
        } else {
            $id = $_POST['id'];
            $customer = new Customer();
            $customer->setName($_POST['name']);
            $customer->setEmail($_POST['email']);
            $customer->setAddress($_POST['address']);
            $this->customerDB->update($id, $customer);
            header("Location:index.php");
        }
    }

}