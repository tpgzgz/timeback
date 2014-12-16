<?php
namespace Application\Mappers;

use Core\Application\Application;
use Application\Models\EntityTimeline;

class Users
{
    private $adapterName;
    private $id;
    
    /**
     * Constructor que al instanciar recibe el adapter
     */
    public function __construct() 
    {
        $config = Application::getConfig();
        $request = Application::getRequest();
        $this->setAdapterName($config['adapter']);
        if(isset($request['params']['id']))
            $this->setId($request['params']['id']);
    }
    
    public function setAdapterName($adapterName) 
    {
        $this->adapterName = $adapterName;
    }
    
    public function setId($id) 
    {
        $this->id = $id;
    }

     /**
     * 
     * @return array de users
     */
    public function fetchAllTimeline()
    {
        switch($this->adapterName){
           
            case'\Core\Adapters\Mysql':
                
                $adapter = new $this->adapterName();
                
                $adapter->setTable("timeline");
                $timeline = $adapter->fetchAll();
                
                $adapter->setTable("tag");
                $tag = $adapter->fetchAll();
                
                $timelineHidrated = array();

                for($i=0; $i < sizeof($timeline); $i++)
                {
                	/**
                	 * TODO Falta el idTag con el Title del Media
                	 */
                    $timelineHidrated = new EntityTimeline();                    
                    $timelineHidrated->hydrate($users[$i]);
                    array_push($usersHidrated, $userHidrated->extract());
                }

                $adapter->disconnect();

                return $timelineHidrated;
            break;
            case'\Core\Adapters\Txt':
                $adapter = new $this->adapterName();
                $timeline = $adapter->fetchAll();
                return $timeline;
            break;
        }
    }
    
    public function fetchTimeline()
    {
        switch($this->adapterName){
            case'\Core\Adapters\Mysql':
                $adapter = new $this->adapterName();
                $adapter->setTable("timeline");
                $timeline = $adapter->fetch(array('idTimeline'=> $this->id));
                $userHidrated->hydrate($timeline[$i]);
                $adapter->disconnect();
                return $userHidrated->extract();
        }
    }
    
    /**
     * @param array $data
     */
    public function insertTimeline($data)
    {
    	switch($this->adapterName){
    		case'\Core\Adapters\Mysql':
    			$adapter = new $this->adapterName();
    			$adapter->setTable("timeline");
    			/**
    			 * TODO Relacion entre el nombre de las variables de la entity y el de la tabla
    			 */
    			$timeline = $adapter->insert(array('idTimeline'=> $this->id));   			
    			$adapter->disconnect();
    			return $timeline;
    	}
    }
}