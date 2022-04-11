<?php

class Model
{
    /**
     * The table name in the database.
     *
     * If not specified, it'll implicitly be "[class name]s" (lowercase).
     */
    protected static ?string $tableName;

    /**
     * The column name of the primary key or id.
     * This is used in [selectById].
     *
     * If not specified, it'll implicitly be "id".
     */
    protected static ?string $idColumnName;


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
        return static::getQueryBuilder()->find(static::getIdColumnName(), $id);
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

}
