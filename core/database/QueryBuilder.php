<?php


class QueryBuilder
{

    public function __construct(
        public PDO $pdo,
    ) {
    }

    public function selectAll(string $table): array
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectById(string $table, string $idColumnName, string $id): bool|object
    {
        $statement = $this->pdo->prepare("select * from {$table} where id = {$id}");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
}
