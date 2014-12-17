<?php
namespace Application\Mappers;

use Core\Application\Application;
use Application\Models\EntityTimeline;

class Timeline
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
        $adapter = new $this->adapterName();
        
        $adapter->setTable("timeline");
        $timeline = $adapter->fetchAll();
        
        $adapter->setTable("tag");
        $tag = $adapter->fetchAll();
        
        $timelineHidrateds = array();

        for($i=0; $i < sizeof($timeline); $i++)
        {
        	/**
        	 * TODO Falta el idTag con el Title del Media
        	 */
            $timelineHidrated = new EntityTimeline();                    
            $timelineHidrated->hydrate($timeline[$i]);
            array_push($timelineHidrateds, $timelineHidrated->extract());
        }

        $adapter->disconnect();

        return $timelineHidrateds;            
    }
    
    public function fetchTimeline()
    {
        $adapter = new $this->adapterName();
        $adapter->setTable("timeline");
        $timeline = $adapter->fetch(array('idTimeline'=> $this->id));
        /**
         * TODO Falta el idTag con el Title del Media
         */
        $userHidrated->hydrate($timeline[$i]);
        $adapter->disconnect();
        return $userHidrated->extract();
    }
    
    /**
     * @param array $data
     */
    public function insertTimeline($data)
    {
		$adapter = new $this->adapterName();
		$adapter->setTable("timeline");
		/**
		 * TODO Relacion entre el nombre de las variables de la entity y el de la tabla
		 */
		$timeline = $adapter->insert(array('idTimeline'=> $this->id));
		/**
		 * TODO Falta el idTag con el Title del Media
		 */
		$adapter->disconnect();
		return $timeline;
    }
    
    /**
     * @param none, use before setId()
     * @return unknown
     */
    public function deleteTimeline()
    {
		$adapter = new $this->adapterName();
		$adapter->setTable("timeline");
		/**
		 * TODO Relacion entre el nombre de las variables de la entity y el de la tabla
		*/
		$timeline = $adapter->delete(array('idTimeline'=> $this->id));
		/**
		 * TODO Falta el idTag con el Title del Media
		 */
		$adapter->disconnect();
		return $timeline;
    }
    
	/**
	 * @param use before setId()
     * @param array $data
     */
    public function updateTimeline($data)
    {
		$adapter = new $this->adapterName();
		$adapter->setTable("timeline");
		/**
		 * TODO Relacion entre el nombre de las variables de la entity y el de la tabla
		 */
		$timeline = $adapter->update(array('idTimeline'=> $this->id),$data);
		/**
		 * TODO Falta el idTag con el Title del Media
		 */
		$adapter->disconnect();
		return $timeline;
    }
}