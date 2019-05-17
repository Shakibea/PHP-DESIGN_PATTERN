<?php
ini_set("date.timezone", "Asia/Dhaka");
class Artical{
    private $title, $time;
    function __construct($title, $time)
    {
        $this->title = $title;
        $this->time = $time;
    }

    function getTime(){
        return $this->time;
    }
    function getTitle(){
        return $this->title;
    }

    function displayTitle(){
        $title = $this->getTitle();
        $time = date("Y/m/d H:i:s", $this->getTime());
        echo "{$title} was published on {$time}";
    }
}

class ArticalDecorator{
    private $artical;
    function __construct(Artical $artical)
    {
        $this->artical = $artical;
    }

    function displayTitle(){
        $title = $this->artical->getTitle();
        $time = $this->time_elapsed_string($this->artical->getTime());
        echo "{$title} was published on {$time}";
    }

    function time_elapsed_string($ptime)
    {
        $etime = time() - $ptime;

        if ($etime < 1)
        {
            return '0 seconds';
        }

        $a = array( 365 * 24 * 60 * 60  =>  'year',
                    30 * 24 * 60 * 60  =>  'month',
                        24 * 60 * 60  =>  'day',
                            60 * 60  =>  'hour',
                                    60  =>  'minute',
                                    1  =>  'second'
                    );
        $a_plural = array( 'year'   => 'years',
                        'month'  => 'months',
                        'day'    => 'days',
                        'hour'   => 'hours',
                        'minute' => 'minutes',
                        'second' => 'seconds'
                    );

        foreach ($a as $secs => $str)
        {
            $d = $etime / $secs;
            if ($d >= 1)
            {
                $c = round($d,2);
                // $r = str_replace('.', ':', $c);
                $r = explode('.', $c);
                    return $r[0] . ' ' .($r[0] > 1 ? $a_plural[$str] : $str). ' ' .$r[1].' mintue ago';
                }
        }
    }
}

$artical = new Artical("Artical Title", time()-4500);
$articalDecorator = new ArticalDecorator($artical);
$articalDecorator->displayTitle();