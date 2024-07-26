<?php 

    class SortClass {
         
        protected $arr_num;
        protected $median;
        protected $largest;

        function __construct ($arr_num = [], $median = 0, $largest = 0) {
            
            $this->arr_num = $arr_num;
            $this->median = $median;
            $this->largets = $largest;

        }

        public function bubleSort($arr_num = []) {
            $temp = 0;
            for ($index = 0; $index < count($arr_num); $index++) { 
                $temp = $arr_num[$index];
                for ($subindex = 0; $subindex < count($arr_num); $subindex++) { 
                    if ($temp < $arr_num[$subindex]) {
                        $temp = $arr_num[$subindex];
                        $arr_num[$subindex] = $arr_num[$index];
                        $arr_num[$index] = $temp;
                    }

                }
            }

            return $arr_num;
        }
    }


    class Compute extends SortClass {

        public function getSortedList($arr_num) {
            return $this->bubleSort($arr_num);
        }

        
        public function getMedian ($arr_num) {

            $arr_count = count($arr_num);
            $mid_index = 0;
            $arr_num = $this->bubleSort($arr_num);

            if ($arr_count % 2 == 0) {
                $mid_index = $arr_count / 2;
                $this->median = $arr_num[$mid_index];
            }
            else {
                $mid_index = $arr_count / 2;
                $this->median = $arr_num[$mid_index - 0.5] . ", " . $arr_num[$mid_index + 0.5];
            }

            return $this->median;
        }
        
        public function getlargest ($arr_num) {
            
            $arr_num = $this->bubleSort($arr_num);

            $this->largest = $arr_num[count($arr_num) - 1];

            return $this->largest;
        }

    }


    $arr_num = [451, 136, 379, 354, 170, 479, 347, 375, 60, 51, 1]; // Change the list of number to test

    $sortedNum = new Compute();

    echo "Result: " . implode(", ", $sortedNum->getSortedList($arr_num));
    echo "<br/>Median: " . $sortedNum->getMedian($arr_num);
    echo "<br/>Larget Number: " . $sortedNum->getlargest($arr_num);
 
?>



