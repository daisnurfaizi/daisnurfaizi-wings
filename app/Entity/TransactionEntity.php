<?php

namespace App\Entity;

class TransactionEntity
{
    private $document_code;
    private $user_id;
    private $total_amount;

    public function __construct($document_code, $user_id, $total_amount,)
    {
        $this->document_code = $document_code;
        $this->user_id = $user_id;
        $this->total_amount = $total_amount;
    }

    /**
     * Get the value of total_amount
     */
    public function getTotal_amount()
    {
        return $this->total_amount;
    }

    /**
     * Set the value of total_amount
     *
     * @return  self
     */
    public function setTotal_amount($total_amount)
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of document_code
     */
    public function getDocument_code()
    {
        return $this->document_code;
    }

    /**
     * Set the value of document_code
     *
     * @return  self
     */
    public function setDocument_code($document_code)
    {
        $this->document_code = $document_code;

        return $this;
    }
}
