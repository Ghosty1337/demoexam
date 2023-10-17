<?php
class Request
{
    private int $user_id;
    private int $status_id;
    private string $number;
    private string $description;

    public function __construct(int $user_id, int $status_id, string $number, string $description)
    {
        $this->user_id = $user_id;
        $this->status_id = $status_id;
        $this->number = $number;
        $this->description = $description;
    }

    public static function getAll(PDO $db, int $itemsPerPage, int $offset, int $userId = 0)
    {
        if ($userId == 0) {
            return $db->query("SELECT request.id, request.description, request.number, request.created_at as timestamp, request.status_id, status.name, users.fcs FROM request INNER JOIN status on request.status_id = status.id INNER JOIN users on request.user_id = users.id ORDER BY request.id LIMIT $itemsPerPage OFFSET $offset");
        } else {
            return $db->query("SELECT request.id, request.description, request.number, request.created_at as timestamp, request.status_id, status.name FROM request INNER JOIN status on request.status_id = status.id WHERE request.user_id like $userId ORDER BY request.id LIMIT $itemsPerPage OFFSET $offset");
        }
    }

    public function createRequest(PDO $db)
    {
        $db->exec("INSERT INTO request(user_id, status_id, number, description) VALUES ('$this->user_id', '$this->status_id', '$this->number', '$this->description')");
    }

    public function getRequest()
    {
        return [
            "user_id" => $this->user_id,
            "status_id" => $this->status_id,
            "number" => $this->number,
            "description" => $this->description
        ];
    }
}
