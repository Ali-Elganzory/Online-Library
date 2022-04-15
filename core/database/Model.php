<?php


class Model
{
    /**
     * The table name in the database.
     *
     * If not specified, it'll implicitly be "[class name]s" (snake_case).
     *
     * e.g,
     * BookAuthor => book_authors.
     *
     * @var string|null
     */
    protected static ?string $table;

    /**
     * The column name of the primary key or id.
     * This is used in [selectById].
     *
     * If not specified, it'll implicitly be "id".
     *
     * @var string
     */
    const primaryKey = "id";

    /**
     * The columns of the table except the primary key (i.e., id).
     *
     * By default, all public properties are used.
     *
     * @var array|null
     */
    protected static ?array $columns = null;


    public
    static function getTableName(): string
    {
        return static::$table ??
            strtolower(
                preg_replace(
                    "/(?<!^)(?=[A-Z])/",
                    '${1}_',
                    static::class
                )
            ) . 's';
    }

    public
    static function getColumns(): array
    {
        if (static::$columns == null) {
            $reflectionClass = (new ReflectionClass(static::class));
            $propertyObjects = $reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC);
            $properties = array_map(fn($e) => $e->name, $propertyObjects);
            return array_diff($properties, [static::primaryKey]);
        }

        return static::$columns;
    }

    protected
    static function getQueryBuilder(): QueryBuilder
    {
        return QueryBuilder::model(static::class);
    }

    public
    static function find(string $id): bool|Model
    {
        return static::getQueryBuilder()->find($id);
    }

    public
    static function exists(string $id): bool
    {
        return static::getQueryBuilder()
            ->where(static::primaryKey, '=', $id)
            ->exists();
    }

    public
    static function all(): bool|array
    {
        return static::getQueryBuilder()->all();
    }

    public
    static function where(string $column, string $operator, mixed $value = null): QueryBuilder
    {
        return static::getQueryBuilder()->where($column, $operator, $value);
    }

    public
    static function limit(int $n): QueryBuilder
    {
        return static::getQueryBuilder()->limit($n);
    }

    public
    function insert(): bool
    {
        $result = static::getQueryBuilder()->insert($this);

        if (gettype($result) == 'boolean') {
            return $result;
        }

        $idColumnName = static::primaryKey;
        $this->{$idColumnName} = $result->{$idColumnName};
        return true;
    }

    public
    function update(): bool
    {
        return static::getQueryBuilder()->update($this);
    }

    public
    function delete(): bool
    {
        return static::getQueryBuilder()->delete($this);
    }

    protected
    function hasMany(string $otherClass, ?string $relationClass = null): QueryBuilder
    {
        $table = static::getTableName();
        $primaryKey = static::primaryKey;
        $otherTable = $otherClass::getTableName();
        $otherPrimaryKey = $otherClass::primaryKey;
        $foreignKey = substr($table, 0, -1) . '_' . $primaryKey;
        $otherForeignKey = substr($otherTable, 0, -1) . '_' . $otherPrimaryKey;

        $query = static::getQueryBuilder()
            ->select("SELECT {$otherTable}.*");

        if ($relationClass == null) {
            $query = $query->join(
                $otherTable,
                "{$table}.{$primaryKey}",
                '=',
                "{$otherTable}.{$foreignKey}",
            );
        } else {
            $relationTable = $relationClass::getTableName();
            $query = $query
                ->join(
                    $relationTable,
                    "{$table}.{$primaryKey}",
                    '=',
                    "{$relationTable}.{$foreignKey}",
                )
                ->join(
                    $otherTable,
                    "{$relationTable}.{$otherForeignKey}",
                    '=',
                    "{$otherTable}.{$otherPrimaryKey}",
                );
        }

        return $query
            ->where("{$table}.{$primaryKey}", '=', $this->{$primaryKey})
            ->class($otherClass);
    }

}
