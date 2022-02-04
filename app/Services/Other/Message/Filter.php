<?php


namespace App\Services\Other\Message;


use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Filter
{
    public $request;
    public $message;
    public $arrFilters;

    public function __construct(Request $request, Builder $message)
    {
        $this->message = $message;
        $this->request = $request;
        $this->arrFilters = $this->request->all();
    }

    public function filter()
    {
        if (!empty($this->arrFilters['text'])){
            $this->message->where('text', 'LIKE', "%{$this->arrFilters['text']}%");
        }
        if (!empty($this->arrFilters['number'])){
            $this->message->where('number', '=', $this->arrFilters['number']);
        }

        if (!empty($this->arrFilters['date_first']) && !empty($this->arrFilters['date_second'])){
            $this->validationDate();
        }
        if (!empty($this->arrFilters['user'])){
            $user = User::where('name', $this->arrFilters['user']);
            $this->message->where('user_id', $user->first()->id);
        }
        return $this->message;
    }

    public function validationDate()
    {
        if ($this->arrFilters['date_first'] > $this->arrFilters['date_second']){
            throw new \Exception("Дата начала больше даты конца!!!");
        }
        $date_first = $this->arrFilters['date_first'];
        $date_first = str_replace('T', ' ', $date_first);
        $date_second = $this->arrFilters['date_second'];
        $date_second = str_replace('T', ' ', $date_second);
        $this->message->whereBetween('created_at', [$date_first, $date_second]);
    }
}
