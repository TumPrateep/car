<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Bills extends CI_Model
{
    public function allBillGarage_count($garageId)
    {
        $query = $this
            ->db->where('garageId', $garageId)
            ->get('bill_garage_payment');

        return $query->num_rows();

    }

    public function allBillGarage($limit, $start, $col, $dir, $garageId)
    {
        $query = $this
            ->db
            ->where('garageId', $garageId)
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('bill_garage_payment');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function allBillCaraccessories_count($caraccessoriesId)
    {
        $query = $this
            ->db->where('caraccessoriesId', $caraccessoriesId)
            ->get('bill_caraccessories_payment');

        return $query->num_rows();

    }

    public function allBillCaraccessories($limit, $start, $col, $dir, $caraccessoriesId)
    {
        $query = $this
            ->db
            ->where('caraccessoriesId', $caraccessoriesId)
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('bill_caraccessories_payment');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

}