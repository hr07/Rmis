<?php
defined("PATHNAME") === true or exit(header("location:../../errors/"));
/**
 * @author Peter Mwambi
 * @content Validation Class
 * @time Wed Dec 30 2020 10:27:13 GMT+0300 (East Africa Time)
 * @updated on Tue Sep 27 2022 20:18:46 GMT+0300 (East Africa Time)
 *
 */

class Validator extends Rules
{
    private $passed = false;
    private $errors = [];
    protected $conn = null;
    protected $data = [];
    private $identifier = null;
    private $rules = [];
    private $field = null;
    private $table = null;
    private $column = null;

    public function __construct()
    {
        $this->conn = new DatabaseHandler;
        $this->rules = new Rules;
        $this->validate();
    }

    public function SetFormData(array $data)
    {
        $this->data = $data;
    }

    public function SetTable(string $table)
    {
        $this->table = $table;
    }

    public function SetField(string $field)
    {
        $this->field = $field;
    }

    public function SetUniqId(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function SetUniqIdColumn(string $column)
    {
        $this->column = $column;
    }

    private function validate()
    {
        if (count($this->data)) {
            $rules = $this->rules->GenerateRules($this->data);
            $data = $this->data;
            $count = null;
            $result = null;
            foreach ($rules as $key => $itemValue) {
                foreach ($itemValue as $ruleKey => $ruleValue) {
                    switch ($ruleKey) {
                        case 'required':
                            switch ($itemValue["required"]) {
                                case true:
                                    if (empty($data[$key])) {
                                        $this->error(ucfirst($itemValue["name"]) . " is required");
                                    }
                                    break;
                            }
                            break;
                        case 'pattern':
                            if (!empty($data[$key]) && !preg_match($itemValue["pattern"], $data[$key])) {
                                $this->error("{$itemValue["name"]} is invalid. Please correct the field and try again");
                            }
                            break;
                        case 'min':
                            if (!empty($data[$key]) && strlen($data[$key]) < $itemValue["min"]) {
                                $this->error("{$itemValue["name"]} cannot be less than {$ruleValue} characters");
                            }
                            break;
                        case 'max':
                            if (!empty($data[$key]) && strlen($data[$key]) > $itemValue["max"]) {
                                $this->error("{$itemValue["name"]} cannot be greater than {$ruleValue} characters");
                            }
                            break;
                        case 'constant':
                            if (!empty($data[$key]) && !filter_var($data[$key], $itemValue["constant"])) {
                                $this->error("{$itemValue["name"]} is invalid");
                            }
                            break;
                        case 'unique':
                            switch ($itemValue["unique"]) {
                                case true:
                                    if (!empty($data[$key])) {
                                        $this->conn->setTable($this->table);
                                        $this->conn->setField(array($this->field));
                                        $this->conn->setQueryItems(array($this->field, "=", $data[$key]));
                                        $this->conn->queryDb("select", 1);
                                        $count = $this->conn->getCount();
                                        $result = $this->conn->getOutput();
                                        switch ($itemValue["permit"]) {
                                            /**
                                                 * Account should not exist- Used when creating new accounts
                                                 * Deny Access if account exists
                                                 */
                                            case false:
                                                if ($count) {
                                                    switch ($itemValue["allowIfExists"]) {
                                                        case false:
                                                            $this->error("{$itemValue["name"]} already exists");
                                                            break;
                                                        case true:
                                                            switch ($itemValue["confirm"]) {
                                                                case true:
                                                                    $this->conn->runSQL("SELECT {$this->field} FROM {$this->table} WHERE {$this->column} = ? LIMIT 1", array($this->identifier), 1);
                                                                    $count = $this->conn->getCount();
                                                                    if ($count > 0) {
                                                                        $result = $this->conn->getOutput();
                                                                        $result = $result->$this->field;
                                                                        if ($result !== $data[$key]) {
                                                                            $this->error("{$itemValue["name"]} already exists please choose another name");
                                                                        }
                                                                    }
                                                                    break;
                                                            }
                                                            break;
                                                    }
                                                }
                                                break;

                                            /**
                                                 * Account should exist - Used when signing in an already existing account
                                                 * Allow Access if account exists
                                                 */
                                            case true:
                                                if ($count) {
                                                    if (!password_verify($this->data["password"], $result->password)) {
                                                        $this->error("Wrong password");
                                                    }
                                                } else {
                                                    $this->error("Account not found. Please confirm your username and password then try again");
                                                }
                                                break;
                                        }
                                    }
                            }
                            break;
                        case 'matches':
                            if (!empty($data[$key]) && $data[$key] != $data[$itemValue["matches"]]) {
                                $this->error("{$itemValue["name"]} does not match {$itemValue["matches"]}");
                            }
                            break;
                    }
                }
            }
            return $this;
        }
        return false;
    }

    private function error($error)
    {
        array_push($this->errors, $error);
    }

    /**
     * @param null
     * @return string
     *
     * Process Validation Errors
     */

    public function DisplayError()
    {
        if (count($this->errors)) {
            foreach ($this->errors as $error) {
                return $error;
            }
        }
    }

    /**
     * @param null
     * @return bool
     *
     * Confirms if validation has succeded. Returns true
     * if validation has passed otherwise false
     */

    public function ConfirmStatus()
    {
        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this->passed;
    }

    public function Execute()
    {
        $this->validate();
    }
}