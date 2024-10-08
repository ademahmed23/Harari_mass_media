<?php

namespace App\DataTables;

use App\Models\Poll;

/**
 * Class PollDataTable
 */
class PollDataTable
{
    /**
     * @return Poll
     */
    public function get()
    {
        /** @var Poll $query */
        $query = Poll::with('language')->get();

        return $query;
    }
}
