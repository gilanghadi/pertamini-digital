<?php



class Flasher
{
    public static function setFlash($pesan, $message, $type)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'message' => $message,
            'type' => $type,
        ];
    }

    public static function setFlashInput($message)
    {
        $_SESSION['flashInput'] = [
            'message' => $message,
        ];
    }

    public static function flashInput()
    {
        if (isset($_SESSION['flashInput'])) {
            echo "<span style='font-size: 13px;' class='text-danger'>" . $_SESSION['flashInput']['message'] . "</span>";
            unset($_SESSION['flashInput']);
        }
    }
}
