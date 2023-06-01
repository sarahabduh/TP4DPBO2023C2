<?php

class Hobby extends DB
{
    function getHobby()
    {
        $query = "SELECT * FROM hobby";
        return $this->execute($query);
    }

    function getHobbyById($id){
        $query = "SELECT * FROM hobby WHERE hobby_id='$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];

        $query = "insert into hobby values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM hobby WHERE hobby_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['name'];
        $query = "update hobby set hobby_name = '$name' where hobby_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
