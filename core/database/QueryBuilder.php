<?php


class QueryBuilder
{

    private array $_whereClauses = [];
    private ?int $_limit = 0;


    /**
     * @param PDO $pdo
     * @param string $table
     * @param string|null $modelClass
     */
    private function __construct(
        private PDO $pdo,
        public      readonly string $table,
        public      readonly ?string $modelClass,
    )
    {
    }

    /**
     * Make a query builder for this [table].
     *
     * @param string $table
     * @return QueryBuilder
     * @throws Exception
     */
    public
    static function table(
        string $table
    ): QueryBuilder
    {
        return new static(App::get('database'), $table, null);
    }

    public
    static function model(
        string $modelClass
    ): QueryBuilder
    {
        return new static(App::get('database'), $modelClass::getTableName(), $modelClass);
    }

    /**
     * Execute a custom [query].
     *
     * @param string $query
     * @return bool|array
     */
    public
    function execute(string $query): bool|array
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Fetch a record by its [id] (primary key).
     *
     * @param string $idColumnName
     * @param string $id
     * @return bool|object
     */
    public
    function find(string $idColumnName, mixed $id): bool|object
    {
        $statement = $this->pdo->prepare("select * from {$this->table} where {$idColumnName} = {$id}");
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_OBJ);

        if (gettype($result) == 'boolean') {
            return $result;
        }

        return new $this->modelClass(
            ...(array)($result)
        );
    }

    /**
     * Fetch all records.
     *
     * @return array
     */
    public
    function all(): array
    {
        return $this->get();
    }

    public
    function where(string $column, string $operator, mixed $value = null): QueryBuilder
    {
        $value = gettype($value) == 'string' ? "'" . $value . "'" : $value;
        $this->_whereClauses[] = "{$column} {$operator} {$value}";
        return $this;
    }

    public
    function limit(int $n): QueryBuilder
    {
        if ($n <= 0) {
            $this->error("Can't limit <= 0.");
        }

        $this->_limit = $n;
        return $this;
    }

    public
    function get(): bool|array
    {
        $query =
            "SELECT *" . " " .
            "FROM " . $this->table . " ";

        if (count($this->_whereClauses) > 0) {
            $query = $query .
                "WHERE " . join(", ", $this->_whereClauses) . " ";
        }

        if ($this->_limit > 0) {
            $query = $query .
                "LIMIT " . $this->_limit . " ";
        }

        $statement = $this->pdo->prepare($query . ';');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);

        if (gettype($result) == 'boolean') {
            return $result;
        }

        if ($this->modelClass != null) {
            $result = array_map(
                fn(object $e) => new $this->modelClass(...(array)($e)),
                $result,
            );
        }

        return $result;
    }

    private
    function error(string $msg)
    {
        throw new Exception("[QueryBuilder] :: {$msg}");
    }

}
