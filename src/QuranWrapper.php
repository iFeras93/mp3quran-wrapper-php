<?php
namespace Iferas93\Mp3quranWrapper;

use Exception;

class QuranWrapper extends Client
{
    public function Languages(): Languages
    {
        return new Languages($this);
    }

    public function Surah()
    {
        return new Surah($this);
    }

    public function Riwayat()
    {
        return new Riwayat($this);
    }

}
