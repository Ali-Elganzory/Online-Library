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
     * @param string $id
     * @return bool|object
     */
    public
    function find(mixed $id): bool|object
    {
        $statement = $this->pdo->prepare("select * from {$this->table} where {$this->modelClass::getIdColumnName()} = {$id}");
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

    public
    function insert(Model $model): false|Model
    {
        $cols = static::getSqlInsertCols($model);
        $vals = static::getSqlInsertValues($model);

        $query =
            "INSERT INTO {$this->table} ({$cols}) " .
            "VALUES ({$vals}) ";

        $statement = $this->pdo->prepare($query . ';');
        $result = $statement->execute();

        if ($result == false) {
            return false;
        }

        return $this->find($this->pdo->lastInsertId());
    }

    public
    function update(Model $model): bool
    {
        $cols = static::getSqlUpdateColsWithValues($model);

        $query =
            "UPDATE {$this->table} " .
            "SET {$cols} " .
            "WHERE {$model::getIdColumnName()} = {$model->{$model::getIdColumnName()}} ";

        $statement = $this->pdo->prepare($query . ';');
        return $statement->execute();
    }

    public
    function delete(Model $model): bool
    {
        $query =
            "DELETE " .
            "FROM {$this->table} " .
            "WHERE {$model::getIdColumnName()} = {$model->{$model::getIdColumnName()}} ";

        $statement = $this->pdo->prepare($query . ';');
        return $statement->execute();
    }


    private
    static function getSqlInsertCols(Model $model): string
    {
        return join(', ',
            $model::$columns
        );
    }

    private
    static function getSqlInsertValues(Model $model): string
    {
        return join(', ',
            array_map(
                fn($k) => static::valueToSqlString($model->{$k}),
                $model::$columns,
            ),
        );
    }

    private
    static function getSqlUpdateColsWithValues(Model $model): string
    {
        return join(', ',
            array_map(
                fn($k) => "{$k} = " . static::valueToSqlString($model->{$k}),
                $model::$columns,
            )
        );
    }

    private
    static function valueToSqlString(mixed $v): string
    {
        return match (gettype($v)) {
            'string' => "'" . str_replace("'", "''", $v) . "'",
            'boolean' => var_export($v, true),
            default => "{$v}",
        };
    }

    private
    function error(string $msg)
    {
        throw new Exception("[QueryBuilder] :: {$msg}");
    }

}
