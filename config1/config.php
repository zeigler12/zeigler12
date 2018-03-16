<?

define( 'DB_HOST', 'isat-cit.marshall.edu' ); // set database host
define( 'DB_USER', 'CIT410Admin' ); // set database user
define( 'DB_PASS', 'Th1515T0pS3cr3t' ); // set database password
define( 'DB_NAME', 'CIT410' ); // set database name
define( 'SEND_ERRORS_TO', 'brian.morgan@marshall.edu' ); //set email notification email address
define( 'DISPLAY_DEBUG', true ); //display db errors?

require_once('classes/DB_class.php' );


 $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
?>