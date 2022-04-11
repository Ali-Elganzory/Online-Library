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

    public static function getTableName(): string
    {
        return static::$tableName ?? strtolower(static::class) . 's';
    }

    public static function getIdColumnName(): string
    {
        return static::$idColumnName ?? 'id';
    }

    public static function selectById(string $id): bool|Book
    {
        return new static(
            ...(array)(App::get("database")->selectById(
                self::getTableName(),
                self::getIdColumnName(),
                $id
            ))
        );
    }
}
