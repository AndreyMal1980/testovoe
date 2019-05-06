<?php

class Tasks extends db {

    public function getTasks($start, $num) {
        $tasks = [];
        $order_by = '';
        if ($_GET['sort'] && $_GET['sort'] == '1') {
            $order_by = " ORDER by t.username";
        } else if (!empty($sort) && $sort == '2') {
            $order_by = " ORDER by t.useremail";
        } else if (!empty($sort) && $sort == '3') {
            $order_by = " ORDER by t.status_id";
        } else {
            $order_by = " ORDER by t.id";
        }
        $query = "SELECT t.id,t.username,t.useremail,t.status_id,t.text,s.value FROM task t INNER JOIN statuses s ON(t.status_id = s.id) " . $order_by . " LIMIT " . (int) $start . "," . (int) $num;

        $result = $this->query($query);
        while ($row = $result->assoc()) {
            $tasks[] = $row;
        }
        return $tasks;
    }

    public function getTasksTotal() {
        $query = "SELECT COUNT(*) FROM task";
        $count = $this->query($query)->assoc()['COUNT(*)'];
        return $count;
    }

    public function getTask($id) {
        $task = null;
        $query = "SELECT t.id,t.username,t.useremail,t.status_id,t.text,s.value FROM task t LEFT JOIN statuses s ON(t.status_id = s.id) WHERE t.id = " . (int) $id;
        $result = $this->query($query);
        while ($row = $result->assoc()) {
            $task = $row;
        }
        return $task;
    }

    public function AddTask($data) {
        $query = "INSERT INTO `task`(`id`, `username`, `useremail`, `text`, `status_id`) VALUES (NULL , '" . $data['task']['name'] . "','" . $data['task']['email'] . "','" . $data['task']['text'] . "' ,2)";
        // echo $query;
        if ($this->query($query)) {
            return true;
        }
    }

    public function Update($data) {
        $status_id = null;
        if (!empty($data['status'])) {
            $status_id = 1;
        } else {
            $status_id = 2;
        }
        $query = "UPDATE `task` SET status_id = '" . (int) $status_id . "',text = '" . $data['text'] . "' WHERE id = " . (int) $data['id'];

        if ($this->query($query)) {
            return true;
        }
    }

}
