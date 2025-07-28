<?php

namespace Reactmore\TelegramBotSdk\Models;

use CodeIgniter\Model;
use stdClass;

//extend from this model to execute basic db operations
class BaseModel extends Model
{

    protected $table;
    protected $table_without_prefix;
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected $db;
    protected $db_builder = null;

    public function __construct($table = null, $db = null)
    {
        parent::__construct();
        $this->db = $db ? $db : db_connect('default');
        $this->db->query("SET sql_mode = ''");
        $this->use_table($table);
    }

    protected function use_table($table)
    {
        $db_prefix = $this->db->getPrefix();
        $this->table = $db_prefix . $table;
        $this->table_without_prefix = $table;
        $this->db_builder = $this->db->table($this->table);
    }

    protected function allowField()
    {
        if ($this->protectFields) {
            $db_fields = $this->db->getFieldNames($this->table);
            foreach ($db_fields as $field) {
                if ($field !== "id" && !in_array($field, $this->allowedFields)) { // Mencegah duplikasi field
                    array_push($this->allowedFields, $field);
                }
            }
        }
    }

    public function get_one(mixed $id = 0, string $key = 'id')
    {
        return $this->get_one_where(array($key => $id));
    }

    public function get_one_where($where = array())
    {
        $where = $this->_get_clean_value($where);
        $result = $this->db_builder->getWhere($where, 1);

        if ($result->getRow()) {
            return $result->getRow();
        } else {
            $db_fields = $this->db->getFieldNames($this->table);
            $fields = new \stdClass();
            foreach ($db_fields as $field) {
                $fields->$field = "";
            }

            return $fields;
        }
    }

    public function get_all($include_deleted = false)
    {
        $where = array("deleted_at" => NULL);
        if ($include_deleted) {
            $where = array();
        }
        return $this->get_all_where($where);
    }

    public function escape_array($values = array())
    {
        return $this->_get_clean_value($values);
    }

    public function get_all_where($where = array(), $limit = 1000000, $offset = 0, $sort_by_field = null)
    {

        $where = $this->_get_clean_value($where);

        $where_in = get_array_value($where, "where_in");
        if ($where_in) {
            foreach ($where_in as $key => $value) {
                $this->db_builder->whereIn($key, $value);
            }
            unset($where["where_in"]);
        }

        if ($sort_by_field) {
            $this->db_builder->orderBy($sort_by_field, 'ASC');
        }

        return $this->db_builder->getWhere($where, $limit, $offset);
    }

    function ci_save(&$data = array(), $id = 0)
    {
        //allowed fields should be assigned
        $this->allowField();


        if ($id) {
            $id = $this->_get_clean_value($id);
            if (!$id) {
                return false; //invalid id
            }

            //update
            $where = array("id" => $id);
            $success = $this->update_where($data, $where);
            return $success;
        } else {
            //insert
            if ($this->db_builder->insert($data)) {
                $insert_id = $this->db->insertID();
                return $insert_id;
            }
        }
    }

    public function update_where($data = array(), $where = array())
    {
        if (count($where)) {
            $where = $this->_get_clean_value($where);

            if ($this->db_builder->update($data, $where)) {
                $id = get_array_value($where, "id");
                if ($id) {
                    return $id;
                } else {
                    return true;
                }
            }
        }
    }

    public function deleted($id = 0, $undo = false)
    {
        $data = array('deleted_at' => date('Y-m-d H:i:s'));
        if ($undo === true) {
            $data = array('deleted_at' => NULL);
        }
        $this->db_builder->where("id", cleanNumber($id));
        $success = $this->db_builder->update($data);
        return $success;
    }

    public function get_dropdown_list($option_fields = array(), $key = "id", $where = array())
    {
        $where["deleted_at"] = NULL;
        $list_data = $this->get_all_where($where, 0, 0, $option_fields[0])->getResult();
        $result = array();
        foreach ($list_data as $data) {
            $text = "";
            foreach ($option_fields as $option) {
                $text .= $data->$option . " ";
            }
            $result[$data->$key] = $text;
        }
        return $result;
    }

    public function deletedPermanently($id = 0)
    {
        if ($id) {
            $this->db_builder->where('id', cleanNumber($id));
            if ($this->db_builder->delete()) {
                return true;
            }
        }

        return false;
    }

    public function restoreData($id = 0)
    {
        $this->allowField();
        $data = $this->get_one($id, 'id');
        if (!empty($data->id)) {
            $update = [
                'deleted_at' => null,
            ];

            $undo = $this->update_where($update, array('id' => $data->id));

            if ($undo) {
                return $undo;
            }
        }

        return false;
    }

    protected function _get_clean_value($options_or_value, $key = "")
    {
        $value = $options_or_value;

        if (is_array($options_or_value) && $key) {
            $value = get_array_value($options_or_value, $key);
        }

        if (is_string($value)) {
            return $this->db->escapeString($value);
        } else if (is_bool($value) || is_int($value) || is_numeric($value)) {
            return $value;
        } else if (is_array($value)) {
            foreach ($value as $array_key => $new_value) {
                $value[$array_key] = $this->_get_clean_value($new_value);
            }
            return $value;
        } else {
            return null;
        }
    }

    // Check if data is unique
    public function isDataUnique($key, $value, $idForCompare = 0)
    {
        $data = $this->db_builder->where($key, $value)->get()->getRow();
        if ($idForCompare == 0) {
            if (!empty($data)) {
                return false;
            }
            return true;
        } else {
            if (!empty($data) && $data->id != $idForCompare) {
                return false;
            }
            return true;
        }
    }
}
