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
    protected static ?string $tableName;

    /**
     * The column name of the primary key or id.
     * This is used in [selectById].
     *
     * If not specified, it'll implicitly be "id".
     *
     * @var string|null
     */
    protected static ?string $idColumnName;

    /**
     * The columns of the table except the primary key (i.e., id).
     *
     * @var array
     */
    public static array $columns = [];


    public
    static function getTableName(): string
    {
        return static::$tableName ??
            strtolower(
                preg_replace(
                    "/(?<!^)(?=[A-Z])/",
                    '${1}_',
                    static::class
                )
            ) . 's';
    }

    public
    static function getIdColumnName(): string
    {
        return static::$idColumnName ?? 'id';
    }

    public
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

        $idColumnName = static::getIdColumnName();
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

}
