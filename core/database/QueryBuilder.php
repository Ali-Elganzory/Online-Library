<?php


class QueryBuilder
{

    public function __construct(
        public PDO $pdo,
    )
    {
    }

    public function selectAll(string $table, ?string $class = null): bool|array
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        if ($class != null) {
            return $statement->fetchAll(PDO::FETCH_FUNC, $class::fromPDO);
        } else {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
    }

}