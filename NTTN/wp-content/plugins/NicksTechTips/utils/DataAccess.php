<?php

require_once('c:\users\nick\documents\visual studio 2013\Projects\MMJOrders\MMJOrders\wordpress\wp-load.php');

include_once ('c:\users\nick\documents\visual studio 2013\Projects\MMJOrders\MMJOrders\wordpress\wp-content\plugins\MMJPlugin\models\HybridModel.php');


/**
 * DataAccess short summary.
 *
 * DataAccess description.
 *
 * @version 1.0
 * @author Nick Seeber
 */
class DataAccess
{
    private static $initialized = false;
    
    private static function initialize()
    {
        global $wpdb;
    	if (self::$initialized)
    		return;
        
    	self::$initialized = true;
    }
    
    public static function getHybrid(){        
        self::initialize();       
        global $wpdb;
        
        $query = ("SELECT * FROM `inventory`.`wp_hybrid`;");       
        
        $results = $wpdb->get_results($query);
       
        
        return $results;
    }
    

    
    
    public static function insertEdible($postParams){
        self::initialize();
        global $wpdb;
        
        $post = json_encode($postParams);
        
        $formData = json_decode($post);
        
        $Kind = $formData->kind;
        $Name = $formData->name;
        $THC = $formData->thc;
        $Price = $formData->price;
        $Quantity = $formData->quantity;
             
        $insertPost = "Insert into `inventory`.`wp_edibles` (Type, Name, THC, Price, Quantity) values 
            (%s, %s, %s, %s, %s)";

        $cleanInsert = $wpdb->prepare($insertPost, array(
            $Kind, 
            $Name,
            $THC, 
            $Price, 
            $Quantity, 
            ));
        
        $wpdb->query($cleanInsert);    
    }   
    


}




