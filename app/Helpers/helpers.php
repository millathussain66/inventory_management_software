<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;


if (!function_exists('isActiveRoute')) {
    function isActiveRoute($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}

/**
 * Prints an array in a better readable format
 */
if (!function_exists('pa')) {
    function pa($array)
    {
        echo '<pre>'; var_export($array); echo '</pre>';
    }
}

/**
 * Prints an array in a better readable format and stoped further execution in the code
 */
if (!function_exists('pad')) {
    function pad($array)
    {
        pa($array); exit;
    }
}

/**
 * Prints an string in ident format
 */
if (!function_exists('niceEcho')) {
    function niceEcho($str)
    {
        echo '<pre>'; echo $str; echo '</pre>';
    }
}

/**
 * checks if an array is empty
 */
if (!function_exists('is_empty_array')) {
    function is_empty_array($array)
    {
        $array = array_filter($array);
        return empty($array) ? true : false;
    }
}
/**
 * Transposes the row and columns of an array
 */
if (!function_exists('transpose_array')) {
    function transpose_array($array)
    {
        return array_map(null, ...$array);
    }
}

/**
 * Converts Positive Integer From an Input.
 * Example: converts '-2121' into 2121. 
 */
if (!function_exists('positiveInteger')) 
{
    function positiveInteger($string) 
    {
        return abs(intval(trim($string)));
    }
}

/**
 * Sets '0.00' as a blank.
 */
if (!function_exists('set_blank')) {
    function set_blank($value = null)
    {
        return (empty($value) || $value == '0.00') ? '' : $value;
    }
}
/**
 * Converts into 2 decimal ppoints
 */
if (!function_exists('round_to_2dp')) {
    function round_to_2dp($number)
    {
        return number_format((float)$number, 2, '.', '');
    }
}
/**
 * Removes unnecessary 0 from a number
 * Example: 7.80 => 7.8
 * Example: 7.00 => 7
 */
if (!function_exists('trim_zero')) {
    function trim_zero($number)
    {
        return $number + 0;
    }
}

/**
 * Comma Separtor of a Numeric Value
 * Example: converts 1234567890 into 1,23,45,67,890
 */
if (!function_exists('comma_seperator')) {
    function comma_seperator($number, $decimal_point = 2)
    {
        if($number === '') return $number;
        
        // for windows vesion: Need to enable extension=ext/php_intl.dll
        // For Linux version: Ensure that the intl extension is enabled in your PHP installation on Linux.
        // You can typically enable it by installing the php-intl package if it's not already installed. 
        
        // Round the number to 2 decimal places
        $number = round($number, $decimal_point);

        // Create a NumberFormatter instance for the Indian locale
        $fmt = new \NumberFormatter('en_IN', \NumberFormatter::DECIMAL);

        // Set minimum and maximum fraction digits to ensure two decimal places
        $fmt->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, $decimal_point);
        $fmt->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, $decimal_point);

        // Format the number
        return $fmt->format($number);

        // Alternate solution (default)
        // return number_format($number, $decimal_point, '.', ',');
    }
}

/**
 * Converts a comma separated value into decimal
 * Example: converts 1,23,45,67,890 into 1234567890 
 */
if (!function_exists('convertToDecimal')) 
{
    function convertToDecimal($stringNumber)
    {
        return number_format((float)str_replace(',','',$stringNumber), 2, '.', '');
    }
}

/**
 * Date for "View"
 * Converts "2024-02-01 15:37:45" into "01-Feb-2024"
 */
if (!function_exists('dateViewMode')) {
    function dateViewMode($date)
    {
        return !empty($date) ? Carbon::parse($date)->format('d-M-y') : '';
    }
}

/**
 * Date for "View"
 * Converts "2024-02-01 15:37:45" into "01-Feb-2024 03:37 PM"
 */
if (!function_exists('dateTimeViewMode')) {
    function dateTimeViewMode($date)
    {
        return !empty($date) ? Carbon::parse($date)->format('d-M-Y h:i A') : '';
    }
}

/**
 * Date for "View"
 * Converts "2024-02-01 15:37:45" into "01-Feb-24 03:37:45 PM"
 */
if (!function_exists('dateTimeViewModeYearTwoDigit')) {
    function dateTimeViewModeYearTwoDigit($date)
    {
        return !empty($date) ? Carbon::parse($date)->format('d-M-y h:i:s A') : '';
    }
}

/**
 * Date-Time for "View"
 * Converts "2024-02-01 15:37:45" into "Thursday, February 1, 2024 3:37 PM"
 */
if (!function_exists('dateIsoFormat')) {
    function dateIsoFormat($date)
    {
        return !empty($date) ? Carbon::parse($date)->isoFormat('LLLL') : '';
    }
}

/**
 * Date-Time for "View"
 * Converts "2024-08-18 15:37:45" into "18th Aug 2024"
 */
if (!function_exists('dateOrdinalFormat')) {
    function dateOrdinalFormat($date)
    {
        return !empty($date) ? Carbon::parse($date)->format('jS M Y') : '';
    }
}

/**
 * Date for "Edit" Form
 * Converts "2024-02-01 15:37:45" into "01//02/2024"
 */
if (!function_exists('dateEditMode')) {
    function dateEditMode($date)
    {
        return !empty($date) ? Carbon::parse($date)->format('d/m/Y') : '';
    }
}

/**
 * Date for SQL "SELECT" query
 * Converts "2024-04-21" or "2024-04-21 14:17:56" into "24-Oct-23"
 */
if (!function_exists('y2Date')) {
    function y2Date($date, $format = 'DD-Mon-RR')
    {
        return "TO_CHAR($date, '$format')";
        // return "TO_CHAR($date, 'MonthDD, YY')";
    }
}

/**
 * auto increment for sequence
 * In parenthesis sequence name should be provide
 */
if (!function_exists('nextIncrement')) {
    function nextIncrement($seq)
    {
        $row = DB::select("SELECT {$seq}.NEXTVAL AS NEXTVAL FROM DUAL")[0];
        return $row->nextval ?? null;
    }
}

/**
 * Date for SQL "SELECT" query
 * Converts "10/24/2023" or "10/24/2023 10:14:56 PM" into "October 24, 2023"
 */
if (!function_exists('y4Date')) {
    function y4Date($date, $format = 'MonthDD, YYYY')
    {
        return "TO_CHAR($date, '$format')";
    }
}

/**
 * Date for SQL "SELECT" query
 * Converts "10/24/2023" or "10/24/2023 15:14:56" into "2023-12-24"
 */
if (!function_exists('date_db_to_yyyymmdd')) {
    function date_db_to_yyyymmdd($date, $format = 'YYYY-MM-DD')
    {
        return "TO_CHAR($date, '$format')";
    }
}

/**
 * Date for SQL "SELECT" query
 * Converts "2023-12-24" or "2023-12-24 15:14:56" into "24/12/2023"
 */
if (!function_exists('date_db_to_ddmmyyyy')) {
    function date_db_to_ddmmyyyy($date, $format = 'DD/MM/YYYY')
    {
        return "TO_CHAR($date, '$format')";
    }
}

/** 
 * Date-Time for SQL "SELECT" query
 * Converts "2023-10-27 21:31:17" into "27-Oct-23 09:31 PM"
 */
if (!function_exists('y2DateTime')) {
    function y2DateTime($datetime, $format = 'DD-Mon-RR HH:MI AM')
    {
        return "TO_CHAR($datetime, '$format')";
    }
}

/**
 * Converts Date for Query-Builder Format
 * Date for SQL "INSERT/UPDATE" query
 * Converts from "12/08/1978" to "1978-08-12"
 * 21/04/2024
 */
if (!function_exists('dbImportDateQB')) {
    function dbImportDateQB($date, $format = 'd/m/Y')
    {
        return empty($date)
            ? NULL
            : Carbon::createFromFormat($format, $date)->format('Y-m-d');
    }
}

/**
 * Converts Date for Raw-Query Format
 * Date for SQL "INSERT/UPDATE" query
 * Converts from "m/d/Y" to "TO_DATE('12-Aug-1978', 'DD-Mon-YYYY')"
 */
if (!function_exists('dbImportDateRawQ_alt')) {
    function dbImportDateRawQ_alt($date)
    {
        return empty($date)
            ? NULL
            : "TO_DATE('" . Carbon::createFromFormat('m/d/Y', $date)->format('d/m/Y') . "', 'DD/Mon/YYYY')";
    }
}

/**
 * Converts Date for Raw-Query Format
 * Date for SQL "INSERT/UPDATE" query
 * Converts from "12/08/1978" to "TO_DATE('12-Aug-1978', 'DD-Mon-YYYY')"
 */
if (!function_exists('dbImportDateRawQ')) {
    function dbImportDateRawQ($date)
    {
        return empty($date)
            ? NULL
            : "TO_DATE('" . Carbon::createFromFormat('d/m/Y', $date)->format('d-M-Y') . "', 'DD-Mon-YYYY')";
    }
}

/**
 * Date for SQL "INSERT/UPDATE" query
 * Converts from "12/08/1978 10:14:56 PM" to "1978-08-12 22:14:56"
 */
if (!function_exists('dbImportDateTime')) {
    function dbImportDateTime($datetime)
    {
        return empty($datetime)
            ? NULL
            : Carbon::createFromFormat('d/m/Y h:i:s A', $datetime)->format('Y-m-d H:i:s');
    }
}

/**
 * Date for SQL "INSERT/UPDATE/WHERE" query
 * Converts from "12/08/1978" to "TO_DATE('1978-08-12', 'YYYY-MM-DD')"
 * 
 * [NB: for later reference
 * Converts from "12/08/1978" to "TO_DATE('12-Aug-1978', 'DD-Mon-YYYY')"
 * format: DD-Mon-RR = 2 digit year
 * format: DD-Mon-YYYY = 4 digit year]
 */
if (!function_exists('dbDate')) {

    function dbDate($date, $format = 'd/m/Y')
    {
        return empty($date)
            ? NULL
            : "TO_DATE('" . Carbon::createFromFormat($format, $date)->format('Y-m-d') . "', 'YYYY-MM-DD')";
    }
}

/**
 * Date-Time for SQL "INSERT/UPDATE/WHERE" query
 * Converts from "23/10/2023 21:31:17" to "TO_DATE('2023-10-23 21:31:17', 'YYYY-MM-DD hh24:mi:ss')"
 * 2023-10-23 21:31:17
 */
if (!function_exists('dbDateTime')) {
    function dbDateTime($datetime, $format = 'd/m/Y H:i:s')
    {
        return empty($datetime)
            ? NULL
            : "TO_DATE('" . Carbon::createFromFormat($format, $datetime)->format('Y-m-d H:i:s') . "', 'YYYY-MM-DD hh24:mi:ss')";
    }
}

/**
 * Date Column for SQL "WHERE" query
 * For Date column format: Converts column from "A.DATE_OF_BIRTH" into "TRUNC(A.DATE_OF_BIRTH)"
 */
if (!function_exists('dbDateColumn')) {
    function dbDateColumn($column)
    {
        return "TRUNC($column)";
        // return "TO_DATE($column,'DD/MM/YY')";
    }
}

/**
 * Date-time Column for SQL "WHERE" query
 * For DateTime column format: No conversion needed 
 */
if (!function_exists('dbDateTimeColumn')) {
    function dbDateTimeColumn($column)
    {
        return $column;
    }
}

/**
 * Checks if the date is today or not
 * returns TRUE if today or FALSE otherwise 
 */
if (!function_exists('isToday')) {
    function isToday($date, $format = 'd/m/Y')
    {
        $today = Carbon::now()->format($format);
        return $date === $today ? TRUE : FALSE;
    }
}

/**
 * Checks if the date is past-date or not
 * returns TRUE if past-date or FALSE otherwise 
 */
if (!function_exists('isPastDate')) {
    function isPastDate($date, $format = 'd/m/Y')
    {
        $dateObj = Carbon::createFromFormat($format, $date);
        $today = Carbon::now();
        return $dateObj->lt($today);
    }
}

/**
 * Checks if the date is Future-date or not
 * returns TRUE if Future-date or FALSE otherwise 
 */
if (!function_exists('isFutureDate')) {
    function isFutureDate($date, $format = 'd/m/Y')
    {
        $dateObj = Carbon::createFromFormat($format, $date);
        $today = Carbon::now();
        return $dateObj->gt($today);
    }
}

/**
 * Calculates date difference in days, months or years - depending on $return_type
 * Format of date parameter must be 'd/m/Y'
 */
if (!function_exists('dateDifference')) {
    function dateDifference($date1, $date2 = null, $return_type = 'day')
    {
        $d1 = Carbon::createFromFormat('d/m/Y', $date1);
        $d2 = !empty($date2) ? Carbon::createFromFormat('d/m/Y', $date2) : Carbon::now();

        switch ($return_type) {
            case 'day':
                $diff = $d1->diffInDays($d2);
                break;
            case 'month':
                $diff = $d1->diffInMonths($d2);
                break;
            case 'year':
                $diff = $d1->diffInYears($d2);
                break;
            default:
                $diff = null;
        }

        return $diff;
    }
}

/**
 * Converts Numeric amount into Words
 * Example: 50012.55 = Taka Fifty Thousand Twelve and Paisa Fifty Five
 */
if (!function_exists('num2words')) {
    function num2words($amount)
    {
        $dec_pt = explode(".", $amount);

        // number with no decimal fraction
        if (count($dec_pt) == 1) {
            $part1 = $dec_pt[0];
            $part2 = 0;
            return 'Taka ' . convert_number($part1) . '';
        }

        // number with with decimal fraction where fraction is 0
        if (count($dec_pt) == 2 && ($dec_pt[1] == 0 || $dec_pt[1] == '00')) {
            $part1 = $dec_pt[0];
            $part2 = $dec_pt[1];
            return 'Taka ' . convert_number($part1) . '';
        }

        // number with with decimal fraction where fraction is greater than 0
        $part1 = $dec_pt[0];
        $part2 = $dec_pt[1];
        return 'Taka ' . convert_number($part1) . ' and Paisa ' . convert_number($part2) . '';
    }
}

/**
 * Converts Number into Word
 */
if (!function_exists('convert_number')) {
    function convert_number($number)
    {
        if (($number < 0) || ($number > 99999999999999)) {
            return "$number";
        }

        $crore = floor($number / 10000000);
        $number -= $crore * 10000000;
        $lac = floor($number / 100000);  //lacs (giga)
        $number -= $lac * 100000;
        $kn = floor($number / 1000);     // Thousands (kilo)
        $number -= $kn * 1000;
        $Hn = floor($number / 100);      // Hundreds (hecto)
        $number -= $Hn * 100;
        $dn = floor($number / 10);       // Tens (deca)
        $n = $number % 10;               // Ones

        $res = '';
        if ($crore) {
            $res .= convert_number($crore) . " Crore";
        }
        if ($lac) {
            $res .= (empty($res) ? '' : ' ') . convert_number($lac) . " Lac";
        }
        if ($kn) {
            $res .= (empty($res) ? '' : ' ') . convert_number($kn) . " Thousand";
        }
        if ($Hn) {
            $res .= (empty($res) ? '' : ' ') . convert_number($Hn) . " Hundred";
        }

        $ones = array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen');
        $tens = array('', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety');

        if ($dn || $n) {
            if (!empty($res)) {
                $res .= ' ';
            }
            if ($dn < 2) {
                $res .= $ones[$dn * 10 + $n];
            } else {
                $res .= $tens[$dn];
                if ($n) {
                    $res .= "-" . $ones[$n];
                }
            }
        }
        if (empty($res)) {
            $res = "zero";
        }

        return $res;
    }
}

// Exports into CSV
if (!function_exists('csv_export')) {
    function csv_export($header, $data, $filename = 'report.csv')
    {
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        $file = fopen('php://output', 'w');
        if (!empty($header)) {
            fputcsv($file, $header);
        }
        foreach ($data as $obj) {
            $row = is_object($obj) ? get_object_vars($obj) : $obj;
            fputcsv($file, $row);
        }
        fclose($file);
    }
}

if (!function_exists('username_with_id')) {
    function username_with_id($UserName, $userId = '')
    {
        return !empty($userId) ? $UserName . " ($userId)" : $UserName;
    }
}

/**
 * Returns Base URL of FTP server.
 * Examle: http://192.168.3.230/sftp_server/loscbl_ftp/
 */
if (!function_exists('ftpServerBaseUrl')) {
    function ftpServerBaseUrl()
    {
        return env('SFTP_PREFIX') . env('SFTP_HOST') . '/' . env('FILE_UPLOAD_PATH');
    }
}

/**
 * Returns a random string of a random length.
 * Examle: KBWc
 */
function randomString($minLength = 1, $maxLength = 5) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomLength = rand($minLength, $maxLength); // Random length between 1 and 5
    $randomString = '';
    for ($i = 0; $i < $randomLength; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Returns a random string of a fixed length.
 */
if (!function_exists('randomStringFixedLength')) {
    function randomStringFixedLength($length = 5) 
    {
        return strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length));
    }
}

/**
 * Add Days excuding holidays and weekends.
 * Examle: 
 */
if (!function_exists('addWorkingDays')) {
    function addWorkingDays($days, $startDate=null)
    {
         if ($startDate === null) {
            $currentDate = strtotime(date("Y-m-d"));
        } else {
            $currentDate = strtotime($startDate);
        }
        
        $daysAdded = 0;

        while ($daysAdded < $days) {
            $currentDate = strtotime("+1 day", $currentDate);
            $dayOfWeek = date("w", $currentDate);
            if ($dayOfWeek != 5 && $dayOfWeek != 6) {
                $daysAdded++;
            }
        }

        return date("Y-m-d", $currentDate);
    }
}

/**
 * Calculates Bytes to KiloBytes
 * Examle: 
 */
if (!function_exists('calculateInKB')) {
    function calculateInKB($bytes)
    {
        $kilobytes = $bytes / 1024;
        // $formattedKB = sprintf("%.2g", $kilobytes);
        // return rtrim(rtrim($formattedKB, '0'), '.');
        return number_format($kilobytes, 2);
    }
}

/**
 * Calculates Bytes to MegaBytes
 * Examle: 
 */
if (!function_exists('calculateInMB')) {
    function calculateInMB($bytes)
    {
        $megabytes = $bytes / (1024 * 1024);
        $formattedMB = sprintf("%.3g", $megabytes);
        return rtrim(rtrim($formattedMB, '0'), '.');

        // $megabytes = $bytes / (1024 * 1024);
        // return number_format($megabytes, 3);
    }
}

/**
 * Concatenate Array Elements into String
 * Examle: 
 *  $input  = ['Apple', 'Orange', 'Mango', 'Banana'];
*   $Output = 'Apple, Orange, Mango and Banana';
 */
if (!function_exists('arrayToStrConcateWithAnd')) {
    function arrayToStrConcateWithAnd($array)
    {
        $last_item = array_pop($array);
        return implode(', ', $array) . ' and ' . $last_item;
    }
}


/**
 * Prepare CASE statement for Oracle raw query
 * Sample Input:  prepCaseStatemnt('F.WITHDRAW_STATUS', 'WITHDRAW_STATUS', config("system.withdraw_status"));
 * Sample Output:
 * CASE 
 * 	 	WHEN F.WITHDRAW_STATUS IS NULL THEN 'No Request Placed'
 * 	 	WHEN F.WITHDRAW_STATUS = 0 THEN 'No Request Placed'
 * 	 	WHEN F.WITHDRAW_STATUS = 1 THEN 'Request Placed'
 * 	 	WHEN F.WITHDRAW_STATUS = 2 THEN 'Request Accepted'
 * 	 	WHEN F.WITHDRAW_STATUS = 3 THEN 'Request Rejected'
 * END AS WITHDRAW_STATUS
 */
if (!function_exists('prepareCaseStatemnt')) {
    function prepareCaseStatemnt($column, $alias, $options)
    {
        $str = "";
        if (array_key_exists(0, $options)) {
            $str .= "
                WHEN $column IS NULL THEN '".$options[0]."'";
            foreach($options as $key=>$val){
                $str .= "
                WHEN $column = $key THEN '".$val."'";
            }
        }

        return "CASE $str 
        END AS $alias";
    }
}

/**
 * Checks whether 'all' exists in given string
 * EXAMPLE:
 * Input: ALL,21,22,3    Output: true
 * Input: 21,22,33       Output: false
 */
if (!function_exists('checkAllExistsinField')) {
    function checkAllExistsinField($str)
    {
        return stripos($str, 'all') !== false;
    }
}

/**
 * Include 'all' in the field and exclude everything else.
 * EXAMPLE:
 * Input: ALL,21,22,3    Output: all
 * Input: 21,22,33       Output: 21,22,33
 */
if (!function_exists('setAllinField')) {
    function setAllinField($str)
    {
        return checkAllExistsinField($str) ? 'all' : $str;
    }

}