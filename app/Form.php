<?php

namespace App;

class Form
{
    public $extraFields = [];

    /**
     * Set form fieds
     *
     * @var array fields
     * @return void
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * Get form fieds
     *
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Get validation rules
     *
     * @var integer $id Eloquent resource id
     * @return array
     */
    public function getValidationRules($id = 0)
    {
        $rules = [];
        foreach ($this->fields as $key => $item) {
            if (isset($item['validate'])) {
                if (!$id) {
                    $rules[ $key ] = $item['validate'];
                } else {
                    // Search for rule "unique"
                    $newRules = [];
                    $fieldRules = explode('|', $item['validate']);
                    foreach ($fieldRules as $ruleKey => $rule) {
                        $ruleWithParams = explode(":", $rule);
                        // Validation rule is "unique" - force to ignore given ID
                        if ($ruleWithParams[0] == 'unique') {
                            $newRules[] = $rule . ',' . $id;
                        } else {
                            $newRules[] = $rule;
                        }
                    }
                    $rules[$key] = implode("|", $newRules);
                }
            }
        }
        return $rules;
    }


    /**
     * Set extra fields
     *
     * @return array
     */
    public function setExtraFields($fields = [])
    {
        $this->extraFields = $fields;
    }

    /**
     * Get extra fields
     *
     * @return array
     */
    public function getExtraFields()
    {
        return $this->extraFields;
    }
}
