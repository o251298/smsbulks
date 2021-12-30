<?php


namespace App\Services;


use App\Models\Number;

class GroupParser
{
    /*
     *  данный парсер должен считывать файл в формате csv
        1. Валидация украинских номеров, проверка на 380
        2. Убрать из базы лишние символы (^0-9)
        3. Сохранение номера в базу
    */

    protected $path;
    public $groupid;
    public $info;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function  parse()
    {
        $info = array();
        $filename = storage_path($this->path);
        $file = fopen($filename, "r");
        $all_data = array();
        while (($data = fgetcsv($file, 100000, ",")) !== FALSE)
        {
            $i = explode(';', $data[0]);

            if (count($i) > 1){
                $all_data[] = $i[1];
            } else {
                $all_data[] = $data[0];
            }
        }
        fclose($file);


        $numbers = $this->validate($all_data);

        $numbers_uniq = array_unique($numbers);
        $numbers_uniq = array_values($numbers_uniq);
        $info['all'] = count($numbers);
        $info['double'] = count($numbers) - count($numbers_uniq);
        $this->setInfo($info);
        return $numbers_uniq;


    }

    public function validate($data)
    {
        $pattern = '/[^0-9]+/';
        $i = 0;
        $numbers_current = array();
        foreach($data as $number){
            $numbers = preg_replace($pattern, '', $number);
            if ((strlen($numbers) == 12) && (mb_substr($numbers, 0, 3) == "380")){
                $numbers_current[$i] = $numbers;
            }
            $i++;
        }

        return $numbers_current;
    }


    public function setGroupId($groupId){
        return $this->groupid = $groupId;
    }

    public function save($numbers_uniq)
    {
        foreach ($numbers_uniq as $item){
            $message = Number::create([
                'group_id' => $this->groupid,
                'number' => $item,
            ]);
        }
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function getInfo()
    {
        return  $this->info;
    }




}
