<?php
    /**
     * @autor Bombo ALN
     * @fecha 2024-09-11
     */
    declare(strict_types=1);
    namespace App\Libraries;

    class Numbers
    {
        private const LLE = 27; // Line Length Expected
        private string $pa; // parsed
        
        public function __construct(private string $rd)
        {
            $this->pdl();
        }

        public function grd() : string // get raw digit
        {
            return $this->rd;
        }

        public function gdp() : string // get digits parsed
        {
            return $this->pa;
        }

        private function pdl() : void // parse digits lines
        {
            $this->pds($this->pls());
        }

        private function pds(array $li) : void // parse digits, lines
        {
            $this->pa = '';
            foreach ($li[0] as $in => $bl) // index, block
            {
                $rd = implode("\n", [$bl ?? '', $li[1][$in] ?? '', $li[2][$in] ?? '']); //raw digit
                $di = new Digits($rd); // digit
                $this->pa .= $di->gdp();
            }
        }

        private function pls() : array // parse lines
        {
            $pl = array_slice(explode("\n", $this->rd), 0, 3); // parsed lines
            foreach ($pl as &$li) // line
            {
                $li = str_split(str_pad($li, self::LLE, ' '), 3);
            }

            return $pl;
        }

        public function vna(string $an) : string // validate number account, account number
        {
            if (strpos($an, '?') !== false) {
                return "ILL";
            }

            if (strlen($an) !== 9) {
                return "ILL";
            }

            $pl = 0; // plus
            for ($i = 0; $i < 9; $i++) {
                $di = (int)$an[$i]; // digit
                $we = $i + 1; // weight
                $pl += $di * $we;
            }

            return ($pl % 11 === 0) ? "OK" : "ERR";
        }
    }