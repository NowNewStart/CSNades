<?php

class BaseModel extends Eloquent {

    protected $rules;
    protected $messages;
    protected $validator;

    public static function boot()
    {
        parent::boot();

        static::saving(function($user) {
            return $user->isValid();
        });
    }

    public function getValidator()
    {
        if (!$this->validator) {
            $this->validator = Validator::make(
                $this->toArray(),
                $this->rules,
                $this->messages
            );
        }

        return $this->validator;
    }

    public function isValid()
    {
        return $this->getValidator()->passes();
    }
}