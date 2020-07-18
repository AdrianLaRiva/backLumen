<?php
namespace App;

class Utils
{

    public static function numberFormat($num)
    {

        $num = str_replace('.', '', $num);
        $num = str_replace(',', '.', $num);
        return $num;
    }

     public static function inverseFormat($num)
    {

        $num = number_format($num);
        $num = (string) $num;
        $num = str_replace(',', '.', $num);

        return $num;


    }

    public static function inverseFormatComas($num)
    {

        $num = number_format($num,2);
        $num = (string) $num;
        $num = str_replace(',', '-', $num);
        $num = str_replace('.', ',', $num);
        $num = str_replace('-', '.', $num);

        return $num;

    }

    public static function storeFile($disk, $file)
    {
        $url = \Storage::disk($disk)->putFile('/', $file);

        return $url;
    }


    public static function checkRut($rut)
    {
        $cleanedRut = Self::clean($rut);

        // retorna el rut de darnel en caso de no ser válido
        if (!$cleanedRut) {
            return false;
        }

        list($numero, $digitoVerificador) = explode('-', $cleanedRut);

        //Validamos requisitos mínimos, retorna el rut de darnel en caso de no ser válido
        if ((($digitoVerificador != 'K') && (!is_numeric($digitoVerificador))) || (count(str_split($numero)) > 11)) {
            return false;
        }

        //Validamos que todos los caracteres del número sean dígitos, retorna el rut de darnel en caso de no ser válido
        foreach (str_split($numero) as $chr) {
            if (!is_numeric($chr)) {
                return false;
            }
        }

        //Calculamos el digito verificador
        $digit = Self::digitoVerificador($numero);

        //Comparamos el digito verificador calculado con el entregado
        if ($digit == $digitoVerificador) {
            $cleanedRut_no_dv = explode("-", $cleanedRut);
            $rut_formatted    = number_format($cleanedRut_no_dv[0], 0, ",", ".") . "-" . $digit;

            /* Agrega un 0 a los ruts si son menores a 10
            if (isset(explode(".", $rut_formatted)[0]) && explode(".", $rut_formatted)[0] < 10) {
            $rut_formatted = '0' . $rut_formatted;
            }*/
            return $rut_formatted;
        }

        // retorna el rut de darnel en caso de no ser válido
        return false;
    }

    /**
     * Formatea un RUT
     *
     * Estandariza un rut al formato 11222333-K desde cualquier
     * entrada valida como rut Ej.: 11.222.333-k, 11222333k, etc.
     * Si la entrada no parece válida retorna FALSE
     *
     * Si se desea formatear un rut que no incluye dígito verificador,
     * se debe establecer el segundo parámetro a false.
     *
     * @access    public
     *
     * @param   string $rut
     * @param     boolean $incluyeDigitoVerificador
     * @return    string|FALSE
     */

    public static function clean($originalRut, $incluyeDigitoVerificador = true)
    {

        //Eliminamos espacios al principio y final
        $originalRut = trim($originalRut);
        //En caso de existir, eliminamos ceros ("0") a la izquierda
        $originalRut = ltrim($originalRut, '0');
        $input       = str_split($originalRut);
        $cleanedRut  = '';

        foreach ($input as $key => $chr) {
            //Digito Verificador
            if ((($key + 1) == count($input)) && ($incluyeDigitoVerificador)) {
                if (is_numeric($chr) || ($chr == 'k') || ($chr == 'K')) {
                    $cleanedRut .= '-' . strtoupper($chr);
                } else {
                    return false;
                }
            }
            //Números del RUT
            elseif (is_numeric($chr)) {
                $cleanedRut .= $chr;
            }
        }

        if (strlen($cleanedRut) < 3) {
            return false;
        }

        return $cleanedRut;
    }

    /**
     * Calcula el dígito verificador de un rut
     *
     * El rut puede ser ingresado en los siguientes formatos:
     *
     ** xx.xxx.xxx (con separación de miles)
     ** xxxxxxxx (sin separación de miles)
     *
     * @access    public
     *
     * @param   string $rut
     * @return    string|FALSE
     */
    public static function digitoVerificador($rut)
    {
        //Preparamos el RUT recibido
        $numero = Self::clean($rut, false);
        //Calculamos el dígito verificador
        $txt     = array_reverse(str_split($numero));
        $sum     = 0;
        $factors = array(2, 3, 4, 5, 6, 7, 2, 3, 4, 5, 6, 7);
        foreach ($txt as $key => $chr) {
            $sum += $chr * $factors[$key];
        }

        $a = $sum % 11;
        $b = 11 - $a;

        if ($b == 11) {
            $digitoVerificador = 0;
        } elseif ($b == 10) {
            $digitoVerificador = 'K';
        } else {
            $digitoVerificador = $b;
        }
        //Convertimos el número a cadena para efectos de poder comparar
        $digitoVerificador = (string) $digitoVerificador;
        return $digitoVerificador;
    }

    public static function is_valid_email($email)
    {
        $email = trim($email);
        return (false !== filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    public static function is_valid_phone($phone)
    {
        if (!is_numeric($phone)) {
            return false;
        }
        if (strlen($phone) < 9 || strlen($phone) > 11) {
            return false;
        }
        return true;
    }

    public static function isProductUrl($url)
    {
        if ($url) {

            $url = explode("/", $url);

            if (strpos($url[0], 'Productos') !== false) {

                return true;
            }
        }
        return false;
    }

    public static function deleteFile($disk, $pdf)
    {
        if (Storage::disk($disk)->exists($pdf));
        {
            Storage::disk($disk)->delete($pdf);
        }
    }

    public static function checkNotificationPermission($grupo, $destinatarios)
    {
        $destinatarios = explode(",", $destinatarios);
        $id            = null;
        if ($grupo == "Roles") {
            $id = \Auth::user()->rol_id;
        } else if ($grupo == "Usuarios") {
            $id = \Auth::user()->id;
        } else if ($grupo == "Todos") {
            return true;
        }

        if (in_array($id, $destinatarios)) {
            return true;
        }
        return false;
    }

    public static function getUrlLogo($company)
    {
        if (isset($company->url_logo)) {
            $url = $company->url_logo;
        } else {
            $url = 'Apolo1.png';
        }

        return $url;
    }

    public static function frontDateFormat($date)
    {
        if($date){
        $date = \DateTime::createFromFormat('Y-m-d', $date);
        $date = $date->format('d/m/Y');
        return $date;
        }
        return null;
    }
    public static function dbDateFormat($date)
    {   
        if($date){
            $date = \DateTime::createFromFormat('d/m/Y', $date);
            $date = $date->format('Y-m-d');
            return $date;
        }
        return null;
    }

    public static function generateCode($longitud)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};

        return $key;
    }

    public static function now()
    {
        $date = new \DateTime();
        $date = $date->format('d/m/Y');
        return $date;
    }
}
