<?php

 class Bird extends DatabaseObject {
    static protected $table_name = 'birds';
    static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'nest_palcement', 'behavior', 'conservation_id', 'backyard_tips'];

    public $id;
    public $common_name;
    public $habitat;
    public $food;
    public $nest_palcement;
    public $behavior;
    public $backyard_tips;
    public $conservation_id;

    public const CONSERVATION_OPTIONS = [ 
        1 => "Low concern",
        2 => "Medium concern",
        3 => "High concern",
        4 => "Extreme concern"
    ];

    public function __construct($args=[]) {
        $this->common_name = $args['common_name'] ?? '';
        $this->habitat = $args['habitat'] ?? '';
        $this->food = $args['food'] ?? '';
        $this->nest_palcement = $args['nest_palcement'] ?? '';
        $this->behavior = $args['behavior'] ?? '';
        $this->backyard_tips = $args['backyard_tips'] ?? '';
        $this->conservation_id = $args['conservation_id'] ?? '';

    }

    public function conservation() {
        // echo self::CONSERVATION_OPTIONS[$this->conservation_id];
        if( $this->conservation_id > 0 ) {
            return self::CONSERVATION_OPTIONS[$this->conservation_id];
        } else {
            return "Unknown";
        }
    }

    public function name() {
        return "{$this->common_name}";
    }

    protected function validate() {
      $this->errors = [];
    
      if(is_blank($this->common_name)) {
        $this->errors[0] = "Common Name cannot be blank.";
      }
      if(is_blank($this->habitat)) {
        $this->errors[1] = "Habitat cannot be blank.";
      }
      if(is_blank($this->food)) {
        $this->errors[2] = "Food cannot be blank.";
      }
      if(is_blank($this->nest_palcement)) {
        $this->errors[3] = "Nest Placement cannot be blank.";
      }
      if(is_blank($this->behavior)) {
        $this->errors[4] = "Behavior cannot be blank.";
      }

      return $this->errors;
    }


}