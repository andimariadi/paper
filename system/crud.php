<?php
class crud
{
	private $server = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $database = 'fleet_control';
	public $connection;
	function __construct() {
		session_start();
		date_default_timezone_set('Asia/Makassar');
		$this->connection = new mysqli($this->server, $this->user, $this->pass, $this->database);
	}
	
	public function insert($table, $field=array())
	{
		$data = array_keys($field);
		$value = array_values($field);
		$sql = "INSERT INTO `$table` (`" . implode('`,`', $data) . "`) VALUES ('" . implode("','", $value) . "')";
		$query = $this->connection->prepare($sql) or die ($this->connection->error);
		$query->execute();
		$query->close();
	}

	public function view($table='', $order_by=array())
	{
		$data = array_keys($order_by);
		$value = array_values($order_by);
		$sql = "SELECT * FROM `$table`";
		if ($order_by != NULL) {
			$sql .= "ORDER BY `{$data[0]}` {$value[0]}";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		$result = $query->fetch_all(MYSQLI_ASSOC);
	    return $result;
	    $query->close();
	}

	public function update($table, $field=array(''), $where=array(''))
	{
		$wr = array_keys($where);
		$on = array_values($where);
		$sql = "UPDATE `$table` SET ";
		$fields = "";
		foreach ($field as $data => $value) {
			$fields .= ",`$data`='$value'";
		}
		$sql = $sql . substr($fields, 1);
		$sql .= " WHERE `{$wr[0]}`='{$on[0]}'";
		$query = $this->connection->prepare($sql) or die ($this->connection->error);
		$query->execute();
		$query->close();
	}

	public function delete($table, $where=array(''))
	{
		$wr = array_keys($where);
		$on = array_values($where);
		$sql = "DELETE FROM `{$table}` ";
		$sql .= "WHERE `{$wr[0]}`='{$on[0]}'";
		if (count($where) > 1) {
			$sql .= " AND `{$wr[1]}`='{$on[1]}'";
		}
		$query = $this->connection->prepare($sql) or die ($this->connection->error);
		$query->execute();
	}

	public function where($table='', $where=array())
	{
		$data = array_keys($where);
		$value = array_values($where);
		$sql = "SELECT * FROM `$table`";
		if ($where != NULL) {
			$sql .= " WHERE `{$data[0]}`='{$value[0]}'";
		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
	    return $query;
	    $query->close();
	}

	public function whereand($table='', $where=array())
	{
		$sql = "SELECT * FROM `$table` ";
		$no=-1;
		foreach ($where as $element => $value) {
			$no++;
			if ($no == 0) {
				$sql .= " WHERE `{$element}`='{$value}'";
			}
			if ($no > 0) {
				$sql .= " AND `{$element}`='{$value}'";
			}
		}
		$query = $query = $this->connection->query($sql) or die ($this->connection->error);
	    return $query;
	    $query->close();
	}

	public function like($table='', $where=array())
	{
		$data = array_keys($where);
		$value = array_values($where);
		$sql = "SELECT * FROM `$table`";
		if ($where != NULL) {
			$sql .= " WHERE `{$data[0]}` LIKE '{$value[0]}%'";
		}
		$query = $query = $this->connection->query($sql) or die ($this->connection->error);
	    return $query;
	    $query->close();
	}

	public function join($table='', $totable=array(), $on=array(), $type_join='LEFT')
	{
		$data = array_keys($on);
		$value = array_values($on);
		$sql = "SELECT * FROM `$table`";
		$no=-1;
		foreach ($totable as $element) {
			$no++;
			$sql .= " {$type_join} JOIN `{$element}` ON {$data[$no]} = {$value[$no]}";
		}
		$query = $query = $this->connection->query($sql) or die ($this->connection->error);
		$result = $query->fetch_all(MYSQLI_ASSOC);
	    return $result;
	    $result->close();
	}

	public function joinwhere($table='', $totable=array(), $on=array(), $where=array(), $type_join='LEFT')
	{
		$data = array_keys($on);
		$value = array_values($on);
		$sql = "SELECT * FROM `$table`";
		$no=-1;
		foreach ($totable as $element) {
			$no++;
			$sql .= " {$type_join} JOIN `{$element}` ON {$data[$no]} = {$value[$no]}";
		}
		$data = array_keys($where);
		$value = array_values($where);
		if ($where != NULL) {
			$sql .= " WHERE {$data[0]}='{$value[0]}'";
		}
		$query = $query = $this->connection->query($sql) or die ($this->connection->error);
		$result = $query->fetch_all(MYSQLI_ASSOC);
	    return $result;
	    $result->close();
	}

	public function query($sql='')
	{
		$query = $this->connection->query($sql) or die ($this->connection->error);
	    return $query;
	    $query->close();
	}

	public function get_paging_info($tot_rows,$pp,$curr_page) {
	    $pages = ceil($tot_rows / $pp); // calc pages

	    $data = array(); // start out array
	    $data['si']        = ($curr_page * $pp) - $pp; // what row to start at
	    $data['pages']     = $pages;                   // add the pages
	    $data['curr_page'] = $curr_page;               // Whats the current page

	    return $data; //return the paging data

	}
}
?>