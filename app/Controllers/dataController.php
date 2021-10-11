<?php

namespace App\Controllers;


use App\Models\Record;
use App\Models\User;
use App\Repositories\MysqlRecordsRepository;
use App\Repositories\UsersRepository;
use Ramsey\Uuid\Uuid;

class dataController
{
    private MysqlRecordsRepository $records;
    private UsersRepository $users;


    public function __construct()
    {
        $this->users = new UsersRepository;
        $this->records = new MysqlRecordsRepository;

    }

    public function index()
    {
        require_once 'app/Views/index.template.php';
    }

    public function registration()
    {
        require_once 'app/Views/registration.template.php';
    }

    public function login()
    {

        $users = $this->users->getUsers();
        $users = $users->getUsers();

        foreach ($users as $user) {
            $hash = $user->getPassword();
            if ($user->getName() === $_POST['username'] && password_verify($_POST['password'], $hash)) {
                $_SESSION['username'] = $_POST['username'];

                header("location: /data");
            }
        }
        if (empty($_SESSION)) {
            header("location: /");
        }

    }

    public function data()
    {

        $records = $this->records->getRecords()->getRecords();
        require_once 'app/Views/data.template.php';
    }

    public function addRecord()

    {

        $this->records->addRecord(new Record(
            Uuid::uuid4(),
            $_POST['description'],
            Record::CREATED));
        require_once 'app/Views/data.template.php';
        header("location: /data");
    }

    public function delete()
    {
        foreach ($this->records->getRecords()->getRecords() as $record) {
            if ($record->getId() == $_POST['id']) {
                echo "{$record->getDescription()}";
                $this->records->delete($record);
            };
        }
        header("location: /data");
    }

    public function addUser()
    {
        if (isset($_POST['username']) && isset($_POST['email']) && $_POST['password'] === $_POST['passwordRepeat']) {
            $user = new User($_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_BCRYPT));
            $this->users->addUser($user);
            header("location: /");
        } else {
            echo "Check Your inputs!";
            require_once 'app/Views/registration.template.php';
            header("location /registration");
        }

    }


}
