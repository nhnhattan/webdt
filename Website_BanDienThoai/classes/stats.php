<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?> 
<?php 
	class stats
	{
		private $db;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}	
		
		public function getStats($month)
		{
			$query = "SELECT    SUM(price) AS TotalSales
                                FROM `order`
                                WHERE MONTH(date_order) = '$month'
                        GROUP BY MONTH(date_order)
                        ORDER BY MONTH(date_order)";
			$result = $this->db->select($query);
			return $result;
		}
		public function getStats_Soldout($month)
		{
			$query = "SELECT    SUM(product_soldout) AS TotalSales
                                FROM product,`order`
                                WHERE MONTH(date_order) = '$month'
                        GROUP BY MONTH(date_order)
                        ORDER BY MONTH(date_order)";
			$result = $this->db->select($query);
			return $result;
        }
    }
 ?>