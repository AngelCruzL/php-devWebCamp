<?php

namespace Model;

class ActiveRecord
{
	protected static $db;
	protected static $table = '';
	protected static $dbColumns = [];
	protected static $alerts = [];

	public static function setDB($database)
	{
		self::$db = $database;
	}

	public static function setAlert($alertType, $message)
	{
		static::$alerts[$alertType][] = $message;
	}

	public static function getAlerts()
	{
		return static::$alerts;
	}

	public function validateData()
	{
		static::$alerts = [];
		return static::$alerts;
	}

	public static function sqlStatement($query)
	{
		$result = self::$db->query($query);

		$array = [];
		while ($row = $result->fetch_assoc()) {
			$array[] = static::createObject($row);
		}

		$result->free();

		return $array;
	}

	/**
	 * It takes an array of key/value pairs and creates an object in memory with those properties (same as the DB)
	 *
	 * @param register The array of data that will be used to create the object.
	 *
	 * @return An object of the class that called the method.
	 */
	protected static function createObject($register)
	{
		$object = new static;

		foreach ($register as $key => $value) {
			if (property_exists($object, $key)) {
				$object->$key = $value;
			}
		}

		return $object;
	}

	public function mapData()
	{
		$data = [];

		foreach (static::$dbColumns as $column) {
			if ($column === 'id') continue;
			$data[$column] = $this->$column;
		}

		return $data;
	}

	public function sanitizeData()
	{
		$data = $this->mapData();
		$sanitizedData = [];

		foreach ($data as $key => $value) {
			$sanitizedData[$key] = self::$db->escape_string($value);
		}

		return $sanitizedData;
	}

	/**
	 * It takes an array of key/value pairs and assigns the values to the object's properties
	 *
	 * @param args An array of key/value pairs to sync with the current object's properties.
	 */
	public function sync($args = [])
	{
		foreach ($args as $key => $value) {
			if (property_exists($this, $key) && !is_null($value)) {
				$this->$key = $value;
			}
		}
	}

	public function save()
	{
		$result = '';

		if (!is_null($this->id)) {
			$result = $this->update();
		} else {
			$result = $this->create();
		}

		return $result;
	}

	private function create()
	{
		$sanitizedData = $this->sanitizeData();

		$query = "INSERT INTO " . static::$table . " ( " .
			join(', ', array_keys($sanitizedData)) .
			" ) VALUES ( '" .
			join("', '", array_values($sanitizedData)) .
			"' );";

		$result = self::$db->query($query);

		return [
			'result' =>  $result,
			'id' => self::$db->insert_id
		];
	}

	private function update()
	{
		$sanitizedData = $this->sanitizeData();

		$values = [];
		foreach ($sanitizedData as $key => $value) {
			$values[] = "{$key}='{$value}'";
		}

		$query = "UPDATE " . static::$table . " SET " .
			join(', ', $values) .
			" WHERE id = " . self::$db->escape_string($this->id) .
			" LIMIT 1;";

		$result = self::$db->query($query);

		return $result;
	}

	public function delete()
	{
		$query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1;";
		$result = self::$db->query($query);

		return $result;
	}

	/**
	 * It returns all the rows from the table.
	 *
	 * @return An array of objects.
	 */
	public static function all()
	{
		$query = "SELECT * FROM " . static::$table . " ORDER BY id DESC;";
		$result = self::sqlStatement($query);

		return $result;
	}

	/**
	 * It takes an id, queries the database for the table with that id, and returns the result
	 *
	 * @param id The id of the register you want to get.
	 *
	 * @return An array of the first row of the result set.
	 */
	public static function find($id)
	{
		$query = "SELECT * FROM " . static::$table . " WHERE id = ${id}";
		$result = self::sqlStatement($query);

		return array_shift($result);
	}

	/**
	 * This function returns the first records from the table
	 *
	 * @param limitOfRecords The number of records to return.
	 *
	 * @return The result of the query.
	 */
	public static function get($limitOfRecords)
	{
		$query = "SELECT * FROM " . static::$table . " LIMIT " . $limitOfRecords . " ORDER BY id DESC;";
		$result = self::sqlStatement($query);

		return array_shift($result);
	}

	/**
	 * It returns a result set of all the records in the database table, ordered by the id field in
	 * descending order, and limited to the number of registers per page, and offset by the number of
	 * registers per page times the current page number
	 *
	 * @param registers_per_page The number of registers you want to show per page.
	 * @param offset The offset is the number of registers to skip.
	 *
	 * @return An array of objects.
	 */
	public static function paginate($registers_per_page, $offset)
	{
		$query = "SELECT * FROM " . static::$table . " ORDER BY id DESC LIMIT ${registers_per_page} OFFSET ${offset};";
		$result = self::sqlStatement($query);

		return $result;
	}

	/**
	 * It takes a column name and a value, and returns the first row that matches the column and value
	 *
	 * @param column The column name to search for.
	 * @param value The value to be searched for.
	 *
	 * @return An object.
	 */
	public static function where($column, $value)
	{
		$query = "SELECT * FROM " . static::$table . " WHERE ${column} = '${value}';";
		$result = self::sqlStatement($query);

		return array_shift($result);
	}

	/**
	 * It returns the total number of records in the table
	 *
	 * @return The number of rows in the table.
	 */
	public static function total()
	{
		$query = "SELECT COUNT(*) FROM " . static::$table . ";";
		$result = self::$db->query($query);
		$total = $result->fetch_array();

		return array_shift($total);
	}
}
