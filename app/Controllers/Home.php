<?php
    /**
     * @autor Bombo ALN
     * @fecha 2024-09-11
     */
    namespace App\Controllers;
    use App\Libraries\Numbers;

    class Home extends BaseController
    {
        public function index() : string
        {
            // return view('welcome_message');
            return view('form_view');
        }

        public function pft() // process file text
        {
            $fi = $this->request->getFile('ocr'); // file

            if (!$fi->isValid())
            {
                return redirect()->back()->with('err', "Archivo no válido");
            }

            $fc = file_get_contents($fi->getTempName()); // file content
            $ln = explode("\n", $fc); // lines
            $ln = array_filter($ln, fn($li) => trim($li) !== ''); // line

            if (count($ln) % 3 !== 0)
            {
                return redirect()->back()->with('err', "Archivo con número de líneas incorrectas.");
            }

            $re = []; // results

            $tl = count($ln); // total lines
            for ($i = 0; $i < $tl; $i += 3)
            {
                $bl = array_slice($ln, $i, 3); // block
                $rn = implode("\n", $bl); // raw number
                echo "<h1>Historia de Usuario</h1>";
                echo '<pre>';
                echo "RECIBIDO:\n" . htmlspecialchars($rn) . "\n";
                echo '</pre>';
                $nu = new Numbers($rn); // number
                $gdp = $nu->gdp(); // get digits parsed
                $st = $nu->vna($gdp); // status
                
                $re[] = "$gdp => $st";
            }

            return view('results_view', ['res' => $re]);
        }

        public function tcf() // test codeigniter four
        {
            echo "CI4";
        }
    }
