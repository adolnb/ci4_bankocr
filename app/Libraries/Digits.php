<?php
    /**
     * @autor Bombo ALN
     * @fecha 2024-09-11
     */
    declare(strict_types=1);
    namespace App\Libraries;

    class Digits
    {
        private const DD = [ // Digits Definitions
            ' _ | ||_|' => '0',
            '     |  |' => '1',
            ' _  _||_ ' => '2',
            ' _  _| _|' => '3',
            '   |_|  |' => '4',
            ' _ |_  _|' => '5',
            ' _ |_ |_|' => '6',
            ' _   |  |' => '7',
            ' _ |_||_|' => '8',
            ' _ |_| _|' => '9',
        ];

        private string $rd; // raw digit
        private string $pa; // parsed
        
        public function __construct(string $rd)
        {
            $this->rd = $rd;
            $this->pdf();
        }

        private function pdf() : void // parse digit file
        {
            $this->pa = preg_replace('/[^_| ]/', '', $this->rd);
        }

        public function grd() : string // get raw digit
        {
            return $this->rd;
        }

        public function gdp() : string // get digits parsed
        {
            return self::DD[$this->pa] ?? '?';
        }
    }