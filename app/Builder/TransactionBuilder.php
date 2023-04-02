<?php

namespace App\Builder;

use App\Entity\TransactionEntity;

class TransactionBuilder
{
    private $document_code;
    private $user_id;
    private $total_amount;

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
     * Set the value of total_amount
     *
     * @return  self
     */
    public function setTotal_amount($total_amount)
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    public function build(): TransactionEntity
    {
        return new TransactionEntity($this->document_code, $this->user_id, $this->total_amount);
    }
}
