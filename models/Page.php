<?php

class Page extends BaseModel {

    protected $table = 'pages';
    protected $pk = 'page_id';

    public $page_id = 0;
    public $slug;
    public $name;
    public $template;
    public $sort_order;

    

    public function save() {
        global $db;

        $data = [
            ':slug' => $this->slug,
            ':name' => $this->name,
            ':template' => $this->template,
        ];

        if( $this->page_id > 0 ) {
            //update
            $sql = 'UPDATE `pages` 
                    SET `slug` = :slug, `name` = :name, `template` = :template
                    WHERE `page_id` = :page_id ';

            $data['page_id'] = $this->page_id;

            $update_statement = $db->prepare($sql);
            $update_statement->execute( $data );
            
        } else {
            //insert
            $sql = 'INSERT INTO `pages` (`slug`, `name`, `template`)
                    VALUES (:slug, :name, :template)';

            $insert_statement = $db->prepare($sql);
            $insert_statement->execute( $data );

            $this->page_id = $db->lastInsertId();
            
        }
    }

}