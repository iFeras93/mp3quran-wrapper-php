<?php
namespace Iferas93\Mp3quranWrapper;

use Exception;

class QuranWrapper extends Client
{
    public function languages(): Languages
    {
        return new Languages($this);
    }
}
