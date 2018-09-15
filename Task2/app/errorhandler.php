<?php

class ErrorHandler 
{
	//Выводим сообщение в браузере при обнаружении ошибки
	public function myErrorHandler($errno, $msg, $file, $line)
	{
		echo '<div style="border-style:inset; border-width:2">';
		echo "Ошибка с кодом <b>$errno</b>!<br />";
		echo "Файл: <tt>$file</tt>, строка $line.<br />";
		echo "Текст ошибки: <i>$msg</i>";
		echo "</div>";
	}

	// Обработчик исключений, не заключенных в try... catch
	public  function exceptionHandler(Exception $e)
    {
        // выводим информацию об исключении в браузере
        $this->showExceptionMessage(get_class($e), $e->getMessage(), $e->getFile(), $e->getLine(), 404);
    }
	
	//Выводим сообщение об исключении в браузер
	public  function showExceptionMessage($errno, $errstr, $file, $line, $status = 500)
    {
        header("HTTP/1.1 $status");
        echo $message = '<b>' . $errno . "</b><hr>" . $errstr . '<hr> file: ' . $file . '<hr> line: ' . $line . '<hr>';
        echo '<br>';
    }
	
	//Регистрируем обработчики классов и исключений по умолчанию
	public function register() {
		set_error_handler([$this, "myErrorHandler"]);
		set_exception_handler([$this, 'exceptionHandler']);
	}

}
?>
