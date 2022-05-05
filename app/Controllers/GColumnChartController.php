<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class GColumnChartController extends Controller
{
    public function index() {
        return view('chart');
        //echo "Oi";
    }
    
    public function initChart() {
        
        $db = \Config\Database::connect();
        $builder = $db->table('product');
        $query = $builder->select("COUNT(id) as count, sell as s, DAYNAME(created_at) as day");
        $query = $builder->where("DAY(created_at) GROUP BY DAYNAME(created_at), s")->get();
        $record = $query->getResult();

        $products = [];
        foreach($record as $row) {
            $products[] = array(
                'day'   => $row->day,
                'sell' => floatval($row->s)
            );
        }
        
        $data['products'] = ($products);    
        return view('chart', $data);                
    }
 
}